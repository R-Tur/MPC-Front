<?php 
if(!$CONFIG = include("config.php")) die("can't find config.php!");
require("auth.php");
if(!file_exists($CONFIG["music_link_name"])){
  header("location: install.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="js/app.js.php"></script>
</head>
<body>
<div style="font-size:x-large;position:fixed;padding-top:30px;top:0px; height:75px;width:100%;background:white">
<div style="z-index:10;text-align:right;padding-right:20px;float:right">
<a style="color:white; background:red" href="javascript:void(0)" onclick="mpc('stop', '',true)">| STOP |</a> 
<a style="color:white;background:green" href="javascript:void(0)" onclick="mpc('play')">| PLAY |</a>
<a style="color:white; background:blue" href="javascript:void(0)" onclick="mpc('prev')">| PREV |</a>
<a style="color:white; background:blue"  href="javascript:void(0)" onclick="mpc('next')">| NEXT |</a>
<a style="color:white; background:red" href="javascript:void(0)" onclick="mpc('crop', '',true)">CROP</a> 
<a style="color:white; background:green" href="javascript:void(0)" onclick="mpc('update')">UPDATE</a> 
<a style="color:green; background:yellow" href="javascript:void(0)" onclick="mpc('shuffle')">SHUFFLE</a> 
<p style="margin-top:3px;padding-top:10px" id="mpc_status"></p>
</div>
<audio id="audio" controls></audio> 
<font style="position:absolute;left:0px;top:0px;font-size:small;cursor:pointer" id="now_played_track" onclick="mpc('add',$(this).html());"></font>
<a target="_blank" style="font-size:small" href="https://github.com/R-Tur/MPC-Front">MPC-Front, v.0.0.1</a>
</div>

<div style="padding-top:100px">
<table>
<tr valign="top">
<td>
<iframe id="browserframe" width="650px" height="1280px" src="browser.php"></iframe></td>
<td align="left">
<div id="mpc_playlist" style="overflow-y: visible;  margin: 0 auto;"></div></td>
</tr>
</table>
</div>
</body>
</html>