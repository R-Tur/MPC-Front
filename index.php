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
<script src="js/app.js"></script>
</head>
<body>
<div style="font-size:x-large;z-index:10;position:fixed; top:0px; height:70px;width:100%;background:white">
<div style="text-align:right;padding-right:12px;float:right">
<a style="color:white; background:red" href="javascript:void" onclick="mpc('stop', '',true)">| STOP |</a> 
<a style="color:white;background:green" href="javascript:void" onclick="mpc('play')">| PLAY |</a>
<a style="color:white; background:blue" href="javascript:void" onclick="mpc('prev')">| PREV |</a>
<a style="color:white; background:blue"  href="javascript:void" onclick="mpc('next')">| NEXT |</a>
<a style="color:white; background:red" href="javascript:void" onclick="mpc('crop', '',true)">CROP</a> 
<a style="color:white; background:green" href="javascript:void" onclick="mpc('update')">UPDATE</a> 
<a style="color:green; background:yellow" href="javascript:void" onclick="mpc('shuffle')">SHUFFLE</a> 
<p style="margin-top:3px;padding-top:10px" id="mpc_status"></p>
</div>
<audio id="audio" controls></audio> <a target="_blank" style="position:absolute;top:0px;margin-left:50px;font-size:small" href="https://github.com/R-Tur/MPC-Front">MPC Front, v.0.0.1</a>
<a style="position:absolute;left:0px;top:45px;margin-left:10px;" href="javascript:void"  onclick="mpc('add',APP.track_played.path)"><font style="font-size:small" id="now_played_track"></font></a>
</div>

<div style="padding-top:60px">
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