<?php
session_start();

include ("db.inc.php");

/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* GET  ID
/* GET  ACTION
/* GET  DATA
/* GET  SUBDATA
/* SWITCH ID
/* - wallpaper_slideshow
/* - update_hns_desktop
/* -- SWITCH ACTION
/* --- wallpaper_file
/* - update_apps
/* -- SWITCH ACTION
/* --- app_names
/* - tic_tac_toe
/* - chat
/* ---------------------------------------------------- */

if (isset($_GET['id'])) {
$id = trim($_GET['id']);
$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];

if (isset($_GET['action'])) $action = trim($_GET['action']);
if (isset($_GET['data'])) $data = trim($_GET['data']);
if (isset($_GET['subdata'])) $subdata = trim($_GET['subdata']);

switch ($id) {
case 'user_info':

$query = 'SELECT user_id FROM login WHERE username = "' . mysql_real_escape_string($data, $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) == 1) {
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);
echo $row['user_id'];
} else {
echo "x";
}

break;
case 'wallpaper_slideshow':

$dirpath = "i/wallpapers/thumbnails/";
$files = opendir($dirpath);
$albums = array('abst','aabst','animal','ani','apo','arch','baw','car','celeb','cag','color','chr','fant','flower','fractal','hr','hrc','holiday','mac','misc','movie','nal','travel','tv','typo','win');

foreach ($albums as $key => $album) {
$album . $key = "<div id=\"" . $album . "\">\n";
}

echo "<div id=\"slideshow\">";

while ($file = readdir($files)) {
if (($file != ".") && ($file != "..") && ($file != "desktop.ini") && ($file != "Thumbs.db") && ($file != "Ehthumbs.db") && ($file != "_derived") && ($file != "_fpclass") && ($file != "_themes") && ($file != "_vti_cnf") && ($file != "_vti_pvt") && ($file != "images")) {
if (is_file($dirpath . $file)) {
$nameArray = split("[/\\.]", $file);
$p = count($nameArray);
$filetype = $nameArray[($p - 1)];

foreach ($albums as $key => $album) {
if (preg_match("/^$album.*/", $nameArray[0])) {
$album . $key .= "<img src=\"$dirpath$file\" id=\"$file\" class=\"thumbnail\" alt=\"$nameArray[0]\" />\n";
}
}

}
}
}

foreach ($albums as $key => $album) {
$album . $key .= "</div>";
echo $album . $key;
}

echo "</div>";

break;
case 'update_hns_desktop':

switch ($action) {
case 'wallpaper_file':

$query = 'UPDATE hns_desktop SET wallpaper_file = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'notepad':

$query = 'UPDATE hns_desktop SET notepad = "' . mysql_real_escape_string(htmlentities($data)) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
}

break;
case 'update_apps':

switch ($action) {
case 'documents':

$query = 'UPDATE hns_desktop SET app_documents = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'preferences':

$query = 'UPDATE hns_desktop SET app_preferences = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'notepad':

$query = 'UPDATE hns_desktop SET app_notepad = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'flash_name':

$query = 'UPDATE hns_desktop SET app_flash_name = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'ytinstant':

if (isset($_GET['action']) && ($action == "add")) {
if (isset($_GET['data'])) {
$query = 'UPDATE hns_desktop SET yt_playlist = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());
}
}

if (isset($_GET['action']) && ($action == "remove")) {
if (isset($_GET['data'])) {
$query = 'UPDATE hns_desktop SET yt_playlist = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());
}
}

break;
case 'piano':

$query = 'UPDATE hns_desktop SET app_piano = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'about_hnsdesktop':

$query = 'UPDATE hns_desktop SET app_about_hnsdesktop = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'feedback':

$query = 'UPDATE hns_desktop SET app_feedback = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'tic_tac_toe':

$query = 'UPDATE hns_desktop SET app_tic_tac_toe = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'friends':

$query = 'UPDATE hns_desktop SET app_friends = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'goom_radio':

$query = 'UPDATE hns_desktop SET app_goom_radio = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'search':

$query = 'UPDATE hns_desktop SET app_search = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'chat':

$query = 'UPDATE hns_desktop SET app_chat = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'music':

$query = 'UPDATE hns_desktop SET app_music = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'web_browser':

$query = 'UPDATE hns_desktop SET app_web_browser = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'torus':

$query = 'UPDATE hns_desktop SET app_torus = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
mysql_query($query, $db) or die(mysql_error());

break;
case 'calendar':

$query = 'UPDATE hns_desktop SET app_calendar = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
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
case 'chat':

if (isset($_GET['action']) && ($action == "send")) {
if (isset($_GET['data'])) {
$message = $_GET['data'];
$chatfile = $_SERVER['DOCUMENT_ROOT'] . "/chat_history.php";
$fhandle = fopen($chatfile, "r") or exit("Unable to open file!");
$content = fread($fhandle, filesize($chatfile));
$message = '<div>(' . date("g:i A") . ') <b>' . $username . '</b>: ' . stripslashes(htmlspecialchars($message)) . '<br /></div>' . "\n";
$content .= $message;
$fhandle = fopen($chatfile, "w");
fwrite($fhandle, $content);
fclose($fhandle);
}
}

if (isset($_GET['action']) && ($action == "clear")) {
$chatfile = $_SERVER['DOCUMENT_ROOT'] . "/chat_history.php";
$content = "<div>Welcome To Homenet Spaces CHAT!! Enjoy :)</div><br />\n";
$fhandle = fopen($chatfile, "w");
fwrite($fhandle, $content);
fclose($fhandle);
}

if (isset($_GET['action']) && ($action == "refresh")) {
$chatfile = $_SERVER['DOCUMENT_ROOT'] . "/chat_history.php";
$mtime = filemtime($chatfile);
$ctime = time();
$timediff = ($ctime - $mtime);

if ($timediff > 3600) {
$content = "<div>Welcome To Homenet Spaces CHAT!! Enjoy :)</div><br />\n";
$fhandle = fopen($chatfile, "w");
fwrite($fhandle, $content);
fclose($fhandle);
}

$fhandle = fopen($chatfile, "r") or exit("Unable to open file!");
$content = fread($fhandle, filesize($chatfile));
fclose($fhandle);

echo $content;

if (strlen($content) > 60) {
echo "<br />Last Message Was Sent ";

if ($timediff < 60) {
if ($timediff > 1) echo $timediff . " Seconds Ago";
else echo "1 Second Ago";
} else {
$mtimediff = floor($timediff / 60);
$stimediff = ($timediff % 60);
echo $mtimediff;

if ($stimediff == 0) {
if ($mtimediff > 1) echo " Minutes Ago";
else echo " Minute Ago";
} else {
if ($mtimediff > 1) echo " Minutes & ";
else echo " Minute & ";
echo $stimediff;

if ($stimediff > 1) echo " Seconds Ago";
else echo " Second Ago";
}
}
}
}

break;
}
}
?>