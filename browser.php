<?php if(!$CONFIG = include("config.php")) exit;?>

<?php require("auth.php"); ?>

<p><a href="?dir=">[ / ]</a></p>

<?php
function norm_dir($dir){
  return trim($dir,"/\\");
}

function url_concat(){
   $arg_list = func_get_args();
   $str = "";
   for($i=0;$i<func_num_args();$i++){
     $arg_list[$i] = norm_dir($arg_list[$i]);
	 if($arg_list[$i]!="")
     $str = $str.$arg_list[$i]."/";
   }
   return norm_dir($str);
}

$dir = "";
if(isset($_REQUEST["dir"])){
 $dir = $_REQUEST["dir"];
}

if ($handle = opendir(url_concat($CONFIG["music_link_name"],$dir))) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
		    $add_flag = false;
			if(is_dir(url_concat($CONFIG["music_link_name"],$dir,$entry)."/"))
            {
			 $add_flag = true;
			?>
			<p><a href="?dir=<?=url_concat($dir,$entry)?>"><img style="vertical-align:bottom" src="img/folder.png" height="25px"> <?=$entry?></a>
			<?php
			}
			if(in_array(pathinfo($entry, PATHINFO_EXTENSION),$CONFIG["media_files"])){
			  $add_flag = true;
			  ?>
			   <p><a class="diritem" href="javascript:void(0)" onclick="parent.playTrack('<?=addslashes(url_concat($CONFIG["music_link_name"],$dir,$entry));?>', this);"><img style="vertical-align:bottom" src="img/music.png" height="25px"> <?=$entry?></a>
			  <?php
			}
			?>
			<?php if($add_flag){?>
			<a style="color:white;background:green" href="javascript:void(0)" onclick="parent.mpc('add','<?=addslashes(url_concat($dir,$entry))?>')"><b> | + |</b></a></p>
			<?php }?>
			<?php
        }
    }
    closedir($handle);
}
?>