<?php
session_start();
header("Content-Type: application/x-javascript");
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Javascript  <<< ------------ */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    HnS Desktop
/* Site Creator: Andrew Gerst
/* Site Created: Wed, 24 Mar 2010 21:22:05 -0400
/* Last Updated: <?php echo date(r, filemtime('javascript.php')) . "\n"; ?>
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>/* Current User: <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "\n"; } ?>
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* dConfig Variable Arrays
/* - User
/* -- Styles
/* -- Desktop
/* -- Startmenu
/* -- Taskbar
/* -- Launchers
/* -- Apps
/* - Styles
/* - Desktop
/* - Startmenu
/* - Taskbar
/* - Launchers
/* - Apps
/* Stylesheet
/* Screen Dimensions
/* Black / White Out Variables
/* Misc Functions
/* - In Array
/* - Get The Date
/* -- Get Date
/* - Update Captcha Image
/* - Div Selection
/* Create Task Button
/* Panel Content (Logged In)
/* - Logout
/* - Preferences
/* - Notepad
/* - Flash Name
/* - Piano
/* Panel Variables (Logged In)
/* - (Dialog) Loading
/* - User Desktop
/* - Logout
/* - Preferences
/* - Notepad
/* - Flash Name
/* - Piano
/* Panel Content (Logged Out)
/* - Login
/* - Register
/* Panel Variables (Logged Out)
/* - Login
/* - Register
/* - (Dialog) Try Again
/* Document Ready Functions (Logged Out)
/* - Display Functions
/* -- Login
/* -- Register
/* - Input (Text) Username (Focus)
/* - Input (Submit) Signin (Click)
/* - Input (Button) Signup (Click)
/* - Input (Submit) Register (Click)
/* Document Ready Functions (Logged In)
/* - Initiate Desktop
/* -- Display Functions
/* --- (Dialog) Loading
/* --- User Desktop
/* - Set Desktop Config
/* -- Desktop Config
/* -- Taskbar Config
/* - Autorun Functions
/* -- Logout
/* -- Notepad
/* -- Preferences
/* -- Flash_Name
/* -- Piano
/* - Input (Submit) Logout (Click)
/* - Flash_Name (Load)
/* Window Load Functions
/* - Window Drag Effect
/* -- Header (Mouse Down)
/* -- Header Text (Mouse Down)
/* -- Header (Mouse Up)
/* -- Header Text (Mouse Up)
/* - Window Tool
/* -- Close (Click)
/* -- Maximize (Toggle)
/* -- (If) BWrap (Is) Hidden
/* -- Minimize (Click)
/* -- Toggle (Click)
/* -- Toggle (Toggle)
/* Window Load Functions (Logged In)
/* - Desktop
/* -- Body (Click)
/* -- Desktop Thumb (Click)
/* -- Desktop Thumb (Dbl Click)
/* -- Document Element (Key Down)
/* -- Taskbar Transparency (Toggle)
/* - Taskbar
/* -- Taskbutton (Click)
/* -- (If) TButton (Is) Hidden
/* -- Quickstart Splitbar (Mouse Down)
/* -- Quickstart Splitbar (Bind - Mouse Move)
/* -- Tray Splitbar (Mouse Down)
/* -- Tray Splitbar (Bind - Mouse Move)
/* -- Splitbar (Mouse Leave)
/* -- Splitbar (Mouse Up)
/* -- Tray Toggle (Toggle)
/* Drag Resize
/* XHR
/* ---------------------------------------------------- */

<?php
// begin dConfig database query
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("db.inc.php");

$query = 'SELECT * FROM
hns_desktop u
JOIN
info i
ON
u.user_id = i.user_id
WHERE ' .
'u.user_id = "' . mysql_real_escape_string($_SESSION['user_id'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);
}
}
// end dConfig database query
?>
/* begin desktop config variable arrays */
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>
var aConfig = {
"user":{
"alarm":"<?php echo $_SESSION['alarm']; ?>",

"launchers":{
"autorun":"<?php echo $launcher_autorun; ?>",
"thumbs":"<?php echo $launcher_thumbs; ?>",
"startmenuapps":"<?php echo $launcher_startmenuapps; ?>",
"startmenutools":"<?php echo $launcher_startmenutools; ?>",
"quickstart":"<?php echo $launcher_quickstart; ?>",
"tray":"<?php echo $launcher_tray; ?>"
},

"apps":{
"documents":"<?php echo $app_documents; ?>",
"wallpaper":"<?php echo $app_wallpaper; ?>",
"preferences":"<?php echo $app_preferences; ?>",
"notepad":"<?php echo $app_notepad; ?>",
"flash_name":"<?php echo $app_flash_name; ?>",
"piano":"<?php echo $app_piano; ?>",
"about_hnsdesktop":"<?php echo $app_about_hnsdesktop; ?>",
"feedback":"<?php echo $app_feedback; ?>",
"tic_tac_toe":"<?php echo $app_tic_tac_toe; ?>",
"friends":"<?php echo $app_friends; ?>",
"radio":"<?php echo $app_radio; ?>",
"search":"<?php echo $app_search; ?>",
"chat":"<?php echo $app_chat; ?>",
"music":"<?php echo $app_music; ?>"
}
}
}

var bConfig = {
"user":{
"apps":{
"documents":aConfig.user.apps.documents.split(", "),
"wallpaper":aConfig.user.apps.wallpaper.split(", "),
"preferences":aConfig.user.apps.preferences.split(", "),
"notepad":aConfig.user.apps.notepad.split(", "),
"flash_name":aConfig.user.apps.flash_name.split(", "),
"piano":aConfig.user.apps.piano.split(", "),
"about_hnsdesktop":aConfig.user.apps.about_hnsdesktop.split(", "),
"feedback":aConfig.user.apps.feedback.split(", "),
"tic_tac_toe":aConfig.user.apps.tic_tac_toe.split(", "),
"friends":aConfig.user.apps.friends.split(", "),
"radio":aConfig.user.apps.radio.split(", "),
"search":aConfig.user.apps.search.split(", "),
"chat":aConfig.user.apps.chat.split(", "),
"music":aConfig.user.apps.music.split(", ")
}
}
}

<?php
}
?>

var dConfig = {
"settings":{
"title":"Homenet Spaces OS | Welcome to HnS Desktop!"
},
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>

"user":{
"logged":true,
"id":<?php echo $_SESSION['user_id']; ?>,
"username":"<?php echo $_SESSION['username']; ?>",
"access_level": <?php echo $_SESSION['access_level']; ?>,
"first_name":"<?php echo $_SESSION['first_name']; ?>",
"last_name":"<?php echo $_SESSION['last_name']; ?>",
"alarm":aConfig.user.alarm.split(", "),

"styles":{
"theme_id":<?php echo $row['theme_id']; ?>,
"bg_color":"<?php echo $row['bg_color']; ?>",
"wallpaper_file":"<?php echo $row['wallpaper_file']; ?>",
"wallpaper_position":"<?php echo $row['wallpaper_position']; ?>",
"wallpaper_repeat":"<?php echo $row['wallpaper_repeat']; ?>",
"font_color":"<?php echo $row['font_color']; ?>",
"transparency":<?php echo $row['transparency'] . "\n"; ?>
},

"desktop":{
"thumb_height":90,
"thumb_width":80
},

"taskbar":{
"quickstart_width":60,
"tray_width":110
},

"launchers":{
"autorun":aConfig.user.launchers.autorun.split(", "),
"thumbs":aConfig.user.launchers.thumbs.split(", "),
"startmenuapps":aConfig.user.launchers.startmenuapps.split(", "),
"startmenutools":aConfig.user.launchers.startmenutools.split(", "),
"quickstart":aConfig.user.launchers.quickstart.split(", "),
"tray":aConfig.user.launchers.tray.split(", ")
},

"apps":{
"documents":{
"h":bConfig.user.apps.documents[0],
"w":bConfig.user.apps.documents[1],
"x":bConfig.user.apps.documents[2],
"y":bConfig.user.apps.documents[3],
"xPos":bConfig.user.apps.documents[4],
"yPos":bConfig.user.apps.documents[5],
"minimized":bConfig.user.apps.documents[6],
"maximized":bConfig.user.apps.documents[7],
"centered":bConfig.user.apps.documents[8],
"opened":bConfig.user.apps.documents[9]
},

"wallpaper":{
"h":bConfig.user.apps.wallpaper[0],
"w":bConfig.user.apps.wallpaper[1],
"x":bConfig.user.apps.wallpaper[2],
"y":bConfig.user.apps.wallpaper[3],
"xPos":bConfig.user.apps.wallpaper[4],
"yPos":bConfig.user.apps.wallpaper[5],
"minimized":bConfig.user.apps.wallpaper[6],
"maximized":bConfig.user.apps.wallpaper[7],
"centered":bConfig.user.apps.wallpaper[8],
"opened":bConfig.user.apps.wallpaper[9]
},

"preferences":{
"h":bConfig.user.apps.preferences[0],
"w":bConfig.user.apps.preferences[1],
"x":bConfig.user.apps.preferences[2],
"y":bConfig.user.apps.preferences[3],
"xPos":bConfig.user.apps.preferences[4],
"yPos":bConfig.user.apps.preferences[5],
"minimized":bConfig.user.apps.preferences[6],
"maximized":bConfig.user.apps.preferences[7],
"centered":bConfig.user.apps.preferences[8],
"opened":bConfig.user.apps.preferences[9]
},

"notepad":{
"h":bConfig.user.apps.notepad[0],
"w":bConfig.user.apps.notepad[1],
"x":bConfig.user.apps.notepad[2],
"y":bConfig.user.apps.notepad[3],
"xPos":bConfig.user.apps.notepad[4],
"yPos":bConfig.user.apps.notepad[5],
"minimized":bConfig.user.apps.notepad[6],
"maximized":bConfig.user.apps.notepad[7],
"centered":bConfig.user.apps.notepad[8],
"opened":bConfig.user.apps.notepad[9]
},

"flash_name":{
"h":bConfig.user.apps.flash_name[0],
"w":bConfig.user.apps.flash_name[1],
"x":bConfig.user.apps.flash_name[2],
"y":bConfig.user.apps.flash_name[3],
"xPos":bConfig.user.apps.flash_name[4],
"yPos":bConfig.user.apps.flash_name[5],
"minimized":bConfig.user.apps.flash_name[6],
"maximized":bConfig.user.apps.flash_name[7],
"centered":bConfig.user.apps.flash_name[8],
"opened":bConfig.user.apps.flash_name[9]
},

"piano":{
"h":bConfig.user.apps.piano[0],
"w":bConfig.user.apps.piano[1],
"x":bConfig.user.apps.piano[2],
"y":bConfig.user.apps.piano[3],
"xPos":bConfig.user.apps.piano[4],
"yPos":bConfig.user.apps.piano[5],
"minimized":bConfig.user.apps.piano[6],
"maximized":bConfig.user.apps.piano[7],
"centered":bConfig.user.apps.piano[8],
"opened":bConfig.user.apps.piano[9]
},

"about_hnsdesktop":{
"h":bConfig.user.apps.about_hnsdesktop[0],
"w":bConfig.user.apps.about_hnsdesktop[1],
"x":bConfig.user.apps.about_hnsdesktop[2],
"y":bConfig.user.apps.about_hnsdesktop[3],
"xPos":bConfig.user.apps.about_hnsdesktop[4],
"yPos":bConfig.user.apps.about_hnsdesktop[5],
"minimized":bConfig.user.apps.about_hnsdesktop[6],
"maximized":bConfig.user.apps.about_hnsdesktop[7],
"centered":bConfig.user.apps.about_hnsdesktop[8],
"opened":bConfig.user.apps.about_hnsdesktop[9]
},

"feedback":{
"h":bConfig.user.apps.feedback[0],
"w":bConfig.user.apps.feedback[1],
"x":bConfig.user.apps.feedback[2],
"y":bConfig.user.apps.feedback[3],
"xPos":bConfig.user.apps.feedback[4],
"yPos":bConfig.user.apps.feedback[5],
"minimized":bConfig.user.apps.feedback[6],
"maximized":bConfig.user.apps.feedback[7],
"centered":bConfig.user.apps.feedback[8],
"opened":bConfig.user.apps.feedback[9]
},

"tic_tac_toe":{
"h":bConfig.user.apps.tic_tac_toe[0],
"w":bConfig.user.apps.tic_tac_toe[1],
"x":bConfig.user.apps.tic_tac_toe[2],
"y":bConfig.user.apps.tic_tac_toe[3],
"xPos":bConfig.user.apps.tic_tac_toe[4],
"yPos":bConfig.user.apps.tic_tac_toe[5],
"minimized":bConfig.user.apps.tic_tac_toe[6],
"maximized":bConfig.user.apps.tic_tac_toe[7],
"centered":bConfig.user.apps.tic_tac_toe[8],
"opened":bConfig.user.apps.tic_tac_toe[9]
},

"friends":{
"h":bConfig.user.apps.friends[0],
"w":bConfig.user.apps.friends[1],
"x":bConfig.user.apps.friends[2],
"y":bConfig.user.apps.friends[3],
"xPos":bConfig.user.apps.friends[4],
"yPos":bConfig.user.apps.friends[5],
"minimized":bConfig.user.apps.friends[6],
"maximized":bConfig.user.apps.friends[7],
"centered":bConfig.user.apps.friends[8],
"opened":bConfig.user.apps.friends[9]
},

"radio":{
"h":bConfig.user.apps.radio[0],
"w":bConfig.user.apps.radio[1],
"x":bConfig.user.apps.radio[2],
"y":bConfig.user.apps.radio[3],
"xPos":bConfig.user.apps.radio[4],
"yPos":bConfig.user.apps.radio[5],
"minimized":bConfig.user.apps.radio[6],
"maximized":bConfig.user.apps.radio[7],
"centered":bConfig.user.apps.radio[8],
"opened":bConfig.user.apps.radio[9]
},

"search":{
"h":bConfig.user.apps.search[0],
"w":bConfig.user.apps.search[1],
"x":bConfig.user.apps.search[2],
"y":bConfig.user.apps.search[3],
"xPos":bConfig.user.apps.search[4],
"yPos":bConfig.user.apps.search[5],
"minimized":bConfig.user.apps.search[6],
"maximized":bConfig.user.apps.search[7],
"centered":bConfig.user.apps.search[8],
"opened":bConfig.user.apps.search[9]
},

"chat":{
"h":bConfig.user.apps.chat[0],
"w":bConfig.user.apps.chat[1],
"x":bConfig.user.apps.chat[2],
"y":bConfig.user.apps.chat[3],
"xPos":bConfig.user.apps.chat[4],
"yPos":bConfig.user.apps.chat[5],
"minimized":bConfig.user.apps.chat[6],
"maximized":bConfig.user.apps.chat[7],
"centered":bConfig.user.apps.chat[8],
"opened":bConfig.user.apps.chat[9]
},

"music":{
"h":bConfig.user.apps.music[0],
"w":bConfig.user.apps.music[1],
"x":bConfig.user.apps.music[2],
"y":bConfig.user.apps.music[3],
"xPos":bConfig.user.apps.music[4],
"yPos":bConfig.user.apps.music[5],
"minimized":bConfig.user.apps.music[6],
"maximized":bConfig.user.apps.music[7],
"centered":bConfig.user.apps.music[8],
"opened":bConfig.user.apps.music[9]
}
}
},
<?php
}
?>

"styles":{
"theme_id":1,
"theme_name":"default",
"bg_color":"fff",
"wallpaper_file":"vista.jpg",
"wallpaper_position":"center center",
"wallpaper_repeat":"no-repeat",
"font_color":"000",
"transparency":1
},

"desktop":{
"thumb_height":90,
"thumb_width":80
},

"startmenu":{
"height":370,
"width":340
},

"taskbar":{
"height":30,
"start_width":110,
"quickstart_width":60,
"quickstart_minwidth":30,
"quickstart_maxwidth":300,
"tray_width":110,
"tray_minwidth":100,
"tray_maxwidth":300,
"currentinfo_width":75
},

"launchers":{
"autorun":[],
"thumbs":["notepad","preferences","wallpaper","flash_name","piano","tic_tac_toe","friends","radio","chat","music"],
"startmenuapps":["notepad","piano","tic_tac_toe","friends","radio","chat","music"],
"startmenutools":["documents","wallpaper","preferences","about_hnsdesktop","feedback","search"],
"quickstart":["notepad","preferences","feedback"],
"tray":["notepad","preferences","feedback"]
},

"panels":{
"list":["login","register"],
"login":{
"tools":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},
"register":{
"tools":[1,1,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
}
},

// TOOLS = showtools, maintools, close, maximize, minimize, subtools, toggle, config, leftarrow, rightarrow, pindown, pinleft, dblarrowright, dblarrowleft, dblarrowdown, dblarrowup, refresh, plus, minus, search, save, help, print

"apps":{
"list":["documents","wallpaper","preferences","notepad","flash_name","piano","about_hnsdesktop","feedback","tic_tac_toe","friends","radio","search","chat","music"],
"documents":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"wallpaper":{
"h":270,
"w":511,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":1,
"opened":0,
"tools":[1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"preferences":{
"h":200,
"w":400,
"x":0,
"y":0,
"xPos":'r',
"yPos":'b',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0]
},

"notepad":{
"h":200,
"w":400,
"x":0,
"y":0,
"xPos":'l',
"yPos":'b',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0]
},

"flash_name":{
"h":270,
"w":470,
"x":215,
"y":80,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"piano":{
"h":560,
"w":1200,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":1,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"about_hnsdesktop":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"feedback":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"tic_tac_toe":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"friends":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"radio":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"search":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"chat":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},

"music":{
"h":0,
"w":0,
"x":0,
"y":0,
"xPos":'l',
"yPos":'t',
"minimized":1,
"maximized":0,
"centered":0,
"opened":0,
"tools":[1,1,1,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
}
}
}

/* end desktop config variable arrays */

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>
if (dConfig.user.styles.theme_id != "") {
	var stylesheet = '<link rel="stylesheet" type="text/css" href="css.php?id=' + dConfig.user.styles.theme_id + '" media="all" />';
} else {
	var stylesheet = '<link rel="stylesheet" type="text/css" href="css.php?id=' + dConfig.styles.theme_id + '" media="all" />';
}

<?php
} else {
?>
var stylesheet = '<link rel="stylesheet" type="text/css" href="css.php?id=' + dConfig.styles.theme_id + '" media="all" />';
<?php
}
?>
$('head').append(stylesheet);

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>
if (dConfig.user.styles.bg_color != "") $("html").css('background-color','#' + dConfig.user.styles.bg_color);
if (dConfig.user.styles.wallpaper_file != "") $("html").css('background-image','url("i/wallpapers/' + dConfig.user.styles.wallpaper_file + '")');
if (dConfig.user.styles.wallpaper_position != "") $("html").css('background-position', dConfig.user.styles.wallpaper_position);
if (dConfig.user.styles.wallpaper_repeat != "") $("html").css('background-repeat', dConfig.user.styles.wallpaper_repeat);
if (dConfig.user.styles.font_color != "") $("html").css('color','#' + dConfig.user.styles.font_color);

<?php
}
?>
var myHeight = 0, myWidth = 0;

if (typeof(window.innerWidth) == 'number') { // Non-IE
	myHeight = window.innerHeight;
	myWidth = window.innerWidth;
} else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) { // IE 6+ in 'standards compliant mode'
	myHeight = document.documentElement.clientHeight;
	myWidth = document.documentElement.clientWidth;
} else if (document.body && (document.body.clientWidth || document.body.clientHeight)) { // IE 4 compatible
	myHeight = document.body.clientHeight;
	myWidth = document.body.clientWidth;
}

var blackout = document.createElement('div');
blackout.setAttribute('id','blackout');

var whiteout = document.createElement('div');
whiteout.setAttribute('id','whiteout');

/* begin misc functions */

function in_array(string, array) {
	for (i = 0; i < array.length; i++) if (array[i] == string) return true;
	return false;
}

function getthedate() {
	var dayarray = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	var montharray = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
	var mydate = new Date();
	var year = mydate.getYear();
	var day = mydate.getDay();
	var month = mydate.getMonth();
	var daym = mydate.getDate();
	var hours = mydate.getHours();
	var minutes = mydate.getMinutes();
	var seconds = mydate.getSeconds();
	var dn = "AM";

	if (year < 1000) year += 1900;
	if (daym < 10) daym = "0" + daym;
	if (hours >= 12) dn = "PM";
	if (hours > 12) hours = hours - 12;
	
	{
	d = new Date();
	Time24H = new Date();
	Time24H.setTime(d.getTime() + (d.getTimezoneOffset() * 60000) + 3600000);
	InternetTime = Math.round((Time24H.getHours() * 60 + Time24H.getMinutes()) / 1.44);
	if (InternetTime < 10) InternetTime = '00' + InternetTime;
	else if (InternetTime < 100) InternetTime = '0' + InternetTime;
	}

	if (hours == 0) hours = 12;
	if (minutes <= 9) minutes = "0" + minutes;
	if (seconds <= 9) seconds = "0" + seconds;
	var cdate = dayarray[day] + ", " + montharray[month] + " " + daym + " " + year + " | " + hours + ":" + minutes + ":" + seconds + " " + dn + " | @" + InternetTime + "";
	var mytime = hours + ":" + minutes + ":" + seconds + " " + dn;
	var mytime2 = hours + ":" + minutes + " " + dn;
	var mydate = (month + 1) + "/" + daym + "/" + year;
	var myfulldate = dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year;

	$("div#tray-currentinfo div#clock").html(mytime);
	$("div#tray-currentinfo div#date").html(mydate);
	$("div#tray-currentinfo").attr('title', myfulldate);

	if (dConfig.user.alarm != "") {
		var alarm = dConfig.user.alarm;
		var atype = alarm[0];
		var amsg = alarm[1];
		var atime = alarm[2];

		if (atype == 2) {
			var adate = alarm[3];
		
			if (mydate == adate) {
				if (mytime2 == atime) {
					alert(amsg);
				}
			}
		} else {
			if (mytime2 == atime) {
				alert(amsg);
			}
		}
	}
}

function getdate() {
	if (document.all || document.getElementById) {
		setInterval("getthedate()", 1000);
	} else {
		getthedate();
	}
}

function updatecaptchaimg() {
	document.captchaimg.src += '?';
}

function div_selection(e, eq) {
	this.e = e;
	this.eq = eq;

	if (this.e.target) {
		this.event = this.e.target;
	} else {
		this.event = this.e.srcElement;
	}

	if (this.event.nodeType == 3) {
		this.event = this.event.parentNode;
	}

	this.selection = $(this.event).parents().eq(this.eq).attr('id');
	this.target_class = function() { return $(this.event).attr('class'); }
	this.target_id = function() { return $(this.event).attr('id'); }
	this.main = function() { return this.selection; }
	this.div_main = function() { return ['div#', this.selection].join(''); }
	this.div_panel = function() { return ['div#', this.selection, ' div.panel'].join(''); }
	this.div_panel_tl = function() { return ['div#', this.selection, ' div.panel-tl'].join(''); }
	this.div_panel_bwrap = function() { return ['div#', this.selection, ' div.panel-bwrap'].join(''); }
	this.div_panel_tool = function() { return ['div#', this.selection, ' div.tool'].join(''); }
}

/* end misc functions */

createTaskButton = function(task_title, task_id) {
	return [
	'<li id="taskbutton-', task_id, '" class="taskbutton">',
	'<table class="button-wrap">',
	'<tbody>',
	'<tr>',
	'<td class="button-left">',
	'</td>',
	'<td class="button-center">',
	'<em unselectable="on">',
	'<button type="button" id="taskbutton-', task_id, '" class="taskbutton">',
	task_title,
	'</button>',
	'</em>',
	'</td>',
	'<td class="button-right">',
	'</td>',
	'</tr>',
	'</tbody>',
	'</table>',
	'</li>'
	].join('');
}

function panel(a,b,c,d,e,f,g,h,i,j,k,l,x,y,xPos,yPos,z,content) {
	this.div = document.createElement('div');
	this.title = a;
	this.id = b;
	this.showTools = c;
	this.closeable = d;
	this.draggable = e;
	this.resizable = f;
	this.minimized = g;
	this.minHeight = h;
	this.height = i;
	this.minWidth = j;
	this.width = k;
	this.position = l;
	this.x = x;
	this.y = y;
	this.xPos = xPos; // left or right position (l or r)
	this.yPos = yPos; // top or bottom position (t or b)
	this.center = z;
	this.content = content;

	if (this.height > myHeight) {
		this.height = myHeight;
	}

	if (this.width > myWidth) {
		this.width = myWidth;
	}

	if (this.center == true) {
		this.x = ((myWidth / 2) - (this.width / 2));
		this.y = (((myHeight - dConfig.taskbar.height) / 2) - (this.height / 2));
	}

	this.display = function() {
		this.div.setAttribute("id", b);
		this.div.setAttribute("class","application");

		if (this.draggable == true || this.resizable == true) {
			$(this.div).addClass("drsElement");
		}

		/*
		if (this.draggable == true) {
		this.div.addClass("draggable");
		}

		if (this.resizable == true) {
		this.div.addClass("resizable");
		this.div.addClass("drsElement");
		}

		if (this.closeable == true) {
		this.div.addClass("closeable");
		}
		*/

		this.div.style.height = this.height + 'px';
		this.div.style.minHeight = this.minHeight + 'px';
		this.div.style.width = this.width + 'px';
		this.div.style.minWidth = this.minWidth + 'px';
		this.div.style.position = this.position;
		this.div.style.display = "none";

		if (this.center == false) {
			if (this.xPos == "l") {
				this.div.style.left = this.x + 'px';
			} else if (this.xPos == "r") {
				this.div.style.left = (myWidth - (this.width + this.x)) + 'px';
			}

			if (this.yPos == "t") {
				this.div.style.top = this.y + 'px';
			} else if (this.yPos == "b") {
				this.div.style.top = ((myHeight - (dConfig.taskbar.height + 2)) - (this.height + this.y)) + 'px';
			}
		} else {
			this.div.style.left = this.x + 'px';
			this.div.style.top = this.y + 'px';
		}
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>

		document.getElementById("desktop").appendChild(this.div);
		$("div#taskbar ul#taskbuttons-strip").append(createTaskButton(this.title, this.id));

<?php
} else {
?>

		document.getElementById("main").appendChild(this.div);

<?php
}
?>
		this.assemble();
	}

	this.createPanel = function(content) {
		return [
		'<div class="panel">',
		'<div class="panel-tl"><div class="panel-tr"><div class="panel-tc"></div></div></div><div class="panel-bwrap">',
		'<div class="panel-ml"><div class="panel-mr"><div class="panel-mc">', content, '</div></div></div>',
		'<div class="panel-bl"><div class="panel-br"><div class="panel-bc"></div></div></div>',
		'</div></div>'
		].join('');
	}

	this.addHeader = function(title) {
		var header;
		
		if (this.draggable == true) {
			header = '<div class="panel-header drsMoveHandle">';
		} else {
			header = '<div class="panel-header">';
		}

		header += '<span class="panel-header-text">' + title + '</span>';

		if (this.showTools == true) {
			var toolConfig, tools, maintools, subtools;
			
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>
			if (this.id == "documents") {
				toolConfig = dConfig.apps.documents.tools;
			} else if (this.id == "wallpaper") {
				toolConfig = dConfig.apps.wallpaper.tools;
			} else if (this.id == "preferences") {
				toolConfig = dConfig.apps.preferences.tools;
			} else if (this.id == "notepad") {
				toolConfig = dConfig.apps.notepad.tools;
			} else if (this.id == "flash_name") {
				toolConfig = dConfig.apps.flash_name.tools;
			} else if (this.id == "piano") {
				toolConfig = dConfig.apps.piano.tools;
			} else if (this.id == "about_hnsdesktop") {
				toolConfig = dConfig.apps.about_hnsdesktop.tools;
			} else if (this.id == "feedback") {
				toolConfig = dConfig.apps.feedback.tools;
			} else if (this.id == "tic_tac_toe") {
				toolConfig = dConfig.apps.tic_tac_toe.tools;
			} else if (this.id == "friends") {
				toolConfig = dConfig.apps.friends.tools;
			} else if (this.id == "radio") {
				toolConfig = dConfig.apps.radio.tools;
			} else if (this.id == "search") {
				toolConfig = dConfig.apps.search.tools;
			} else if (this.id == "chat") {
				toolConfig = dConfig.apps.chat.tools;
			} else if (this.id == "music") {
				toolConfig = dConfig.apps.music.tools;
			}

<?php
} else {
?>
			if (this.id == "login") {
				toolConfig = dConfig.panels.login.tools;
			} else if (this.id == "register") {
				toolConfig = dConfig.panels.register.tools;
			}

<?php
}
?>
			tools = '<div class="tools">';

			if ((toolConfig[1] == 1) || (toolConfig[1] == 2)) {
				if (toolConfig[1] == 1) { maintools = '<span class="maintools">'; } else if (toolConfig[1] == 2) { maintools = '<span class="maintoolsapart">'; }
				if (toolConfig[2] == 1) { maintools += '<div class="tool close"></div>'; } else if (toolConfig[2] == 2) { maintools += '<div class="tool close close_corners"></div>'; }
				if (toolConfig[3] == 1) { maintools += '<div class="tool maximize"></div>'; } else if (toolConfig[3] == 2) { maintools += '<div class="tool maximize maximize_corners"></div>'; } else if (toolConfig[3] == 3) { maintools += '<div class="tool maximize maximize_middle"></div>'; } else if (toolConfig[3] == 4) { maintools += '<div class="tool maximize maximize_begin"></div>'; }
				if (toolConfig[4] == 1) { maintools += '<div class="tool minimize"></div>'; } else if (toolConfig[4] == 2) { maintools += '<div class="tool minimize minimize_corners"></div>'; } else if (toolConfig[4] == 3) { maintools += '<div class="tool minimize minimize_middle"></div>'; } else if (toolConfig[4] == 4) { maintools += '<div class="tool minimize minimize_begin"></div>'; }
				maintools += '</span>';
				tools += maintools;
			}

			if ((toolConfig[5] == 1) || (toolConfig[5] == 2)) {
				if (toolConfig[5] == 1) { subtools = '<span class="subtools">'; } else if (toolConfig[5] == 2) { subtools = '<span class="subtoolsattached">'; }
				if (toolConfig[6] == 1) { subtools += '<div class="tool toggle"></div>'; } else if (toolConfig[6] == 2) { subtools += '<div class="tool toggle toggle_middle"></div>'; } else if (toolConfig[6] == 3) { subtools += '<div class="tool toggle toggle_end"></div>'; } else if (toolConfig[6] == 4) { subtools += '<div class="tool toggle toggle_begin"></div>'; }
				if (toolConfig[7] == 1) { subtools += '<div class="tool config"></div>'; } else if (toolConfig[7] == 2) { subtools += '<div class="tool config config_middle"></div>'; } else if (toolConfig[7] == 3) { subtools += '<div class="tool config config_end"></div>'; } else if (toolConfig[7] == 4) { subtools += '<div class="tool config config_begin"></div>'; }
				if (toolConfig[8] == 1) { subtools += '<div class="tool arrowleft"></div>'; } else if (toolConfig[8] == 2) { subtools += '<div class="tool arrowleft arrowleft_middle"></div>'; } else if (toolConfig[8] == 3) { subtools += '<div class="tool arrowleft arrowleft_end"></div>'; } else if (toolConfig[8] == 4) { subtools += '<div class="tool arrowleft arrowleft_begin"></div>'; }
				if (toolConfig[9] == 1) { subtools += '<div class="tool arrowright"></div>'; } else if (toolConfig[9] == 2) { subtools += '<div class="tool arrowright arrowright_middle"></div>'; } else if (toolConfig[9] == 3) { subtools += '<div class="tool arrowright arrowright_end"></div>'; } else if (toolConfig[9] == 4) { subtools += '<div class="tool arrowright arrowright_begin"></div>'; }
				if (toolConfig[10] == 1) { subtools += '<div class="tool pindown"></div>'; } else if (toolConfig[10] == 2) { subtools += '<div class="tool pindown pindown_middle"></div>'; } else if (toolConfig[10] == 3) { subtools += '<div class="tool pindown pindown_end"></div>'; } else if (toolConfig[10] == 4) { subtools += '<div class="tool pindown pindown_begin"></div>'; }
				if (toolConfig[11] == 1) { subtools += '<div class="tool pinleft"></div>'; } else if (toolConfig[11] == 2) { subtools += '<div class="tool pinleft pinleft_middle"></div>'; } else if (toolConfig[11] == 3) { subtools += '<div class="tool pinleft pinleft_end"></div>'; } else if (toolConfig[11] == 4) { subtools += '<div class="tool pinleft pinleft_begin"></div>'; }
				if (toolConfig[12] == 1) { subtools += '<div class="tool dblarrowright"></div>'; } else if (toolConfig[12] == 2) { subtools += '<div class="tool dblarrowright dblarrowright_middle"></div>'; } else if (toolConfig[12] == 3) { subtools += '<div class="tool dblarrowright dblarrowright_end"></div>'; } else if (toolConfig[12] == 4) { subtools += '<div class="tool dblarrowright dblarrowright_begin"></div>'; }
				if (toolConfig[13] == 1) { subtools += '<div class="tool dblarrowleft"></div>'; } else if (toolConfig[13] == 2) { subtools += '<div class="tool dblarrowleft dblarrowleft_middle"></div>'; } else if (toolConfig[13] == 3) { subtools += '<div class="tool dblarrowleft dblarrowleft_end"></div>'; } else if (toolConfig[13] == 4) { subtools += '<div class="tool dblarrowleft dblarrowleft_begin"></div>'; }
				if (toolConfig[14] == 1) { subtools += '<div class="tool dblarrowdown"></div>'; } else if (toolConfig[14] == 2) { subtools += '<div class="tool dblarrowdown dblarrowdown_middle"></div>'; } else if (toolConfig[14] == 3) { subtools += '<div class="tool dblarrowdown dblarrowdown_end"></div>'; } else if (toolConfig[14] == 4) { subtools += '<div class="tool dblarrowdown dblarrowdown_begin"></div>'; }
				if (toolConfig[15] == 1) { subtools += '<div class="tool dblarrowup"></div>'; } else if (toolConfig[15] == 2) { subtools += '<div class="tool dblarrowup dblarrowup_middle"></div>'; } else if (toolConfig[15] == 3) { subtools += '<div class="tool dblarrowup dblarrowup_end"></div>'; } else if (toolConfig[15] == 4) { subtools += '<div class="tool dblarrowup dblarrowup_begin"></div>'; }
				if (toolConfig[16] == 1) { subtools += '<div class="tool refresh"></div>'; } else if (toolConfig[16] == 2) { subtools += '<div class="tool refresh refresh_middle"></div>'; } else if (toolConfig[16] == 3) { subtools += '<div class="tool refresh refresh_end"></div>'; } else if (toolConfig[16] == 4) { subtools += '<div class="tool refresh refresh_begin"></div>'; }
				if (toolConfig[17] == 1) { subtools += '<div class="tool plus"></div>'; } else if (toolConfig[17] == 2) { subtools += '<div class="tool plus plus_middle"></div>'; } else if (toolConfig[17] == 3) { subtools += '<div class="tool plus plus_end"></div>'; } else if (toolConfig[17] == 4) { subtools += '<div class="tool plus plus_begin"></div>'; }
				if (toolConfig[18] == 1) { subtools += '<div class="tool minus"></div>'; } else if (toolConfig[18] == 2) { subtools += '<div class="tool minus minus_middle"></div>'; } else if (toolConfig[18] == 3) { subtools += '<div class="tool minus minus_end"></div>'; } else if (toolConfig[18] == 4) { subtools += '<div class="tool minus minus_begin"></div>'; }
				if (toolConfig[19] == 1) { subtools += '<div class="tool search"></div>'; } else if (toolConfig[19] == 2) { subtools += '<div class="tool search search_middle"></div>'; } else if (toolConfig[19] == 3) { subtools += '<div class="tool search search_end"></div>'; } else if (toolConfig[19] == 4) { subtools += '<div class="tool search search_begin"></div>'; }
				if (toolConfig[20] == 1) { subtools += '<div class="tool save"></div>'; } else if (toolConfig[20] == 2) { subtools += '<div class="tool save save_middle"></div>'; } else if (toolConfig[20] == 3) { subtools += '<div class="tool save save_end"></div>'; } else if (toolConfig[20] == 4) { subtools += '<div class="tool save save_begin"></div>'; }
				if (toolConfig[21] == 1) { subtools += '<div class="tool help"></div>'; } else if (toolConfig[21] == 2) { subtools += '<div class="tool help help_middle"></div>'; } else if (toolConfig[21] == 3) { subtools += '<div class="tool help help_end"></div>'; } else if (toolConfig[21] == 4) { subtools += '<div class="tool help help_begin"></div>'; }
				if (toolConfig[22] == 1) { subtools += '<div class="tool print"></div>'; } else if (toolConfig[22] == 2) { subtools += '<div class="tool print print_middle"></div>'; } else if (toolConfig[22] == 3) { subtools += '<div class="tool print print_end"></div>'; } else if (toolConfig[22] == 4) { subtools += '<div class="tool print print_begin"></div>'; }
				subtools += '</span>';
				tools += subtools;
			}

			tools += '</div>';
			header += tools;
		}

		header += '</div>';
				
		return header;
	}

	this.assemble = function() {
		this.html = this.createPanel(this.content);
		this.div.innerHTML = this.html;
		var maindiv = 'div#' + this.id;
		var bwrapdiv = maindiv + ' div.panel-bwrap';
		var ptdiv = maindiv + ' div.panel-tc';
		
		$(ptdiv).append(this.addHeader(this.title));
		$(bwrapdiv).height((this.height - 30));

		if (!$(maindiv).hasClass("fullscreen")) {
		$(maindiv + " div.content").height((this.height - 32));
		$(maindiv + " div.content").width((this.width - 16));
		} else {
		$(maindiv + " div.content").height((this.height - 32));
		$(maindiv + " div.content").width((this.width - 16));
		}

		if (this.minimized == true) {
			$(maindiv).css('display','none');
		}
	}
}

function dialog(a,b,c,d,e,f,g,h,i,j,k,x,y,xPos,yPos,z,content) {
	this.div = document.createElement('div');
	this.title = a;
	this.id = b;
	this.closeable = c;
	this.draggable = d;
	this.resizable = e;
	this.visible = f;
	this.minHeight = g;
	this.height = h;
	this.minWidth = i;
	this.width = j;
	this.position = k;
	this.x = x;
	this.y = y;
	this.xPos = xPos;
	this.yPos = yPos;
	this.center = z;
	this.content = content;

	if (this.height > myHeight) {
		this.height = myHeight;
	}

	if (this.width > myWidth) {
		this.width = myWidth;
	}

	if (this.center == true) {
		this.x = ((myWidth / 2) - (this.width / 2));
		this.y = (((myHeight - dConfig.taskbar.height) / 2) - (this.height / 2));
	}

	this.display = function() {
		this.div.setAttribute("id", b);

		if (this.draggable == true) {
			alert(this.div);
		}

		this.div.style.height = this.height + 'px';
		this.div.style.width = this.width + 'px';
		this.div.style.position = this.position;

		if (this.center == false) {
			if (this.xPos == "l") {
				this.div.style.left = this.x + 'px';
			} else if (this.xPos == "r") {
				this.div.style.left = (myWidth - (this.width + this.x)) + 'px';
			}

			if (this.yPos == "t") {
				this.div.style.top = this.y + 'px';
			} else if (this.yPos == "b") {
				this.div.style.top = ((myHeight - (dConfig.taskbar.height + 2)) - (this.height + this.y)) + 'px';
			}
		} else {
			this.div.style.left = this.x + 'px';
			this.div.style.top = this.y + 'px';
		}

		document.getElementById("main").appendChild(this.div);

		this.assemble();
	}

	this.createDialog = function(content) {
		return ['<div class="dialog"><div class="content"><div class="heading">', content, '</div></div></div>'].join('');
	}

	this.assemble = function() {
		this.html = this.createDialog(this.content);
		this.div.innerHTML = this.html;
		var maindiv = 'div#' + this.id;

		if (this.visible == false) {
			$(maindiv).css('display','none');
		}
	}
}

function display(app) {
	var apps = $(app).attr('id');
	var app_name = "div#" + apps;
	var app_tbutton = "ul#taskbuttons-strip li#taskbutton-" + apps;
	var zmax = 0, cur = 0;
	
	$(app_name + " div.panel").removeClass("transparent5");
	$(app_name + " div.tool").removeClass("transparent5");
	$(app_name + " div.panel-tl").css({'background-color':'','border-bottom':'0'});
	$(app_name + " div.panel-tl").css({
		'border-bottom-left-radius':'0px',
		'border-bottom-right-radius':'0px',
		'-khtml-border-radius-bottomleft':'0px',
		'-khtml-border-radius-bottomright':'0px',
		'-moz-border-radius-bottomleft':'0px',
		'-moz-border-radius-bottomright':'0px',
		'-webkit-border-bottom-left-radius':'0px',
		'-webkit-border-bottom-right-radius':'0px'
	});

	$(app_name + " div.panel-bwrap").show();
	
	$("div.application").each(function() {
		cur = parseInt($(this).css('z-index'));
		zmax = (cur > zmax) ? cur : zmax;
	});
	
	$(app_name).css('z-index', ++zmax);
	$(app_name).show();
	$(app_tbutton).css('display','block');
}
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("auth.inc.php");
?>

function desktop(taskbar_start_content, taskbar_quickstart_content) {
	this.desktop = document.createElement('div');
	this.taskbar = document.createElement('div');
	this.startmenu = document.createElement('div');
	this.desktop_thumbs = document.createElement('div');
	this.taskbar_start_content = taskbar_start_content;
	this.taskbar_quickstart_content = taskbar_quickstart_content;

	this.display = function() {
		this.desktop.setAttribute("id","desktop");
		this.taskbar.setAttribute("id","taskbar");
		this.startmenu.setAttribute("id","startmenu");

		this.desktop.style.height = (myHeight - dConfig.taskbar.height) + 'px';
		this.taskbar.style.height = dConfig.taskbar.height + 'px';
		this.startmenu.style.height = dConfig.startmenu.height + 'px';
		document.getElementById("main").appendChild(this.desktop);
		document.getElementById("main").appendChild(this.taskbar);
		this.assemble();
		document.getElementById("desktop").appendChild(this.startmenu);
	}

	this.createDesktop = function(desktop_content) {
		return ['<div id="desktop-view"><div class="desktop-body">', desktop_content, '</div></div>'].join('');
	}

	this.createDesktopThumb = function(thumb_name) {
		var app_name = thumb_name.replace(/-/g," ");
		var app_name = app_name.replace(/_/g," ");
		var apps_height = Math.floor((myHeight - dConfig.taskbar.height) / (dConfig.desktop.thumb_height + 14));
		var apps_width = Math.floor(myWidth / (dConfig.desktop.thumb_width + 14));

		return [
		'<div id="thumb-', thumb_name, '" class="desktop-thumb">',
		'<div class="thumb-button"><img src="i/thumbs/blank.gif" class="thumb-image" alt="', thumb_name, '" /></div>',
		'<div class="thumb-name" unselectable="on">', app_name, '</div>',
		'</div>'
		].join('');
	}

	this.createTaskbar = function(taskbar_start_content, taskbar_quickstart_content) {
		getdate();

		return [
		'<div id="start">', taskbar_start_content, '</div>',
		'<div id="panel-wrap">',
		'<div id="quickstart-panel">', taskbar_quickstart_content, '</div>',
		'<div id="taskbuttons-panel">',
		'<div class="taskbuttons-strip-wrap">',
		'<div id="quickstart-splitbar" class="splitbar"></div>',
		'<ul id="taskbuttons-strip">',
		'</ul>',
		'<div id="tray-splitbar" class="splitbar"></div>',
		'</div>',
		'<div id="tray-panel">',
		'<div class="tray-strip-wrap">',
		'<ul id="tray-strip">',
		'</ul>',
		'<div id="tray-currentinfo">',
		'<div id="clock"></div>',
		'<div id="date"></div>',
		'</div>',
		'</div>',
		'<div id="tray-toggle"></div>',
		'</div>',
		'</div>',
		'</div>'
		].join('');
	}

	this.createStartmenu = function() {
		return [
		'<div class="startmenu">',
		'<div class="startmenu-tl"><div class="startmenu-tr"><div class="startmenu-tc">',
		'<div class="startmenu-header"><span class="startmenu-header-text">', dConfig.user.username, ' | HnS Desktop</span></div>',
		'</div></div></div>',
		'<div class="startmenu-bwrap">',
		'<div class="startmenu-ml"><div class="startmenu-mr"><div class="startmenu-mc">',
		'<div class="startmenu-body">',
		'<div class="apps"><div class="apps-body"><div class="apps-menu">',
		'<ul class="apps-menu-list">',
		'<li id="notepad" class="list-item"><a href="javascript: void(0);" id="notepad" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-notepad" alt="" />Notepad</a></li>',
		'<li id="piano" class="list-item"><a href="javascript: void(0);" id="piano" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-piano" alt="" />Piano</a></li>',
		'<li id="tic_tac_toe" class="list-item"><a href="javascript: void(0);" id="tic_tac_toe" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-tic_tac_toe" alt="" />Tic Tac Toe</a></li>',
		'<li id="friends" class="list-item"><a href="javascript: void(0);" id="friends" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-friends" alt="" />Friends</a></li>',
		'<li id="radio" class="list-item"><a href="javascript: void(0);" id="radio" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-radio" alt="" />Radio</a></li>',
		'<li id="chat" class="list-item"><a href="javascript: void(0);" id="chat" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-chat" alt="" />Chat</a></li>',
		'<li id="music" class="list-item"><a href="javascript: void(0);" id="music" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-music" alt="" />Music</a></li>',
		'</ul>',
		'</div></div></div>',
		'<div class="tools"><div class="tools-menu">',
		'<ul class="tools-menu-list">',
		'<li id="documents" class="list-item"><a href="javascript: void(0);" id="documents" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-documents" alt="" />My Documents</a></li>',
		'<li id="preferences" class="list-item"><a href="javascript: void(0);" id="preferences" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-preferences" alt="" />Preferences</a></li>',
		'<li id="wallpaper" class="list-item"><a href="javascript: void(0);" id="wallpaper" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-wallpaper" alt="" />Change Wallpaper</a></li>',
		'<li id="search" class="list-item"><a href="javascript: void(0);" id="search" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-search" alt="" />Search</a></li>',
		'</ul>',
		'<ul class="tools-logout-list">',
		'<li id="logout" class="list-item item-logout"><a href="javascript: void(0);" id="logout" class="menu-item"><img src="i/ux/s.gif" class="item-icon icon-logout" alt="" />Logout</a></li>',
		'</ul>',
		'</div></div>',
		'</div>',
		'</div></div></div>',
		'</div>',
		'<div class="startmenu-bl"><div class="startmenu-br"><div class="startmenu-bc"></div></div></div>',
		'</div>'
		].join('');
	}

	this.assemble = function() {
		this.desktop_thumbs = "";
		
		for (var i = 0; i < dConfig.launchers.thumbs.length; i++) {
			this.desktop_thumbs += this.createDesktopThumb(dConfig.launchers.thumbs[i]);
		}

		this.desktop_content = this.desktop_thumbs;
		this.desktop_html = this.createDesktop(this.desktop_content);
		this.desktop.innerHTML = this.desktop_html;
		this.taskbar_html = this.createTaskbar(this.taskbar_start_content, this.taskbar_quickstart_content);
		this.taskbar.innerHTML = this.taskbar_html;
		this.startmenu.innerHTML = this.createStartmenu();
	}
}

var taskbar_start_content = [
'<table id="startbutton" class="start-wrap">',
'<tbody>',
'<tr>',
'<td class="start-left"></td>',
'<td class="start-center"><em unselectable="on"><button type="button" class="start">Start</button></em></td>',
'<td class="start-right"></td>',
'</tr>',
'</tbody>',
'</table>'
].join('');

var taskbar_quickstart_content = ['<div></div>'].join('');

/* begin app content */

var wallpaper_content = [
'<div class="content"><div class="body">',
'<div id="slideshow"></div>',
'<div id="config"></div>',
'</div></div>'
].join('');

var preferences_content = [
'<div class="content"><div class="body">',
'<div id="splash">',
'<ul>',
'<li class="thumbs">',
'<img src="i/ux/s.gif" class="thumbs" alt="" />',
'<div id="name" class="thumbs">Thumbs</div>',
'<div id="description" class="thumbs">Choose which applications appear on the desktop.</div>',
'</li>',
'<li class="autorun">',
'<img src="i/ux/s.gif" class="autorun" alt="" />',
'<div id="name" class="autorun">Autorun</div>',
'<div id="description" class="autorun">Choose which applications open automatically when you log in.</div>',
'</li>',
'<li class="quickstart">',
'<img src="i/ux/s.gif" class="quickstart" alt="" />',
'<div id="name" class="quickstart">Quickstart</div>',
'<div id="description" class="quickstart">Choose which applications appear in the quickstart panel.</div>',
'</li>',
'<li class="themes">',
'<img src="i/ux/s.gif" class="themes" alt="" />',
'<div id="name" class="themes">Themes</div>',
'<div id="description" class="themes">Change the desktop theme.</div>',
'</li>',
'<li class="wallpaper" >',
'<img src="i/ux/s.gif" class="wallpaper" alt="" />',
'<div id="name" class="wallpaper">Wallpaper</div>',
'<div id="description" class="wallpaper">Change the wallpaper and font colors.</div>',
'</li>',
'</ul>',
'</div>',
'<div id="thumbs">',
'</div>',
'<div id="autorun">',
'</div>',
'<div id="quickstart">',
'</div>',
'<div id="themes">',
'<input type="checkbox" name="taskbar_transparency" id="taskbar_transparency" accesskey="t" tabindex="1" checked="checked" />', // remove checked
'<label for="taskbar_transparency"> Taskbar Transparency</label>',
'<br />',
'<input type="checkbox" name="change_title" id="change_title" accesskey="c" tabindex="2" checked="checked" />', // remove checked
'<label for="change_title"> Change Title</label>',
'</div>',
'<div id="wallpaper">',
'</div>',
'</div></div>'
].join('');

var notepad_content = [
'<div class="content"><div class="body">',
'<textarea><?php if ($row['notepad'] == null) { echo "Hello ',dConfig.user.first_name,' ',dConfig.user.last_name,'!"; } else { echo $row['notepad']; } ?></textarea>',
'</div></div>'
].join('');

var flash_name_content = [
'<div class="content"><div class="body">',
'</div></div>'
].join('');

var piano_content = [
'<div class="content"><div class="body">',
'<div id="instruments">',
'<div class="buttons">',
'<a href="javascript: void(0);" id="piano">Piano</a>',
'<a href="javascript: void(0);" id="organ">Organ</a>',
'<a href="javascript: void(0);" id="saxophone">Saxophone</a>',
'<a href="javascript: void(0);" id="flute">Flute</a>',
'<a href="javascript: void(0);" id="panpipes">Pan Pipes</a>',
'<a href="javascript: void(0);" id="strings">Strings</a>',
'<a href="javascript: void(0);" id="guitar">Guitar</a>',
'<a href="javascript: void(0);" id="steeldrums">Steel Drums</a>',
'<a href="javascript: void(0);" id="doublebass">Double Bass</a>',
'<a href="javascript: void(0);" id="all">All</a>',
'</div>',
'</div>',
'<div id="pianoswf">',
'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" style="height: 88%; width: 99%; ">',
'<param name="movie" value="flash/piano/piano.swf" class="pianoswf">',
'<param name="quality" value="high">',
'<embed type="application/x-shockwave-flash" src="flash/piano/piano.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" class="pianoswf" style="height: 88%; width: 99%; "></embed>',
'</object>',
'</div>',
'</div></div>'
].join('');

var tic_tac_toe_content = [
'<div class="content"><div class="body">',
'<div class="tic_tac_toe"></div>',
'</div></div>'
].join('');

var friends_content = [
'<div class="content"><div class="body"><?php echo $friends; ?>',
'</div></div>'
].join('');

var radio_content = [
'<div class="content"><div class="body">',
'<div id="data"><div id="goom">',
'</div></div>',
'</div></div>'
].join('');

var search_content = [
'<div class="content"><div class="body">',
'</div></div>'
].join('');

var chat_content = [
'<div class="content"><div class="body">',
'</div></div>'
].join('');

var music_content = [
'<div class="content"><div class="body">',
'<audio src="/media/mp/<?php echo $profile_song_artist . " - " . $profile_song_name; ?>" id="musicplayer" controls="controls" loop="loop">Your browser does not support the audio element.</audio>',
'</div></div>'
].join('');

/* end app content */
/* begin panel variables */

var dialog_loading = new dialog('Loading','loading',false,false,false,true,50,50,100,168,'absolute',0,0,'l','t',true,'Loading...');
var user_desktop = new desktop(taskbar_start_content, taskbar_quickstart_content);

/** begin app variables */

var wallpaper = new panel('Wallpaper','wallpaper',true,true,true,true,true,200,270,400,511,'absolute',0,0,'l','t',true,wallpaper_content);
var preferences = new panel('Preferences','preferences',true,false,true,false,false,300,302,400,400,'absolute',0,0,'r','b',true,preferences_content);
var notepad = new panel('Notepad','notepad',true,false,true,false,false,200,200,400,400,'absolute',0,0,'l','b',false,notepad_content);
var flash_name = new panel('Flash Name','flash_name',true,false,true,false,false,270,270,470,470,'absolute',215,80,'l','t',false,flash_name_content);
var piano = new panel('Piano','piano',true,false,true,false,true,570,570,770,1200,'absolute',0,0,'l','t',true,piano_content);
var tic_tac_toe = new panel('Tic Tac Toe','tic_tac_toe',true,false,true,false,true,550,599,534,540,'absolute',0,0,'l','t',true,tic_tac_toe_content);
var friends  = new panel('Friends','friends',true,false,true,false,true,550,599,534,538,'absolute',0,0,'l','t',true,friends_content);
var radio  = new panel('Radio','radio',true,false,true,false,true,300,300,300,300,'absolute',0,0,'l','t',true,radio_content);
var search = new panel('Search','search',true,false,true,false,true,550,599,534,538,'absolute',0,0,'l','t',true,search_content);
var chat = new panel('Chat','chat',true,false,true,false,true,550,599,534,538,'absolute',0,0,'l','t',true,chat_content);
var music = new panel('Music','music',true,false,true,false,true,64,64,316,316,'absolute',0,0,'l','t',true,music_content);

/** end app variables */
/* end panel variables */

<?php
} else {
?>

/* begin panel content */

var login_content = [
'<div class="content"><div class="body">',
'<div class="heading">Homenet Spaces OS</div>',
'<form action="javascript: void(0);" name="login" id="login">',
'<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; width: 95%; ">',
'<tbody>',
'<tr>',
'<td class="label"><label for="username">Username: </label></td>',
'<td class="input"><input type="text" name="username" id="username" size="33" maxlength="20" accesskey="u" tabindex="1" value="" /></td>',
'</tr>',
'<tr>',
'<td class="label"><label for="password">Password: </label></td>',
'<td class="input"><input type="password" name="password" id="password" size="33" maxlength="20" accesskey="p" tabindex="2" value="" autocomplete="off" /></tr>',
'<tr>',
'<td class="label"><label for="checkbox">Remember: </label></td>',
'<td class="input">',
'<input type="checkbox" name="remember" accesskey="m" tabindex="3" value="remember" />',
'<div class="buttons right">',
'<button type="submit" name="signin" id="signin" class="positive" accesskey="l" tabindex="4"><img src="i/icons/tick.png" alt="" />Login!</button>',
'<button type="reset" name="reset" id="reset" accesskey="c" tabindex="5"><img src="i/icons/textfield_key.png" alt="" />Clear</button>',
'<button type="button" name="register" id="signup" class="negative" accesskey="r" tabindex="6"><img src="i/icons/cross.png" alt="" />Register</button>',
'</div>',
'</td>',
'</tr>',
'</tbody>',
'</table>',
'</form>',
'</div></div>'
].join('');

var register_content = [
'<div class="content"><div class="body">',
'<div class="heading">Register</div>',
'<form action="javascript: void(0);" name="register" id="register">',
'<fieldset>',
'<legend>Login Credentials</legend>',
'<table>',
'<tr class="username_reg">',
'<td class="label"><label for="username_reg">Username:</label></td>',
'<td class="input"><input type="text" name="username_reg" id="username_reg" size="26" maxlength="20" value="<?php echo $username_reg; ?>" /></td>',
'</tr>',
'<tr class="password_reg">',
'<td class="label"><label for="password_reg">Password:</label></td>',
'<td class="input"><input type="password" name="password_reg" id="password_reg" size="26" maxlength="20" value="" autocomplete="off" /></td>',
'</tr>',
'<tr class="password_ver_reg">',
'<td class="label"><label for="password_ver_reg">Confirm Password:</label></td>',
'<td class="input"><input type="password" name="password_ver_reg" id="password_ver_reg" size="26" maxlength="20" value="" autocomplete="off" /></td>',
'</tr>',
'<tr>',
'<td colspan="2"><small class="formreminder">( You can\'t change your username after you signup )</small></td>',
'</tr>',
'</table>',
'</fieldset>',
'<br /><br />',
'<fieldset>',
'<legend>Personal Information</legend>',
'<table>',
'<tr class="first_name">',
'<td class="label"><label for="first_name">First Name:</label></td>',
'<td class="input"><input type="text" name="first_name" id="first_name" size="26" maxlength="20" value="<?php echo $first_name ?>" /></td>',
'</tr>',
'<tr class="last_name">',
'<td class="label"><label for="last_name">Last Name:</label></td>',
'<td class="input"><input type="text" name="last_name" id="last_name" size="26" maxlength="20" value="<?php echo $last_name ?>" /></td>',
'</tr>',
'<tr class="email">',
'<td class="label"><label for="email">Email:</label></td>',
'<td class="input"><input type="email" name="email" id="email" size="26" maxlength="50" value="<?php echo $email ?>" /></td>',
'</tr>',
'<tr class="gender">',
'<td class="label"><label for="gender">Gender:</label></td>',
'<td class="input">',
'<input type="radio" name="gender" id="gender" value="Male" <?php if ($gender == "Male") { echo 'checked="checked"'; } ?> /><span class="radio">Male</span> ',
'<input type="radio" name="gender" id="gender" value="Female" <?php if ($gender == "Female") { echo 'checked="checked"'; } ?> /><span class="radio">Female</span>',
'</td>',
'</tr>',
'<tr class="birthdate">',
'<td class="label">Birth Date:</td>',
'<td class="input">',
'<select name="birth_month" id="birth_month">',
'<option value="0" <?php if ($birth_month == 0 || null) { echo 'selected="selected"'; } ?>></option>',
'<optgroup label="Month">',
'<option value="1" <?php if ($birth_month == 1) { echo 'selected="selected"'; } ?>>January</option>',
'<option value="2" <?php if ($birth_month == 2) { echo 'selected="selected"'; } ?>>February</option>',
'<option value="3" <?php if ($birth_month == 3) { echo 'selected="selected"'; } ?>>March</option>',
'<option value="4" <?php if ($birth_month == 4) { echo 'selected="selected"'; } ?>>April</option>',
'<option value="5" <?php if ($birth_month == 5) { echo 'selected="selected"'; } ?>>May</option>',
'<option value="6" <?php if ($birth_month == 6) { echo 'selected="selected"'; } ?>>June</option>',
'<option value="7" <?php if ($birth_month == 7) { echo 'selected="selected"'; } ?>>July</option>',
'<option value="8" <?php if ($birth_month == 8) { echo 'selected="selected"'; } ?>>August</option>',
'<option value="9" <?php if ($birth_month == 9) { echo 'selected="selected"'; } ?>>September</option>',
'<option value="10" <?php if ($birth_month == 10) { echo 'selected="selected"'; } ?>>October</option>',
'<option value="11" <?php if ($birth_month == 11) { echo 'selected="selected"'; } ?>>November</option>',
'<option value="12" <?php if ($birth_month == 12) { echo 'selected="selected"'; } ?>>December</option>',
'</optgroup>',
'</select>',
'<select name="birth_day" id="birth_day">',
'<option value="0" <?php if ($birth_day == 0 || null) { echo 'selected="selected"'; } ?>></option>',
'<optgroup label="Day">',
<?php
for ($i = 1; $i <= 31; $i++) {
	echo "'<option value=\"$i\""; if ($birth_day == $i) { echo "selected=\"selected\""; } echo ">$i</option>',\n";
}
?>
'</optgroup>',
'</select>',
'<select name="birth_year" id="birth_year">',
'<option value="0" <?php if ($birth_year == 0 || null) { echo 'selected="selected"'; } ?>></option>',
'<optgroup label="Year">',
<?php
for ($i = 2010; $i >= 1902; $i--) {
	echo "'<option value=\"$i\""; if ($birth_year == $i) { echo "selected=\"selected\""; } echo ">$i</option>',\n";
}
?>
'</optgroup>',
'</select>',
'</td>',
'</tr>',
'<tr class="hometown">',
'<td class="label"><label for="hometown">Hometown:</label></td>',
'<td class="input"><input type="text" name="hometown" id="hometown" size="26" maxlength="50" value="<?php echo $hometown ?>" /></td>',
'</tr>',
'<tr class="community">',
'<td class="label"><label for="community">Community:</label></td>',
'<td class="input"><input type="text" name="community" id="community" size="26" maxlength="50" value="<?php echo $community ?>" />',
'<small class="formreminder">( Current Location, School, Business, or Group )</small></td>',
'</tr>',
'<tr class="hobbies">',
'<td class="label"><label for="hobbies">Hobbies / Interests:</label></td>',
'<td class="input">',
'<select name="hobbies[]" id="hobbies" size="10" multiple="multiple">',
'<optgroup label="Hobbies">',
<?php
$hobbies_list = array('Biking', 'Computers', 'Cooking', 'Dancing', 'Exercise', 'Flying', 'Gaming', 'Golfing', 'Hiking', 'Hunting', 'Internet', 'Reading', 'Running', 'School', 'Singing', 'Skiing', 'Swimming', 'Traveling', 'Other than listed', 'Websites');
$hobbies = array();

foreach ($hobbies_list as $hobby) {
	if (in_array($hobby, $hobbies)) {
		echo "'<option value=\"" . $hobby . "\" label=\"" . $hobby . "\" selected=\"selected\">" . $hobby . "</option>',\n";
	} else {
		echo "'<option value=\"" . $hobby . "\" label=\"" . $hobby . "\">" . $hobby . "</option>',\n";
	}
}
?>
'</optgroup>',
'</select>',
'<small class="formreminder">( Hold Ctrl to select more than one )</small></td>',
'</tr>',
'</table>',
'',
'</fieldset>',
'<br /><br />',
'<fieldset>',
'<legend>Security Questions</legend>',
'<div style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px; ">',
'<fieldset style="width: 90%; ">',
'<legend>Question 1&nbsp;</legend>',
'<table>',
'<tr class="security_question1">',
'<td class="label"><label for="security_question1">Question:</label></td>',
'<td class="input">',
'<select name="security_question1" id="security_question1">',
'<option value="0" <?php if ($security_question1 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>',
'<option value="1" <?php if ($security_question1 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>',
'<option value="2" <?php if ($security_question1 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>',
'<option value="3" <?php if ($security_question1 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>',
'<option value="4" <?php if ($security_question1 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>',
'<option value="5" <?php if ($security_question1 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>',
'<option value="6" <?php if ($security_question1 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>',
'<option value="7" <?php if ($security_question1 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>',
'<option value="8" <?php if ($security_question1 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>',
'<option value="9" <?php if ($security_question1 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>',
'<option value="10" <?php if ($security_question1 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>',
'<option value="11" <?php if ($security_question1 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>',
'<option value="12" <?php if ($security_question1 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>',
'</select>',
'</td>',
'</tr>',
'<tr class="security_answer1">',
'<td class="label"><label for="security_answer1">Answer:</label></td>',
'<td class="input"><input type="text" name="security_answer1" id="security_answer1" size="35" maxlength="50" value="<?php echo $security_answer1; ?>" /></td>',
'</tr>',
'</table>',
'</fieldset>',
'<br />',
'<fieldset style="width: 90%; ">',
'<legend>Question 2&nbsp;</legend>',
'<table>',
'<tr class="security_question2">',
'<td class="label"><label for="security_question2">Question:</label></td>',
'<td class="input">',
'<select name="security_question2" id="security_question2">',
'<option value="0" <?php if ($security_question2 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>',
'<option value="1" <?php if ($security_question2 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>',
'<option value="2" <?php if ($security_question2 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>',
'<option value="3" <?php if ($security_question2 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>',
'<option value="4" <?php if ($security_question2 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>',
'<option value="5" <?php if ($security_question2 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>',
'<option value="6" <?php if ($security_question2 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>',
'<option value="7" <?php if ($security_question2 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>',
'<option value="8" <?php if ($security_question2 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>',
'<option value="9" <?php if ($security_question2 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>',
'<option value="10" <?php if ($security_question2 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>',
'<option value="11" <?php if ($security_question2 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>',
'<option value="12" <?php if ($security_question2 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>',
'</select>',
'</td>',
'</tr>',
'<tr class="security_answer2">',
'<td class="label"><label for="security_answer2">Answer:</label></td>',
'<td class="input"><input type="text" name="security_answer2" id="security_answer2" size="35" maxlength="50" value="<?php echo $security_answer2; ?>" /></td>',
'</tr>',
'</table>',
'</fieldset>',
'</div>',
'<div style="margin-bottom: 10px; ">',
'<small class="formreminder">( If you ever forget your password you will need to answer these questions to get it reset )</small>',
'</div>',
'</fieldset>',
'<br /><br />',
'<fieldset>',
'<legend>Security Code</legend>',
'<table style="width: 400px; ">',
'<tr class="securitycode">',
'<td><input type="text" name="securitycode" id="securitycode" size="14" maxlength="7" /></td>',
'<td><img src="captcha_securityimage.php" name="captchaimg" alt="Security Code" /></td>',
'<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" id="captcharefresh" alt="Refresh Code" /></a></td>',
'</tr>',
'<tr class="securitycodeerror">',
'<td colspan="3"></td>',
'</tr>',
'</table>',
'<div id="register-button" class="shiny-button3">Register!<span></span></div>',
'</fieldset>',
'</form>',
'<br />',
'<script type="text/javascript">',
'document.register.username.focus();',
'</script>',
'</div></div>'
].join('');

/* end panel content */
/* begin panel variables */

var login = new panel('Login','login',false,false,false,false,false,200,230,400,433,'absolute',0,0,'l','t',true,login_content);
var register = new panel('Register','register',true,false,false,false,true,200,250,400,450,'absolute',0,0,'l','t',true,register_content);
var dialog_tryagain = new dialog('Try Again','notice',false,false,false,false,50,50,100,200,'absolute',0,0,'l','t',true,'Please Try Again!');

/* end panel variables */
<?php
}
?>

$(document).ready(function() {

<?php
if (!isset($_SESSION['logged']) || (!$_SESSION['logged'] == 1)) {
?>
login.display();
register.display();

display(login);

$("input[type='text']#username").focus();
$("button[type='submit']#signin").click(function() {
	if (($("input[type='text']#username").val() != "") && ($("input[type='password']#password").val() != "")) {
		$("div#login").hide();
		var str = $("form#login").serialize();
		
		$.post("login.php", str, function(data) {
			if (data == "Success") {
				location.reload();
			} else {
				$("input").blur();
				dialog_tryagain.display();
				$("div#login").css('opacity', 0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
				$("div#notice").css('opacity', 0).show().animate({opacity:1}, 1000).animate({opacity:0}, 1000, function() { $("div#notice").hide(); $("input[type='text']#username").focus(); });
			}
		});
	}
});

$(document.documentElement).keydown(function(event) { // IF ENTER IS PRESSED TWICE SKIP TRY AGAIN DIALOG
	if (event.keyCode == 13) {
		if ($("div#register").is(":hidden")) {
			if (($("input[type='text']#username").val() != "") && ($("input[type='password']#password").val() != "")) {
				$("div#login").hide();
				var str = $("form#login").serialize();

				$.post("login.php", str, function(data) {
					if (data == "Success") {
						location.reload();
					} else {
						$("input").blur();
						dialog_tryagain.display();
						$("div#login").css('opacity', 0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
						$("div#notice").css('opacity', 0).show().animate({opacity:1}, 1000).animate({opacity:0}, 1000, function() { $("div#notice").hide(); $("input[type='text']#username").focus(); });
					}
				});
			}
		} else {
			alert("register is visible");
		}
	}
});

$("button[type='button']#signup").click(function() {
	display(register);
	// $("div#register div.panel-mc").load("register.php");
	$("div#register").addClass("fullscreen");
	$("div#register").height(myHeight);
	$("div#register div.panel").height(myHeight);
	$("div#register div.panel-bwrap").css('height', (myHeight - 30));
	$("div#register div.content").css('height', $("div#register div.panel-bwrap").height());
	$("div#register div.content").css('width', ($("div#register div.panel-bwrap").width() - 42));
	$("div#register div.panel-header div.tools div.maximize").addClass("restore");
	$("div#register div.panel-header div.tools div.toggle").hide();
	$("div#register div.panel-header div.tools div.toggle").removeClass("toggledown");
});

/*


// make sure manditory fields have been entered
if (empty($username_reg)) {
$registererrors[] = 'Username cannot be blank.';
}

if (preg_match('/[,]/', $username_reg)) {
$registererrors[] = 'Username cannot have commas.';
}

if (preg_match('/[ ]/', $username_reg)) {
$registererrors[] = 'Username cannot have spaces.';
}

if (preg_match('/[-]/', $username_reg)) {
$registererrors[] = 'Username cannot have dashes.';
}

if (preg_match('/[.]/', $username_reg)) {
$registererrors[] = 'Username cannot have periods.';
}

// check if username is already registered
$query = 'SELECT username FROM login WHERE username = "' . $username_reg . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) > 0) {
$registererrors[] = 'Username ' . $username_reg . ' is already registered.';
$username_reg = '';
}
mysql_free_result($result);

if (empty($password) && !empty($password_ver)) {
$registererrors[] = 'Password cannot be blank.';
}

if (empty($password) && empty($password_ver)) {
$registererrors[] = 'Passwords cannot be blank.';
}

if (!empty($password)) {
if (empty($password_ver)) {
$registererrors[] = 'Please confirm your password.';
}

if (!empty($password_ver)) {
if ($password != $password_ver) {
$registererrors[] = 'Both of your passwords need to match.';
}
}

if ($username == $password) {
$registererrors[] = 'Username & Password Cannot Be The Same.';
}
}

if (empty($first_name)) {
$registererrors[] = 'First Name cannot be blank.';
}

if (empty($last_name)) {
$registererrors[] = 'Last Name cannot be blank.';
}

if (empty($email)) {
$registererrors[] = 'Email Address cannot be blank.';
} else {
if (preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}?$/i", $email)) {
} else {
$registererrors[] = 'Email Address should be in correct form.';
}
}

if (empty($gender)) {
$registererrors[] = 'Gender cannot be blank.';
}

if ($birth_month == 0 && $birth_day == 0 && $birth_year == 0) {
$registererrors[] = 'Birth Date cannot be blank.';
} elseif ($birth_month == 0) {
$registererrors[] = 'Birth Month cannot be blank.';
} elseif ($birth_day == 0) {
$registererrors[] = 'Birth Day cannot be blank.';
} elseif ($birth_year == 0) {
$registererrors[] = 'Birth Year cannot be blank.';
}

if (empty($hometown)) {
$registererrors[] = 'Hometown cannot be blank.';
}

if (empty($hobbies)) {
$registererrors[] = 'Hobbies cannot be blank.';
}

if ($security_question1 == $security_question2) {
$registererrors[] = 'Security Questions cannot be the same.';
}

if (empty($security_question1) || ($security_question1 == 0)) {
$registererrors[] = 'Security Question 1 cannot be blank.';
}

if (empty($security_answer1)) {
$registererrors[] = 'Security Answer 1 cannot be blank.';
}

if (empty($security_question2) || ($security_question2 == 0)) {
$registererrors[] = 'Security Question 2 cannot be blank.';
}

if (empty($security_answer2)) {
$registererrors[] = 'Security Answer 2 cannot be blank.';
}

// check to see if security codes match
if ($_POST['txtsecuritycode'] == $_SESSION['SECURITY_CODE']) {
} else {
$registererrors[] = 'Security Code cannot be incorrect.';
}

*/

$("div#register-button").click(function() {
	$("img.error").hide();
	$("span.error").hide();
	$("tr.securitycodeerror").hide();
	$("tr.error").removeClass("error");

	var hasError = false;
	var reg = /^./;
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var emailReg2 = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}?$/i;
	var errorImage = '<img src="i/icons/cancel.png" alt="" class="error" />';

	var usernamereg_val = $("input[type='text']#username_reg").val();
	if (usernamereg_val == '') {
		$("input[type='text']#username_reg").parent().append(errorImage + '<span class="error">You forgot to enter a username.</span>');
		$("tr.username_reg").addClass("error");
		hasError = true;
	} else if (!reg.test(usernamereg_val)) {
		$("input[type='text']#username_reg").after('<span class="error">Enter a valid username.</span>');
		$("tr.username_reg").addClass("error");
		hasError = true;
	}

	var passwordreg_val = $("input[type='password']#password_reg").val();
	if (passwordreg_val == '') {
		$("input[type='password']#password_reg").after(errorImage + '<span class="error">You forgot to enter a password.</span>');
		$("tr.password_reg").addClass("error");
		hasError = true;
	} else if (!reg.test(passwordreg_val)) {
		$("input[type='password']#password_reg").after('<span class="error">Enter a valid password.</span>');
		$("tr.password_reg").addClass("error");
		hasError = true;
	}

	var passwordverreg_val = $("input[type='password']#password_ver_reg").val();
	if (passwordverreg_val == '') {
		$("input[type='password']#password_ver_reg").after(errorImage + '<span class="error">You forgot to confirm your password.</span>');
		$("tr.password_ver_reg").addClass("error");
		hasError = true;
	} else if (!reg.test(passwordverreg_val)) {
		$("input[type='password']#password_ver_reg").after('<span class="error">Enter a valid password.</span>');
		$("tr.password_ver_reg").addClass("error");
		hasError = true;
	}

	if (passwordreg_val != passwordverreg_val) {
		$("input[type='password']#password_ver_reg").parent().append('<span class="error">Passwords need to match.</span>');
		$("tr.password_ver_reg").addClass("error");
		hasError = true;
	}

	var firstname_val = $("input[type='text']#first_name").val();
	if (firstname_val == '') {
		$("input[type='text']#first_name").after(errorImage + '<span class="error">You forgot to enter your first name.</span>');
		$("tr.first_name").addClass("error");
		hasError = true;
	} else if (!reg.test(firstname_val)) {
		$("input[type='text']#first_name").after('<span class="error">Enter a valid first name.</span>');
		$("tr.first_name").addClass("error");
		hasError = true;
	}

	var lastname_val = $("input[type='text']#last_name").val();
	if (lastname_val == '') {
		$("input[type='text']#last_name").after(errorImage + '<span class="error">You forgot to enter your last name.</span>');
		$("tr.last_name").addClass("error");
		hasError = true;
	} else if (!reg.test(lastname_val)) {
		$("input[type='text']#last_name").after('<span class="error">Enter a valid last name.</span>');
		$("tr.last_name").addClass("error");
		hasError = true;
	}

	var email_val = $("input[type='email']#email").val();
	if (email_val == '') {
		$("input[type='email']#email").parent().append(errorImage + '<span class="error">You forgot to enter your email address.</span>');
		$("tr.email").addClass("error");
		hasError = true;
	} else if (!emailReg.test(email_val)) {
		$("input[type='email']#email").after('<span class="error">Enter a valid email address.</span>');
		$("tr.email").addClass("error");
		hasError = true;
	}

	var gender_val = $("input[type='radio']#gender:checked").length;
	if (gender_val == 0) {
		$("tr.gender td.input").append(errorImage + '<span class="error">You forgot to enter your gender.</span>');
		$("tr.gender").addClass("error");
		hasError = true;
	}

/*
	var birthdate_val = $("select#birthdate").val();
	if (birthdate_val == '') {
		$("input[type='text']#birthdate").after(errorImage + '<span class="error">You forgot to enter your birthdate.</span>');
		$("tr.birthdate").addClass("error");
		hasError = true;
	} else if (!reg.test(birthdate_val)) {	
		$("input[type='text']#birthdate").after('<span class="error">Enter a valid birthdate.</span>');
		$("tr.birthdate").addClass("error");
		hasError = true;
	}

	if ($birth_month == 0 && $birth_day == 0 && $birth_year == 0) {
		$registererrors[] = 'Birth Date cannot be blank.';
	} elseif ($birth_month == 0) {
		$registererrors[] = 'Birth Month cannot be blank.';
	} elseif ($birth_day == 0) {
		$registererrors[] = 'Birth Day cannot be blank.';
	} elseif ($birth_year == 0) {
		$registererrors[] = 'Birth Year cannot be blank.';
	}

*/
	var hometown_val = $("input[type='text']#hometown").val();
	if (hometown_val == '') {
		$("input[type='text']#hometown").after(errorImage + '<span class="error">You forgot to enter your hometown.</span>');
		$("tr.hometown").addClass("error");
		hasError = true;
	} else if (!reg.test(hometown_val)) {
		$("input[type='text']#hometown").after('<span class="error">Enter a valid hometown.</span>');
		$("tr.hometown").addClass("error");
		hasError = true;
	}

	var hobbies_val = $("select#hobbies option:selected").length;
	if (hobbies_val == 0) {
		$("select#hobbies").after(errorImage + '<span class="error">You forgot to select your hobbies.</span>');
		$("tr.hobbies").addClass("error");
		hasError = true;
	}

	var securityquestion1_val = $("select#security_question1 option:selected").val();
	if (securityquestion1_val == 0) {
		$("select#security_question1").after(errorImage + '<span class="error">You forgot to select a security question.</span>');
		$("tr.security_question1").addClass("error");
		hasError = true;
	}

	var securityanswer1_val = $("input[type='text']#security_answer1").val();
	if (securityanswer1_val == '') {
		$("input[type='text']#security_answer1").after(errorImage + '<span class="error">You forgot to enter your security answer.</span>');
		$("tr.security_answer1").addClass("error");
		hasError = true;
	} else if (!reg.test(securityanswer1_val)) {
		$("input[type='text']#security_answer1").after('<span class="error">Enter a valid security answer.</span>');
		$("tr.security_answer1").addClass("error");
		hasError = true;
	}

	var securityquestion2_val = $("select#security_question2 option:selected").val();
	if (securityquestion2_val == 0) {
		$("select#security_question2").after(errorImage + '<span class="error">You forgot to select a security question.</span>');
		$("tr.security_question2").addClass("error");
		hasError = true;
	}

	var securityanswer2_val = $("input[type='text']#security_answer2").val();
	if (securityanswer2_val == '') {
		$("input[type='text']#security_answer2").after(errorImage + '<span class="error">You forgot to enter your security answer.</span>');
		$("tr.security_answer2").addClass("error");
		hasError = true;
	} else if (!reg.test(securityanswer2_val)) {
		$("input[type='text']#security_answer2").after('<span class="error">Enter a valid security answer.</span>');
		$("tr.security_answer2").addClass("error");
		hasError = true;
	}

	if (securityquestion1_val == securityquestion2_val) {
		$("input[type='text']#security_answer2").after(errorImage + '<span class="error">Security Questions Need To Be Different.</span>');
		$("tr.security_answer2").addClass("error");
		hasError = true;
	}

	var securitycode_val = $("input[type='text']#securitycode").val();
	if (securitycode_val == '') {
		$("tr.securitycodeerror td").html(errorImage + '<span class="error">You forgot to enter the security code.</span>');
		$("tr.securitycodeerror").show();
		$("tr.securitycode").addClass("error");
		hasError = true;
	} else if ((!reg.test(securitycode_val)) || (securitycode_val.length != 5)) {
		$("tr.securitycodeerror td").html('<span class="error">Enter a valid security code.</span>');
		$("tr.securitycodeerror").show();
		$("tr.securitycode").addClass("error");
		hasError = true;
	}

	if (!hasError) {
		// $(this).hide();
		$("div#register-button").prepend('<img src="i/icons/loading.gif" alt="Loading" id="loading" />');
		var str = $("form#register").serialize();

		$.post("register.php", str, function(data) {
			$("div#register").html(data);

			if (data == "Success") {
				$("div#register").hide();
				location.reload();
			} else {
				/*
				$("div#notice").css('opacity',1);
				dialog_tryagain.display();
				$("div#login").css('opacity',0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
				$("div#notice").animate({opacity:1}, 1000).animate({opacity:0}, 1000);
				*/
			}
		});
	} else {
		$("div#register div.panel-mc").animate({scrollTop:0}, 500);
	}
});
<?php
} else {
?>

/* begin initiate desktop */

// ANIMATE ALL OPACITY STYLES

dialog_loading.display();
$("div#loading").css('opacity', 0).show().animate({opacity:1}, 600);
$("body").prepend(blackout);
user_desktop.display();
$("div#startmenu").hide();
$("div#startmenu div.startmenu-bwrap").height(($("div#startmenu").height() - 30));
$("div#blackout").css('opacity', .5).animate({opacity:.5}, 1400).animate({opacity:0}, 1200);
$("div#loading").css('opacity', 1).animate({opacity:1}, 600).animate({opacity:0}, 1000);
$("div#desktop").hide().css('opacity', 0);
$("div#desktop").animate({opacity:0}, 1800).show().animate({opacity:1}, 1400);
$("div#taskbar").hide().css('opacity', 0);

if ((dConfig.user.styles.transparency == 1) || (dConfig.styles.transparency == 1)) {
	$("div#taskbar").animate({opacity:0}, 1800).show().animate({opacity:.8}, 1400);
} else if (dConfig.user.styles.transparency == 0) {
	$("div#taskbar").animate({opacity:0}, 1800).show().animate({opacity:1}, 1400);
}

setTimeout('$("div#blackout").remove()', 5000);
setTimeout('$("div#loading").remove()', 5000);

/* end initiate desktop */
/* begin set desktop config */
/** begin desktop config */

$("div#desktop-view").css('height', (myHeight - (dConfig.taskbar.height + 2)));
$("div.desktop-body").css('height', (myHeight - (dConfig.taskbar.height + 2)));
$("div.desktop-thumb").css({'height':'auto','min-height':dConfig.desktop.thumb_height,'width':dConfig.desktop.thumb_width});

/* end desktop config **/
/** begin taskbar config */

$("div#taskbar div#panel-wrap").width(myWidth - dConfig.taskbar.start_width);
$("div#taskbar div#panel-wrap div#taskbuttons-panel").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width));
$("div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width + dConfig.taskbar.tray_width));
$("div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap ul#tray-strip").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width + dConfig.taskbar.tray_width));
$("div#taskbar div#panel-wrap div#tray-panel").width(dConfig.taskbar.tray_width);

/* end taskbar config **/
/** begin user styles */

if (dConfig.user.styles.transparency == 1) { // check checkbox
	setTimeout('$("div#taskbar").addClass("transparent8")', 5000);
	setTimeout('$("div#taskbar").css("opacity","1")', 5000);
} else if (dConfig.user.styles.transparency == 0) {
	setTimeout('$("div#taskbar").removeClass("transparent8")', 5000);
	setTimeout('$("div#taskbar").css("opacity","1")', 5000);
}

/* end user styles **/
/* end set desktop config */
/* begin autorun functions */

wallpaper.display();
notepad.display();
preferences.display();
flash_name.display();
piano.display();
tic_tac_toe.display();
friends.display();
radio.display();
search.display();
chat.display();
music.display();

if (in_array('wallpaper', dConfig.launchers.autorun)) display(wallpaper);
if (in_array('notepad', dConfig.launchers.autorun)) display(notepad);
if (in_array('preferences', dConfig.launchers.autorun)) display(preferences);
if (in_array('flash_name', dConfig.launchers.autorun)) display(flash_name);
if (in_array('piano', dConfig.launchers.autorun)) display(piano);
if (in_array('tic_tac_toe', dConfig.launchers.autorun)) display(tic_tac_toe);
if (in_array('friends', dConfig.launchers.autorun)) display(friends);
if (in_array('radio', dConfig.launchers.autorun)) display(radio);
if (in_array('search', dConfig.launchers.autorun)) display(search);
if (in_array('chat', dConfig.launchers.autorun)) display(chat);
if (in_array('music', dConfig.launchers.autorun)) display(music);

/* end autorun functions */

<?php
}
?>
});

$(window).load(function() {

/* begin window drag effect functions */

$("div.panel-header").mousedown(function(e) {
	var mdown = new div_selection(e, 4);
	
	if (!$(mdown.event).hasClass("tool")) {
		$(mdown.div_panel()).addClass("transparent5");
		$(mdown.div_panel_tool()).addClass("transparent5");
		$(mdown.div_panel_tl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});

		if ($(mdown.div_panel()).height() == 24) {
			$(mdown.div_panel_tl()).css({
			'border-bottom-left-radius':'4px',
			'border-bottom-right-radius':'4px',
			'-khtml-border-radius-bottomleft':'4px',
			'-khtml-border-radius-bottomright':'4px',
			'-moz-border-radius-bottomleft':'4px',
			'-moz-border-radius-bottomright':'4px',
			'-webkit-border-bottom-left-radius':'4px',
			'-webkit-border-bottom-right-radius':'4px'
			});
		}

		$(mdown.div_panel_bwrap()).hide();
	}
});

$("span.panel-header-text").mousedown(function(e) {
	var mdown = new div_selection(e, 5);

	if (!$(mdown.event).hasClass("tool")) {
		$(mdown.div_panel()).addClass("transparent5");
		$(mdown.div_panel_tool()).addClass("transparent5");
		$(mdown.div_panel_tl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});

		if ($(mdown.div_panel()).height() == 24) {
			$(mdown.div_panel_tl()).css({
			'border-bottom-left-radius':'4px',
			'border-bottom-right-radius':'4px',
			'-khtml-border-radius-bottomleft':'4px',
			'-khtml-border-radius-bottomright':'4px',
			'-moz-border-radius-bottomleft':'4px',
			'-moz-border-radius-bottomright':'4px',
			'-webkit-border-bottom-left-radius':'4px',
			'-webkit-border-bottom-right-radius':'4px'
			});
		}

		$(mdown.div_panel_bwrap()).hide();
	}
});

$("div.panel-header").mouseup(function(e) {
	var mup = new div_selection(e, 4);

	if (!$(mup.event).hasClass("tool")) {
		$(mup.div_panel()).removeClass("transparent5");
		$(mup.div_panel_tool()).removeClass("transparent5");
		$(mup.div_panel_tl()).css({'background-color':'','border-bottom':'0'});
		$(mup.div_panel_tl()).css({
			'border-bottom-left-radius':'0px',
			'border-bottom-right-radius':'0px',
			'-khtml-border-radius-bottomleft':'0px',
			'-khtml-border-radius-bottomright':'0px',
			'-moz-border-radius-bottomleft':'0px',
			'-moz-border-radius-bottomright':'0px',
			'-webkit-border-bottom-left-radius':'0px',
			'-webkit-border-bottom-right-radius':'0px'
		});

		$(mup.div_panel_bwrap()).show();
	}
});

$("span.panel-header-text").mouseup(function(e) {
	var mup = new div_selection(e, 5);

	if (!$(mup.event).hasClass("tool")) {
		$(mup.div_panel()).removeClass("transparent5");
		$(mup.div_panel_tool()).removeClass("transparent5");
		$(mup.div_panel_tl()).css({'background-color':'','border-bottom':'0'});
		$(mup.div_panel_tl()).css({
			'border-bottom-left-radius':'0px',
			'border-bottom-right-radius':'0px',
			'-khtml-border-radius-bottomleft':'0px',
			'-khtml-border-radius-bottomright':'0px',
			'-moz-border-radius-bottomleft':'0px',
			'-moz-border-radius-bottomright':'0px',
			'-webkit-border-bottom-left-radius':'0px',
			'-webkit-border-bottom-right-radius':'0px'
		});

		$(mup.div_panel_bwrap()).show();
	}
});

/* end window drag effect functions */
/* begin window tool functions */

$("div.panel-header div.tools div.close").click(function(e) {
	var close = new div_selection(e, 7);
	$(close.div_main()).hide();
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>

	var tbutton = "ul#taskbuttons-strip li#taskbutton-" + close.main();
	$(tbutton).hide();

<?php
}
?>
});

$("div.panel-header div.tools div.maximize").toggle(function(e) {
	var maximize1 = new div_selection(e, 7);
	var maximize2 = maximize1.div_panel() + '-header div.tools div.maximize';
	var maximize3 = maximize1.div_panel() + '-header div.tools div.toggle';
	$(maximize1.div_main()).addClass("fullscreen");
	$(maximize1.div_panel()).addClass("fullscreen");
	$(maximize1.div_main()).removeClass("drsElement");
	$(maximize2).addClass("restore");
	$(maximize3).hide();
	$(maximize3).removeClass("toggledown");

	if ($(maximize1.div_panel_bwrap()).is(":hidden")) {
		$(maximize1.div_panel_bwrap()).show();
	}

	$(maximize1.div_panel_bwrap()).css('height', myHeight - (dConfig.taskbar.height + 32));
<?php
if (!isset($_SESSION['logged']) || (!$_SESSION['logged'] == 1)) {
?>

	$(maximize1.div_main()).height(myHeight);
	$(maximize1.div_panel()).height(myHeight);

<?php
} else {
?>

	$(maximize1.div_panel()).height(myHeight - (dConfig.taskbar.height + 2));
	$(maximize1.div_main() + " div.content").css('height', $(maximize1.div_main() + " div.panel-bwrap").height() - 2);
	$(maximize1.div_main() + " div.content").css('width', $(maximize1.div_main() + " div.panel-bwrap").width() - 16);

<?php
}
?>
},
function(e) {
	var restore1 = new div_selection(e, 7);
	var restore2 = restore1.div_panel() + '-header div.tools div.maximize';
	var restore3 = restore1.div_panel() + '-header div.tools div.tool.toggle';
	$(restore1.div_main()).removeClass("fullscreen");
	$(restore1.div_panel()).removeClass("fullscreen");
	$(restore1.div_main()).addClass("drsElement");
	$(restore2).removeClass("restore");
	$(restore3).show();
	$(restore1.div_panel()).height(100 + '%'); // or clear this height value
	$(restore1.div_panel_bwrap()).height(($(restore1.div_panel()).height() - 30));

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>
	$(restore1.div_main() + " div.content").css('height', $(restore1.div_main() + " div.panel-bwrap").height() - 2);
	$(restore1.div_main() + " div.content").css('width', $(restore1.div_main() + " div.panel-bwrap").width() - 16);

<?php
}
?>
});

$("div.panel-header div.tools div.minimize").click(function(e) {
	var minimize = new div_selection(e, 7);
	$(minimize.div_main()).hide();
});

$("div.panel-header div.tools div.toggle").click(function(e) { // WHEN TOGGLED CHANGE SIZE OF PANEL PARENT
	var toggle = new div_selection(e, 7);

	if ($(toggle.div_panel_bwrap()).is(":hidden")) {
		$(toggle.div_panel()).animate({'height':'100%'}, 0);
		$(toggle.div_panel_bwrap()).show();
	} else {
		if (!$(toggle.div_panel()).hasClass("fullscreen")) {
			$(toggle.div_panel()).animate({'height':'24px'}, 0);
			$(toggle.div_panel_bwrap()).hide();
		}
	}
});

$("div.panel-header div.tools div.toggle").toggle(function (e) {
	var toggle_arrow = new div_selection(e, 7);

	if (!$(toggle_arrow.div_panel()).hasClass("fullscreen")) {
		$(this).addClass("toggledown");
	}
},
function () {
	$(this).removeClass("toggledown");
});

/* end window tool functions */
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
?>

/* begin desktop functions */

$("div.desktop-body").click(function(e) {
	var target = new div_selection(e, 0);

	if (target.target_class() == "desktop-body") {
		$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
		
		if ($("div#startmenu").is(":visible")) {
			$("div#startmenu").hide();
		}
	}
});

$("div.desktop-thumb").click(function(e) {
	var tthumb = new div_selection(e, 0);

	if (tthumb.target_class() == "thumb-image") {
		tthumb = new div_selection(e, 1);
		tthumb = tthumb.main().slice(6);
		tdthumb = "div#thumb-" + tthumb;
		$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
		$(tdthumb).addClass("desktop-thumb-selected");
	} else {
		tthumb = tthumb.main().slice(6);
		tdthumb = "div#thumb-" + tthumb;
		$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
		$(tdthumb).addClass("desktop-thumb-selected");
	}
});

$("div.desktop-thumb").dblclick(function(e) {
	var tthumb = new div_selection(e, 0);
	var zmax = 0, cur = 0;

	if ($("div#startmenu").is(":visible")) {
		$("div#startmenu").hide();
	}

	if (tthumb.target_class() == "thumb-image") {
		tthumb = new div_selection(e, 1);
		tthumb = tthumb.main().slice(6);
		tdthumb = "div#thumb-" + tthumb;
		$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
		$(tdthumb).addClass("desktop-thumb-selected");
	} else {
		tthumb = tthumb.main().slice(6);
		tdthumb = "div#thumb-" + tthumb;
		$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
		$(tdthumb).addClass("desktop-thumb-selected");
	}

	$("div#" + tthumb + " div.panel").removeClass("transparent5");
	$("div#" + tthumb + " div.tool").removeClass("transparent5");
	$("div#" + tthumb + " div.panel-tl").css({'background-color':'','border-bottom':'0'});
	$("div#" + tthumb + " div.panel-tl").css({
		'border-bottom-left-radius':'0px',
		'border-bottom-right-radius':'0px',
		'-khtml-border-radius-bottomleft':'0px',
		'-khtml-border-radius-bottomright':'0px',
		'-moz-border-radius-bottomleft':'0px',
		'-moz-border-radius-bottomright':'0px',
		'-webkit-border-bottom-left-radius':'0px',
		'-webkit-border-bottom-right-radius':'0px'
	});

	$("div#" + tthumb + " div.panel-bwrap").show();

	$("div.application").each(function() {
		cur = parseInt($(this).css('z-index'));
		zmax = (cur > zmax) ? cur : zmax;
	});
	
	$("div#" + tthumb).css('z-index', ++zmax);

	if (tthumb == "wallpaper") display(wallpaper);
	if (tthumb == "notepad") display(notepad);
	if (tthumb == "preferences") display(preferences);
	if (tthumb == "flash_name") display(flash_name);
	if (tthumb == "piano") display(piano);
	if (tthumb == "tic_tac_toe") display(tic_tac_toe);
	if (tthumb == "friends") display(friends);
	if (tthumb == "radio") display(radio);
	if (tthumb == "search") display(search);
	if (tthumb == "chat") display(chat);
	if (tthumb == "music") display(music);
	
	setTimeout('$(tdthumb).removeClass("desktop-thumb-selected")', 1200);
});

$("div.panel").click(function() {
	if ($("div#startmenu").is(":visible")) {
		$("div#startmenu").hide();
	}
});

$(document.documentElement).keydown(function(event) { // handle cursor keys
	var direction;

	if (event.keyCode == 37) { // go left
		direction = "prev";
		alert("left");
	} else if (event.keyCode == 38) { // go up
		direction = "prev";
		alert("up");
	} else if (event.keyCode == 39) { // go right
		direction = "next";
		alert("right");
	} else if (event.keyCode == 40) { // go down
		direction = "next";
		alert("down");
		//alert($("div.desktop-thumb").siblings());
		//$("div.desktop-thumb").next().click();
	}

	if (direction != null) {
	}
});

/* end desktop functions */
/* begin startmenu functions */

$("div#startmenu li.list-item").click(function(e) {
	var titem = new div_selection(e, 0);
	titem = "div#" + titem.main();
	var zmax = 0, cur = 0;

	$("div#startmenu").hide();

	$(titem + " div.panel").removeClass("transparent5");
	$(titem + " div.tool").removeClass("transparent5");
	$(titem + " div.panel-tl").css({'background-color':'','border-bottom':'0'});
	$(titem + " div.panel-tl").css({
		'border-bottom-left-radius':'0px',
		'border-bottom-right-radius':'0px',
		'-khtml-border-radius-bottomleft':'0px',
		'-khtml-border-radius-bottomright':'0px',
		'-moz-border-radius-bottomleft':'0px',
		'-moz-border-radius-bottomright':'0px',
		'-webkit-border-bottom-left-radius':'0px',
		'-webkit-border-bottom-right-radius':'0px'
	});

	$(titem + " div.panel-bwrap").show();

	$("div.application").each(function() {
		cur = parseInt($(this).css('z-index'));
		zmax = (cur > zmax) ? cur : zmax;
	});

	if ($(titem).is(":hidden")) {
		$(titem).css('z-index', ++zmax);
		$(titem).show();
	} else {
		if ($(titem).css('z-index') < zmax) {
			$(titem).css('z-index', ++zmax);
		}
	}

	if (titem == "div#wallpaper") display(wallpaper);
	if (titem == "div#notepad") display(notepad);
	if (titem == "div#preferences") display(preferences);
	if (titem == "div#flash_name") display(flash_name);
	if (titem == "div#piano") display(piano);
	if (titem == "div#tic_tac_toe") display(tic_tac_toe);
	if (titem == "div#friends") display(friends);
	if (titem == "div#radio") display(radio);
	if (titem == "div#search") display(search);
	if (titem == "div#chat") display(chat);
	if (titem == "div#music") display(music);
});

$("div#startmenu li.item-logout").click(function() {
	$.get("logout.php", function() {
		location.reload();
	});
});

/* end startmenu functions */
/* begin taskbar functions */

$("div#taskbar table#startbutton").click(function(e) {
	if ($("div#startmenu").is(":hidden")) {
		$("div#startmenu").show();
	} else {
		$("div#startmenu").hide();
	}
});

$("div#taskbar li.taskbutton").click(function(e) {
	var tbutton = new div_selection(e, 5);
	tbutton = "div#" + tbutton.main().slice(11);
	var zmax = 0, cur = 0;

	if ($("div#startmenu").is(":visible")) {
		$("div#startmenu").hide();
	}

	$(tbutton + " div.tool").removeClass("transparent5");
	$(tbutton + " div.panel-tl").css({'background-color':'','border-bottom':'0'});
	$(tbutton + " div.panel-tl").css({
		'border-bottom-left-radius':'0px',
		'border-bottom-right-radius':'0px',
		'-khtml-border-radius-bottomleft':'0px',
		'-khtml-border-radius-bottomright':'0px',
		'-moz-border-radius-bottomleft':'0px',
		'-moz-border-radius-bottomright':'0px',
		'-webkit-border-bottom-left-radius':'0px',
		'-webkit-border-bottom-right-radius':'0px'
	});

	$(tbutton + " div.panel-bwrap").show();

	$("div.application").each(function() {
		cur = parseInt($(this).css('z-index'));
		zmax = (cur > zmax) ? cur : zmax;
	});

	if ($(tbutton).is(":hidden")) {
		$(tbutton).css('z-index', ++zmax);
		$(tbutton).show();
	} else {
		if ($(tbutton).css('z-index') < zmax) {
			$(tbutton).css('z-index', ++zmax);
		} else {
			if (!$(tbutton + " div.panel").hasClass("transparent5")) $(tbutton).hide();
		}
	}
	
	$(tbutton + " div.panel").removeClass("transparent5");
});

$("div#taskbar div#quickstart-splitbar").mousedown(function() {
	var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;

	$("div#taskbar div#quickstart-splitbar").bind('mousemove', function(e) {
		diffX = 0;
		mouseX = e.pageX || (e.clientX + document.documentElement.scrollLeft);

		if (lastMouseX == 0) {
			lastMouseX = mouseX;
		}

		diffX = (mouseX - lastMouseX + mOffX);

		if (diffX > 10) {
			diffX = 10;
		} else if (diffX < -10) {
			diffX = -10;
		}

		if (((mouseX - diffX) > (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_minwidth)) && ((mouseX + diffX) < (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_maxwidth))) {
			$("div#taskbar div#quickstart-panel").css('width', $("div#taskbar div#quickstart-panel").width() + diffX);
			$("div#taskbar div#taskbuttons-panel").css('left', $("div#taskbar div#taskbuttons-panel").position().left + diffX);
			$("div#taskbar div#taskbuttons-panel").css('width', $("div#taskbar div#taskbuttons-panel").width() - diffX);
			$("div#taskbar div.taskbuttons-strip-wrap").css('width', $("div#taskbar div.taskbuttons-strip-wrap").width() - diffX);
			lastMouseX = mouseX;
		}
	});
});

$("div#taskbar div#tray-splitbar").mousedown(function() {
	var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;

	$("div#taskbar div#tray-splitbar").bind('mousemove', function(e) {
		diffX = 0;
		mouseX = e.pageX || (e.clientX + document.documentElement.scrollLeft);

		if (lastMouseX == 0) {
			lastMouseX = mouseX;
		}

		diffX = (mouseX - lastMouseX + mOffX);

		if (diffX > 10) {
			diffX = 10;
		} else if (diffX < -10) {
			diffX = -10;
		}

		if (((mouseX - diffX) > (myWidth - dConfig.taskbar.tray_maxwidth)) && ((mouseX + diffX) < (myWidth - dConfig.taskbar.tray_minwidth))) {
			$("div#taskbar div#tray-panel").css('width',$("div#taskbar div#tray-panel").width() - diffX);
			$("div#taskbar div.taskbuttons-strip-wrap").css('width',$("div#taskbar div.taskbuttons-strip-wrap").width() + diffX);
			lastMouseX = mouseX;
		}
	});
});

$("div#taskbar div.splitbar").mouseleave(function() {
	$("div#taskbar div.splitbar").unbind('mousemove');
	var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;
});

$("div#taskbar div.splitbar").mouseup(function() {
	$("div#taskbar div.splitbar").unbind('mousemove');
	var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;
});

$("div#taskbar div#tray-panel div#tray-toggle").toggle(function () {
	$("div.panel").addClass("transparent5");
	$("div.panel div.tool").addClass("transparent5");
	$("div.panel-tl").css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});

	if ($("div.panel").height() == 24) {
		$("div.panel-tl").css({
			'border-bottom-left-radius':'4px',
			'border-bottom-right-radius':'4px',
			'-khtml-border-radius-bottomleft':'4px',
			'-khtml-border-radius-bottomright':'4px',
			'-moz-border-radius-bottomleft':'4px',
			'-moz-border-radius-bottomright':'4px',
			'-webkit-border-bottom-left-radius':'4px',
			'-webkit-border-bottom-right-radius':'4px'
		});
	}

	$("div.panel-bwrap").hide();
},
function () {
	$("div.panel").removeClass("transparent5");
	$("div.panel div.tool").removeClass("transparent5");
	$("div.panel-tl").css({'background-color':'','border-bottom':'0'});
	$("div.panel-tl").css({
		'border-bottom-left-radius':'0px',
		'border-bottom-right-radius':'0px',
		'-khtml-border-radius-bottomleft':'0px',
		'-khtml-border-radius-bottomright':'0px',
		'-moz-border-radius-bottomleft':'0px',
		'-moz-border-radius-bottomright':'0px',
		'-webkit-border-bottom-left-radius':'0px',
		'-webkit-border-bottom-right-radius':'0px'
	});
		
	$("div.panel-bwrap").show();
});

/* end taskbar functions */
/* begin app functions */
/** begin preferences */
/*** begin splash */

$("div#preferences div#splash ul li").click(function(e) {
	var target = new div_selection(e, 0);
	target = "div#" + target.target_class();
	
	$("div#preferences div#splash").hide();
	$("div#preferences " + target).show();
});

$("div#preferences div.tools div.dblarrowleft").click(function() {
	if ($("div#preferences div.body div#splash").is(":hidden")) {
		$("div#preferences div.body").children().hide();
		$("div#preferences div#splash").show("slide", {direction:"right"}, 384);
	}
});

$("div#preferences div#wallpaper div#slideshow").load("load.php?id=wallpaper_slideshow");

$("div#preferences div#splash ul li.wallpaper").click(function(e) {
	$.ajax({
		url: 'load.php',
		data: 'id=wallpaper_slideshow',
		type: 'get',
		success: function (data) {
			$("div#preferences div#wallpaper").html(data);
		}
	});
});

/* end splash ***/
/*** begin thumbs */



/* end thumbs ***/
/*** begin autorun */



/* end autorun ***/
/*** begin quickstart */



/* end quickstart ***/
/*** begin themes */

$("div#preferences div#themes input[type='checkbox']#taskbar_transparency").click(function () {
	if ($("div#taskbar").hasClass("transparent8")) {
		$("div#taskbar").removeClass("transparent8");
	} else {
		$("div#taskbar").addClass("transparent8");
	}
});

$("div#preferences div#themes input[type='checkbox']#change_title").click(function () {
	if ($("div#preferences input[type='checkbox']#change_title").is(":checked")) {
		var reps = 0;

		function rotateTitle() {
			rotateTitle.flag = !rotateTitle.flag;

			if (rotateTitle.flag) {
				document.title = "Notification";
			} else {
				document.title = dConfig.settings.title;
			}
		
			reps++;
			
			if (reps == 10) {
				$("div#preferences div#themes input[type='checkbox']#change_title").attr("checked", false);
				clearInterval(titleInt);
				document.title = dConfig.settings.title;
			}
		}

		titleInt = setInterval(rotateTitle, 1800);
	} else {
		clearInterval(titleInt);
		document.title = dConfig.settings.title;
	}
});

if ($("div#preferences div#themes input[type='checkbox']#change_title").is(":checked")) {
	var reps = 0;

	function rotateTitle() {
		rotateTitle.flag = !rotateTitle.flag;

		if (rotateTitle.flag) {
			document.title = "Notification";
		} else {
			document.title = dConfig.settings.title;
		}

		reps++;

		if (reps == 10) {
			$("div#preferences div#themes input[type='checkbox']#change_title").attr("checked", false);
			clearInterval(titleInt);
			document.title = dConfig.settings.title;
		}
	}

	titleInt = setInterval(rotateTitle, 1800);
} else {
	clearInterval(titleInt);
	document.title = dConfig.settings.title;
}

/* end themes ***/
/*** begin wallpaper */

$("div#preferences div#wallpaper").click(function(e) {
	var thumbclick = new div_selection(e, 4);

	if (thumbclick.target_class() == "thumbnail") {
		$.ajax({
			url: 'load.php',
			data: 'id=update_hns_desktop&action=wallpaper_file&data=' + thumbclick.target_id(),
			type: 'get',
			success: function () {
				$("html").css('background-image','url("i/wallpapers/' + thumbclick.target_id() + '")');
                        }
		});
	}
});

/* end wallpaper ***/
/* end preferences **/
/** begin flash_name */

// $("div#flash_name div.content div.body").load("flash_name.php");
//$("div#flash_name div.content div.body").get("http://www.facebook.com");
/*
$.get("http://www.facebook.com", function(data) {
alert(data);
	$("div#flash_name div.content div.body").html(data);
});
*/
/* end flash_name **/
/** begin notepad */

$("div#notepad div.panel-header div.tools div.save").click(function() {
	alert("save");
});

/*
$("div#notepad textarea").keyup(function(event) {
	//$(this).keyup(function(event) {
		$.ajax({
			url: 'load.php',
			data: 'id=update_hns_desktop&action=notepad&data=' + $("div#notepad textarea").val(),
			type: 'get'
		});
	//});
});
*/
/*
$("div#notepad textarea").live('focus', function(event) {
	//$(this).keyup(function(event) {
		$.ajax({
			url: 'load.php',
			data: 'id=update_hns_desktop&action=notepad&data=' + $("div#notepad textarea").val(),
			type: 'get'
		});
	//});
});
*/
/* end notepad **/
/** begin piano */

var piano_dir = "flash/piano/";
var instruments = ['piano','organ','saxophone','flute','panpipes','guitar','steeldrums','doublebass'];
var piano_swf = function(instrument) {
	return [
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/', instrument, '.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/', instrument, '.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>'
	].join('');
}

var piano_allswf = function() {
	return [
	'<table id="all">',
	'<tr>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/piano.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/piano.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/organ.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/organ.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/saxophone.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/saxophone.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'</tr>',
	'<tr>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/flute.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/flute.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'<td>',
	'</td>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/panpipes.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/panpipes.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'</tr>',
	'<tr>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/guitar.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/guitar.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/steeldrums.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/steeldrums.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'<td>',
	'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" class="pianoswf">',
	'<param name="movie" value="flash/piano/doublebass.swf">',
	'<param name="quality" value="high">',
	'<embed type="application/x-shockwave-flash" src="flash/piano/doublebass.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>',
	'</object>',
	'</td>',
	'</tr>',
	'</table>'
	].join('');
}

$("div#piano div.buttons a#piano").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("piano"));
});

$("div#piano div.buttons a#organ").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("organ"));
});

$("div#piano div.buttons a#saxophone").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("saxophone"));
});

$("div#piano div.buttons a#flute").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("flute"));
});

$("div#piano div.buttons a#panpipes").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("panpipes"));
});

$("div#piano div.buttons a#strings").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("strings"));
});

$("div#piano div.buttons a#guitar").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("guitar"));
});

$("div#piano div.buttons a#steeldrums").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("steeldrums"));
});

$("div#piano div.buttons a#doublebass").click(function() {
	$("div#piano div#pianoswf").html(piano_swf("doublebass"));
});

$("div#piano div.buttons a#all").click(function() {
	$("div#piano div#pianoswf").html(piano_allswf());
	$("div#piano div.tools div.maximize").click();
});

/* end piano **/
/** begin tic_tac_toe */

$.ajax({
url: 'load.php',
data: 'id=tic_tac_toe',
type: 'get',
success: function (data) {

$("div.tic_tac_toe").html(data);

var ctx = document.getElementsByTagName('canvas')[0].getContext("2d");
var grid = [];
var debug = "none";
var spintimes = 0;
var canclick = false;

function spin() {
	document.getElementById("grid").style.webkitTransform = "rotateY(-" + ((++spintimes) * 360) + "deg)";
	document.getElementById("grid").style.mozTransform = "rotateY(-" + (spintimes * 360) + "deg)";
	document.getElementById("grid").style.oTransform = "rotateY(-" + (spintimes * 360) + "deg)";
	document.getElementById("grid").style.transform = "rotateY(-" + (spintimes * 360) + "deg)";
}

var filled = 0;
var ai = true;
var gameover = false;
var lastgame = "";

function ai_fill(n) {
	var counter = 0;

	for (x = 0; x < 3; x++) {
		counter = 0;
		counter += (1 * (grid[0][x].innerHTML == "X"));
		counter += (1 * (grid[1][x].innerHTML == "X"));
		counter += (1 * (grid[2][x].innerHTML == "X"));

		if (counter == n) {
			if (click(x,0)) { return true }
			if (click(x,1)) { return true }
			if (click(x,2)) { return true }
		}
	}

	for (y = 0; y < 3; y++) {
		counter = 0;
		counter += (1 * (grid[y][0].innerHTML == "X"));
		counter += (1 * (grid[y][1].innerHTML == "X"));
		counter += (1 * (grid[y][2].innerHTML == "X"));

		if (counter == n) {
			if (click(0,y)) { return true }
			if (click(1,y)) { return true }
			if (click(2,y)) { return true }
		}
	}

	counter = 0;
	counter += (1 * (grid[0][0].innerHTML == "X"));
	counter += (1 * (grid[1][1].innerHTML == "X"));
	counter += (1 * (grid[2][2].innerHTML == "X"));

	if (counter == n) {
		if (click(0,0)) { return true }
		if (click(1,1)) { return true }
		if (click(2,2)) { return true }
	}

	counter = 0;
	counter += (1 * (grid[0][2].innerHTML == "X"));
	counter += (1 * (grid[1][1].innerHTML == "X"));
	counter += (1 * (grid[2][0].innerHTML == "X"));

	if (counter == n) {
		if (click(2,0)) { return true }
		if (click(1,1)) { return true }
		if (click(0,2)) { return true }
	}

	// check for potential losing positions
	for (x = 0; x < 3; x++) {
		counter = 0;
		counter += (1 * (grid[0][x].innerHTML == "O"));
		counter += (1 * (grid[1][x].innerHTML == "O"));
		counter += (1 * (grid[2][x].innerHTML == "O"));

		if (counter == n) {
			if (click(x,0)) { return true }
			if (click(x,1)) { return true }
			if (click(x,2)) { return true }
		}
	}
	
	for(y = 0; y < 3; y++) {
		counter = 0;
		counter += (1 * (grid[y][0].innerHTML == "O"));
		counter += (1 * (grid[y][1].innerHTML == "O"));
		counter += (1 * (grid[y][2].innerHTML == "O"));

		if (counter == n) {
			if (click(0,y)) { return true }
			if (click(1,y)) { return true }
			if (click(2,y)) { return true }
		}
	}
	
	counter = 0;
	counter += (1 * (grid[0][0].innerHTML == "O"));
	counter += (1 * (grid[1][1].innerHTML == "O"));
	counter += (1 * (grid[2][2].innerHTML == "O"));

	if (counter == n) {
		if (click(0,0)) { return true }
		if (click(1,1)) { return true }
		if (click(2,2)) { return true }
	}

	counter = 0;
	counter += (1 * (grid[0][2].innerHTML == "O"));
	counter += (1 * (grid[1][1].innerHTML == "O"));
	counter += (1 * (grid[2][0].innerHTML == "O"));

	if (counter == n) {
		if (click(2,0)) { return true }
		if (click(1,1)) { return true }
		if (click(0,2)) { return true }
	}
	
	return false;
}

function ai_fillm(n) {
	var counter = 0;

	for (x = 0; x < 3; x++) {
		counter = 1;
		counter *= (1 * (grid[0][x].innerHTML != "O"));
		counter *= (1 * (grid[1][x].innerHTML != "O"));
		counter *= (1 * (grid[2][x].innerHTML != "O"));
		
		if (counter) {
			if (click(x,0)) { return true }
			if (click(x,1)) { return true }
			if (click(x,2)) { return true }
		}
	}

	for (y = 0; y < 3; y++) {
		counter = 1;
		counter *= (1 * (grid[y][0].innerHTML != "O"));
		counter *= (1 * (grid[y][1].innerHTML != "O"));
		counter *= (1 * (grid[y][2].innerHTML != "O"));

		if (counter) {
			if (click(0,y)) { return true }
			if (click(1,y)) { return true }
			if (click(2,y)) { return true }
		}
	}

	counter = 1;
	counter *= (1 * (grid[0][0].innerHTML != "O"));
	counter *= (1 * (grid[1][1].innerHTML != "O"));
	counter *= (1 * (grid[2][2].innerHTML != "O"));

	if (counter) {
		if (click(0,0)) { return true }
		if (click(1,1)) { return true }
		if (click(2,2)) { return true }
	}

	counter = 1;
	counter *= (1 * (grid[0][2].innerHTML != "O"));
	counter *= (1 * (grid[1][1].innerHTML != "O"));
	counter *= (1 * (grid[2][0].innerHTML != "O"));

	if (counter) {
		if (click(2,0)) { return true }
		if (click(1,1)) { return true }
		if (click(0,2)) { return true }
	}

	return false;
}

var currentgame = "";

function ai_go() { // check for any winning positions
	think(1);
	if (click(1,1)) { return }
	think(1);
	if (ai_fill(2)) { return true }
	think(5);
	if (ai_fillm(1)) { return true }
	// need to fork
	think(9);
	
	if (grid[0][0].innerHTML == "O") { if (click(2,2)) { return true }}
	think(1);
	if (grid[0][2].innerHTML == "O") { if (click(0,2)) { return true }}
	think(1);
	if (grid[2][0].innerHTML == "O") { if (click(2,0)) { return true }}
	think(1);
	if (grid[2][2].innerHTML == "O") { if (click(0,0)) { return true }}
	think(1);

	if (click(0,0)) { return true }
	if (click(2,0)) { return true }
	if (click(0,2)) { return true }
	if (click(2,2)) { return true }
	think(4);
	if (click(1,0)) { return true }
	if (click(2,1)) { return true }
	if (click(1,2)) { return true }
	think(9);
	if (click(0,1)) { return true }
}

function win(cha,type,index) {
	if (cha != "") {
		ctx.lineWidth = 20;
		ctx.strokeStyle = "red";
		ctx.beginPath();

		if (type == 0) {
			ctx.moveTo(80 + 167 * index,20);
			ctx.lineTo(80 + 167 * index,481);
		} else if (type == 1) {
			ctx.moveTo(20,80 + 167 * index);
			ctx.lineTo(481,80 + 167 * index);
		} else if (type == 2) {
			if (index == 0) {
				ctx.moveTo(20,20);
				ctx.lineTo(481,481);
			} else {
				ctx.moveTo(20,481);
				ctx.lineTo(481,20);
			}
		}

		if (cha == "O") {
			if (currentgame == lastgame) {
				alert("It's not my fault I can't learn - This game doesn't count.");
			} else {
				winc(1);
				lastgame = currentgame;
			}
		} else if (cha == "X") {
			losec(1);
		}
		
		ctx.stroke();
               
		gameover = true;
		return true;
	}

	return false;
}

function checkwin() {
	var x, y;

	for (x = 0; x < 3; x++) {
		if ((grid[0][x].innerHTML == grid[1][x].innerHTML) && (grid[1][x].innerHTML == grid[2][x].innerHTML)) {
			if (win(grid[0][x].innerHTML,0,x)) { return true }
		}
	}

	for (y = 0; y < 3; y++) {
		if ((grid[y][0].innerHTML == grid[y][1].innerHTML) && (grid[y][1].innerHTML == grid[y][2].innerHTML)) {
			if (win(grid[y][0].innerHTML,1,y)) { return true }
		}
	}

	if ((grid[0][0].innerHTML == grid[1][1].innerHTML) && (grid[1][1].innerHTML == grid[2][2].innerHTML)) {
		if (win(grid[0][0].innerHTML,2,0)) { return true }
	}

	if ((grid[0][2].innerHTML == grid[1][1].innerHTML) && (grid[1][1].innerHTML == grid[2][0].innerHTML)) {
		if (win(grid[0][2].innerHTML,2,1)) { return true }
	}

	return false;
}

function absclick(x,y) {
	click(Math.floor(x / 167),Math.floor(y / 167));
}

function ob(t) {
	if (t == "") {
		return "-";
	}

	return t;
}

function click(x,y) {
	if (!canclick) {
		return false;
	}

	if (gameover) {
		newgame();

		return true;
	}

	if (grid[y][x].innerHTML == "") {
		grid[y][x].innerHTML = turn ? "X" : "O";
		currentgame += "\n\n" + ob(grid[0][0].innerHTML) + ob(grid[0][1].innerHTML) + ob(grid[0][2].innerHTML);
		currentgame += "\n" + ob(grid[1][0].innerHTML) + ob(grid[1][1].innerHTML) + ob(grid[1][2].innerHTML);
		currentgame += "\n" + ob(grid[2][0].innerHTML) + ob(grid[2][1].innerHTML) + ob(grid[2][2].innerHTML);
	
		grid[y][x].style.opacity = 1;
		filled++;
		checkwin();

		if (gameover) { return true }

		turn = !turn;
		
		if (filled == 9) {
			gameover = true;

			return true;
		}
		
		if (turn && ai) {
			ai_go();
		}
		
		return true;
	}

	return false;
}

function lsinc(keyn) {
	if (window.localStorage) {
		if (localStorage.getItem(keyn)) {
			localStorage.setItem(keyn, (parseInt(localStorage.getItem(keyn)) + 1));
		} else {
			localStorage.setItem(keyn, 1);
		}
	}
}

function think(x) {
	document.getElementById("think").innerHTML = parseInt(document.getElementById("think").innerHTML) + x;
}

function winc(x) {
	document.getElementById("win").innerHTML = parseInt(document.getElementById("win").innerHTML) + x;
	lsinc("win");
}

function losec(x) {
	document.getElementById("lose").innerHTML = parseInt(document.getElementById("lose").innerHTML) + x;
	lsinc("lost");
}

function g(x) {
	return document.getElementById(x);
}

document.body.onselectstart = function () { return false; }
document.body.onmousedown = function () { return false; }

var turn = 0;

grid.push([g("g1"),g("g2"),g("g3")]);
grid.push([g("g4"),g("g5"),g("g6")]);
grid.push([g("g7"),g("g8"),g("g9")]);

function cleargrid() {
	var x,y;

	for (x = 0; x < 3; x++) {
		for (y = 0; y < 3; y++) {
			grid[x][y].innerHTML = "";
		}
	}

	canclick = true;
}

function newgame() {
	currentgame = "";
	gameover = false;
	ctx.clearRect(0,0,501,501);
	filled = turn = 0;
	var x,y;
	canclick = false;

	for (x = 0; x < 3; x++) {
		for (y = 0; y < 3; y++) {
			grid[y][x].style.opacity = 0;
		}
	}

	setTimeout(cleargrid, 900);
	spin();
}

newgame();

if (window.localStorage) {
	var wincc = localStorage.getItem("win");
	var losecc = localStorage.getItem("lost");

	if (wincc) {
		document.getElementById("win").innerHTML = wincc;
	}

	if (losecc) {
		document.getElementById("lose").innerHTML = losecc;
	}
}

$("canvas").mousedown(function() {
	if (event.layerX) {
		absclick(event.layerX,event.layerY);
	} else {
		absclick(event.x,event.y);
	}
});

}
});

/* end tic_tac_toe **/
/** begin friends */



/* end friends **/
/** begin radio */

goomPartnerId = "FriendsOrEnemies-EMBED";
goomWidth = 215;
goomHeight = 215;
goomAutoPlay = 1;
goomDefaultVolume = 3;
goomBuySong = 1;
goomDefaultRadio = 2716945;
goomBgColor = "0xffffff";
goomPlayerColor = "0x000000";
goomBgXPos = 0;
goomBgYPos = 0;
goomMyLogoURL = "http://www.goommarketing.com/partnerplayers/foeradiobg.jpg";
goomPopUpMode = 0;
goomKnobType = "partner";

(function() {
if (!window.goomPartnerId) {
	return;
}

var env = window.goomEnv == "" || !window.goomEnv ? "" : window.goomEnv + ".";
var baseURL = 'http://slam.' + env + 'goomradio.com/?partnerId=' + encodeURI(window.goomPartnerId);
var queryStr = [];

// skin
if (window.goomBgColor) {
	queryStr.push('&bgColor=' + encodeURI(window.goomBgColor));
}

if (window.goomBgURL) {
	queryStr.push('&bgURL=' + encodeURI(window.goomBgURL));
}

if (window.goomBgXPos) {
	queryStr.push('&bgXPos=' + encodeURI(window.goomBgXPos));
}

if (window.goomBgYPos) {
	queryStr.push('&bgYPos=' + encodeURI(window.goomBgYPos));
}

if (window.goomPlayerColor) {
	queryStr.push('&playerColor=' + encodeURI(window.goomPlayerColor));
}

if (window.goomMyLogoURL) {
	queryStr.push('&myLogoURL=' + encodeURI(window.goomMyLogoURL));
}

if (window.goomMyLogoLinkURL) {
	queryStr.push('&myLogoLinkURL=' + encodeURI(window.goomMyLogoLinkURL));
}

if (window.goomCoverButtonURL) {
	queryStr.push('&coverButtonURL=' + encodeURI(window.goomCoverButtonURL));
}

// global settings
if (window.goomDefaultRadio) {
	queryStr.push('&defaultRadio=' + encodeURI(window.goomDefaultRadio));
} else if (window.goomLocalRadioId && window.goomDomain) {
	queryStr.push('&defaultRadio=' + A2ItoGoom(encodeURI(window.goomLocalRadioId), encodeURI(window.goomDomain), 1));
}

if (window.goomMountPolicy) {
	queryStr.push('&mountPolicy=' + encodeURI(window.goomMountPolicy));
}

if (window.goomAutoPlay) {
	queryStr.push('&autoPlay=' + encodeURI(window.goomAutoPlay));
}

if (window.goomPopUpMode) {
	queryStr.push('&popupMode=' + encodeURI(window.goomPopUpMode));
}

if (window.goomKnobType) {
	queryStr.push('&knobType=' + encodeURI(window.goomKnobType));
} else {
	queryStr.push('&knobType=partner');
}

if (window.goomDefaultVolume) {
	queryStr.push('&defaultVolume=' + encodeURI(window.goomDefaultVolume));
}

if (window.goomCachedMute) {
	queryStr.push('&cachedMute=' + encodeURI(window.goomCachedMute));
}

if (window.goomCustomUI) {
	queryStr.push('&customUI=' + encodeURI(window.goomCustomUI));
}

if (window.goomBuySong) {
	queryStr.push('&buySong=' + encodeURI(window.goomBuySong));
}

if (window.goomShuffleMode) {
	queryStr.push('&shuffleMode=' + encodeURI(window.goomShuffleMode));
}

if (window.goomActiveZoneURL) {
	queryStr.push('&activeZoneURL=' + encodeURI(window.goomActiveZoneURL));
}

// height / width
var sizeArr = [300, 300];

if (window.goomHeight) {
	queryStr.push('&height=' + encodeURI(window.goomHeight));
	sizeArr[0] = parseInt(window.goomHeight, 10);
}

if (window.goomWidth) {
	queryStr.push('&width=' + encodeURI(window.goomWidth));
	sizeArr[1] = parseInt(window.goomWidth, 10);
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');

	for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}

	return null;
}

function A2ItoGoom(radioId, domainId, originId) {
	return (radioId * Math.pow(2, 8)) + (domainId * Math.pow(2, 4)) + originId;
}

if (!window.goomPopUp) {
	if (in_array('music', dConfig.launchers.autorun)) {
		$("div#radio div#goom").html('<iframe frameborder="0" scrolling="no" style="height: '+ sizeArr[0] +'px; width: '+sizeArr[1]+'px;" src="'+ baseURL + queryStr.join('') +'"></iframe>');
	} else {
		$("div#startmenu li.radio").live('click', function() {
			$("div#radio div#goom").html('<iframe frameborder="0" scrolling="no" style="height: '+ sizeArr[0] +'px; width: '+sizeArr[1]+'px;" src="'+ baseURL + queryStr.join('') +'"></iframe>');
		});
		
		$("div#radio div.tools div.close").click(function() {
			$("div#radio div#goom").empty();
		});
	}
} else {
	if (!readCookie('__goompopplayer')) {
		var winPop = document.open(queryStr.join(''),'goomPopup', 'width=' +  (sizeArr[1] + 10) + ', height=' +  (sizeArr[0] + 10));

		if (winPop) {
			var date = new Date();
			date.setTime(date.getTime() + (15 * 60 * 1000));
			document.cookie = '__goompopplayer'+'=goom; expires=' + date.toGMTString() +'; path=/';

			if (window.focus) {
				winPop.focus()
			}
		}
	}
}
})();

/* end radio **/
/** begin search */



/* end search **/
/** begin chat */



/* end chat **/
/** begin music */

$("div#music div.tools div.close").click(function() {
	document.getElementById("musicplayer").pause();
});

/* end music **/
/* end app functions */
<?php
}
?>

});

/* begin dragresize functions */

if (typeof addEvent != 'function') {
	var addEvent = function(o,t,f,l) {
	var d = 'addEventListener', n = 'on' + t, rO = o, rT = t, rF = f, rL = l;

	if (o[d] && !l) return o[d](t,f,false);
	if (!o._evts) o._evts = {};
	if (!o._evts[t]) {
		o._evts[t] = o[n] ? {b:o[n]} : {};
		o[n] = new Function('e','var r = true, o = this, a = o._evts["' + t + '"], i; for (i in a) { o._f = a[i]; r = o._f(e || window.event) != false && r; o._f = null } return r;');

		if (t != 'unload') addEvent(window,'unload',function() {
			removeEvent(rO,rT,rF,rL);
		})
	}

	if (!f._i) f._i = addEvent._i++;
		o._evts[t][f._i] = f;
	};

	addEvent._i = 1;

	var removeEvent = function(o,t,f,l) {
		var d = 'removeEventListener';

		if (o[d] && !l) return o[d](t,f,false);
		if (o._evts && o._evts[t] && f._i) delete o._evts[t][f._i];
	}
}

function cancelEvent(e,c) {
	e.returnValue = false;

	if (e.preventDefault) e.preventDefault();
	if (c) {
		e.cancelBubble = true;

		if (e.stopPropagation) e.stopPropagation();
	}
};

function DragResize(myName,config) {
	var props = {
		myName:myName,
		enabled:true,
		handles:['tl','tm','tr','ml','mr','bl','bm','br'],
		isElement:null,
		isHandle:null,
		element:null,
		handle:null,
		minWidth:10,
		minHeight:10,
		minLeft:0,
		maxLeft:9999,
		minTop:0,
		maxTop:9999,
		zIndex:1,	
		mouseX:0,
		mouseY:0,
		lastMouseX:0,
		lastMouseY:0,
		mOffX:0,
		mOffY:0,
		elmX:0,
		elmY:0,	
		elmW:0,
		elmH:0,
		allowBlur:true,
		ondragfocus:null,
		ondragstart:null,
		ondragmove:null,
		ondragend:null,
		ondragblur:null
	};	

	for (var p in props) this[p] = (typeof config[p] == 'undefined') ? props[p] : config[p];
};

DragResize.prototype.apply = function(node) {
	var obj = this;

	addEvent(node,'mousedown',function(e) { obj.mouseDown(e); });
	addEvent(node,'mousemove',function(e) { obj.mouseMove(e); });
	addEvent(node,'mouseup',function(e) { obj.mouseUp(e); })
};

DragResize.prototype.select = function(newElement) {
	with(this) {
		if (!document.getElementById || !enabled) return;

		if (newElement && (newElement != element) && enabled) {
			element = newElement;
			// element.style.zIndex = ++zIndex;
			var zmax = 0, cur = 0;

			$("div.application").each(function() {
				cur = parseInt($(this).css('z-index'));
				zmax = (cur > zmax) ? cur : zmax;
			});

			$(element).css('z-index', ++zmax);

			if (this.resizeHandleSet) this.resizeHandleSet(element,true);

			elmX = parseInt(element.style.left);
			elmY = parseInt(element.style.top);
			elmW = element.offsetWidth;
			elmH = element.offsetHeight;

			if (ondragfocus) this.ondragfocus();
		}
	}
};

DragResize.prototype.deselect = function(delHandles) {
	with(this) {
		if (!document.getElementById || !enabled) return;
		if (delHandles) {
			if (ondragblur) this.ondragblur();
			if (this.resizeHandleSet) this.resizeHandleSet(element,false);
			element = null;
		}

		handle = null;
		mOffX = 0;
		mOffY = 0;
	}
};

DragResize.prototype.mouseDown = function(e) {
	with(this) {
		if (!document.getElementById || !enabled) return true;
		var elm = e.target || e.srcElement, newElement = null, newHandle = null, hRE = new RegExp(myName + '-([trmbl]{2})','');
		
		while(elm) {
			if (elm.className) {
				if (!newHandle && (hRE.test(elm.className) || isHandle(elm))) newHandle = elm;
				if (isElement(elm)) {
					newElement = elm;
					break;
				}
			}

			elm = elm.parentNode;
		}

		if (element && (element != newElement) && allowBlur) deselect(true);
		if (newElement && (!element || (newElement == element))) {
			if (newHandle) cancelEvent(e);
			select(newElement,newHandle);
			handle = newHandle;

			if (handle && ondragstart) this.ondragstart(hRE.test(handle.className));
		}
	}
};

DragResize.prototype.mouseMove = function(e) {
	with(this) {
		if (!document.getElementById || !enabled) return true;
		mouseX = e.pageX || (e.clientX + document.documentElement.scrollLeft);
		mouseY = e.pageY || (e.clientY + document.documentElement.scrollTop);
		var diffX = (mouseX - lastMouseX + mOffX);
		var diffY = (mouseY - lastMouseY + mOffY);
		mOffX = mOffY = 0;
		lastMouseX = mouseX;
		lastMouseY = mouseY;
		if (!handle) return true;
		var isResize = false;

		if (this.resizeHandleDrag && this.resizeHandleDrag(diffX,diffY)) {
			isResize = true;
		} else {
			var dX = diffX, dY = diffY;
			if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = minLeft - elmX));
			else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = (maxLeft - elmX - elmW)));
			if ((elmY + dY) < minTop) mOffY = (dY - (diffY = (minTop - elmY)));
			else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
			elmX += diffX;
			elmY += diffY;
		}

		with(element.style) {
			left = elmX + 'px';
			width = elmW + 'px';
			top = elmY + 'px';
			height = elmH + 'px';
		}

		var new_element = 'div#' + $(element).attr('id') + ' div.panel-bwrap';
		$(new_element).css('height', elmH - 30);

		// UPDATE dConfig VARS (x and y)

		if (window.opera && document.documentElement) {
			var oDF = document.getElementById('op-drag-fix');

			if (!oDF) {
				var oDF = document.createElement('input');
				oDF.id = 'op-drag-fix';
				oDF.style.display = 'none';
				document.body.appendChild(oDF);
			}

			oDF.focus();
		}

		if (ondragmove) this.ondragmove(isResize);
		cancelEvent(e);
	}
};

DragResize.prototype.mouseUp = function(e) {
	with(this) {
		if (!document.getElementById || !enabled) return;
		var hRE = new RegExp(myName + '-([trmbl]{2})','');
		if (handle && ondragend) this.ondragend(hRE.test(handle.className));
		deselect(false);
	}
};

DragResize.prototype.resizeHandleSet = function(elm,show) {
	with(this) {
		if (!elm._handle_tr) {
			for (var h = 0; h < handles.length; h++) {
				var hDiv = document.createElement('div');
				hDiv.className = myName + ' ' + myName + '-' + handles[h];
				elm['_handle_' + handles[h]] = elm.appendChild(hDiv);
			}
		}

		for (var h = 0; h < handles.length; h++) {
			elm['_handle_' + handles[h]].style.visibility = show ? 'inherit' : 'hidden';
		}
	}
};

DragResize.prototype.resizeHandleDrag = function(diffX,diffY) {
	with(this) {
		var hClass = handle && handle.className && handle.className.match(new RegExp(myName + '-([tmblr]{2})')) ? RegExp.$1 : '';
		var dY = diffY, dX = diffX, processed = false;

		if (hClass.indexOf('t') >= 0) {
			rs = 1;

			if ((elmH - dY) < minHeight) mOffY = (dY - (diffY = elmH - minHeight));
			else if ((elmY + dY) < minTop) mOffY = (dY - (diffY = minTop - elmY));
			elmY += diffY;
			elmH -= diffY;
			processed = true;
		}

		if (hClass.indexOf('b') >= 0) {
			rs = 1;

			if ((elmH + dY) < minHeight) mOffY = (dY - (diffY = (minHeight - elmH)));
			else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
			elmH += diffY;
			processed = true;
		}

		if (hClass.indexOf('l') >= 0) {
			rs = 1;

			if ((elmW - dX) < minWidth) mOffX = (dX - (diffX = (elmW - minWidth)));
			else if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = (minLeft - elmX)));
			elmX += diffX;
			elmW -= diffX;
			processed = true;
		}

		if (hClass.indexOf('r') >= 0) {
			rs = 1;

			if (elmW + dX < minWidth) mOffX = (dX - (diffX = minWidth - elmW));
			else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = maxLeft - elmX - elmW));
			elmW += diffX;
			processed = true;
		}

		$("div#" + $(element).attr('id') + " div.content").height(elmH - 32);
		$("div#" + $(element).attr('id') + " div.content").width(elmW - 16);

		// UPDATE dConfig VARS (h and w)
		
		if ($(element).attr('id') == "documents") {
			dConfig.user.apps.documents.h = elmH;
			dConfig.user.apps.documents.w = elmW;
		} else if ($(element).attr('id') == "wallpaper") {
			dConfig.user.apps.wallpaper.h = elmH;
			dConfig.user.apps.wallpaper.w = elmW;
		} else if ($(element).attr('id') == "preferences") {
			dConfig.user.apps.preferences.h = elmH;
			dConfig.user.apps.preferences.w = elmW;
		} else if ($(element).attr('id') == "notepad") {
			dConfig.user.apps.notepad.h = elmH;
			dConfig.user.apps.notepad.w = elmW;
		} else if ($(element).attr('id') == "flash_name") {
			bConfig.user.apps.flash_name[0] = elmH;
			bConfig.user.apps.flash_name[1]= elmW;
		} else if ($(element).attr('id') == "piano") {
			dConfig.user.apps.piano.h = elmH;
			dConfig.user.apps.piano.w = elmW;
		} else if ($(element).attr('id') == "about_hnsdesktop") {
			dConfig.user.apps.about_hnsdesktop.h = elmH;
			dConfig.user.apps.about_hnsdesktop.w = elmW;
		} else if ($(element).attr('id') == "feedback") {
			dConfig.user.apps.feedback.h = elmH;
			dConfig.user.apps.feedback.w = elmW;
		} else if ($(element).attr('id') == "tic_tac_toe") {
			dConfig.user.apps.tic_tac_toe.h = elmH;
			dConfig.user.apps.tic_tac_toe.w = elmW;
		} else if ($(element).attr('id') == "friends") {
			dConfig.user.apps.friends.h = elmH;
			dConfig.user.apps.friends.w = elmW;
		} else if ($(element).attr('id') == "radio") {
			dConfig.user.apps.radio.h = elmH;
			dConfig.user.apps.radio.w = elmW;
		} else if ($(element).attr('id') == "search") {
			dConfig.user.apps.search.h = elmH;
			dConfig.user.apps.search.w = elmW;
		} else if ($(element).attr('id') == "chat") {
			dConfig.user.apps.chat.h = elmH;
			dConfig.user.apps.chat.w = elmW;
		} else if ($(element).attr('id') == "music") {
			dConfig.user.apps.music.h = elmH;
			dConfig.user.apps.music.w = elmW;
		}

		//alert(dConfig.user.apps.flash_name.h);
		return processed;
	}
};

var dragresize = new DragResize('dragresize', { minWidth: 10, minHeight: 10, minLeft: 0, maxLeft: myWidth, minTop: 0, maxTop: <?php if ($_SESSION['logged'] == 1) { ?> (myHeight - (dConfig.taskbar.height + 2)) <?php } else { echo "myHeight"; } ?>});

dragresize.isElement = function(elm) {
	if (elm.className && elm.className.indexOf('drsElement') > -1) return true;
};

dragresize.isHandle = function(elm) {
	if (elm.className && elm.className.indexOf('drsMoveHandle') > -1) return true;
};

dragresize.ondragfocus = function() { };
dragresize.ondragstart = function(isResize) { };
dragresize.ondragmove = function(isResize) { };
dragresize.ondragend = function(isResize) { };
dragresize.ondragblur = function() { };

dragresize.apply(document);

/* end dragresize functions */
/* begin XHR */

var xmlhttp;

function loadData() {
	if ((xmlhttp.readyState == 4) || (xmlhttp.readyState == "complete")) {
		var obj = document.getElementById("");
		var responseData = xmlhttp.responseText;

		obj.innerHTML = responseData;
	}
}

function xhrLoad(id, action, data) {
	xmlhttp = GetXmlHttpObject();

	if (xmlhttp == null) {
		alert ("Your browser does not support XMLHTTP!");

		return;
	}

	var url = "load.php";
	url = url + "?id=" + id + "&action=" + action + "&data=" + data;

	xmlhttp.onreadystatechange = loadData;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}

function GetXmlHttpObject() {
	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
		return new XMLHttpRequest();
	}

	if (window.ActiveXObject) { // code for IE6, IE5
		return new ActiveXObject("Microsoft.XMLHTTP");
	}

	return null;
}

/* end XHR */