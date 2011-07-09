<?php
session_start();

include ("db.inc.php");

/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* GET  ID
/* GET  ACTION
/* GET  DATA
/* SWITCH  ID
/* - wallpaper_slideshow
/* - update_hns_desktop
/* -- SWITCH  ACTION
/* --- wallpaper_file
/* - tic_tac_toe
/* - notepad_save
/* ---------------------------------------------------- */

if (isset($_GET['id'])) {
$id = trim($_GET['id']);
if (isset($_GET['action'])) $action = trim($_GET['action']);
if (isset($_GET['data'])) $data = trim($_GET['data']);
switch ($id) {
case 'wallpaper_slideshow':

$dirpath = "i/wallpapers/thumbnails/";
$files = opendir($dirpath);

echo "<div id=\"slideshow\">";

while ($file = readdir($files)) {
if (($file != ".") && ($file != "..") && ($file != "desktop.ini") && ($file != "Thumbs.db") && ($file != "Ehthumbs.db") && ($file != "_derived") && ($file != "_fpclass") && ($file != "_themes") && ($file != "_vti_cnf") && ($file != "_vti_pvt") && ($file != "images")) {
if (is_file($dirpath . $file)) {
$nameArray = split("[/\\.]", $file);
$p = count($nameArray);
$filetype = $nameArray[($p - 1)];

echo "<img src=\"$dirpath$file\" id=\"$file\" class=\"thumbnail\" alt=\"$nameArray[0]\" />\n";
}
}
}

echo "</div>";

break;
case 'update_hns_desktop':

switch ($action) {
case 'wallpaper_file':

$query = 'UPDATE hns_desktop SET
wallpaper_file = "' . $data . '"
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

break;
case 'notepad':

$query = 'UPDATE hns_desktop SET
notepad = "' . $data . '"
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

break;
}

break;
case 'tic_tac_toe':
?>
<div class="stats">Games Won: <span id="win">0</span>&nbsp;&nbsp;&nbsp;&nbsp;Games Lost: <span id="lose">0</span>&nbsp;&nbsp;&nbsp;&nbsp;AI Thinkingness: <span id="think">0</span></div>
<div class="game">
<table id="grid" cellpadding="0" cellspacing="0">
<tbody>
<tr><td><div><div></div><a href="javascript:void(0);" onclick="click(0,0);" id="g1">1</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(1,0);" id="g2">2</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(2,0);" id="g3">3</a></div></td></tr>
<tr><td><div><div></div><a href="javascript:void(0);" onclick="click(0,1);" id="g4">4</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(1,1);" id="g5">5</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(2,1);" id="g6">6</a></div></td></tr>
<tr><td><div><div></div><a href="javascript:void(0);" onclick="click(0,2);" id="g7">7</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(1,2);" id="g8">8</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(2,2);" id="g9">9</a></div></td></tr>
</tbody>
</table>
<canvas id="c_tic_tac_toe">ERROR - LAME WEB BROWSER</canvas>
</div>
<?php
break;
}
}
?>