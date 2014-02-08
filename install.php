<?php if(!$CONFIG = include("config.php")) exit;?>

<?php require("auth.php"); ?>

<p>Please specify your music dir <b>(i.e. "music_directory" in your mpd.conf)</b></p>
<form method="GET">
<b>music_directory: </b><input name="music_dir" type="text"></p>
<input type="submit">
</form>

<?php 
if(!$_REQUEST) exit;
if(file_exists($_REQUEST["music_dir"])){
  if(is_link($CONFIG["music_link_name"])){
    unlink($CONFIG["music_link_name"]);
  }
  if(!symlink($_REQUEST["music_dir"], $CONFIG["music_link_name"])){
     die("<b>need 777 rights for dir with this script!</b>");
  }
  if(is_link($CONFIG["music_link_name"])){
    header("location: index.php");
	exit;	 
  }
}
else{
  echo "Directory does not exists.";
}
?>