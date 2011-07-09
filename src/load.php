<?php
if (!isset($_GET['id'])) { header('WWW-Authenticate: Basic realm="HnS Desktop"'); die('HTTP/1.1 401 Unauthorized'); }
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
/* - update_apps
/* -- SWITCH ACTION
/* --- app_names
/* - user_info
/* - register
/* - wallpaper_slideshow
/* - update_hns_desktop
/* -- SWITCH ACTION
/* --- wallpaper_file
/* - tic_tac_toe
/* - chat
/* - calculator
/* ---------------------------------------------------- */

if (isset($_GET['id'])) {
$id = trim($_GET['id']);
$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];

if (isset($_GET['action'])) $action = trim($_GET['action']);
if (isset($_GET['data'])) $data = trim($_GET['data']);
if (isset($_GET['subdata'])) $subdata = trim($_GET['subdata']);

switch ($id) {
case 'update_apps':

$applist = array("documents","preferences","notepad","flash_name","ytinstant","piano","about_hnsdesktop","feedback","tic_tac_toe","friends","goom_radio","search","chat","music","web_browser","torus","calendar","app_explorer","calculator");
switch ($action) {
// foreach ($applist as $app) { case $app: $query = 'UPDATE hns_desktop SET app_' . $app . ' = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break; }
case 'documents': $query = 'UPDATE hns_desktop SET app_documents = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'preferences': $query = 'UPDATE hns_desktop SET app_preferences = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'notepad': $query = 'UPDATE hns_desktop SET app_notepad = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'flash_name': $query = 'UPDATE hns_desktop SET app_flash_name = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'ytinstant': $query = 'UPDATE hns_desktop SET app_ytinstant = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'piano': $query = 'UPDATE hns_desktop SET app_piano = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'about_hnsdesktop': $query = 'UPDATE hns_desktop SET app_about_hnsdesktop = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'feedback': $query = 'UPDATE hns_desktop SET app_feedback = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'tic_tac_toe': $query = 'UPDATE hns_desktop SET app_tic_tac_toe = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'friends': $query = 'UPDATE hns_desktop SET app_friends = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'goom_radio': $query = 'UPDATE hns_desktop SET app_goom_radio = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'search': $query = 'UPDATE hns_desktop SET app_search = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'chat': $query = 'UPDATE hns_desktop SET app_chat = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'music': $query = 'UPDATE hns_desktop SET app_music = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'web_browser': $query = 'UPDATE hns_desktop SET app_web_browser = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'torus': $query = 'UPDATE hns_desktop SET app_torus = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'calendar': $query = 'UPDATE hns_desktop SET app_calendar = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'app_explorer': $query = 'UPDATE hns_desktop SET app_app_explorer = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
case 'calculator': $query = 'UPDATE hns_desktop SET app_calculator = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid; mysql_query($query, $db) or die(mysql_error()); break;
}

break;
case 'user_info':

$query = 'SELECT user_id FROM login WHERE username = "' . mysql_real_escape_string($data, $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));
if (mysql_num_rows($result) == 1) {
	$row = mysql_fetch_assoc($result);
	extract($row);
	mysql_free_result($result);
	echo $row['user_id'];
} else echo "x";

break;
case 'register':



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
case 'ytinstant':

function removeValue($val, $array) {
	return array_values(array_diff($array, array($val)));
}

if (isset($_GET['data']) && isset($_GET['action'])) {
	if ($action == "add") {
		$query = 'UPDATE hns_desktop SET yt_playlist = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
		mysql_query($query, $db) or die(mysql_error());
	} elseif ($action == "remove") {
		$query = 'UPDATE hns_desktop SET yt_playlist = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
		mysql_query($query, $db) or die(mysql_error());
	}
} else {
	if (isset($_GET['action']) && ($action == "songplaylists")) include("playlists.inc.php");
	elseif (isset($_GET['action']) && ($action == "friendplaylists")) {
		$query = 'SELECT user_id, yt_playlist FROM hns_desktop WHERE yt_playlist != ""';
		$result = mysql_query($query, $db) or die(mysql_error($db));
		if (mysql_num_rows($result) > 0) {
			echo '{ "data": {'; $i = 0;
			while ($row = mysql_fetch_array($result)) { ++$i;
				$playlist = explode(",", $row['yt_playlist']);
				if ($i == 1) echo '"' . $row['user_id'] . '": [';
				else echo '], "' . $row['user_id'] . '": [';
				foreach ($playlist as $song) { if ($i = 0) echo "\"$song\""; else echo ",\"$song\""; }
			}
			echo ']';
			echo '}}';
			/*
			{ "data": {
				"Current Popular Songs": [
					"YouTube","AutoTune","Rihanna","Far East Movement","Glee Cast","Nelly","Usher","Katy Perry","Taio Cruz","Eminem","Shakira","Kesha","B.o.B","Taylor Swift",
					"Akon","Bon Jovi","Michael Jackson","Lady Gaga","Paramore","Jay Z","My Chemical Romance","The Beatles","Led Zepplin","Guns N Roses","AC DC",
					"System of a Down","Aerosmith","Tetris","8-bit","Borat","Basshunter","Fall Out Boy","Blink 182","Pink Floyd","Still Alive","Men at Work","MGMT",
					"Justin Bieber","The Killers","Bed Intruder Song","Baba O Riley","Billy Joel","Drake","Jay Sean","The Ready Set"
				], "Advice Songs": [
			*/
		} else echo "x";
	}
}

break;
case 'tic_tac_toe':
?>
<div class="stats">Games Won: <span id="win">0</span>&nbsp;&nbsp;&nbsp;&nbsp;Games Lost: <span id="lose">0</span>&nbsp;&nbsp;&nbsp;&nbsp;AI Thinkingness: <span id="think">0</span></div>
<div class="game">
<table id="grid" cellpadding="0" cellspacing="0">
<tbody>
<tr><td><div><div></div><a href="javascript:void(0);" onclick="click(0,0); return false;" id="g1">1</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(1,0); return false;" id="g2">2</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(2,0); return false;" id="g3">3</a></div></td></tr>
<tr><td><div><div></div><a href="javascript:void(0);" onclick="click(0,1); return false;" id="g4">4</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(1,1); return false;" id="g5">5</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(2,1); return false;" id="g6">6</a></div></td></tr>
<tr><td><div><div></div><a href="javascript:void(0);" onclick="click(0,2); return false;" id="g7">7</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(1,2); return false;" id="g8">8</a></div></td><td><div><div></div><a href="javascript:void(0);" onclick="click(2,2); return false;" id="g9">9</a></div></td></tr>
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
		if ($timediff < 60) { if ($timediff > 1) echo $timediff . " Seconds Ago"; else echo "1 Second Ago"; }
		else {
			$mtimediff = floor($timediff / 60);
			$stimediff = ($timediff % 60);
			echo $mtimediff;
			if ($stimediff == 0) { if ($mtimediff > 1) echo " Minutes Ago"; else echo " Minute Ago"; }
			else {
				if ($mtimediff > 1) echo " Minutes & "; else echo " Minute & ";
				echo $stimediff;
				if ($stimediff > 1) echo " Seconds Ago"; else echo " Second Ago";
			}
		}
	}
}

break;
case 'calculator':

if (isset($_GET['action']) && ($action == "setkey")) {
	if (isset($_GET['data'])) {
		$query = 'UPDATE hns_desktop SET notepad = "' . mysql_real_escape_string(htmlentities($data)) . '" WHERE user_id = ' . $userid;
		mysql_query($query, $db) or die(mysql_error());
	}
}

if (isset($_GET['action']) && ($action == "getkey")) {
	$query = 'SELECT user_id FROM login WHERE username = "' . mysql_real_escape_string($data, $db) . '"';
	$result = mysql_query($query, $db) or die(mysql_error($db));
	if (mysql_num_rows($result) == 1) {
		$row = mysql_fetch_assoc($result);
		extract($row);
		mysql_free_result($result);
		echo $row['user_id'];
	} else echo "x";
}

break;
case 'twitter':

if (isset($_GET['data']) && isset($_GET['action'])) {
	if ($action == "add") {
		$query = 'UPDATE hns_desktop SET twttr_playlist = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
		mysql_query($query, $db) or die(mysql_error());
	} elseif ($action == "remove") {
		$query = 'UPDATE hns_desktop SET twttr_playlist = "' . mysql_real_escape_string($data) . '" WHERE user_id = ' . $userid;
		mysql_query($query, $db) or die(mysql_error());
	}
}

break;
}
}
?>