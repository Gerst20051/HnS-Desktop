<?php
$expires = 60;
header("Pragma: public");
header("Cache-Control: maxage=" . $expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
session_start();
header('Content-Type: application/x-javascript');
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Javascript  <<< ------------ */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    HnS Desktop
/* Site Creator: Andrew Gerst
/* Site Created: Wed, 24 Mar 2010 21:22:05 -0400
/* Last Updated: <?php echo date(r, filemtime('javascript.php')) . "\n"; ?>
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>/* Current User: <?php echo $_SESSION['fullname'] . "\n"; } ?>
/* ---------------------------------------------------- */
<?php include('compress.php'); ob_start('compressJS'); ?>
/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* Global Variables
/* jQuery Plugins
/* bDetect
/* Screen Dimensions
/* dC Variable Arrays
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
/* - Max Window
/* - Frames Killer
/* - Set Cookie
/* - Get Cookie
/* - Delete Cookie
/* Cookie Functions
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
/* Window Load Functions (Logged Out)
/* - Location Hashes
/* Drag Resize
/* ---------------------------------------------------- */

/* begin global variables */

var w=window,doc=document,de="documentElement",b="body",n=navigator,ua="userAgent",v="vendor",tn="getElementsByTagName",ce="createElement",sa="setAttribute",ls=localStorage;

/* end global variables */
/* begin jquery plugins */

$.fn.plugin_name = function(options) {
	var defaults = {
		option_name: "default_option_value"
	};

	var options = $.extend(defaults, options);

	return $(this).each(function() {

	});
};

$.fn.color = function(options) {
	var defaults = {
		color: "green"
	};

	var options = $.extend(defaults, options);

	return $(this).each(function() {
		$(this).css("background-color",options.color);
	});
};

$('.element').color({
	color: "red"
});

/*
 * jQuery Simple Templates plugin 1.1
 *
 * http://andrew.hedges.name/tmpl/
 * http://docs.jquery.com/Plugins/Tmpl
 *
 * Copyright (c) 2008 Andrew Hedges, andrew@hedges.name
 *
 * Usage: $.tmpl('<div class="#{classname}">#{content}</div>', { 'classname' : 'my-class', 'content' : 'My content.' });
 *
 * The changes for version 1.1 were inspired by the discussion at this thread:
 *   http://groups.google.com/group/jquery-ui/browse_thread/thread/45d0f5873dad0178/0f3c684499d89ff4
 * 
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

(function($) {
    $.extend({
    	// public interface: $.tmpl
    	tmpl : function(tmpl, vals) {
    		var rgxp, repr;
    		
			// default to doing no harm
			tmpl = tmpl   || '';
			vals = vals || {};
    		
    		// regular expression for matching our placeholders; e.g., #{my-cLaSs_name77}
    		rgxp = /#{([^{}]*)}/g;
    		
    		// function to making replacements
    		repr = function (str, match) {
				return typeof vals[match] === 'string' || typeof vals[match] === 'number' ? vals[match] : str;
			};
			
			return tmpl.replace(rgxp, repr);
		}
	});
})(jQuery);

$.fn.digits = function() {
	return this.each(function() { $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); });
}

$.fn.center = function() {
	var w = $(window);
	this.css("position","absolute");
	this.css("top",(w.height() - this.height()) / 2 + w.scrollTop() + "px");
	this.css("left",(w.width() - this.width()) / 2 + w.scrollLeft() + "px");
	return this;
}

$.fn.keepcenter = function() {
	var element = this;
	$(element).load(function() {
		$(window).bind("resize", function() { center(); });
		function center() {
			var oH = $(element).height();
			var oW = $(element).width();
			var wW = $(window).width();
			var wH = $(window).height();
			$(element).css({
				"position" : "absolute",
				"left" : (wW / 2) - (oW / 2),
				"top" : (wH /2) - (oH / 2)
			});
		}
	});
};

$.fn.toggleText = function(a,b) {
	return this.html(this.html().replace(new RegExp("(" + a + "|" + b + ")"), function(x) { return(x == a) ? b : a; }));
}

/* end jquery plugins */
/* begin browser detect */

var bDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
		this.network = this.dataNetwork();
		this.mobile = this.dataMobile(navigator.userAgent || navigator.vendor || window.opera);
	},
	searchString: function (data) {
		for (var i = 0; i < data.length; i++) {
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;

			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1) return data[i].identity;
			} else if (dataProp) return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
	},
	dataBrowser: [
		{ string: navigator.userAgent, subString: "Chrome", identity: "Chrome" },
		{ string: navigator.userAgent, subString: "OmniWeb", versionSearch: "OmniWeb/", identity: "OmniWeb" },
		{ string: navigator.vendor, subString: "Apple", identity: "Safari" /* versionSearch: "Version" */ },
		{ prop: window.opera, identity: "Opera" },
		{ string: navigator.vendor, subString: "iCab", identity: "iCab" },
		{ string: navigator.vendor, subString: "KDE", identity: "Konqueror" },
		{ string: navigator.userAgent, subString: "Firefox", identity: "Firefox" },
		{ string: navigator.vendor, subString: "Camino", identity: "Camino" },
		{ string: navigator.userAgent, subString: "Netscape",	identity: "Netscape" }, // for newer Netscapes (6+)
		{ string: navigator.userAgent, subString: "MSIE", identity: "Explorer", versionSearch: "MSIE" },
		{ string: navigator.userAgent, subString: "Gecko", identity: "Mozilla", versionSearch: "rv" },
		{ string: navigator.userAgent, subString: "Mozilla", identity: "Netscape", versionSearch: "Mozilla" } // for older Netscapes (4-)
	],
	dataOS: [
		{ string: navigator.platform, subString: "Win", identity: "Windows" },
		{ string: navigator.platform, subString: "Mac", identity: "Mac" },
		{ string: navigator.platform, subString: "Linux", identity: "Linux" },
		{ string: navigator.userAgent, subString: "iPhone", identity: "iPhone/iPod" }
	],
	dataNetwork: function() {
		return navigator.onLine ? true : false;
	},
	dataMobile: function(a) {
		return (/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) ? true : false;
	}
};

bDetect.init();

/*
navigator.language = en-US
navigator.systemLanguage = en-us
navigator.userLanguage = en-us
navigator.product = Gecko
navigator.mimeTypes = [object DOMMimeTypeArray]
navigator.appVersion = 5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.200 Safari/534.10
navigator.plugins = [object DOMPluginArray]
navigator.onLine = true
navigator.platform = Win32
navigator.vendor = Google Inc.
navigator.appCodeName = Mozilla
navigator.cookieEnabled = true
navigator.geolocation = [object Geolocation]
navigator.appName = Netscape
navigator.productSub = 20030107
navigator.userAgent = Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.200 Safari/534.10
navigator.vendorSub = 
navigator.javaEnabled = function javaEnabled() { [native code] }
navigator.getStorageUpdates = function getStorageUpdates() { [native code] }
*/

/* end browser detect */
/* begin screen dimensions */

var myHeight = 0, myWidth = 0;
if (typeof(window.innerWidth) == 'number') { myHeight = window.innerHeight; myWidth = window.innerWidth; }
else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) { myHeight = document.documentElement.clientHeight; myWidth = document.documentElement.clientWidth; }
else if (document.body && (document.body.clientWidth || document.body.clientHeight)) { myHeight = document.body.clientHeight; myWidth = document.body.clientWidth; }

/* end screen dimensions */
<?php
/* begin dC database query */
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("db.inc.php");

$query = 'SELECT * FROM hns_desktop u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = "' . mysql_real_escape_string($_SESSION['user_id'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);
}
}
/* end dC database query */
?>
/* begin desktop config variable arrays */
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>
var aC = {
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
"preferences":"<?php echo $app_preferences; ?>",
"notepad":"<?php echo $app_notepad; ?>",
"flash_name":"<?php echo $app_flash_name; ?>",
"ytinstant":"<?php echo $app_ytinstant; ?>",
"piano":"<?php echo $app_piano; ?>",
"about_hnsdesktop":"<?php echo $app_about_hnsdesktop; ?>",
"feedback":"<?php echo $app_feedback; ?>",
"tic_tac_toe":"<?php echo $app_tic_tac_toe; ?>",
"friends":"<?php echo $app_friends; ?>",
"goom_radio":"<?php echo $app_goom_radio; ?>",
"search":"<?php echo $app_search; ?>",
"chat":"<?php echo $app_chat; ?>",
"music":"<?php echo $app_music; ?>",
"web_browser":"<?php echo $app_web_browser; ?>",
"torus":"<?php echo $app_torus; ?>",
"calendar":"<?php echo $app_calendar; ?>",
"app_explorer":"<?php echo $app_explorer; ?>",
"calculator":"<?php echo $app_calendar; ?>",
"twitter":"<?php echo $app_twitter; ?>"
}
}
}

var bC = {
"user":{
"apps":{
"documents":aC.user.apps.documents.split(", "),
"preferences":aC.user.apps.preferences.split(", "),
"notepad":aC.user.apps.notepad.split(", "),
"flash_name":aC.user.apps.flash_name.split(", "),
"ytinstant":aC.user.apps.ytinstant.split(", "),
"piano":aC.user.apps.piano.split(", "),
"about_hnsdesktop":aC.user.apps.about_hnsdesktop.split(", "),
"feedback":aC.user.apps.feedback.split(", "),
"tic_tac_toe":aC.user.apps.tic_tac_toe.split(", "),
"friends":aC.user.apps.friends.split(", "),
"goom_radio":aC.user.apps.goom_radio.split(", "),
"search":aC.user.apps.search.split(", "),
"chat":aC.user.apps.chat.split(", "),
"music":aC.user.apps.music.split(", "),
"web_browser":aC.user.apps.web_browser.split(", "),
"torus":aC.user.apps.torus.split(", "),
"calendar":aC.user.apps.calendar.split(", "),
"app_explorer":aC.user.apps.app_explorer.split(", "),
"calculator":aC.user.apps.calculator.split(", "),
"twitter":aC.user.apps.twitter.split(", ")
}
}
}

<?php } ?>

var dC = {
"settings":{
"title":"Homenet Spaces OS | Welcome to HnS Desktop!",
"ip":"<?php echo $_SERVER['HTTP_HOST']; ?>",
"zindexint":10
},

"config":{
"browser":bDetect.browser,
"version":bDetect.version,
"OS":bDetect.OS,
"network":bDetect.network,
"mobile":bDetect.mobile,
"getID":document.getElementById ? true : false,
"docAll":document.all ? true : false,
"height":myHeight,
"width":myWidth,
"hash":[]
},
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>

"user":{
"logged":true,
"id":<?php echo $_SESSION['user_id']; ?>,
"username":"<?php echo $_SESSION['username']; ?>",
"access_level":<?php echo $_SESSION['access_level']; ?>,
"fullname":"<?php echo $_SESSION['fullname']; ?>",
"firstname":"<?php echo $_SESSION['firstname']; ?>",
"middlename":"<?php echo $_SESSION['middlename']; ?>",
"lastname":"<?php echo $_SESSION['lastname']; ?>",
"image":"<?php echo $row['default_image']; ?>",
"alarm":aC.user.alarm.split(", "),
"mouseX":0,
"mouseY":0,
"time_inactive":0,

"styles":{
"theme_id":<?php echo $row['theme_id']; ?>,
"bg_color":"<?php echo $row['bg_color']; ?>",
"wallpaper_file":"<?php echo $row['wallpaper_file']; ?>",
"wallpaper_position":"<?php echo $row['wallpaper_position']; ?>",
"wallpaper_repeat":"<?php echo $row['wallpaper_repeat']; ?>",
"font_color":"<?php echo $row['font_color']; ?>",
"transparency":<?php echo $row['transparency']; ?>,
"screensaver":<?php echo $row['screensaver']; ?>,
"screensaver_time":<?php echo $row['screensaver_time'] . "\n"; ?>
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
"autorun":aC.user.launchers.autorun.split(","),
"thumbs":aC.user.launchers.thumbs.split(","),
"startmenuapps":aC.user.launchers.startmenuapps.split(","),
"startmenutools":aC.user.launchers.startmenutools.split(","),
"quickstart":aC.user.launchers.quickstart.split(","),
"tray":aC.user.launchers.tray.split(",")
},

"apps":{
"documents":{"h":bC.user.apps.documents[0],"w":bC.user.apps.documents[1],"x":bC.user.apps.documents[2],"y":bC.user.apps.documents[3],"xPos":bC.user.apps.documents[4],"yPos":bC.user.apps.documents[5],"minimized":bC.user.apps.documents[6],"maximized":bC.user.apps.documents[7],"centered":bC.user.apps.documents[8],"opened":bC.user.apps.documents[9]},
"preferences":{"h":bC.user.apps.preferences[0],"w":bC.user.apps.preferences[1],"x":bC.user.apps.preferences[2],"y":bC.user.apps.preferences[3],"xPos":bC.user.apps.preferences[4],"yPos":bC.user.apps.preferences[5],"minimized":bC.user.apps.preferences[6],"maximized":bC.user.apps.preferences[7],"centered":bC.user.apps.preferences[8],"opened":bC.user.apps.preferences[9]},
"notepad":{"h":bC.user.apps.notepad[0],"w":bC.user.apps.notepad[1],"x":bC.user.apps.notepad[2],"y":bC.user.apps.notepad[3],"xPos":bC.user.apps.notepad[4],"yPos":bC.user.apps.notepad[5],"minimized":bC.user.apps.notepad[6],"maximized":bC.user.apps.notepad[7],"centered":bC.user.apps.notepad[8],"opened":bC.user.apps.notepad[9]},
"flash_name":{"h":bC.user.apps.flash_name[0],"w":bC.user.apps.flash_name[1],"x":bC.user.apps.flash_name[2],"y":bC.user.apps.flash_name[3],"xPos":bC.user.apps.flash_name[4],"yPos":bC.user.apps.flash_name[5],"minimized":bC.user.apps.flash_name[6],"maximized":bC.user.apps.flash_name[7],"centered":bC.user.apps.flash_name[8],"opened":bC.user.apps.flash_name[9]},
"ytinstant":{"h":bC.user.apps.ytinstant[0],"w":bC.user.apps.ytinstant[1],"x":bC.user.apps.ytinstant[2],"y":bC.user.apps.ytinstant[3],"xPos":bC.user.apps.ytinstant[4],"yPos":bC.user.apps.ytinstant[5],"minimized":bC.user.apps.ytinstant[6],"maximized":bC.user.apps.ytinstant[7],"centered":bC.user.apps.ytinstant[8],"opened":bC.user.apps.ytinstant[9],"vidThumbs":10,"playlist":"<?php echo $row['yt_playlist']; ?>","playlistBoxFocus":false,"songPlaylistsLoaded":false,"friendPlaylistsLoaded":false,"currentPlaylist":""},
"piano":{"h":bC.user.apps.piano[0],"w":bC.user.apps.piano[1],"x":bC.user.apps.piano[2],"y":bC.user.apps.piano[3],"xPos":bC.user.apps.piano[4],"yPos":bC.user.apps.piano[5],"minimized":bC.user.apps.piano[6],"maximized":bC.user.apps.piano[7],"centered":bC.user.apps.piano[8],"opened":bC.user.apps.piano[9]},
"about_hnsdesktop":{"h":bC.user.apps.about_hnsdesktop[0],"w":bC.user.apps.about_hnsdesktop[1],"x":bC.user.apps.about_hnsdesktop[2],"y":bC.user.apps.about_hnsdesktop[3],"xPos":bC.user.apps.about_hnsdesktop[4],"yPos":bC.user.apps.about_hnsdesktop[5],"minimized":bC.user.apps.about_hnsdesktop[6],"maximized":bC.user.apps.about_hnsdesktop[7],"centered":bC.user.apps.about_hnsdesktop[8],"opened":bC.user.apps.about_hnsdesktop[9]},
"feedback":{"h":bC.user.apps.feedback[0],"w":bC.user.apps.feedback[1],"x":bC.user.apps.feedback[2],"y":bC.user.apps.feedback[3],"xPos":bC.user.apps.feedback[4],"yPos":bC.user.apps.feedback[5],"minimized":bC.user.apps.feedback[6],"maximized":bC.user.apps.feedback[7],"centered":bC.user.apps.feedback[8],"opened":bC.user.apps.feedback[9]},
"tic_tac_toe":{"h":bC.user.apps.tic_tac_toe[0],"w":bC.user.apps.tic_tac_toe[1],"x":bC.user.apps.tic_tac_toe[2],"y":bC.user.apps.tic_tac_toe[3],"xPos":bC.user.apps.tic_tac_toe[4],"yPos":bC.user.apps.tic_tac_toe[5],"minimized":bC.user.apps.tic_tac_toe[6],"maximized":bC.user.apps.tic_tac_toe[7],"centered":bC.user.apps.tic_tac_toe[8],"opened":bC.user.apps.tic_tac_toe[9]},
"friends":{"h":bC.user.apps.friends[0],"w":bC.user.apps.friends[1],"x":bC.user.apps.friends[2],"y":bC.user.apps.friends[3],"xPos":bC.user.apps.friends[4],"yPos":bC.user.apps.friends[5],"minimized":bC.user.apps.friends[6],"maximized":bC.user.apps.friends[7],"centered":bC.user.apps.friends[8],"opened":bC.user.apps.friends[9]},
"goom_radio":{"h":bC.user.apps.goom_radio[0],"w":bC.user.apps.goom_radio[1],"x":bC.user.apps.goom_radio[2],"y":bC.user.apps.goom_radio[3],"xPos":bC.user.apps.goom_radio[4],"yPos":bC.user.apps.goom_radio[5],"minimized":bC.user.apps.goom_radio[6],"maximized":bC.user.apps.goom_radio[7],"centered":bC.user.apps.goom_radio[8],"opened":bC.user.apps.goom_radio[9]},
"search":{"h":bC.user.apps.search[0],"w":bC.user.apps.search[1],"x":bC.user.apps.search[2],"y":bC.user.apps.search[3],"xPos":bC.user.apps.search[4],"yPos":bC.user.apps.search[5],"minimized":bC.user.apps.search[6],"maximized":bC.user.apps.search[7],"centered":bC.user.apps.search[8],"opened":bC.user.apps.search[9]},
"chat":{"h":bC.user.apps.chat[0],"w":bC.user.apps.chat[1],"x":bC.user.apps.chat[2],"y":bC.user.apps.chat[3],"xPos":bC.user.apps.chat[4],"yPos":bC.user.apps.chat[5],"minimized":bC.user.apps.chat[6],"maximized":bC.user.apps.chat[7],"centered":bC.user.apps.chat[8],"opened":bC.user.apps.chat[9]},
"music":{"h":bC.user.apps.music[0],"w":bC.user.apps.music[1],"x":bC.user.apps.music[2],"y":bC.user.apps.music[3],"xPos":bC.user.apps.music[4],"yPos":bC.user.apps.music[5],"minimized":bC.user.apps.music[6],"maximized":bC.user.apps.music[7],"centered":bC.user.apps.music[8],"opened":bC.user.apps.music[9]},
"web_browser":{"h":bC.user.apps.web_browser[0],"w":bC.user.apps.web_browser[1],"x":bC.user.apps.web_browser[2],"y":bC.user.apps.web_browser[3],"xPos":bC.user.apps.web_browser[4],"yPos":bC.user.apps.web_browser[5],"minimized":bC.user.apps.web_browser[6],"maximized":bC.user.apps.web_browser[7],"centered":bC.user.apps.web_browser[8],"opened":bC.user.apps.web_browser[9]},
"torus":{"h":bC.user.apps.torus[0],"w":bC.user.apps.torus[1],"x":bC.user.apps.torus[2],"y":bC.user.apps.torus[3],"xPos":bC.user.apps.torus[4],"yPos":bC.user.apps.torus[5],"minimized":bC.user.apps.torus[6],"maximized":bC.user.apps.torus[7],"centered":bC.user.apps.torus[8],"opened":bC.user.apps.torus[9]},
"calendar":{"h":bC.user.apps.calendar[0],"w":bC.user.apps.calendar[1],"x":bC.user.apps.calendar[2],"y":bC.user.apps.calendar[3],"xPos":bC.user.apps.calendar[4],"yPos":bC.user.apps.calendar[5],"minimized":bC.user.apps.calendar[6],"maximized":bC.user.apps.calendar[7],"centered":bC.user.apps.calendar[8],"opened":bC.user.apps.calendar[9]},
"app_explorer":{"h":bC.user.apps.app_explorer[0],"w":bC.user.apps.app_explorer[1],"x":bC.user.apps.app_explorer[2],"y":bC.user.apps.app_explorer[3],"xPos":bC.user.apps.app_explorer[4],"yPos":bC.user.apps.app_explorer[5],"minimized":bC.user.apps.app_explorer[6],"maximized":bC.user.apps.app_explorer[7],"centered":bC.user.apps.app_explorer[8],"opened":bC.user.apps.app_explorer[9]},
"calculator":{"h":bC.user.apps.calculator[0],"w":bC.user.apps.calculator[1],"x":bC.user.apps.calculator[2],"y":bC.user.apps.calculator[3],"xPos":bC.user.apps.calculator[4],"yPos":bC.user.apps.calculator[5],"minimized":bC.user.apps.calculator[6],"maximized":bC.user.apps.calculator[7],"centered":bC.user.apps.calculator[8],"opened":bC.user.apps.calculator[9]},
"twitter":{"h":bC.user.apps.twitter[0],"w":bC.user.apps.twitter[1],"x":bC.user.apps.twitter[2],"y":bC.user.apps.twitter[3],"xPos":bC.user.apps.twitter[4],"yPos":bC.user.apps.twitter[5],"minimized":bC.user.apps.twitter[6],"maximized":bC.user.apps.twitter[7],"centered":bC.user.apps.twitter[8],"opened":bC.user.apps.twitter[9],"playlist":"<?php echo $row['twttr_playlist']; ?>", "tweetvalue":""}
}
},

"styles":{
"theme_id":1,
"theme_name":"default",
"bg_color":"fff",
"wallpaper_file":"vista.jpg",
"wallpaper_position":"center center",
"wallpaper_repeat":"no-repeat",
"font_color":"000",
"transparency":1,
"screensaver":1,
"screensaver_time":30
},
<?php } else { ?>

"user":{
"logged":false,
"mouseX":0,
"mouseY":0,
"time_inactive":0,

"styles":{
"theme_id":1,
"theme_name":"default",
"bg_color":"fff",
"wallpaper_file":"vista.jpg",
"wallpaper_position":"center center",
"wallpaper_repeat":"no-repeat",
"font_color":"000",
"transparency":1,
"screensaver":1,
"screensaver_time":30
}
},
<?php } ?>

"styles":{
"theme_id":1,
"theme_name":"default",
"bg_color":"fff",
"wallpaper_file":"vista.jpg",
"wallpaper_position":"center center",
"wallpaper_repeat":"no-repeat",
"font_color":"000",
"transparency":1,
"screensaver":1,
"screensaver_time":30
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
"height2":32,
"start_width":90,
"quickstart_width":82,
"quickstart_minwidth":30,
"quickstart_maxwidth":300,
"tray_width":110,
"tray_minwidth":100,
"tray_maxwidth":300,
"currentinfo_width":75
},

"launchers":{
"autorun":[],
"thumbs":["notepad","preferences","ytinstant","flash_name","piano","tic_tac_toe","friends","goom_radio","chat","music","web_browser","torus","calendar","calculator","twitter"],
"startmenuapps":["notepad","piano","tic_tac_toe","friends","goom_radio","chat","music","ytinstant","web_browser","torus","calendar","calculator","twitter"],
"startmenutools":["documents","preferences","search","app_explorer"],
"quickstart":["ytinstant","friends","goom_radio","chat","web_browser"],
"tray":["chat","calendar","preferences"]
},

"panels":{
"list":["login","register"],
"login":{
"tls":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
},
"register":{
"tls":[1,1,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
}
},

<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { // TOOLS = showtools, maintls, close, maximize, minimize, subtls, toggle, config, arrowright, arrowleft, pindown, pinleft, dblarrowright, dblarrowleft, dblarrowdown, dblarrowup, refresh, plus, minus, search, save, help, print ?>
"apps":{
"list":["documents","preferences","notepad","flash_name","ytinstant","piano","about_hnsdesktop","feedback","tic_tac_toe","friends","goom_radio","search","chat","music","web_browser","torus","calendar","app_explorer","calculator","twitter"],
"name":["Documents","Preferences","Notepad","Flash Name","YouTube Instant","Piano","About HnS Desktop","Send Feedback","Tic Tac Toe","Friends","Goom Radio","Search","Chat","Music","Web Browser","Torus","Calendar","App Explorer","Calculator","Twitter"],
"documents":{"h":402,"w":520,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"preferences":{"h":302,"w":400,"x":0,"y":0,"xPos":'r',"yPos":'b',"minimized":1,"maximized":0,"centered":0,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0]},
"notepad":{"h":200,"w":400,"x":0,"y":0,"xPos":'l',"yPos":'b',"minimized":1,"maximized":0,"centered":0,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0]},
"flash_name":{"h":270,"w":470,"x":215,"y":80,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":0,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"ytinstant":{"h":560,"w":1150,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,3,2,2,2,2,2,0,0,0,2,4,0,1,0,1,0]},
"piano":{"h":560,"w":1200,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"about_hnsdesktop":{"h":402,"w":520,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"feedback":{"h":402,"w":520,"x":0,"y":0,"xPos":'r',"yPos":'b',"minimized":1,"maximized":0,"centered":0,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"tic_tac_toe":{"h":599,"w":540,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"friends":{"h":599,"w":538,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"goom_radio":{"h":230,"w":230,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"search":{"h":599,"w":538,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"chat":{"h":550,"w":628,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"music":{"h":64,"w":316,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"web_browser":{"h":560,"w":1200,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"torus":{"h":599,"w":538,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"calendar":{"h":450,"w":580,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"app_explorer":{"h":450,"w":580,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},
"calculator":{"h":642,"w":708,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,3,0,0,0,0,0,0,0,0,0,0,0,0,0,4,0]},
"twitter":{"h":602,"w":808,"x":0,"y":0,"xPos":'l',"yPos":'t',"minimized":1,"maximized":0,"centered":1,"opened":0,"tls":[1,1,1,1,1,1,1,3,0,0,0,0,0,0,0,0,2,4,0,0,0,0,0]}
}
<?php } ?>
}

<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>
try {	for (a in dC.apps.list) eval('for (var i = 0; i < 10; i++) { if (dC.user.apps. + dC.apps.list[a] + [i] == undefined) { if (i == 4) dC.user.apps. + dC.apps.list[a] + [i] = "l"; else if (i == 5) dC.user.apps. + dC.apps.list[a] + [i] = "t"; else if (i == 6) dC.user.apps. + dC.apps.list[a] + [i] = "1"; else if (i == 8) dC.user.apps. + dC.apps.list[a] + [i] = "1"; else dC.user.apps. + dC.apps.list[a] + [i] = "0"; }}');
} catch(e) {}

<?php } ?>
/* end desktop config variable arrays */

if (dC.user.logged) {
	if (dC.user.styles.bg_color != "") $("html").css('background-color','#' + dC.user.styles.bg_color);
	if (dC.user.styles.wallpaper_file != "") $("html").css('background-image','url("i/wallpapers/' + dC.user.styles.wallpaper_file + '")');
	if (dC.user.styles.wallpaper_position != "") $("html").css('background-position', dC.user.styles.wallpaper_position);
	if (dC.user.styles.wallpaper_repeat != "") $("html").css('background-repeat', dC.user.styles.wallpaper_repeat);
	if (dC.user.styles.font_color != "") $("html").css('color','#' + dC.user.styles.font_color);
}

var blackout = document.createElement('div'); blackout.setAttribute('id','blackout');
var whiteout = document.createElement('div'); whiteout.setAttribute('id','whiteout');

/* begin misc functions */

function g(e) { return document.getElementById(e); }
function refreshCaptcha() { document.captchaimg.src += '?'; }
function isDefined(variable) { return (typeof(window[variable]) == "undefined") ? false : true; }
function getHash() { return decodeURIComponent(window.location.hash.substring(1)); }
function clearHash() { window.location.replace("#"); }
function setHash(hash) { window.location.replace("#" + encodeURI(hash)); }
function setAHash(hash, app) { window.location.replace("#" + app + "|" + encodeURI(hash)); }
function getTitle() { return document.title; }
function resetTitle() { document.title = dC.settings.title; }
function setTitle(title) { document.title = title; }
function removeChars(needle, string) {
	if (typeof needle == "string") return string.split(needle).join('');
	else { $.each(needle, function(index, value) { string = string.split(value).join(''); }); return string; }
}
function replaceAll(yourstring, from, to) {
	var idx = str.indexOf(from);
	while (idx > -1) { str = str.replace(from, to); idx = str.indexOf(from); }
	return str;
}

String.prototype.startsWith = function (str) { return (this.match("^" + str) == str) };
String.prototype.capitalize = function() { return this.replace(/(^|\s)([a-z])/g, function(m, p1, p2) { return p1 + p2.toUpperCase(); }); };
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g,''); };
String.prototype.ltrim = function() { return this.replace(/^\s+/,''); };
String.prototype.rtrim = function() { return this.replace(/\s+$/,''); };
String.prototype.whitespace = function() { return this.replace(/^\s*|\s*$/g,''); };
String.prototype.toTitleCase = function() {
	return this.replace(/([\w&`'‘’"“.@:\/\{\(\[<>_]+-? *)/g, function(match, p1, index, title) {
		if (index > 0 && title.charAt(index - 2) !== ":" && match.search(/^(a(nd?|s|t)?|b(ut|y)|en|for|i[fn]|o[fnr]|t(he|o)|vs?\.?|via)[ \-]/i) > -1)
			return match.toLowerCase();
		if (title.substring(index - 1, index + 1).search(/['"_{(\[]/) > -1)
			return match.charAt(0) + match.charAt(1).toUpperCase() + match.substr(2);
		if (match.substr(1).search(/[A-Z]+|&|[\w]+[._][\w]+/) > -1 || title.substring(index - 1, index + 1).search(/[\])}]/) > -1)
			return match;
		return match.charAt(0).toUpperCase() + match.substr(1);
	});
};

function replaceHtml(el, html) {
	var oldEl = typeof el === "string" ? document.getElementById(el) : el;
	/*@cc_on oldEl.innerHTML = html; return oldEl; @*/
	var newEl = oldEl.cloneNode(false);
	newEl.innerHTML = html;
	oldEl.parentNode.replaceChild(newEl, oldEl);
	return newEl;
}

function rotateTitle(title) {
	if (arguments.length == 1) {	var reps = 10, delay = 1800;	}
	else if (arguments.length == 2) { var reps = Math.abs(arguments[1]), delay = 1800; }
	else if (arguments.length == 3) { var reps = Math.abs(arguments[1]), delay = Math.abs(arguments[2]); }
	rotateTitle.flag = !rotateTitle.flag;
	if (isNaN(reps)) reps = 10; if (isNaN(delay)) delay = 1800;
	if (rotateTitle.flag) { setTitle(title); reps--; } else resetTitle();
	if (reps > -1) setTimeout('rotateTitle("' + title + '", ' + reps + ', ' + delay + ')', delay); else resetTitle();
}

function mt_rand(min, max) {
	var argc = arguments.length;
	if (argc === 0) { min = 0; max = 2147483647; }
	else if (argc === 1) throw new SyntaxError('Warning: mt_rand() expects exactly 2 parameters, 1 given');
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

function implode(glue, pieces) {
	var i = '', retVal = '', tGlue = '';
	if (arguments.length === 1) { pieces = glue; glue = ''; }
	if (typeof(pieces) === 'object') {
		if (pieces instanceof Array) return pieces.join(glue);
		else { for (i in pieces) { retVal += tGlue + pieces[i]; tGlue = glue; } return retVal; }
	} else return pieces;
}

function explode(delimiter, string, limit) { 
	var emptyArray = { 0 : '' };
	if (arguments.length < 2 || typeof arguments[0] == 'undefined' || typeof arguments[1] == 'undefined') return null;
	if (delimiter === '' || delimiter === false || delimiter === null) return false;
	if (typeof delimiter == 'function' || typeof delimiter == 'object' || typeof string == 'function' || typeof string == 'object') return emptyArray;
	if (delimiter === true) delimiter = '1';
	if (!limit) return string.toString().split(delimiter.toString());
	else {
		var splitted = string.toString().split(delimiter.toString());
		var partA = splitted.splice(0, (limit - 1));
		var partB = splitted.join(delimiter.toString());
		partA.push(partB);
		return partA;
	}
}

function array_map(callback) {
	var argc = arguments.length, argv = arguments;
	var j = argv[1].length, i = 0, k = 1, m = 0;
	var tmp = [], tmp_ar = [];
	while (i < j) {
		while (k < argc) { tmp[m++] = argv[k++][i]; }
		m = 0; k = 1;
		if (callback) {
			if (typeof callback === 'string') callback = this.window[callback];
			tmp_ar[i++] = callback.apply(null, tmp);
		} else tmp_ar[i++] = tmp;
		tmp = [];
	}
	return tmp_ar;
}

function ucfirst(str) {
    str += '';
    var f = str.charAt(0).toUpperCase();
    return f + str.substr(1);
}

function ucwords(str) {
	return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) { return $1.toUpperCase(); });
}

function ucname(string) {
	string = string.toLowerCase().capitalize();
	$(["-", "'", "Mc"]).each(function(i, delimiter) {
		if (string.indexOf(delimiter) !== false) string = implode(delimiter, array_map('ucfirst', explode(delimiter, string)));
	});
	return string;
}

function in_array(needle, haystack, argStrict) {
	var key = '', strict = !!argStrict;
	if (strict) {	for (key in haystack) { if (haystack[key] === needle) return true; }}
	else { for (key in haystack) { if (haystack[key] == needle) return true; }}
	return false;
}

function removeKey(arrayName, key) {
	var x, tmpArray = new Array();
	for (x in arrayName) { if (x != key) tmpArray[x] = arrayName[x]; }
	return tmpArray;
}

Array.prototype.remove = function(from, to) {
	var rest = this.slice(((to || from) + 1) || this.length);
	this.length = (from < 0) ? (this.length + from) : from;
	return this.push.apply(this, rest);
};

Array.prototype.kIndex = function(key) {
	for (i = 0; i < this.length; i++) { if (this[i].key == key) return i; }
	return -1;
};

Array.prototype.vIndex = function(value) {
	for (i = 0; i < this.length; i++) { if (this[i] == value) return i; }
	return -1;
};

Array.prototype.contains = function(obj) {
	for (var i = (this.length - 1); i >= 0; i--) { if (this[i] === obj) return true; }
	return false;
};

Number.prototype.toLength = function(n) {
	var str = this.toString();
	while (str.length < n) str = '0' + str;
	return str;
};

function str_split(string, slength) {
	if (slength === null) slength = 1;
	if (string === null || slength < 1) return false;
	string += '';
	var chunks = [], pos = 0, len = string.length;
	while (pos < len) chunks.push(string.slice(pos, pos += slength));
	return chunks;
}

function isplit(string, regexp, flags) {
	var splitter = "#@#";
	while (string.indexOf(splitter) != -1) { splitter += "#"; };
	flags = (flags && typeof(flags) == "string") ? flags : (!isNaN(parseFloat(flags))) ? "" : "g";
	string=string.replace(((typeof(regexp) == "string") ? new RegExp(regexp, flags) : regexp), splitter);
	return string.split(splitter);
}

function IsRightButtonClicked(e) {
	var rightclick = false;
	e = e || window.event;
	if (e.which) rightclick = (e.which == 3);
	else if (e.button) rightclick = (e.button == 2);
	return rightclick;
}

<?php /* Tab Index
var tabIndex = $("[tabindex]:last").attr("tabIndex");
var setTabIndex = function() {
	$(this).attr("tabindex", ++tabIndex);
}

$(".footer-nav a").each(setTabIndex);
$(".language-select a").each(setTabIndex);
*/ ?>
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
	if (dC.user.logged) {
		$("div#tray-currentinfo div#clock").html(mytime);
		$("div#tray-currentinfo div#date").html(mydate);
		$("div#tray-currentinfo").attr('title', myfulldate);
		if (dC.user.alarm != "") {
			var alarm = dC.user.alarm;
			var atype = alarm[0];
			var amsg = alarm[1];
			var atime = alarm[2];
			if (atype == 2) {
				var adate = alarm[3];
				if (mydate == adate) {
					if (mytime2 == atime) {
						alert(amsg);
						dC.user.alarm = "";
					}
				}
			} else {
				if (mytime2 == atime) {
					alert(amsg);
					dC.user.alarm = "";
				}
			}
		}
	}
	if (dC.styles.screensaver == 1) dC.user.time_inactive++;
}

function getdate() {
	if (document.all || document.getElementById) setInterval("getthedate()", 1000);
	else getthedate();
}

function two(x) { return ((x > 9) ? "" : "0") + x; }
function three(x) { return ((x > 99) ? "" : "0") + ((x > 9) ? "" : "0") + x; }
function gettime(s) {
	var m=Math.floor(s/60),h=Math.floor(m/60),d=Math.floor(h/60);
	if (d>0) t=d+":"+two(h%60)+":"+two(m%60)+":"+two(s%60);
	else if (h%60>0) t=(h%60)+":"+two(m%60)+":"+two(s%60);
	else t=(m%60)+":"+two(s%60);
	return t;
}
function gettimems(ms) {
	var sec = Math.floor(ms / 1000); ms = ms % 1000; t = three(ms);
	var min = Math.floor(sec / 60); sec = sec % 60; t = two(sec) + ":" + t;
	var hr = Math.floor(min / 60); min = min % 60; t = two(min) + ":" + t;
	var day = Math.floor(hr / 60); hr = hr % 60; t = two(hr) + ":" + t;
	t = day + ":" + t;
	return t;

/*
lSeconds = Seconds
lHrs = Int(lSeconds / 3600)
lMinutes = (Int(lSeconds / 60)) - (lHrs * 60)
lSeconds = Int(lSeconds Mod 60)

If lSeconds = 60 Then
    lMinutes = lMinutes + 1
    lSeconds = 0
End If

If lMinutes = 60 Then
    lMinutes = 0
    lHrs = lHrs + 1
End If
*/
}

function div_selection(e, eq) {
	this.e = e;
	this.eq = eq;
	if (this.e.target) this.event = this.e.target;
	else this.event = this.e.srcElement;
	if (this.event.nodeType == 3) this.event = this.event.parentNode;
	this.selection = $(this.event).parents().eq(this.eq).attr('id');
	this.target_class = function() { return $(this.event).attr('class'); }
	this.target_id = function() { return $(this.event).attr('id'); }
	this.target_html = function() { return $(this.event).html(); }
	this.target_content = function() { return $(this.event).attr('content'); }
	this.main = function() { return this.selection; }
	this.div_main = function() { return ['div#', this.selection].join(''); }
	this.div_pnl = function() { return ['div#', this.selection, ' div.pnl'].join(''); }
	this.div_pnltl = function() { return ['div#', this.selection, ' div.pnl-tl'].join(''); }
	this.div_pnl_bwrap = function() { return ['div#', this.selection, ' div.pnl-bwrap'].join(''); }
	this.div_pnl_tl = function() { return ['div#', this.selection, ' div.tl'].join(''); }
}

 function maxWindow() {
	window.moveTo(0, 0);
	if (document.all) top.window.resizeTo(screen.availWidth, screen.availHeight);
	else if (document.layers || document.getElementById) {
		if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
			top.window.outerHeight = screen.availHeight; top.window.outerWidth = screen.availWidth;
		}
	}
}

function noFrame() {
	var topURL = document.referrer;
	var urlChars = topURL.length;
	if (top.location != self.location) {
		if (topURL.indexOf("?") != "-1") {
			var query = topURL.slice((topURL.indexOf("?") + 1), urlChars);
			top.location = self.location + "#" + query;
		} else {
			var subURL = topURL.slice(7,10);
			if (subURL == "hns") {
				if (urlChars > 21) {
					var qchars = (urlChars - 21);
					var query = topURL.slice(21, urlChars);
					$.ajax({
						url: 'load.php',
						data: 'id=user_info&data=' + query,
						dataType: 'text',
						type: 'get',
						success: function (data) { if (!isNaN(data)) top.location = "http://" + dC.settings.ip + "/user_profile.php?id=" + data; }
					});
				}
			} else {
				if (urlChars > 25) {
					var qchars = (urlChars - 25);
					var query = topURL.slice(25, urlChars);
					$.ajax({
						url: 'load.php',
						data: 'id=user_info&data=' + query,
						dataType: 'text',
						type: 'get',
						success: function (data) { if (!isNaN(data)) top.location = "http://" + dC.settings.ip + "/user_profile.php?id=" + data; }
					});
				}
			}
			top.location = self.location;
		}
	}

<?php /*
unique sites conditional statement
38% if (top != self)
22.5% if (top.location != self.location)
13.5% if (top.location != location)
8% if (parent.frames.length > 0)
5.5% if (window != top)
5.5% if (window.top !== window.self)
2% if (window.self != window.top)
2% if (parent && parent != window)
2% if (parent && parent.frames && parent.frames.length>0)
2% if((self.parent&&!(self.parent===self))&&(self.parent.frames.length!=0)

unique sites counter-action
7 top.location = self.location
4 top.location.href = document.location.href
3 top.location.href = self.location.href
3 top.location.replace(self.location)
2 top.location.href = window.location.href
2 top.location.replace(document.location)
2 top.location.href = window.location.href
2 top.location.href = "URL"
2 document.write('')
2 top.location = location
2 top.location.replace(document.location)
2 top.location.replace('URL')
1 top.location.href = document.location
1 top.location.replace(window.location.href)
1 top.location.href = location.href
1 self.parent.location = document.location
1 parent.location.href = self.document.location
1 top.location.href = self.location
1 top.location = window.location
1 top.location.replace(window.location.pathname)
1 window.top.location = window.self.location
1 setTimeout(function(){document.body.innerHTML='';},1);
1 window.self.onload = function(evt){document.body.innerHTML='';}
1 var url = window.location.href; top.location.replace(url)
*/ ?>
}

function extractHost(url) {
	var returnArry = /^(?:[^:\/?#]+):\/\/([^\/?#]+)(?::\d+)?(?:[^?#]*)\//i.exec(url);
	if (returnArry && (typeof returnArry === "object")) return returnArry[1];
	else return "";
}

function bustFrame() {
	var blacklist = ['homenetspaces.tk','hnsdesktop.tk'];
	if (top.location != window.location) {
		var topURL = extractHost(document.referrer);
		if (topURL) {
			for (var i=0; i < blacklist.length; i++) {
				if (topURL.indexOf(blacklist[i]) != -1) {
					top.location.replace(window.location);
					return;
				}
			}
		}
	}
}

<?php /* Facebook Frame Breaker
if (top != self) {
	try {
		if (parent != top) {
			throw 1;
		}
	} catch (e) {
		setTimeout(function() {
			var fb_cj_img = new Image();
			fb_cj_img.src = "http:\/\/error.facebook.com\/common\/scribe_endpoint.php?c=si_clickjacking&m&t=";
		}, 5000);
		
		window.document.write("<style>body * { display:none !important; }<\/style><a href=\"#\" onclick=\"top.location.href=window.location.href\" style=\"display: block !important; padding: 10px\"><i class=\"img spritemap_3e9q9m sx_5eabfc\" style=\"display:block !important\"><\/i>Go to Facebook.com<\/a>");
	}
}
*/
/*
$("pre").hover(function() {
	var codeInnerWidth = ($("code", this).width() + 10);
	if (codeInnerWidth > 563) $(this).stop(true, false).css({zIndex: "100", position: "relative"}).animate({width: codeInnerWidth + "px"});
}, function() {
	$(this).stop(true, false).animate({width: 563});
});

$('a').each(function() { // set all external links to target blank
	if ($(this).attr('href')) {
		var start = $(this).attr('href').indexOf('://');
		if (start != -1) {
			var parts = $(this).attr('href').split('://');
			var end = parts[1].indexOf('/') != -1 ? parts[1].indexOf('/') : parts[1].length;
			if (parts[1].substr(0, end) != document.domain) $(this).attr('target', '_blank');
		}
	}
});

$('a[href^=#]').click(function() { // smooth scrolling when traversing to a new section on the same page
	var $target = $(this.hash);
	if ($target.length) {
		var targetYPosition = $target.offset().top;
		$('html, body').animate({scrollTop:targetYPosition}, 'slow');
	}

	return false;
});

$('a[href=#]').css('cursor', 'default').click(function() { // disable empty links
	return false;
});

$('a[href^=mailto:]').addClass('email-address'); // add the email address class to all email links

if(jQuery().elastic) { // make textareas expandable if they are set with a max-height
	$('textarea').each(function() {
		if (parseInt($(this).css('max-height')) > 0) { $(this).elastic(); }
	});
}

document.createElement('article');
document.createElement('aside');
document.createElement('footer');
document.createElement('header');
document.createElement('hgroup');
document.createElement('nav');
document.createElement('section');
document.createElement('time');
*/ ?>

function hashLogin(data1, data2) {
	var str = "username=user_" + data1 + "&password=pass_" + data2 + "&hash"; // aG5zX0FuZHJldw== aG5zX2NvbXdpejA1
	$.post("login.php", str, function(data) {
		if (data == "Success") location.reload();
		else {
			dialog_tryagain.display();
			$("div#login").css('opacity', 0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
			$("div#notice").css('opacity', 0).show().animate({opacity:1}, 1000).animate({opacity:0}, 1000, function() { $("div#notice").hide(); $("div#login input[type='text']#username").focus(); });
		}
	});
}

function launchApps() {
	var hash = window.location.hash.substring(1), hl = hash.length;
	function hslice(h,c) { return h.slice(0,c); }
	if (!dC.user.logged) {
		$(function() { var found = false;
			if (hash.indexOf("|") != "-1") var subhash = hash.split("|");
			if (hash == "register" || hash == "reg" || hash == "su" || hash == "signup") { found = true; $("button[type='button']#signup").click(); }
			if (!found) {
				if ((hslice(hash,6) == "signin") && (hash.charAt(6) == "|")) { hashLogin(subhash[1],subhash[2]); clearHash(); }
				else if ((hslice(hash,5) == "login") && (hash.charAt(5) == "|")) { hashLogin(subhash[1],subhash[2]); clearHash(); }
				else { /*clearHash();*/ return; }
			}
		});
	} else {
		$.each(hash.split("/#"), function(i, h) { var found = false, hl = h.length;
			if (h.indexOf("|") != "-1") var subhash = h.slice((h.indexOf("|") + 1), h.length);
			for (a in dC.apps.list) { if (!found) { if (h.slice(0,dC.apps.list[a].length) == dC.apps.list[a]) { found = true; eval('display(' + dC.apps.list[a] + ');'); }}}
			if (!found) {
				if ((hslice(h,4) == "docs") && ((h.charAt(4) == "|") || (hl == 4))) eval('display(documents);');
				else if ((hslice(h,4) == "pref") && ((h.charAt(4) == "|") || (hl == 4))) eval('display(preferences);');
				else if ((hslice(h,2) == "np") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(notepad);');
				else if ((hslice(h,2) == "fn") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(flash_name);');
				else if ((hslice(h,2) == "yt") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(ytinstant);');
				else if ((hslice(h,1) == "p") && ((h.charAt(1) == "|") || (hl == 1))) eval('display(piano);');
				else if ((hslice(h,5) == "ahnsd") && ((h.charAt(5) == "|") || (hl == 5))) eval('display(about_hnsdesktop);');
				else if ((hslice(h,2) == "fb") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(feedback);');
				else if ((hslice(h,3) == "ttt") && ((h.charAt(3) == "|") || (hl == 3))) eval('display(tic_tac_toe);');
				else if ((hslice(h,2) == "fb") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(friends);');
				else if ((hslice(h,2) == "gr") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(goom_radio);');
				else if ((hslice(h,1) == "s") && ((h.charAt(1) == "|") || (hl == 1))) eval('display(search);');
				else if ((hslice(h,1) == "c") && ((h.charAt(1) == "|") || (hl == 1))) eval('display(chat);');
				else if ((hslice(h,2) == "m") && ((h.charAt(2) == "|") || (hl == 1))) eval('display(music);');
				else if ((hslice(h,2) == "wb") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(web_browser);');
				else if ((hslice(h,2) == "fb") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(torus);');
				else if ((hslice(h,2) == "fb") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(calendar);');
				else if ((hslice(h,2) == "fb") && ((h.charAt(2) == "|") || (hl == 2))) eval('display(app_explorer);');
				else if ((hslice(h,4) == "calc") && ((h.charAt(4) == "|") || (hl == 4))) eval('display(calculator);');
				else if ((hslice(h,1) == "t") && ((h.charAt(1) == "|") || (hl == 1))) eval('display(twitter);');
				else if ((hslice(h,5) == "twttr") && ((h.charAt(5) == "|") || (hl == 5))) eval('display(twitter);');
				else { /*clearHash();*/ return; }
			}
		});
	}
}

var pImage = 0;
var pImages = new Array();
function preloadImages() {
	var id = preloadImages.arguments[0];
	pImages[id] = new Array();
	for (i = 0, alength = (preloadImages.arguments.length - 1); i < alength; i++) {
		pImages[id][i] = new Image();
		pImages[id][i].src = preloadImages.arguments[(i + 1)];
	}
}

function setCookie(name, value, expires, path, domain, secure) {
	var today = new Date();
	today.setTime(today.getTime());
	if (expires) expires = (expires * 1000 * 60 * 60 * 24);
	var expires_date = new Date(today.getTime() + expires);
	document.cookie = name + "=" + escape(value) + (expires ? ";expires=" + expires_date.toGMTString() : "") + (path ? ";path=" + path : "") + (domain ? ";domain=" + domain : "") + (secure ? ";secure" : "");
}

function getCookie(check_name) {
	var a_all_cookies = document.cookie.split(';');
	var a_temp_cookie = '';
	var cookie_name = '';
	var cookie_value = '';
	var b_cookie_found = false;
	for (i = 0; i < a_all_cookies.length; i++) {
		a_temp_cookie = a_all_cookies[i].split('=');
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
		if (cookie_name == check_name) {
			b_cookie_found = true;
			if (a_temp_cookie.length > 1) cookie_value = unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g, ''));
			return cookie_value;
			break;
		}
		a_temp_cookie = null;
		cookie_name = '';
	}
	if (!b_cookie_found) return null;
}

function deleteCookie(name, path, domain) {
	if (getCookie(name)) document.cookie = name + "=" + (path ? ";path=" + path : "") + (domain ? ";domain=" + domain : "") + ";expires=Thu, 01-Jan-1970 00:00:01 GMT";
}

<?php /*
function setCookie(name,value){
document.cookie=name+"="+encodeURIComponent(value)+"; expires="+(new Date(new Date().getTime()+(360*24*60*60*1000))).toGMTString()+"; path=/";
}

function getCookie(name){
if(new RegExp(name+'\=([^;]*);','').test(document.cookie+';')){
return decodeURIComponent(RegExp.$1);
}
return null;
}
*/ ?>

/* end misc functions */
/* begin cookie functions */

if (window.localStorage) { if (!localStorage.getItem('hnsmaintheme')) localStorage.setItem('hnsmaintheme',1); if (!localStorage.getItem('hnslanguage')) localStorage.setItem('hnslanguage','en');}
else { setCookie('hnsmaintheme',1,365,'/'); setCookie('hnslanguage','en',365,'/'); }

/* end cookie functions*/

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
	this.xPos = xPos;
	this.yPos = yPos;
	this.center = z;
	this.content = content;
	if (this.height > dC.config.height) if (dC.user.logged) this.height = (dC.config.height - (dC.taskbar.height2)); else this.height = dC.config.height;
	if (this.width > dC.config.width) this.width = dC.config.width;
	if (this.center === true) {
		this.x = ((dC.config.width / 2) - (this.width / 2));
		if (dC.user.logged) this.y = (((dC.config.height - (dC.taskbar.height2)) / 2) - (this.height / 2)); else this.y = ((dC.config.height / 2) - (this.height / 2));
	}
	this.createTaskButton = function(app, name) {
		return [
		'<li id="taskbutton-', app, '" class="taskbutton">',
		'<table class="button-wrap">',
		'<tbody>',
		'<tr>',
		'<td class="button-left"></td>',
		'<td class="button-center">',
		'<em unselectable="on">',
		'<button type="button" id="taskbutton-', app, '" class="task icon-' + app + '"><img src="i/ux/s.gif" class="item-icon icon-' + app + '" alt="" />' + name + '</button>',
		'</em>',
		'</td>',
		'<td class="button-right"></td>',
		'</tr>',
		'</tbody>',
		'</table>',
		'</li>'
		].join('');
	}
	this.display = function() {
		this.div.setAttribute("id", b);
		this.div.setAttribute("class","application");
		if (this.draggable === true || this.resizable === true) {
			$(this.div).addClass("drsElement");
		}
		<?php /*
		if (this.draggable === true) {
		this.div.addClass("draggable");
		}

		if (this.resizable === true) {
		this.div.addClass("resizable");
		this.div.addClass("drsElement");
		}

		if (this.closeable === true) {
		this.div.addClass("closeable");
		}
		*/ ?>
		this.div.style.height = this.height + 'px';
		this.div.style.minHeight = this.minHeight + 'px';
		this.div.style.width = this.width + 'px';
		this.div.style.minWidth = this.minWidth + 'px';
		this.div.style.position = this.position;
		this.div.style.display = "none";
		if (this.center === false) {
			if (this.xPos == "l") this.div.style.left = this.x + 'px';
			else if (this.xPos == "r") this.div.style.left = (dC.config.width - (this.width + this.x)) + 'px';
			if (this.yPos == "t") this.div.style.top = this.y + 'px';
			else if (this.yPos == "b") if (dC.user.logged) this.div.style.top = ((dC.config.height - (dC.taskbar.height2)) - (this.height + this.y)) + 'px'; else this.div.style.top = (dC.config.height - (this.height + this.y)) + 'px';
		} else { this.div.style.left = this.x + 'px'; this.div.style.top = this.y + 'px'; }
		if (dC.user.logged) {
			document.getElementById("desktop").appendChild(this.div);
			$("div#taskbar ul#taskbuttons-strip").append(this.createTaskButton(this.id, this.title));
		} else document.getElementById("main").appendChild(this.div);
		this.assemble();
	}
	this.createPanel = function(content) {
		return [
		'<div class="pnl">',
		'<div class="pnl-tl"><div class="pnl-tr"><div class="pnl-tc"></div></div></div><div class="pnl-bwrap">',
		'<div class="pnl-ml"><div class="pnl-mr"><div class="pnl-mc"><div class="content"><div class="body"><div class="wrapper">', content, '</div></div></div></div></div></div>',
		'<div class="pnl-bl"><div class="pnl-br"><div class="pnl-bc"></div></div></div>',
		'</div></div>'
		].join('');
	}
	this.addHeader = function(app, name) {
		var header;
		if (this.draggable === true) header = '<div class="phdr drsMoveHandle icon-' + app + '">';
		else header = '<div class="phdr icon-' + app + '">';
		header += '<img src="i/ux/s.gif" class="item-icon icon-' + app + '" alt="" /><span class="phdr-text">' + name + '</span>';
		if (this.showTools === true) {
			var tlConfig, tools, maintls, subtls;
			if (dC.user.logged) {
				if (this.id == "documents") tlConfig = dC.apps.documents.tls;
				else if (this.id == "preferences") tlConfig = dC.apps.preferences.tls;
				else if (this.id == "notepad") tlConfig = dC.apps.notepad.tls;
				else if (this.id == "flash_name") tlConfig = dC.apps.flash_name.tls;
				else if (this.id == "ytinstant") tlConfig = dC.apps.ytinstant.tls;
				else if (this.id == "piano") tlConfig = dC.apps.piano.tls;
				else if (this.id == "about_hnsdesktop") tlConfig = dC.apps.about_hnsdesktop.tls;
				else if (this.id == "feedback") tlConfig = dC.apps.feedback.tls;
				else if (this.id == "tic_tac_toe") tlConfig = dC.apps.tic_tac_toe.tls;
				else if (this.id == "friends") tlConfig = dC.apps.friends.tls;
				else if (this.id == "goom_radio") tlConfig = dC.apps.goom_radio.tls;
				else if (this.id == "search") tlConfig = dC.apps.search.tls;
				else if (this.id == "chat") tlConfig = dC.apps.chat.tls;
				else if (this.id == "music") tlConfig = dC.apps.music.tls;
				else if (this.id == "web_browser") tlConfig = dC.apps.web_browser.tls;
				else if (this.id == "torus") tlConfig = dC.apps.torus.tls;
				else if (this.id == "calendar") tlConfig = dC.apps.calendar.tls;
				else if (this.id == "app_explorer") tlConfig = dC.apps.app_explorer.tls;
				else if (this.id == "calculator") tlConfig = dC.apps.calculator.tls;
				else if (this.id == "twitter") tlConfig = dC.apps.twitter.tls;
			} else {
				if (this.id == "login") tlConfig = dC.panels.login.tls;
				else if (this.id == "register") tlConfig = dC.panels.register.tls;
			}
			tools = '<div class="tls">';
			if ((tlConfig[1] == 1) || (tlConfig[1] == 2)) {
				if (tlConfig[1] == 1) { maintls = '<span class="maintls">'; } else if (tlConfig[1] == 2) { maintls = '<span class="maintlsapart">'; }
				if (tlConfig[2] == 1) { maintls += '<div class="tl close"></div>'; } else if (tlConfig[2] == 2) { maintls += '<div class="tl close close_corners"></div>'; }
				if (tlConfig[3] == 1) { maintls += '<div class="tl maximize"></div>'; } else if (tlConfig[3] == 2) { maintls += '<div class="tl maximize maximize_corners"></div>'; } else if (tlConfig[3] == 3) { maintls += '<div class="tl maximize maximize_middle"></div>'; } else if (tlConfig[3] == 4) { maintls += '<div class="tl maximize maximize_begin"></div>'; }
				if (tlConfig[4] == 1) { maintls += '<div class="tl minimize"></div>'; } else if (tlConfig[4] == 2) { maintls += '<div class="tl minimize minimize_corners"></div>'; } else if (tlConfig[4] == 3) { maintls += '<div class="tl minimize minimize_middle"></div>'; } else if (tlConfig[4] == 4) { maintls += '<div class="tl minimize minimize_begin"></div>'; }
				maintls += '</span>';
				tools += maintls;
			}
			if ((tlConfig[5] == 1) || (tlConfig[5] == 2)) {
				if (tlConfig[5] == 1) { subtls = '<span class="subtls">'; } else if (tlConfig[5] == 2) { subtls = '<span class="subtlsattached">'; }
				if (tlConfig[6] == 1) { subtls += '<div class="tl toggle"></div>'; } else if (tlConfig[6] == 2) { subtls += '<div class="tl toggle toggle_middle"></div>'; } else if (tlConfig[6] == 3) { subtls += '<div class="tl toggle toggle_end"></div>'; } else if (tlConfig[6] == 4) { subtls += '<div class="tl toggle toggle_begin"></div>'; }
				if (tlConfig[7] == 1) { subtls += '<div class="tl config"></div>'; } else if (tlConfig[7] == 2) { subtls += '<div class="tl config config_middle"></div>'; } else if (tlConfig[7] == 3) { subtls += '<div class="tl config config_end"></div>'; } else if (tlConfig[7] == 4) { subtls += '<div class="tl config config_begin"></div>'; }
				if (tlConfig[8] == 1) { subtls += '<div class="tl arrowright"></div>'; } else if (tlConfig[8] == 2) { subtls += '<div class="tl arrowright arrowright_middle"></div>'; } else if (tlConfig[8] == 3) { subtls += '<div class="tl arrowright arrowright_end"></div>'; } else if (tlConfig[8] == 4) { subtls += '<div class="tl arrowright arrowright_begin"></div>'; }
				if (tlConfig[9] == 1) { subtls += '<div class="tl arrowleft"></div>'; } else if (tlConfig[9] == 2) { subtls += '<div class="tl arrowleft arrowleft_middle"></div>'; } else if (tlConfig[9] == 3) { subtls += '<div class="tl arrowleft arrowleft_end"></div>'; } else if (tlConfig[9] == 4) { subtls += '<div class="tl arrowleft arrowleft_begin"></div>'; }
				if (tlConfig[10] == 1) { subtls += '<div class="tl pindown"></div>'; } else if (tlConfig[10] == 2) { subtls += '<div class="tl pindown pindown_middle"></div>'; } else if (tlConfig[10] == 3) { subtls += '<div class="tl pindown pindown_end"></div>'; } else if (tlConfig[10] == 4) { subtls += '<div class="tl pindown pindown_begin"></div>'; }
				if (tlConfig[11] == 1) { subtls += '<div class="tl pinleft"></div>'; } else if (tlConfig[11] == 2) { subtls += '<div class="tl pinleft pinleft_middle"></div>'; } else if (tlConfig[11] == 3) { subtls += '<div class="tl pinleft pinleft_end"></div>'; } else if (tlConfig[11] == 4) { subtls += '<div class="tl pinleft pinleft_begin"></div>'; }
				if (tlConfig[12] == 1) { subtls += '<div class="tl dblarrowright"></div>'; } else if (tlConfig[12] == 2) { subtls += '<div class="tl dblarrowright dblarrowright_middle"></div>'; } else if (tlConfig[12] == 3) { subtls += '<div class="tl dblarrowright dblarrowright_end"></div>'; } else if (tlConfig[12] == 4) { subtls += '<div class="tl dblarrowright dblarrowright_begin"></div>'; }
				if (tlConfig[13] == 1) { subtls += '<div class="tl dblarrowleft"></div>'; } else if (tlConfig[13] == 2) { subtls += '<div class="tl dblarrowleft dblarrowleft_middle"></div>'; } else if (tlConfig[13] == 3) { subtls += '<div class="tl dblarrowleft dblarrowleft_end"></div>'; } else if (tlConfig[13] == 4) { subtls += '<div class="tl dblarrowleft dblarrowleft_begin"></div>'; }
				if (tlConfig[14] == 1) { subtls += '<div class="tl dblarrowdown"></div>'; } else if (tlConfig[14] == 2) { subtls += '<div class="tl dblarrowdown dblarrowdown_middle"></div>'; } else if (tlConfig[14] == 3) { subtls += '<div class="tl dblarrowdown dblarrowdown_end"></div>'; } else if (tlConfig[14] == 4) { subtls += '<div class="tl dblarrowdown dblarrowdown_begin"></div>'; }
				if (tlConfig[15] == 1) { subtls += '<div class="tl dblarrowup"></div>'; } else if (tlConfig[15] == 2) { subtls += '<div class="tl dblarrowup dblarrowup_middle"></div>'; } else if (tlConfig[15] == 3) { subtls += '<div class="tl dblarrowup dblarrowup_end"></div>'; } else if (tlConfig[15] == 4) { subtls += '<div class="tl dblarrowup dblarrowup_begin"></div>'; }
				if (tlConfig[16] == 1) { subtls += '<div class="tl refresh"></div>'; } else if (tlConfig[16] == 2) { subtls += '<div class="tl refresh refresh_middle"></div>'; } else if (tlConfig[16] == 3) { subtls += '<div class="tl refresh refresh_end"></div>'; } else if (tlConfig[16] == 4) { subtls += '<div class="tl refresh refresh_begin"></div>'; }
				if (tlConfig[17] == 1) { subtls += '<div class="tl plus"></div>'; } else if (tlConfig[17] == 2) { subtls += '<div class="tl plus plus_middle"></div>'; } else if (tlConfig[17] == 3) { subtls += '<div class="tl plus plus_end"></div>'; } else if (tlConfig[17] == 4) { subtls += '<div class="tl plus plus_begin"></div>'; }
				if (tlConfig[18] == 1) { subtls += '<div class="tl minus"></div>'; } else if (tlConfig[18] == 2) { subtls += '<div class="tl minus minus_middle"></div>'; } else if (tlConfig[18] == 3) { subtls += '<div class="tl minus minus_end"></div>'; } else if (tlConfig[18] == 4) { subtls += '<div class="tl minus minus_begin"></div>'; }
				if (tlConfig[19] == 1) { subtls += '<div class="tl search"></div>'; } else if (tlConfig[19] == 2) { subtls += '<div class="tl search search_middle"></div>'; } else if (tlConfig[19] == 3) { subtls += '<div class="tl search search_end"></div>'; } else if (tlConfig[19] == 4) { subtls += '<div class="tl search search_begin"></div>'; }
				if (tlConfig[20] == 1) { subtls += '<div class="tl save"></div>'; } else if (tlConfig[20] == 2) { subtls += '<div class="tl save save_middle"></div>'; } else if (tlConfig[20] == 3) { subtls += '<div class="tl save save_end"></div>'; } else if (tlConfig[20] == 4) { subtls += '<div class="tl save save_begin"></div>'; }
				if (tlConfig[21] == 1) { subtls += '<div class="tl help"></div>'; } else if (tlConfig[21] == 2) { subtls += '<div class="tl help help_middle"></div>'; } else if (tlConfig[21] == 3) { subtls += '<div class="tl help help_end"></div>'; } else if (tlConfig[21] == 4) { subtls += '<div class="tl help help_begin"></div>'; }
				if (tlConfig[22] == 1) { subtls += '<div class="tl print"></div>'; } else if (tlConfig[22] == 2) { subtls += '<div class="tl print print_middle"></div>'; } else if (tlConfig[22] == 3) { subtls += '<div class="tl print print_end"></div>'; } else if (tlConfig[22] == 4) { subtls += '<div class="tl print print_begin"></div>'; }
				subtls += '</span>';
				tools += subtls;
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
		var bwrapdiv = maindiv + ' div.pnl-bwrap';
		var ptdiv = maindiv + ' div.pnl-tc';
		$(ptdiv).append(this.addHeader(this.id, this.title));
		$(bwrapdiv).height((this.height - 30));
		if (!$(maindiv).hasClass("fullscreen")) { $(maindiv + " div.content").height((this.height - 32)); $(maindiv + " div.content").width((this.width - 16)); }
		else { $(maindiv + " div.content").height((this.height - 32)); $(maindiv + " div.content").width((this.width - 16)); }
		if (this.minimized === true) $(maindiv).css('display','none');
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
	if (this.height > dC.config.height) if (dC.user.logged) this.height = (dC.config.height - (dC.taskbar.height2)); else this.height = dC.config.height;
	if (this.width > dC.config.width) this.width = dC.config.width;
	if (this.center === true) {
		this.x = ((dC.config.width / 2) - (this.width / 2));
		if (dC.user.logged) this.y = (((dC.config.height - (dC.taskbar.height2)) / 2) - (this.height / 2)); else this.y = ((dC.config.height / 2) - (this.height / 2));
	}
	this.display = function() {
		this.div.setAttribute("id", b);
		if (this.draggable === true) {
			alert(this.div);
		}
		this.div.style.height = this.height + 'px';
		this.div.style.width = this.width + 'px';
		this.div.style.position = this.position;
		if (this.center === false) {
			if (this.xPos == "l") this.div.style.left = this.x + 'px';
			else if (this.xPos == "r") this.div.style.left = (dC.config.width - (this.width + this.x)) + 'px';
			if (this.yPos == "t") this.div.style.top = this.y + 'px';
			else if (this.yPos == "b") if (dC.user.logged) this.div.style.top = ((dC.config.height - (dC.taskbar.height2)) - (this.height + this.y)) + 'px'; else this.div.style.top = (dC.config.height - (this.height + this.y)) + 'px';
		} else { this.div.style.left = this.x + 'px'; this.div.style.top = this.y + 'px'; }

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
		if (this.visible === false) $(maindiv).css('display','none');
	}
}

function display(app) {
	var apps = $(app).attr('id');
	var app_name = "div#" + apps;
	var app_tbutton = "ul#taskbuttons-strip li#taskbutton-" + apps;
	var zmax = 0, cur = 0;
	$(app_name + " div.pnl").removeClass("transparent5");
	$(app_name + " div.tl").removeClass("transparent5");
	$(app_name + " div.pnl-tl").css({'background-color':'','border-bottom':'0'});
	$(app_name + " div.pnl-tl").css({
		'border-bottom-left-radius':'0',
		'border-bottom-right-radius':'0',
		'-khtml-border-radius-bottomleft':'0',
		'-khtml-border-radius-bottomright':'0',
		'-moz-border-radius-bottomleft':'0',
		'-moz-border-radius-bottomright':'0',
		'-webkit-border-bottom-left-radius':'0',
		'-webkit-border-bottom-right-radius':'0'
	});
	$(app_name + " div.pnl-bwrap").css('visibility','visible');
	$("div.application").each(function() { cur = parseInt($(this).css('z-index')); zmax = (cur > zmax) ? cur : zmax; });
	$(app_name).css('z-index', (zmax + dC.settings.zindexint));
	if ($(app_name).is(":hidden")) $(app_name).show();
	else if ($(app_name).css('visibility') == "hidden") $(app_name).css('visibility','visibile');
	if ($(app_tbutton).is(":hidden")) $(app_tbutton).show();
}
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { include ('auth.inc.php'); ?>

function desktop() {
	this.desktop = document.createElement('div');
	this.taskbar = document.createElement('div');
	this.startmenu = document.createElement('div');
	this.desktop_thumbs = document.createElement('div');
	this.display = function() {
		this.desktop.setAttribute("id","desktop");
		this.taskbar.setAttribute("id","taskbar");
		this.startmenu.setAttribute("id","startmenu");
		this.desktop.style.height = (dC.config.height - dC.taskbar.height) + 'px';
		this.taskbar.style.height = dC.taskbar.height + 'px';
		this.startmenu.style.height = dC.startmenu.height + 'px';
		if ((dC.startmenu.height + 80) > dC.config.height) {
			var heightDiff = ((dC.startmenu.height + 80) - dC.config.height);
			alert(heightDiff);
			this.startmenu.style.height = (dC.startmenu.height - heightDiff) + 'px';
		}
		document.getElementById("main").appendChild(this.desktop);
		document.getElementById("main").appendChild(this.taskbar);
		this.assemble();
		document.getElementById("desktop").appendChild(this.startmenu);
	}
	this.createDesktop = function(content) {
		return ['<div id="desktop-view"><div class="desktop-body">', content, '</div></div>'].join('');
	}
	this.createDesktopThumb = function(app, name) {
		return [
		'<div id="thumb-' + app + '" class="desktop-thumb thumb-' + app + '">',
		'<div class="thumb-button"><img src="i/ux/blank.gif" class="thumb-image" alt="' + app + '" /></div>',
		'<div class="thumb-name" unselectable="on">' + name + '</div>',
		'</div>'
		].join('');
	}
	this.createQuickStart = function(app) {
		return [
		'<li id="quickbutton-' + app + '" class="quickbutton">',
		'<table class="button-wrap">',
		'<tbody>',
		'<tr>',
		'<td class="button-left"></td>',
		'<td class="button-center">',
		'<em unselectable="on">',
		'<button type="button" id="quickbutton-' + app + '" class="quick icon-' + app + '"><img src="i/ux/s.gif" class="item-icon icon-' + app + '" alt="" /></button>',
		'</em>',
		'</td>',
		'<td class="button-right"></td>',
		'</tr>',
		'</tbody>',
		'</table>',
		'</li>'
		].join('');
	}
	this.createTaskbar = function(quickstart) {
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
		var taskbar_tray_content = [
		'<div></div>'
		].join('');
		return [
		'<div id="start">' + taskbar_start_content + '</div>',
		'<div id="panel-wrap">',
		'<div id="quickstart-panel">',
		'<ul id="quickstart-strip">' + quickstart + '</ul>',
		'<div id="arrow"></div>',
		'</div>',
		'<div id="taskbuttons-panel">',
		'<div class="taskbuttons-strip-wrap">',
		'<div id="quickstart-splitbar" class="splitbar"></div>',
		'<ul id="taskbuttons-strip"></ul>',
		'<div id="tray-splitbar" class="splitbar"></div>',
		'</div>',
		'<div id="tray-panel">',
		'<div class="tray-strip-wrap">',
		'<ul id="tray-strip">' + taskbar_tray_content + '</ul>',
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
		var useramenu = "", usertmenu = "", vindex, vname;
		$.each(dC.launchers.startmenuapps, function(index, value) {
			vindex = dC.apps.list.vIndex(value);
			vname = dC.apps.name[vindex];
			useramenu += '<li id="' + value + '" class="list-item"><a href="javascript:void(0);" id="' + value + '" class="menu-item" onclick="return false;"><img src="i/ux/s.gif" class="item-icon icon-' + value + '" alt="" />' + vname + '</a></li>';
		});
		$.each(dC.launchers.startmenutools, function(index, value) {
			vindex = dC.apps.list.vIndex(value);
			vname = dC.apps.name[vindex];
			usertmenu += '<li id="' + value + '" class="list-item"><a href="javascript:void(0);" id="' + value + '" class="menu-item" onclick="return false;"><img src="i/ux/s.gif" class="item-icon icon-' + value + '" alt="" />' + vname + '</a></li>';
		});
		return [
		'<div class="startmenu">',
		'<div class="startmenu-tl"><div class="startmenu-tr"><div class="startmenu-tc">',
		'<div class="startmenu-header">',
		'<span class="startmenu-header-text">' + dC.user.username + ' | HnS Desktop</span>',
		'<div class="image"><img class="userimage" /></div></div>',
		'</div></div></div>',
		'<div class="startmenu-bwrap">',
		'<div class="startmenu-ml"><div class="startmenu-mr"><div class="startmenu-mc">',
		'<div class="startmenu-body">',
		'<div class="apps"><div class="apps-body"><div class="apps-menu">',
		'<ul class="apps-menu-list">' + useramenu + '</ul>',
		'</div></div></div>',
		'<div class="tls"><div class="tls-menu">',
		'<ul class="tls-menu-list">' + usertmenu + '</ul>',
		'<ul class="tls-logout-list">',
		'<li id="feedback" class="list-item item-feedback"><a href="javascript:void(0);" id="feedback" class="menu-item" onclick="return false;"><img src="i/ux/s.gif" class="item-icon icon-feedback" alt="" />Send Feedback</a></li>',
		'<li id="about_hnsdesktop" class="list-item item-about_hnsdesktop"><a href="javascript:void(0);" id="about_hnsdesktop" class="menu-item" onclick="return false;"><img src="i/ux/s.gif" class="item-icon icon-about_hnsdesktop" alt="" />About HnS Desktop</a></li>',
		'<li id="logout" class="list-item item-logout"><a href="javascript:void(0);" id="logout" class="menu-item" onclick="return false;"><img src="i/ux/s.gif" class="item-icon icon-logout" alt="" />Logout</a></li>',
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
		var apps_height = Math.floor((dC.config.height - dC.taskbar.height) / (dC.desktop.thumb_height + 14));
		var apps_width = Math.floor(dC.config.width / (dC.desktop.thumb_width + 14));
		var vindex, vname;
		for (var i = 0; i < dC.launchers.thumbs.length; i++) {
			vindex = dC.apps.list.vIndex(dC.launchers.thumbs[i]);
			vname = dC.apps.name[vindex];
			this.desktop_thumbs += this.createDesktopThumb(dC.launchers.thumbs[i], vname);
			if (((i + 1) % apps_width) == 0) this.desktop_thumbs += '<div class="clearfix"></div>';
		}
		this.taskbar_quickstart = "";
		var quickstart_amount = (dC.user.taskbar.quickstart_width / 20);
		if (dC.user.launchers.quickstart != "") for (var i = 0; i < dC.user.launchers.quickstart.length; i++) this.taskbar_quickstart += this.createQuickStart(dC.user.launchers.quickstart[i]);
		else for (var i = 0; i < dC.launchers.quickstart.length; i++) this.taskbar_quickstart += this.createQuickStart(dC.launchers.quickstart[i]);
		this.desktop_html = this.createDesktop(this.desktop_thumbs);
		this.desktop.innerHTML = this.desktop_html;
		this.taskbar_html = this.createTaskbar(this.taskbar_quickstart);
		this.taskbar.innerHTML = this.taskbar_html;
		this.startmenu.innerHTML = this.createStartmenu();
	}
}

/*
var contextMenu_content = [
'<ul id="myMenu" class="contextMenu">',
'<li class="insert"><a href="#insert">Add New</a></li>',
'<li class="edit"><a href="#edit">Edit</a></li>',
'<li class="delete"><a href="#delete">Delete</a></li>',
'</ul>'
].join('');
*/

/* begin app content */

function _documents() {
return ['<div class="documents"></div>'].join('');
}

function _preferences() {
return [
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
'<div id="new" class="shiny-button3">Register!<span></span></div>',
'</div>',
'<div id="wallpaper">',
'<div class="lc"></div>',
'<div class="rc"></div>',
'</div>'
].join('');
}

function _notepad() {
return ['<textarea><?php if ($row['notepad'] == null) { echo "Hello ',dC.user.firstname,' ',dC.user.lastname,'!"; } else { echo addslashes(html_entity_decode($row['notepad'])); } ?></textarea>'].join('');
}

function _flash_name() {
return [
'<script id="movie-template" type="text/x-jquery-template">',
'<li>{%= Title.Regular %} ({%= ReleaseYear %})</li>',
'</script>'
].join('');
}

function _ytinstant() {
var dVideo = "_2c5Fh3kfrI";
var currentVideoTitle = "YouTube Instant";
return [
'<div id="outerWrapper">',
'<div id="wrapper">',
'<div id="header" class="clearfix">',
'<div id="logo">',
'<div><span>YouTube Instant</span></div>',
'</div>',
'<input type="text" id="searchBox" value="" spellcheck="false"></input>',
'<div id="searchTermWrapper"><div id="searchTermKeyword">Search YouTube Instantly</div></div>',
'</div>',
'<div id="main" class="clearfix">',
'<div id="videoDiv">',
'<div id="innerVideoDiv">Loading...</div>',
'</div>',
'<div id="playlistWrapper">',
'<div id="buttonControl" class="pauseButton"><a href="javascript:void(0);" onclick="return false;">&nbsp;</a></div>',
'<div id="playlist" class="clearfix">&nbsp;</div>',
'</div>',
'<div id="userPlaylist">',
'<div id="playlistInput"><input type="text" id="playlistBox" value="Add to Playlist" spellcheck="false"></input></div>',
'<div id="playlist" class="clearfix"></div>',
'</div>',
'<div id="songPlaylists">',
'<div id="playlistHeader"><div id="friendsPlaylists"><div id="fpButton" class="shiny-button3">Friends Playlists!<span></span></div></div><div id="songsHeader"><div id="playlistName">&nbsp;</div><img src="i/apps/ytinstant/back.png" id="backtoplaylists" /></div></div>',
'<div id="playlists" class="clearfix">&nbsp;</div>',
'</div>',
'<div id="friendPlaylists">',
'<div id="playlistHeader"><div id="songPlaylists"><div id="spButton" class="shiny-button3">Back to Song Playlists!<span></span></div></div><div id="songsHeader"><div id="playlistName">&nbsp;</div><img src="i/apps/ytinstant/back.png" id="backtoplaylists" /></div></div>',
'<div id="playlists" class="clearfix">&nbsp;</div>',
'</div>',
'<div id="help">',
'<div class="container">&nbsp;</div>',
'</div>',
'<div id="footer" class="clearfix">',
'<div id="socialapis">',
'<iframe id="fblike" scrolling="no" frameborder="0" src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fyoutube.com&amp;layout=standard&amp;show_faces=true&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=24&amp;width=720" allowTransparency="true"></iframe>',
'<div id="sub">',
'<div id="buzz-container">',
'<a href="http://www.google.com/buzz/post" class="google-buzz-button" title="Post to Google Buzz" data-button-style="small-count" data-url="http://www.youtube.com">',
'<span id="buzz-941616376" dir="ltr" class="buzz-counter-long">9</span>',
'</a>',
'</div>',
'<iframe id="twitter" scrolling="no" frameborder="0" src="http://platform.twitter.com/widgets/tweet_button.html?count=horizontal&amp;text=Watch%20Videos%20On%20YouTube&amp;url=http%3A%2F%2Fwww.youtube.com&amp;via=youtube" allowtransparency="true"></iframe>',
'<iframe id="fbshare" scrolling="no" frameborder="0" src="http://s.youtube-3rd-party.com/facebook_share.html?appid=87741124305&amp;href=http%3A%2F%2Fwww.youtube.com&amp;base_url=http%3A%2F%2Fwww.youtube.com&amp;locale=US" allowtransparency="true"></iframe>',
'</div>',
'</div>',
'</div>',
'</div>',
'<div id="gallery" class="clearfix">',
'<div class="container">&nbsp;</div>',
'</div>',
'<div id="suggestions" class="clearfix">',
'<div class="container">&nbsp;</div>',
'</div>',
'</div>',
'</div>'
].join('');
}

function _piano() {
return [
'<div id="instruments">',
'<div class="buttons">',
'<a href="javascript:void(0);" id="piano" onclick="return false;">Piano</a>',
'<a href="javascript:void(0);" id="organ" onclick="return false;">Organ</a>',
'<a href="javascript:void(0);" id="saxophone" onclick="return false;">Saxophone</a>',
'<a href="javascript:void(0);" id="flute" onclick="return false;">Flute</a>',
'<a href="javascript:void(0);" id="panpipes" onclick="return false;">Pan Pipes</a>',
'<a href="javascript:void(0);" id="strings" onclick="return false;">Strings</a>',
'<a href="javascript:void(0);" id="guitar" onclick="return false;">Guitar</a>',
'<a href="javascript:void(0);" id="steeldrums" onclick="return false;">Steel Drums</a>',
'<a href="javascript:void(0);" id="doublebass" onclick="return false;">Double Bass</a>',
'<a href="javascript:void(0);" id="all" onclick="return false;">All</a>',
'</div>',
'</div>',
'<div id="pianoswf">',
'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" style="height: 88%; width: 99%; ">',
'<param name="movie" value="flash/piano/piano.swf" class="pianoswf">',
'<param name="quality" value="high">',
'<embed type="application/x-shockwave-flash" src="flash/piano/piano.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" class="pianoswf" style="height: 88%; width: 99%; "></embed>',
'</object>',
'</div>'
].join('');
}

function _about_hnsdesktop() {
return [
'<div class="about_hnsdesktop">',
'Homenet Spaces OS is an open source web desktop.<br />',
'HnS Desktop\'s goal is to be a web desktop that embraces simplicity that everyone can use and understand.<br />',
'HnS Desktop uses PHP, jQuery, AJAX, and JavaScript programming languages.<br /><br />',
'<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fhnsdesktop.tk&amp;layout=standard&amp;show_faces=true&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=70&amp;width=450" id="hnsfblike" scrolling="no" frameborder="0" allowTransparency="true"></iframe>',
'<h2>Features</h3>',
'<h4>Desktop</h4>',
'Taskbar: start menu<br />',
'Taskbar: quickstart<br />',
'Taskbar: taskbuttons<br />',
'Taskbar: tray<br /><br />',
'<a href="http://code.google.com/p/hnsdesktop/">HnS Desktop on Google Code</a>',
'<h2>Monthly Progress</h3>',
'<h4>2010</h4>',
'March - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.3.zip">hnsdesktop-v0.3</a><br />',
'April - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.4.zip">hnsdesktop-v0.4</a><br />',
'May - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.5.zip">hnsdesktop-v0.5</a><br />',
'June - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.6.zip">hnsdesktop-v0.6</a><br />',
'July - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.7.zip">hnsdesktop-v0.7</a><br />',
'August - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.8.zip">hnsdesktop-v0.8</a><br />',
'September - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.9.zip">hnsdesktop-v0.9</a><br />',
'October - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.10.zip">hnsdesktop-v0.10</a><br />',
'November - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.11.zip">hnsdesktop-v0.11</a><br />',
'December - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v0.12.zip">hnsdesktop-v0.12</a>',
'<br /><br />',
'<h4>2011</h4>',
'January - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v1.1.zip">hnsdesktop-v1.1</a><br />',
'February - <a href="http://hnsdesktop.googlecode.com/files/hnsdesktop-v1.2.zip">hnsdesktop-v1.2</a><br />',
'</div>'
].join('');
}

function _feedback() {
return [''].join('');
}

function _tic_tac_toe() {
return [''].join('');
}

function _friends() {
return [
<?php
if ($_SESSION['username'] == 'Admin') {
$members_result = mysql_query('SELECT user_id FROM login WHERE user_id != 2', $db) or die(mysql_error($db));
$members = mysql_num_rows($members_result);
$rorder = mt_rand(0, 3);

switch ($rorder) {
case 0: $order = 'user_id'; break;
case 1: $order = 'username'; break;
case 2: $order = 'firstname'; break;
case 3: $order = 'lastname'; break;
}

$rsort = mt_rand(0, 1);

if ($rsort == 0) $sort = 'ASC';
else $sort = 'DESC';

$range = 18;
$limit1 = mt_rand(0, ($members - $range));
$count = 0;

$query = 'SELECT u.user_id, u.username, i.firstname, i.lastname, i.default_image FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id != 2 ORDER BY $order $sort LIMIT $limit1, $range';
$friends_result = mysql_query($query, $db) or die(mysql_error($db));

while ($friends_row = mysql_fetch_array($friends_result)) {
if ($count > 0) $friends .= ', ' . $friends_row['username'];
else $friends = $friends_row['username'];
$count++;
}
}

if ($friends == null) {
$friends = 'Admin';
$numfriends = 1;
} else {
if ($_SESSION['username'] != 'Admin') $friends = 'Admin, ' . $friends;
if ($_SESSION['username'] != 'Admin') $numfriends = count(explode(', ', $friends));
else $numfriends = $members;
}

$friends = explode(', ', $friends);
$fcount = 1;

if ($numfriends > 0) {
foreach ($friends as $friend) {
$friend_query = "SELECT u.user_id, u.username, i.firstname, i.lastname, i.default_image FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.username = '" . $friend . "'";
$friend_result = mysql_query($friend_query, $db) or die(mysql_error($db));
$friend_row = mysql_fetch_array($friend_result);

echo "'<!-- Begin " . addslashes($friend_row['firstname']) . " " . addslashes($friend_row['lastname']) . "\'s section -->',\n";
echo "'<a href=\"/user_profile.php?id=" . $friend_row['user_id'] . "\" title=\"View " . addslashes($friend) . "\'s Profile\">',\n";
echo "'<div class=\"friendsection\">',\n";

if ($friend_row['default_image'] != null) echo "'<img src=\"/uploads/" . addslashes($friend_row['username']) . "/images/thumb/" . addslashes($friend_row['default_image']) . "\" class=\"friend\" /><br />',\n";
else echo "'<img src=\"/i/mem/default.jpg\" class=\"friend\" /><br />',\n";

echo "'<div class=\"name\">" . addslashes($friend_row['firstname']) . " " . addslashes($friend_row['lastname']) . "</div>',\n";
echo "'</div>',\n";
echo "'</a>',\n";
echo "'<!-- End " . addslashes($friend_row['firstname']) . " " . addslashes($friend_row['lastname']) . "\'s section -->',\n";

$break = "'<div style=\"clear: both; width: 100%;\">&nbsp;</div>',\n";

if ($fcount == 3) echo $break;
elseif ($fcount == 6) echo $break;
elseif ($fcount == 9) echo $break;
elseif ($fcount == 12) echo $break;
elseif ($fcount == 15) echo $break;

$fcount++;
}

echo $break;
}
?>
''].join('');
}

function _goom_radio() {
return [
'<div id="data"><div id="goom">',
'</div></div>'
].join('');
}

function _search() {
return [''].join('');
}

function _chat() {
return [
'<div id="chatarea"></div><br />',
'<div id="messagearea"><input type="text" id="message" value="" maxlength="1500" /></div>'
].join('');
}

function _music() {
return ['<audio src="/media/mp/<?php echo $profile_song_artist . " - " . $profile_song_name; ?>" id="musicplayer" controls="controls" loop="loop">Your browser does not support the audio element.</audio>'].join('');
}

function _web_browser() {
return [
'<div id="nav"></div>',
'<div id="window"></div>'
].join('');
}

function _torus() {
return [
'<div id="content">',
'<div id="loading">',
'You must enable JavaScript to play this game.',
'</div>',
'<div id="container">',
'<div id="menu">',
'<div id="menu_area">',
'<div id="screen0">',
'<div id="helpBox">',
'<p><b>How To Play</b><br>',
'Use the arrow keys to guide the falling blocks, spacebar and the up-arrow will rotate the block in opposite directions.',
'Alternatively the keys A,W,S and D can be used as arrow keys for the same purpose.<br><br>',
'When a complete horizontal ring of 15 blocks is occupied by pieces the row will collapse and earn 100 points.',
'If multiple rows are cleared at a time you will earn bonus points.',
'</p>',
'</div>',
'<div id="copy">&copy;2010 <a href="http://www.benjoffe.com/">Benjamin Joffe</a></div>',
'<div id="but_main0" class="but"></div>',
'</div>',
'<div id="screen1">',
'<div id="go1" class="but"></div>',
'<div id="go2" class="nonstick"></div>',
'<div id="go3" class="nonstick"></div>',
'<div id="but_main1" class="but"></div>',
'</div>',
'<div id="screen2">',
'<div id="quote"></div>',
'<div id="but_play" class="but"></div>',
'<div id="but_settings" class="but"></div>',
'<div id="but_high" class="but"></div>',
'<div id="but_help" class="but"></div>',
'</div>',
'<div id="screen3">',
'<select id="bestType">',
'<option>Traditional</option>',
'<option>Time Attack</option>',
'<option>Garbage</option>',
'</select>',
'<div id="best1"></div>',
'<div id="best2"></div>',
'<div id="best3"></div>',
'<div id="but_main2" class="but"></div>',
'</div>',
'<div id="screen4">',
'<div id="div_base">',
'<label>Skin:',
'<select id="set_base">',
'<option>Glass</option>',
'<option>Storybook</option>',
'</select>',
'</label>',
'</div>',
'<div id="div_ghost">',
'<label><input id="set_ghost" type="checkbox"> Show ghost</label>',
'</div>',
'<div id="but_main3" class="but"></div>',
'</div>',
'</div>',
'</div>',
'<div id="out"></div>',
'<div id="playing">',
'<canvas id="canvas" width="200" height="400"></canvas>',
'<div id="paused">',
'<div id="but_resume" class="but"></div>',
'<div id="but_restart" class="but"></div>',
'<div id="but_quit" class="but"></div>',
'</div>',
'<div id="panel">',
'<div id="title1"></div>',
'<div id="title2"></div>',
'<div id="title3"></div>',
'<div id="score"></div>',
'<div id="time"></div>',
'<div id="next"></div>',
'<div id="but_pause" class="but"></div>',
'</div>',
'<div id="gameover">',
'<div id="winner">',
'<form id="high_form">',
'You have achieved a high score, please enter your name:<br>',
'<input type="text" id="high_name" maxlength="20"> <input type="submit" value="OK">',
'</form>',
'</div>',
'<div id="newgame">',
'<div id="sorryText"></div>',
'<div id="skull"></div>',
'<div id="but_restart2" class="but"></div>',
'<div id="but_main4" class="but"></div>',
'</div>',
'</div>',
'</div>',
'<div id="close" class="nonstick"></div>',
'</div>',
'</div>'
].join('');
}

function _calendar() {
return [
'<table id="maincontentcell" class="maintable" border="0" cellpadding="0" cellspacing="0">',
'<tr>',
'<td>',
'<table id="evtcal" border="0" cellpadding="0" cellspacing="0">',
'<tr>',
'<td style="background-color: #adf; padding: 3px text-align: center; vertical-align: top; width: 314px">',
'<div id="calendararea">',
'<!--  Dynamically Filled -->',
'</div>',
'You can move to a different month or year by clicking on the buttons or return to today&#39;s date by clicking &quot;Show Current Date&quot;.',
'</td>',
'<td width="10">&nbsp;</td>',
'<td style="background-color: #ffffc8; padding: 3px text-align: center; vertical-align: top; width: 260px">',
'<b>Intructions:</b><br />',
'Click a highlighted date on the calendar to see a list of events on that day in the box below.<br />',
'<br />',
'<center>',
'<b><u>Events</u></b>',
'<form id="eventform" name="eventform" action="#" method="get">',
'<textarea name="eventlist" cols="25" rows="11" wrap="soft">Auto filled when clicking on date.</textarea>',
'</form>',
'</center></td>',
'</tr>',
'</table>',
'</td>',
'</tr>',
'</table>'
].join('');
}

function _app_explorer() {
	var menuItems = '';
	function createMenuItem(app, name) {
		return [
		'<div id="thumb-', app, '" class="desktop-thumb thumb-', app, '">',
		'<div class="thumb-button"><img src="i/ux/blank.gif" class="thumb-image" alt="', app, '" /></div>',
		'<div class="thumb-name" unselectable="on">', name, '</div>',
		'</div>'
		].join('');
	}
	$.each(dC.apps.list, function(index, value) {
		menuItems += createMenuItem(value, dC.apps.name[dC.apps.list.vIndex(value)]);
		// if (((i + 1) % items_width) == 0) this.menuItems += '<div class="clearfix"></div>';
	});
	return menuItems;
}

function _calculator() {
return [
'<div id="out"><div id="out-scroll"><div id="out-inner">',
'</div></div></div>',
'<div id="in">',
'<div class="left">&gt;</div><input type="text" spellcheck="false" value="" />',
'</div>'
].join('');
}

function _twitter() {
return [
'<input type="text" id="search"></input>',
'<table id="tweets" class="clearfix" /></table>'
].join('');
}

/* end app content */
/* begin panel variables */

var dialog_loading = new dialog('Loading','loading',false,false,false,true,50,50,100,168,'absolute',0,0,'l','t',true,'Loading...');
var user_desktop = new desktop();

/** begin app variables */

var documents = new panel('Documents','documents',true,false,true,false,false,400,402,520,520,'absolute',0,0,'r','b',true,_documents());
var preferences = new panel('Preferences','preferences',true,false,true,false,false,300,302,400,400,'absolute',0,0,'r','b',true,_preferences());
var notepad = new panel('Notepad','notepad',true,false,true,false,false,200,200,400,400,'absolute',0,0,'l','b',false,_notepad());
var flash_name = new panel('Flash Name','flash_name',true,false,true,false,false,270,270,470,470,'absolute',215,80,'l','t',false,_flash_name());
var ytinstant = new panel('YouTube Instant','ytinstant',true,true,true,true,true,500,560,900,1100,'absolute',0,0,'l','t',true,_ytinstant());
var piano = new panel('Piano','piano',true,false,true,false,true,570,570,770,1200,'absolute',0,0,'l','t',true,_piano());
var about_hnsdesktop = new panel('About HnS Desktop','about_hnsdesktop',true,false,true,false,false,400,402,520,520,'absolute',0,0,'r','b',true,_about_hnsdesktop());
var feedback = new panel('Feedback','feedback',true,false,true,false,false,400,402,520,520,'absolute',0,0,'r','b',false,_feedback());
var tic_tac_toe = new panel('Tic Tac Toe','tic_tac_toe',true,false,true,false,true,550,599,534,540,'absolute',0,0,'l','t',true,_tic_tac_toe());
var friends  = new panel('Friends','friends',true,false,true,false,true,550,599,534,538,'absolute',0,0,'l','t',true,_friends());
var goom_radio  = new panel('Goom Radio','goom_radio',true,false,true,false,true,242,242,231,231,'absolute',0,0,'l','t',true,_goom_radio());
var search = new panel('Search','search',true,false,true,false,true,550,599,534,538,'absolute',0,0,'l','t',true,_search());
var chat = new panel('Chat','chat',true,false,true,false,true,550,550,628,628,'absolute',0,0,'l','t',true,_chat());
var music = new panel('Music','music',true,false,true,false,true,64,64,316,316,'absolute',0,0,'l','t',true,_music());
var web_browser = new panel('Web Browser','web_browser',true,false,true,false,true,570,570,770,1200,'absolute',0,0,'l','t',true,_web_browser());
var torus = new panel('Torus','torus',true,false,true,false,true,550,599,534,538,'absolute',0,0,'l','t',true,_torus());
var calendar = new panel('Calendar','calendar',true,false,true,false,true,450,450,540,580,'absolute',0,0,'l','t',true,_calendar());
var app_explorer = new panel('App Explorer','app_explorer',true,false,true,false,true,450,450,540,580,'absolute',0,0,'l','t',true,_app_explorer());
var calculator = new panel('Calculator','calculator',true,false,true,false,true,642,642,708,708,'absolute',0,0,'l','t',true,_calculator());
var twitter = new panel('Twitter','twitter',true,false,true,false,true,602,602,808,808,'absolute',0,0,'l','t',true,_twitter());

/* end app variables **/
/* end panel variables */

<?php } else { ?>

/* begin panel content */

function _login() {
return [
'<div class="heading">Homenet Spaces OS</div>',
'<form action="javascript:void(0);" name="login" id="login" onsubmit="return false;">',
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
'<td class="label"><label for="remember">Remember: </label></td>',
'<td class="input">',
'<input type="checkbox" name="remember" id="remember" accesskey="m" tabindex="3" value="remember" />',
'<div class="buttons right">',
'<button type="submit" name="signin" id="signin" class="positive" accesskey="l" tabindex="4"><img src="i/ux/tick.png" alt="" />Login!</button>',
'<button type="reset" name="reset" id="reset" accesskey="c" tabindex="5"><img src="i/ux/textfield_key.png" alt="" />Clear</button>',
'<button type="button" name="register" id="signup" class="negative" accesskey="r" tabindex="6"><img src="i/ux/cross.png" alt="" />Register</button>',
'</div>',
'</td>',
'</tr>',
'<tr>',
'<td colspan="2">',
'<fb:login-button perms="user_birthday,user_hometown,user_location,user_photos,user_relationships,user_relationship_details,user_website,email"></fb:login-button>',
'<div id="fb-root"></div>',
'</td>',
'</tr>',
'</tbody>',
'</table>',
'</form>'
].join('');
}

function _register() {
return [
'<div class="heading">Register</div>',
'<form action="javascript:void(0);" name="register" id="register" onsubmit="return false;">',
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
'<tr class="fullname">',
'<td class="label"><label for="fullname">Full Name:</label></td>',
'<td class="input"><input type="text" name="fullname" id="fullname" size="26" maxlength="40" value="<?php echo $fullname; ?>" /></td>',
'</tr>',
'<tr class="email">',
'<td class="label"><label for="email">Email:</label></td>',
'<td class="input"><input type="email" name="email" id="email" size="26" maxlength="50" value="<?php echo $email; ?>" /></td>',
'</tr>',
'<tr class="gender">',
'<td class="label"><label for="gender">Gender:</label></td>',
'<td class="input">',
'<input type="radio" name="gender" id="gender" value="Male" <?php if ($gender == 'Male') { echo 'checked="checked"'; } ?> /><span class="radio">Male</span> ',
'<input type="radio" name="gender" id="gender" value="Female" <?php if ($gender == 'Female') { echo 'checked="checked"'; } ?> /><span class="radio">Female</span>',
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
<?php for ($i = 1; $i <= 31; $i++) { echo "'<option value=\"$i\""; if ($birth_day == $i) { echo "selected=\"selected\""; } echo ">$i</option>',\n"; } ?>
'</optgroup>',
'</select>',
'<select name="birth_year" id="birth_year">',
'<option value="0" <?php if ($birth_year == 0 || null) { echo 'selected="selected"'; } ?>></option>',
'<optgroup label="Year">',
<?php for ($i = 2010; $i >= 1902; $i--) { echo "'<option value=\"$i\""; if ($birth_year == $i) { echo "selected=\"selected\""; } echo ">$i</option>',\n"; } ?>
'</optgroup>',
'</select>',
'</td>',
'</tr>',
'<tr class="hometown">',
'<td class="label"><label for="hometown">Hometown:</label></td>',
'<td class="input"><input type="text" name="hometown" id="hometown" size="26" maxlength="50" value="<?php echo $hometown; ?>" /></td>',
'</tr>',
'<tr class="community">',
'<td class="label"><label for="community">Community:</label></td>',
'<td class="input"><input type="text" name="community" id="community" size="26" maxlength="50" value="<?php echo $community; ?>" />',
'<small class="formreminder">( Current Location, School, Business, or Group )</small></td>',
'</tr>',
'<tr class="hobbies">',
'<td class="label"><label for="hobbies">Hobbies / Interests:</label></td>',
'<td class="input">',
'<select name="hobbies[]" id="hobbies" size="10" multiple="multiple">',
'<optgroup label="Hobbies">',
<?php
$hobbies_list = array('Aircraft Spotting','Airbrushing','Airsofting','Acting','Aeromodeling','Amateur Astronomy','Amateur Radio','Animals/Pets/Dogs','Arts','Astrology','Astronomy','Backgammon','Badminton','Baseball','Basketball','Beach/Sun Tanning','Beachcombing','Beadwork','Beatboxing','Becoming A Child Advocate','Bell Ringing','Belly Dancing','Bicycling','Billiards','Biology','Bird Watching','Birding','BMX','Blacksmithing','Blogging','Board Games','Boating','Body Building','Bonsai Tree','Boomerangs','Bowling','Brewing Beer','Bridge Building','Bringing Food To The Disabled','Building A House For Habitat For Humanity','Building Dollhouses','Bungee Jumping','Butterfly Watching','Button Collecting',
'Cake Decorating','Calculus','Call of Duty','Calligraphy','Camping','Candle Making','Canoeing','Car Racing','Casino Gambling','Cave Diving','Celebrating Your Favorite Pastimes/Collections','Checkers','Cheerleading','Chemistry','Chess','Church/Church Activities','Cigar Smoking','Cloud Watching','Coin Collecting','Collecting','Collecting Antiques','Collecting Artwork','Collecting Music Albums','Compose Music','Computer Activities','Cooking','Cosplay','Crafts','Crafts (Unspecified)','Crochet','Crocheting','Cross-Stitch','Crossword Puzzles','Dancing','Darts','Dating','Dating Online','Diecast Collectibles','Digital Photography','Dolls','Dominoes','Drawing','Dumpster Diving','Eating Out','Educational Courses','Electronics','Embroidery','Entertaining','Exercise (Aerobics, Weights)',
'Facebook','Fast Cars','Fencing','Fishing','Flying','Football','Four Wheeling','Freecell','Freshwater Aquariums','Frisbee Golf (Frolf)','Games','Gardening','Garage Saleing','Genealogy','Geocaching','Ghost Hunting','Glowsticking','Going To Movies','Golfing','Go Kart Racing','Grip Strength','Guitar','Handwriting Analysis','Hang Gliding','Hiking','History','Home Brewing','Home Repair','Home Theater','Horseback Riding','Hot Air Ballooning','Hula Hooping','Hunting','Illusion','Internet','Jet Engines','Jewelry Making','Jigsaw Puzzles','Juggling','Keep A Journal','Kayaking','Kitchen Chemistry','Kites','Kite Boarding','Knitting','Knotting',
'Lasers','Lawn Darts','Learning A Foreign Language','Learning An Instrument','Learning To Pilot A Plane','Leathercrafting','Legos','Listening To Music','Macram&eacute;','Magic','Making Model Cars','Matchstick Modeling','Mathematics','Meditation','Microscopy','Minesweeper','Mixed Martial Arts','Metal Detecting','Model Rockets','Modeling Ships','Models','Motorcycle Racing','Motorcycles','Mountain Biking','Mountain Climbing','Musical Instruments','Needlepoint',
'Online Gambling','Origami','Other than listed','Owning An Antique Car','Pac-Man','Painting','Paintball','Papermaking','Papermache','Parachuting','People Watching','Photography','Piano','Pinball','Pinochle','Playing Cards','Playing Music','Playing Poker','Playing Team Sports','Pottery','Puppetry','Pyrotechnics','Quilting','Rafting','Railfans','R/C Boats','R/C Cars','R/C Helicopters','R/C Planes','Read Ghost Stories','Reading','Reading To The Elderly','Relaxing','Renting Movies','Rescuing Abused Or Abandoned Animals','Reviving Old Interests','Robotics','Rock Climbing','Rock Collecting','Rockets','Rocking AIDS Babies','Rubik&apos;s Cubes','Running',
'Saltwater Aquariums','School','Scrapbooking','Scuba Diving','Sewing','Shark Fishing','Shopping','Singing','Singing In Choir','Skateboarding','Sketching','Skeet Shooting','Skiing','Sky Diving','Sleeping','Smoking Pipes','Snorkeling','Soap Making','Soccer','Socializing With Friends/Neighbors','Solitaire','Spelunkering','Spending Time With Family/Kids','Spider Solitaire','Stamp Collecting','Storytelling','String Figures','Surf Fishing','Swimming',
'Tea Tasting','Tennis','Tesla Coils','Tetris','Texting','Textiles','Theater','Tic-Tac-Toe','Tombstone Rubbing','Tool Collecting','Toy Collecting','Train Collecting','Train Spotting','Traveling','Treasure Hunting','Trekkie','Tug Of War','Tutoring Children','Urban Exploration','Vacation','Video Games','Volunteer','Walking','Warhammer','Watching Sporting Events','Watching TV','Websites','Windsurfing','Wine Making','Woodworking','Working','Working In A Food Pantry','Working On Cars','Writing','Writing Music','Writing Songs','Yoga','YoYo');
$hobbies = array(); // $hobbies = explode(', ', $hobbies);
foreach ($hobbies_list as $hobby) {
	if (in_array($hobby, $hobbies)) echo "'<option value=\"" . $hobby . "\" label=\"" . $hobby . "\" selected=\"selected\">" . $hobby . "</option>',\n";
	else echo "'<option value=\"" . $hobby . "\" label=\"" . $hobby . "\">" . $hobby . "</option>',\n";
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
'<div style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">',
'<fieldset style="width: 90%;">',
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
'<fieldset style="width: 90%;">',
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
'<div style="margin-bottom: 10px;">',
'<small class="formreminder">( If you ever forget your password you will need to answer these questions to get it reset )</small>',
'</div>',
'</fieldset>',
'<br /><div class="different" style="display: none; "></div><br />',
'<fieldset>',
'<legend>Security Code</legend>',
'<table style="width: 400px;">',
'<tr class="securitycode">',
'<td><input type="text" name="securitycode" id="securitycode" size="14" maxlength="7" /></td>',
'<td><img src="captcha_securityimage.php" name="captchaimg" class="captcha" alt="Security Code" /></td>',
'<td><img src="i/captcha/arrow_refresh.png" class="captcharefresh" alt="Refresh Code" /></td>',
'</tr>',
'<tr class="securitycodeerror">',
'<td colspan="3"></td>',
'</tr>',
'</table>',
'<div id="register-button" class="shiny-button3">Register!<span></span></div>',
'</fieldset>',
'</form>',
'<br />'
].join('');
}

/* end panel content */
/* begin panel variables */

var login = new panel('Login','login',false,false,false,false,false,200,260,400,433,'absolute',0,0,'l','t',true,_login());
var register = new panel('Register','register',true,false,false,false,true,200,250,400,450,'absolute',0,0,'l','t',true,_register());
var dialog_tryagain = new dialog('Try Again','notice',false,false,false,false,50,50,100,200,'absolute',0,0,'l','t',true,'Please Try Again!');

/* end panel variables */
/* begin encryption functions */

function utf8_decode(str_data) {
    var tmp_arr = [], i = 0, ac = 0, c1 = 0, c2 = 0, c3 = 0;
    str_data += '';
    
    while ( i < str_data.length ) {
        c1 = str_data.charCodeAt(i);
        if (c1 < 128) {
            tmp_arr[ac++] = String.fromCharCode(c1);
            i++;
        } else if ((c1 > 191) && (c1 < 224)) {
            c2 = str_data.charCodeAt(i+1);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
            i += 2;
        } else {
            c2 = str_data.charCodeAt(i+1);
            c3 = str_data.charCodeAt(i+2);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }

    return tmp_arr.join('');
}

function utf8_encode(argString) {
    var string = (argString + '');
    var utftext = "";
    var start, end;
    var stringl = 0;
    start = end = 0;
    stringl = string.length;
    for (var n = 0; n < stringl; n++) {
        var c1 = string.charCodeAt(n);
        var enc = null;
        if (c1 < 128) {
            end++;
        } else if (c1 > 127 && c1 < 2048) {
            enc = String.fromCharCode((c1 >> 6) | 192) + String.fromCharCode((c1 & 63) | 128);
        } else {
            enc = String.fromCharCode((c1 >> 12) | 224) + String.fromCharCode(((c1 >> 6) & 63) | 128) + String.fromCharCode((c1 & 63) | 128);
        }
        if (enc !== null) {
            if (end > start) {
                utftext += string.substring(start, end);
            }
            utftext += enc;
            start = end = n+1;
        }
    }

    if (end > start) utftext += string.substring(start, string.length);
    return utftext;
}

function pdecode(data) {
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, dec = "", tmp_arr = [];
    if (!data) return data;
    data += '';
    do {
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));
        bits = h1<<18 | h2<<12 | h3<<6 | h4;
        o1 = bits>>16 & 0xff;
        o2 = bits>>8 & 0xff;
        o3 = bits & 0xff;
        if (h3 == 64) tmp_arr[ac++] = String.fromCharCode(o1);
        else if (h4 == 64) tmp_arr[ac++] = String.fromCharCode(o1, o2);
        else tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
    } while (i < data.length);
    dec = tmp_arr.join('');
    dec = this.utf8_decode(dec);
    return dec;
}

function pencode(data) {
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0, ac = 0, enc = "", tmp_arr = [];
    if (!data) return data;
    data = this.utf8_encode(data + '');
    do {
        o1 = data.charCodeAt(i++);
        o2 = data.charCodeAt(i++);
        o3 = data.charCodeAt(i++);
        bits = o1<<16 | o2<<8 | o3;
        h1 = bits>>18 & 0x3f;
        h2 = bits>>12 & 0x3f;
        h3 = bits>>6 & 0x3f;
        h4 = bits & 0x3f;
        tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
    } while (i < data.length);
    enc = tmp_arr.join('');
    switch (data.length % 3) {
        case 1: enc = enc.slice(0, -2) + '=='; break;
        case 2: enc = enc.slice(0, -1) + '='; break;
    }
    return enc;
}

/* end encryption functions */
<?php } ?>
$(document).ready(function() {

noFrame();

if (dC.styles.screensaver == 1) {
	var animation_canvas, animation_ctx, animation_timer;
	var currentX = 0, currentY = 0, lastX = 0, lastY = 0;
	animation_canvas = document.getElementById('c_animation');
	if (animation_canvas && animation_canvas.getContext) {
		animation_ctx = animation_canvas.getContext('2d');
		if (animation_ctx) {
			animation_canvas.height = dC.config.height;
			animation_canvas.width = dC.config.width;
			lastX = (animation_canvas.width * Math.random());
			lastY = (animation_canvas.height * Math.random());
			function animation() {
				animation_ctx.save();
				animation_ctx.translate((animation_canvas.width / 2), (animation_canvas.height / 2));
				animation_ctx.scale(0.9, 0.9);
				animation_ctx.translate((-animation_canvas.width / 2), (-animation_canvas.height / 2));
				animation_ctx.beginPath();
				animation_ctx.lineWidth = (5 + (Math.random() * 10));
				animation_ctx.moveTo(lastX, lastY);
				lastX = (animation_canvas.width * Math.random());
				lastY = (animation_canvas.height * Math.random());
				animation_ctx.bezierCurveTo(
				(animation_canvas.width * Math.random()),
				(animation_canvas.height * Math.random()),
				(animation_canvas.width * Math.random()),
				(animation_canvas.height * Math.random()),
				lastX, lastY);
				var r = (Math.floor(Math.random() * 255) + 70);
				var g = (Math.floor(Math.random() * 255) + 70);
				var b = (Math.floor(Math.random() * 255) + 70);
				var s = 'rgba(' + r + ',' + g + ',' + b +', 1.0)';
				animation_ctx.shadowColor = 'white';
				animation_ctx.shadowBlur = 10;
				animation_ctx.strokeStyle = s;
				animation_ctx.stroke();
				animation_ctx.restore();
			}
		}
	}

	function clear_screensaver() {
		dC.user.time_inactive = 0;
		clearInterval(animation_timer);
		$("div#desktop, div#taskbar").css('visibility','visible');
		$("canvas#c_animation").css('visibility','hidden');
		animation_ctx.fillStyle = "rgb(255,255,255)";
		animation_ctx.fillRect(0, 0, animation_canvas.width, animation_canvas.height);
	}

	function screensaver_time() {
		if (dC.user.styles.screensaver_time > 0) return dC.user.styles.screensaver_time;
		else return dC.styles.screensaver_time;
	}
	
	function inactive_test() {
		if (!window.ytplayer || (window.playerState == 2)) {
			if (dC.user.time_inactive == screensaver_time()) {
				var animation_speed = [35,50,75,100];
				$("canvas#c_animation").css('visibility','visible');
				$("div#desktop, div#taskbar").css('visibility','hidden');
				animation_timer = setInterval(animation, animation_speed[mt_rand(0,3)]);
			}
		}
	}
	
	setInterval(inactive_test, 1000);
}

getdate();

<?php if (!isset($_SESSION['logged']) || ($_SESSION['logged'] != 1)) { ?>
login.display();
register.display();
display(login); // $("div#login").keepcenter();

function signin() {
	if (($("div#login input[type='text']#username").val() != "") && ($("div#login input[type='password']#password").val() != "")) {
		if ($("div#login").is(":visible")) {
			$("div#login").hide();
			var str = $("div#login form#login").serialize();
			$.post("login.php", str, function(data) {
				if (data == "Success") location.reload();
				else {
					$("div#login input[type='password']#password").val('');
					$("div#login input").blur();
					dialog_tryagain.display();
					$("div#login").css('opacity', 0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
					$("div#notice").css('opacity', 0).show().animate({opacity:1}, 1000).animate({opacity:0}, 1000, function() { $("div#notice").hide(); $("div#login input[type='password']#password").focus(); });
				}
			});
		} else {
			if (($("div#login").queue().length != 0) && ($("div#notice").queue().length != 0)) $("div#login, div#notice").dequeue();
		}
	} else {
		if ($("div#login").not(":visible") && $("div#notice").not(":hidden")) {
			if (($("div#login").queue().length != 0) && ($("div#notice").queue().length != 0)) $("div#login, div#notice").dequeue();
		}
	}
}

$("div#login input[type='text']#username").focus();
$("div#login button[type='submit']#signin").click(function() { signin(); });
$("div#login button[type='button']#signup").click(function() {
	display(register);
	$("div#register div.body").addClass("scroll");
	$("div#register").addClass("fullscreen");
	$("div#register").height(dC.config.height);
	$("div#register div.pnl").height(dC.config.height);
	$("div#register div.pnl-bwrap").css('height', (dC.config.height - 30));
	$("div#register div.content").css('height', $("div#register div.pnl-bwrap").height());
	$("div#register div.content").css('width', ($("div#register div.pnl-bwrap").width() - 42));
	$("div#register div.tl.maximize").addClass("restore");
	$("div#register div.tl.toggle").hide();
	$("div#register div.tl.toggle").removeClass("toggledown");
	$("div#register input[type='text']#username_reg").focus();
	preloadImages("i/ux/cancel.png");
});

$("div#register img.captcharefresh").click(refreshCaptcha);

<?php /*

if (empty($username_reg)) $registererrors[] = 'Username cannot be blank.';
if (preg_match('/[,]/', $username_reg)) $registererrors[] = 'Username cannot have commas.';
if (preg_match('/[ ]/', $username_reg)) $registererrors[] = 'Username cannot have spaces.';
if (preg_match('/[-]/', $username_reg)) $registererrors[] = 'Username cannot have dashes.';
if (preg_match('/[.]/', $username_reg)) $registererrors[] = 'Username cannot have periods.';

$query = 'SELECT username FROM login WHERE username = "' . $username_reg . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) > 0) { $registererrors[] = 'Username ' . $username_reg . ' is already registered.'; $username_reg = ''; }
mysql_free_result($result);

if (empty($password) && !empty($password_ver)) $registererrors[] = 'Password cannot be blank.';
if (empty($password) && empty($password_ver)) $registererrors[] = 'Passwords cannot be blank.';
if (!empty($password)) {
if (empty($password_ver)) $registererrors[] = 'Please confirm your password.';
if (!empty($password_ver)) if ($password != $password_ver) $registererrors[] = 'Both of your passwords need to match.';
if ($username == $password) $registererrors[] = 'Username & Password Cannot Be The Same.';
}
if (empty($firstname)) $registererrors[] = 'First Name cannot be blank.';
if (empty($lastname)) $registererrors[] = 'Last Name cannot be blank.';
if (empty($email)) $registererrors[] = 'Email Address cannot be blank.';
else if (!preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}?$/i", $email)) $registererrors[] = 'Email Address should be in correct form.';
if (empty($gender)) $registererrors[] = 'Gender cannot be blank.';
if ($birth_month == 0 && $birth_day == 0 && $birth_year == 0) $registererrors[] = 'Birth Date cannot be blank.';
elseif ($birth_month == 0) $registererrors[] = 'Birth Month cannot be blank.';
elseif ($birth_day == 0) $registererrors[] = 'Birth Day cannot be blank.';
elseif ($birth_year == 0) $registererrors[] = 'Birth Year cannot be blank.';
if (empty($hometown)) $registererrors[] = 'Hometown cannot be blank.';
if (empty($hobbies)) $registererrors[] = 'Hobbies cannot be blank.';
if ($security_question1 == $security_question2) $registererrors[] = 'Security Questions cannot be the same.';
if (empty($security_question1) || ($security_question1 == 0)) $registererrors[] = 'Security Question 1 cannot be blank.';
if (empty($security_answer1)) $registererrors[] = 'Security Answer 1 cannot be blank.';
if (empty($security_question2) || ($security_question2 == 0)) $registererrors[] = 'Security Question 2 cannot be blank.';
if (empty($security_answer2)) $registererrors[] = 'Security Answer 2 cannot be blank.';
if ($_POST['txtsecuritycode'] != $_SESSION['SECURITY_CODE']) $registererrors[] = 'Security Code is case-sensitive and cannot be incorrect.';

*/ ?>

// CHECK VALIDITY OF INPUTS ON CHANGE

function validateregister() {
	$("img.error").hide();
	$("span.error").hide();
	$("tr.securitycodeerror").hide();
	$("tr.error").removeClass("error");
	$("div.error").removeClass("error");
	$("div.different").hide();

	var hasError = false;
	var reg = /^./;
	var usernameReg = /[.\/:*?'"<>|]/; // no commas, spaces, dashes, or periods
	var nameReg = /[A-Za-z'-]/;
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var emailReg2 = /^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}?$/i;
	var errorImage = '<img src="i/ux/cancel.png" alt="" class="error" />';
	
	function serror(data) { return '<span class="error">' + data + '</span>'; }

	var usernamereg_val = $("input[type='text']#username_reg").val();
	if (usernamereg_val == '') {
		$("input[type='text']#username_reg").parent().append(errorImage + serror("You forgot to enter a username."));
		$("tr.username_reg").addClass("error");
		hasError = true;
	} else if (usernameReg.test(usernamereg_val)) {
		$("input[type='text']#username_reg").after(serror("Enter a valid username."));
		$("tr.username_reg").addClass("error");
		hasError = true;
	}

	var passwordreg_val = $("input[type='password']#password_reg").val();
	if (passwordreg_val == '') {
		$("input[type='password']#password_reg").after(errorImage + serror("You forgot to enter a password."));
		$("tr.password_reg").addClass("error");
		hasError = true;
	} else if (!reg.test(passwordreg_val)) {
		$("input[type='password']#password_reg").after(serror("Enter a valid password."));
		$("tr.password_reg").addClass("error");
		hasError = true;
	}

	var passwordverreg_val = $("input[type='password']#password_ver_reg").val();
	if (passwordverreg_val == '') {
		$("input[type='password']#password_ver_reg").after(errorImage + serror("You forgot to confirm your password."));
		$("tr.password_ver_reg").addClass("error");
		hasError = true;
	} else if (!reg.test(passwordverreg_val)) {
		$("input[type='password']#password_ver_reg").after(serror("Enter a valid password."));
		$("tr.password_ver_reg").addClass("error");
		hasError = true;
	}

	if (passwordreg_val != passwordverreg_val) {
		$("input[type='password']#password_ver_reg").parent().append(serror("Passwords need to match."));
		$("tr.password_ver_reg").addClass("error");
		hasError = true;
	}

	var fullname_val = $("input[type='text']#fullname").val();
	if (fullname_val == '') {
		$("input[type='text']#fullname").after(errorImage + serror("You forgot to enter your full name."));
		$("tr.fullname").addClass("error");
		hasError = true;
	} else if (!nameReg.test(fullname_val)) {
		$("input[type='text']#fullname").after(errorImage + serror("Enter a valid full name."));
		$("tr.fullname").addClass("error");
		hasError = true;
	} else {
		var name_array = fullname_val.split(' ');
		if (!name_array[0] || !name_array[1]) {
			$("input[type='text']#fullname").after(errorImage + serror("Enter a valid full name."));
			$("tr.fullname").addClass("error");
			hasError = true;
		} else { fullname_val = ucname(fullname_val); $("input[type='text']#fullname").val(fullname_val); }
	}

	var email_val = $("input[type='email']#email").val();
	if (email_val == '') {
		$("input[type='email']#email").parent().append(errorImage + serror("You forgot to enter your email address."));
		$("tr.email").addClass("error");
		hasError = true;
	} else if (!emailReg.test(email_val)) {
		$("input[type='email']#email").after(serror("Enter a valid email address."));
		$("tr.email").addClass("error");
		hasError = true;
	}

	var gender_val = $("input[type='radio']#gender:checked").length;
	if (gender_val == 0) {
		$("tr.gender td.input").append(errorImage + serror("You forgot to enter your gender."));
		$("tr.gender").addClass("error");
		hasError = true;
	}

	<?php /*
	var birthdate_val = $("select#birthdate").val();
	if (birthdate_val == '') {
		$("input[type='text']#birthdate").after(errorImage + serror("You forgot to enter your birthdate."));
		$("tr.birthdate").addClass("error");
		hasError = true;
	} else if (!reg.test(birthdate_val)) {	
		$("input[type='text']#birthdate").after(serror("Enter a valid birthdate."));
		$("tr.birthdate").addClass("error");
		hasError = true;
	}

	if ($birth_month == 0 && $birth_day == 0 && $birth_year == 0) $registererrors[] = 'Birth Date cannot be blank.';
	elseif ($birth_month == 0) $registererrors[] = 'Birth Month cannot be blank.';
	elseif ($birth_day == 0) $registererrors[] = 'Birth Day cannot be blank.';
	elseif ($birth_year == 0) $registererrors[] = 'Birth Year cannot be blank.';

	*/ ?>
	var hometown_val = $("input[type='text']#hometown").val();
	if (hometown_val == '') {
		$("input[type='text']#hometown").after(errorImage + serror("You forgot to enter your hometown."));
		$("tr.hometown").addClass("error");
		hasError = true;
	} else if (!reg.test(hometown_val)) {
		$("input[type='text']#hometown").after(serror("Enter a valid hometown."));
		$("tr.hometown").addClass("error");
		hasError = true;
	}

	var hobbies_val = $("select#hobbies option:selected").length;
	if (hobbies_val == 0) {
		$("select#hobbies").after(errorImage + serror("You forgot to select your hobbies."));
		$("tr.hobbies").addClass("error");
		hasError = true;
	}

	var securityquestion1_val = $("select#security_question1 option:selected").val();
	if (securityquestion1_val == 0) {
		$("select#security_question1").after(errorImage + serror("You forgot to select a security question."));
		$("tr.security_question1").addClass("error");
		hasError = true;
	}

	var securityanswer1_val = $("input[type='text']#security_answer1").val();
	if (securityanswer1_val == '') {
		$("input[type='text']#security_answer1").after(errorImage + serror("You forgot to enter your security answer."));
		$("tr.security_answer1").addClass("error");
		hasError = true;
	} else if (!reg.test(securityanswer1_val)) {
		$("input[type='text']#security_answer1").after(serror("Enter a valid security answer."));
		$("tr.security_answer1").addClass("error");
		hasError = true;
	}

	var securityquestion2_val = $("select#security_question2 option:selected").val();
	if (securityquestion2_val == 0) {
		$("select#security_question2").after(errorImage + serror("You forgot to select a security question."));
		$("tr.security_question2").addClass("error");
		hasError = true;
	}

	var securityanswer2_val = $("input[type='text']#security_answer2").val();
	if (securityanswer2_val == '') {
		$("input[type='text']#security_answer2").after(errorImage + serror("You forgot to enter your security answer."));
		$("tr.security_answer2").addClass("error");
		hasError = true;
	} else if (!reg.test(securityanswer2_val)) {
		$("input[type='text']#security_answer2").after(serror("Enter a valid security answer."));
		$("tr.security_answer2").addClass("error");
		hasError = true;
	}

	if ((securityquestion1_val == securityquestion2_val) && (securityquestion1_val != 0) && (securityquestion2_val != 0)) {
		$("div.different").html(errorImage + serror("Security Questions Need To Be Different."));
		$("div.different").addClass("error").show();
		hasError = true;
	}

	var securitycode_val = $("input[type='text']#securitycode").val();
	if (securitycode_val == '') {
		$("tr.securitycodeerror td").html(errorImage + serror("You forgot to enter the security code."));
		$("tr.securitycodeerror").show();
		$("tr.securitycode").addClass("error");
		hasError = true;
	} else if ((!reg.test(securitycode_val)) || (securitycode_val.length != 5)) {
		$("tr.securitycodeerror td").html(serror("Enter a valid security code."));
		$("tr.securitycodeerror").show();
		$("tr.securitycode").addClass("error");
		hasError = true;
	}

	if (!hasError) {
		// $(this).hide();
		$("div#register-button").prepend('<img src="i/ux/loading.gif" alt="Loading" id="loading" />');
		var str = $("div#register form#register").serialize();

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
		$("div#register div.pnl-mc").animate({scrollTop:0}, 500);
	}
}

$("div#register-button").click(validateregister);

var bImages = '"i/ux/blank.gif","i/ux/s.gif","i/ux/default.jpg","i/ux/application.png","i/ux/loading.gif""i/ux/login.png","i/ux/logout.png","i/ux/grid.gif","i/ux/startmenu/user_image.png","i/ux/taskbar/taskbar-split-h.gif","i/ux/taskbar/startbutton.gif","i/ux/taskbar/startbutton-icon.gif","i/ux/taskbar/quickstart-button.gif","i/ux/taskbar/taskbutton.gif"';
bImages += ',"i/apps/icons/documents.png","i/apps/icons/preferences.png","i/apps/icons/notepad.png","i/apps/icons/flash_name.png","i/apps/icons/ytinstant.png","i/apps/icons/piano.png","i/apps/icons/about_hnsdesktop.png","i/apps/icons/feedback.png","i/apps/icons/tic_tac_toe.png","i/apps/icons/friends.png","i/apps/icons/goom_radio.png","i/apps/icons/search.png","i/apps/icons/chat.png","i/apps/icons/music.png","i/apps/icons/web_browser.png","i/apps/icons/torus.png","i/apps/icons/calendar.png","i/apps/icons/app_explorer.png","i/apps/icons/calculator.png","i/apps/icons/twitter.png"';
bImages += ',"i/apps/thumbs/documents.png","i/apps/thumbs/preferences.png","i/apps/thumbs/notepad.png","i/apps/thumbs/flash_name.png","i/apps/thumbs/ytinstant.png","i/apps/thumbs/piano.png","i/apps/thumbs/about_hnsdesktop.png","i/apps/thumbs/feedback.png","i/apps/thumbs/tic_tac_toe.png","i/apps/thumbs/friends.png","i/apps/thumbs/goom_radio.png","i/apps/thumbs/search.png","i/apps/thumbs/chat.png","i/apps/thumbs/music.png","i/apps/thumbs/web_browser.png","i/apps/thumbs/torus.png","i/apps/thumbs/calendar.png","i/apps/thumbs/app_explorer.png","i/apps/thumbs/calculator.png","i/apps/thumbs/twitter.png"';
bImages += ',"i/ux/preferences/thumbs.png","i/ux/preferences/autorun.png","i/ux/preferences/quickstart.png","i/ux/preferences/appearance.png","i/ux/preferences/wallpaper.png"';
bImages += ',"i/apps/ytinstant/logo2.png","i/apps/ytinstant/loading.gif","i/apps/ytinstant/playing.gif","i/apps/ytinstant/player_play-1.png","i/apps/ytinstant/player_pause-1.png","i/apps/ytinstant/overlay-play.png"';
bImages += ',"i/apps/torus/but_main.png","i/apps/torus/but_resume.png","i/apps/torus/but_restart.png","i/apps/torus/but_quit.png","i/apps/torus/but_play.png","i/apps/torus/but_pause.png","i/apps/torus/but_go.png","i/apps/torus/but_settings.png","i/apps/torus/but_help.png","i/apps/torus/but_high.png","i/apps/torus/title_traditional.png","i/apps/torus/title_time.png","i/apps/torus/title_garbage.png","i/apps/torus/title_help.png","i/apps/torus/title_high.png","i/apps/torus/title_settings.png","i/apps/torus/base0.png","i/apps/torus/panel.png","i/apps/torus/blocks.png","i/apps/torus/menu.png","i/apps/torus/modes.png","i/apps/torus/close.png","i/apps/torus/coins.png","i/apps/torus/paused.png","i/apps/torus/game_over.png","i/apps/torus/skull.png"';
setTimeout('preloadImages("' + (pImage++) + '",' + bImages + ');', 2000);
<?php } else { ?>

/* begin initiate desktop */

// ANIMATE ALL OPACITY STYLES

dialog_loading.display();
$("div#loading").css('opacity', 0).show().animate({opacity:1}, 600);
$("body").prepend(blackout);
user_desktop.display();

$("div#startmenu div.startmenu-bwrap").height(($("div#startmenu").height() - 30));
$("div#blackout").css('opacity', .5).animate({opacity:.5}, 1400).animate({opacity:0}, 1200);
$("div#loading").css('opacity', 1).animate({opacity:1}, 600).animate({opacity:0}, 1000);
$("div#desktop").hide().css('opacity', 0);
$("div#desktop").animate({opacity:0}, 1800).show().animate({opacity:1}, 1400);
$("div#taskbar").hide().css('opacity', 0);

if ((dC.user.styles.transparency == 1) || (dC.styles.transparency == 1)) {
	$("div#taskbar").animate({opacity:0}, 1800).show().animate({opacity:.8}, 1400);
} else if (dC.user.styles.transparency == 0) {
	$("div#taskbar").animate({opacity:0}, 1800).show().animate({opacity:1}, 1400);
}

setTimeout('$("div#blackout").remove(); $("div#loading").remove()', 5000);

var bImages = '"i/ux/blank.gif","i/ux/s.gif","i/ux/default.jpg","i/ux/application.png","i/ux/loading.gif","i/ux/login.png","i/ux/register.png","i/ux/logout.png","i/ux/grid.gif","i/ux/startmenu/user_image.png","i/ux/taskbar/taskbar-split-h.gif","i/ux/taskbar/startbutton.gif","i/ux/taskbar/startbutton-icon.gif","i/ux/taskbar/quickstart-button.gif","i/ux/taskbar/taskbutton.gif"';
bImages += ',"i/apps/icons/documents.png","i/apps/icons/preferences.png","i/apps/icons/notepad.png","i/apps/icons/flash_name.png","i/apps/icons/ytinstant.png","i/apps/icons/piano.png","i/apps/icons/about_hnsdesktop.png","i/apps/icons/feedback.png","i/apps/icons/tic_tac_toe.png","i/apps/icons/friends.png","i/apps/icons/goom_radio.png","i/apps/icons/search.png","i/apps/icons/chat.png","i/apps/icons/music.png","i/apps/icons/web_browser.png","i/apps/icons/torus.png","i/apps/icons/calendar.png","i/apps/icons/app_explorer.png","i/apps/icons/calculator.png","i/apps/icons/twitter.png"';
bImages += ',"i/apps/thumbs/documents.png","i/apps/thumbs/preferences.png","i/apps/thumbs/notepad.png","i/apps/thumbs/flash_name.png","i/apps/thumbs/ytinstant.png","i/apps/thumbs/piano.png","i/apps/thumbs/about_hnsdesktop.png","i/apps/thumbs/feedback.png","i/apps/thumbs/tic_tac_toe.png","i/apps/thumbs/friends.png","i/apps/thumbs/goom_radio.png","i/apps/thumbs/search.png","i/apps/thumbs/chat.png","i/apps/thumbs/music.png","i/apps/thumbs/web_browser.png","i/apps/thumbs/torus.png","i/apps/thumbs/calendar.png","i/apps/thumbs/app_explorer.png","i/apps/thumbs/calculator.png","i/apps/thumbs/twitter.png"';
bImages += ',"i/ux/preferences/thumbs.png","i/ux/preferences/autorun.png","i/ux/preferences/quickstart.png","i/ux/preferences/appearance.png","i/ux/preferences/wallpaper.png"';
bImages += ',"i/apps/ytinstant/logo2.png","i/apps/ytinstant/loading.gif","i/apps/ytinstant/playing.gif","i/apps/ytinstant/player_play-1.png","i/apps/ytinstant/player_pause-1.png","i/apps/ytinstant/overlay-play.png"';
bImages += ',"i/apps/torus/but_main.png","i/apps/torus/but_resume.png","i/apps/torus/but_restart.png","i/apps/torus/but_quit.png","i/apps/torus/but_play.png","i/apps/torus/but_pause.png","i/apps/torus/but_go.png","i/apps/torus/but_settings.png","i/apps/torus/but_help.png","i/apps/torus/but_high.png","i/apps/torus/title_traditional.png","i/apps/torus/title_time.png","i/apps/torus/title_garbage.png","i/apps/torus/title_help.png","i/apps/torus/title_high.png","i/apps/torus/title_settings.png","i/apps/torus/base0.png","i/apps/torus/panel.png","i/apps/torus/blocks.png","i/apps/torus/menu.png","i/apps/torus/modes.png","i/apps/torus/close.png","i/apps/torus/coins.png","i/apps/torus/paused.png","i/apps/torus/game_over.png","i/apps/torus/skull.png"';
preloadImages((pImage++) + ',' + bImages);

// document.getElementById("desktop").appendChild(contextMenu_content);

/* end initiate desktop */
/* begin set desktop config */
/** begin desktop config */

$("div#desktop-view").css('height', (dC.config.height - (dC.taskbar.height2)));
$("div.desktop-body").css('height', (dC.config.height - (dC.taskbar.height2)));
$("div.desktop-thumb").css({'height':'auto','min-height':dC.desktop.thumb_height,'width':dC.desktop.thumb_width});

if (dC.user.launchers.thumbs != "") for (var i = 0; i < dC.user.launchers.thumbs.length; i++) $("div#desktop div.desktop-body div#thumb-" + dC.user.launchers.thumbs[i]).css('display','block');
else $("div#desktop div.desktop-body div.desktop-thumb").css('display','block');
if (dC.user.launchers.quickstart != "") for (var i = 0; i < dC.user.launchers.quickstart.length; i++) $("div#taskbar div#quickstart-panel li#quickbutton-" + dC.user.launchers.quickstart[i]).css('display','block');
else $("div#taskbar div#quickstart-panel li.quickbutton").css('display','block');

/* end desktop config **/
/** begin taskbar config */

$("div#taskbar div#panel-wrap").width(dC.config.width - dC.taskbar.start_width + 20);
$("div#taskbar div#taskbuttons-panel").width(dC.config.width - (dC.taskbar.start_width + dC.taskbar.quickstart_width));
$("div#taskbar div.taskbuttons-strip-wrap").width(dC.config.width - (dC.taskbar.start_width + dC.taskbar.quickstart_width + dC.taskbar.tray_width));
$("div#taskbar ul#tray-strip").width(dC.config.width - (dC.taskbar.start_width + dC.taskbar.quickstart_width + dC.taskbar.tray_width));
$("div#taskbar div#tray-panel").width(dC.taskbar.tray_width);
$("div#taskbar div#quickstart-panel").width(dC.taskbar.quickstart_width);
$("div#taskbar div#taskbuttons-panel").css('left', dC.taskbar.quickstart_width);

if (dC.user.launchers.startmenuapps != "") $.each(dC.user.launchers.startmenuapps, function(index, value) { $("div#startmenu ul.apps-menu-list li#" + value).css('display','block'); });
else $("div#startmenu ul.apps-menu-list li.list-item").css('display','block');
if (dC.user.launchers.startmenutools != "") $.each(dC.user.launchers.startmenutools, function(index, value) { $("div#startmenu ul.tls-menu-list li#" + value).css('display','block'); });
else $("div#startmenu ul.tls-menu-list li.list-item").css('display','block');

/* end taskbar config **/
/** begin user styles */

if (dC.user.image != '') $("div#startmenu div.startmenu-header div.image img.userimage").attr('src','/uploads/' + dC.user.username + '/images/thumb/' + dC.user.image);
else $("div#startmenu div.startmenu-header div.image img.userimage").attr('src','i/ux/default.jpg');
if (dC.user.styles.transparency == 1) setTimeout('$("div#taskbar").addClass("transparent8"); $("div#taskbar").css("opacity","1")', 5000); // check checkbox
else if (dC.user.styles.transparency == 0) setTimeout('$("div#taskbar").removeClass("transparent8"); $("div#taskbar").css("opacity","1")', 5000);

/* end user styles **/
/* end set desktop config */
/* begin autorun functions */

try {
	for (a in dC.apps.list) eval(dC.apps.list[a] + '.display();');
	if (dC.user.launchers.autorun != "") for (a in dC.apps.list) eval('if (in_array(\'' + dC.apps.list[a] + '\', dC.user.launchers.autorun)) display(' + dC.apps.list[a] + ');');
	else for (a in dC.apps.list) eval('if (in_array(\'' + dC.apps.list[a] + '\', dC.launchers.autorun)) display(' + dC.apps.list[a] + ');');
} catch(e) {}

/* end autorun functions */

<?php } ?>

if (window.location.hash) setTimeout("launchApps();", 4000);

//<script src="http://connect.facebook.net/en_US/all.js"></script>
/*
window.fbAsyncInit = function() {
FB.init({
appId  : 'YOUR APP ID',
status : true, // check login status
cookie : true, // enable cookies to allow the server to access the session
xfbml  : true  // parse XFBML
});
};

(function() {
var e = document.createElement('script');
e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
e.async = true;
document.getElementById('fb-root').appendChild(e);
}());

FB.init({appId: 'your app id', status: true, cookie: true, xfbml: true});
FB.Event.subscribe('auth.sessionChange', function(response) {
if (response.session) {
// A user has logged in, and a new cookie has been saved
} else {
// The user has logged out, and the cookie has been cleared
}
});

FB.login(function(response) {
if (response.session) {
// user successfully logged in
} else {
// user cancelled login
}
});

FB.login(function(response) {
if (response.session) {
if (response.perms) {
// user is logged in and granted some permissions.
// perms is a comma separated list of granted permissions
} else {
// user is logged in, but did not grant any permissions
}
} else {
// user is not logged in
}
}, {perms:'read_stream,publish_stream,offline_access'});

FB.logout(function(response) {
// user is now logged out
});
*/
/*
$.networkDetection = function(url,interval) {
	var url = url;
	var interval = interval;
	online = false;

	this.StartPolling = function() {
		this.StopPolling();
		this.timer = setInterval(poll, interval);
	};

	this.StopPolling = function() {
		clearInterval(this.timer);
	};

	this.setPollInterval = function(i) {
		interval = i;
	};

	this.getOnlineStatus = function() {
		return online;
	};

	function poll() {
		$.ajax({
			type: "POST",
			url: url,
			dataType: "text",
			error: function() {
				online = false;
				$(document).trigger('status.networkDetection',[false]);
			},
			success: function() {
				online = true;
				$(document).trigger('status.networkDetection',[true]);
			}
		});
	};
};
*/
/*

$(document).bind("status.networkDetection", function(e, status) {
	// subscribers can be namespaced with multiple classes
	subscribers = $('.subscriber.networkDetection');

	// publish notify.networkDetection even to subscribers
	subscribers.trigger("notify.networkDetection", [status])

	// other logic based on network connectivity could go here
	// use google gears offline storage etc
	// maybe trigger some other events
});

//

$('#notifier').bind("notify.networkDetection",function(e, online) {
	// the following simply demonstrates
	notifier = $(this);

	if (online) {
		if (!notifier.hasClass("online")) {
			$(this).addClass("online").removeClass("offline").text("ONLINE");
		}
	} else {
		if (!notifier.hasClass("offline")) {
			$(this).addClass("offline").removeClass("online").text("OFFLINE");
		}
	};
});

*/
/* begin keydown and mousemove functions */

$(document.documentElement).keydown(function(e) {
	if (dC.styles.screensaver == 1) clear_screensaver();
	if (dC.user.logged) {
	} else {
		if (e.keyCode == 13) {
			if ($("div#register").is(":hidden")) signin(); else validateregister();
		}
	}
});

$(document.body).mousemove(function(e) {
	if ((e.pageX != dC.user.mouseX) || (e.pageY != dC.user.mouseY)) {
		dC.user.mouseX = e.pageX;
		dC.user.mouseY = e.pageY;
		if (dC.styles.screensaver == 1) clear_screensaver();
	}
});

/* end keydown and mousemove functions */
});

$(window).load(function() {

/* begin window drag effect functions */

$("div.phdr").mousedown(function(e) {
	var mdown = new div_selection(e, 4);
	if (!$(mdown.event).hasClass("tl")) {
		$(mdown.div_pnl()).addClass("transparent5");
		$(mdown.div_pnl_tl()).addClass("transparent5");
		$(mdown.div_pnltl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});
		if ($(mdown.div_pnl()).height() == 24) {
			$(mdown.div_pnltl()).css({
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
		$(mdown.div_pnl_bwrap()).css('visibility','hidden');
	}
});

$("span.phdr-text").mousedown(function(e) {
	var mdown = new div_selection(e, 5);
	if (!$(mdown.event).hasClass("tl")) {
		$(mdown.div_pnl()).addClass("transparent5");
		$(mdown.div_pnl_tl()).addClass("transparent5");
		$(mdown.div_pnltl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});
		if ($(mdown.div_pnl()).height() == 24) {
			$(mdown.div_pnltl()).css({
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
		$(mdown.div_pnl_bwrap()).css('visibility','hidden');
	}
});

$("div.phdr").mouseup(function(e) {
	var mup = new div_selection(e, 4);
	if (!$(mup.event).hasClass("tl")) {
		$(mup.div_pnl()).removeClass("transparent5");
		$(mup.div_pnl_tl()).removeClass("transparent5");
		$(mup.div_pnltl()).css({'background-color':'','border-bottom':'0'});
		$(mup.div_pnltl()).css({
			'border-bottom-left-radius':'0',
			'border-bottom-right-radius':'0',
			'-khtml-border-radius-bottomleft':'0',
			'-khtml-border-radius-bottomright':'0',
			'-moz-border-radius-bottomleft':'0',
			'-moz-border-radius-bottomright':'0',
			'-webkit-border-bottom-left-radius':'0',
			'-webkit-border-bottom-right-radius':'0'
		});
		$(mup.div_pnl_bwrap()).css('visibility','visible');
	}
});

$("span.phdr-text").mouseup(function(e) {
	var mup = new div_selection(e, 5);
	if (!$(mup.event).hasClass("tl")) {
		$(mup.div_pnl()).removeClass("transparent5");
		$(mup.div_pnl_tl()).removeClass("transparent5");
		$(mup.div_pnltl()).css({'background-color':'','border-bottom':'0'});
		$(mup.div_pnltl()).css({
			'border-bottom-left-radius':'0',
			'border-bottom-right-radius':'0',
			'-khtml-border-radius-bottomleft':'0',
			'-khtml-border-radius-bottomright':'0',
			'-moz-border-radius-bottomleft':'0',
			'-moz-border-radius-bottomright':'0',
			'-webkit-border-bottom-left-radius':'0',
			'-webkit-border-bottom-right-radius':'0'
		});
		$(mup.div_pnl_bwrap()).css('visibility','visible');
	}
});

/* end window drag effect functions */
/* begin window tool functions */

$("div.tl.close").click(function(e) {
	var close = new div_selection(e, 7);
	var app = close.main();
	// if ($(close.div_main() + " div.tl.close").hasClass("on"));
	if (dC.user.logged) {
		if ($(close.div_main()).hasClass("fullscreen")) $(close.div_main() + " div.tl.restore").click();
		if ($(close.div_pnl_bwrap()).css('visibility') == "hidden") $(close.div_main() + " div.tl.toggle").click();
		if (app == "preferences") {
			if ($("div#preferences div.body div#splash").is(":hidden")) {
				$("div#preferences div.tl.dblarrowleft").hide();
				$("div#preferences div.tl.maximize").hide();
				$("div#preferences div.body").children().hide();
				$("div#preferences div.body div#splash").show();
			}
		} else if (app == "ytinstant") {
			if ($("div#ytinstant div#playlistWrapper").is(":hidden")) $("div#ytinstant div.tl.config").click();
			$("div#ytinstant input[type='text']#searchBox").val('');
			clearHash(); resetTitle();
		} else if (app == "goom_radio") $("div#goom_radio div#goom").empty();
		else if (app == "chat") $("div#chat div#chatarea").empty();
		else if (app == "music") {
			try { $("div#music audio#musicplayer").pause(); } catch(e) {}
		} else if (app == "web_browser") {
			$("div#web_browser iframe#browser").attr('src','http://www.google.com');
		} else if (app == "twitter") {
			$("div#twitter input[type='text']#search").val('');
			clearInterval(queryTwitter);
		}
		var tbutton = "ul#taskbuttons-strip li#taskbutton-" + app;
		$(tbutton).hide();
	} else { if (app == "register") $("div#login input[type='text']#username").focus(); }
	$(close.div_main()).hide();
});

$("div.tl.maximize").toggle(function(e) {
	var maximize1 = new div_selection(e, 7); var app = maximize1.main();
	var maximize2 = maximize1.div_pnl() + '-header div.tl.maximize';
	var maximize3 = maximize1.div_pnl() + '-header div.tl.toggle';
	$(maximize1.div_main()).addClass("fullscreen");
	$(maximize1.div_pnl()).addClass("fullscreen");
	$(maximize1.div_main()).removeClass("drsElement");
	$(maximize2).addClass("restore");
	$(maximize3).hide();
	$(maximize3).removeClass("toggledown");
	if ($(maximize1.div_pnl_bwrap()).css('visibility') == "hidden") $(maximize1.div_pnl_bwrap()).css('visibility','visible');
	$(maximize1.div_pnl_bwrap()).css('height', dC.config.height - (dC.taskbar.height + 32));
	if (!dC.user.logged) {
		$(maximize1.div_main()).height(dC.config.height);
		$(maximize1.div_pnl()).height(dC.config.height);
	} else {
		$(maximize1.div_pnl()).height(dC.config.height - (dC.taskbar.height2));
		$(maximize1.div_main() + " div.content").css('height', $(maximize1.div_main() + " div.pnl-bwrap").height() - 2);
		$(maximize1.div_main() + " div.content").css('width', $(maximize1.div_main() + " div.pnl-bwrap").width() - 16);
		if (app == "ytinstant") $("div#ytinstant iframe#fblike").height(70);
	}
},
function(e) {
	var restore1 = new div_selection(e, 7); var app = restore1.main();
	var restore2 = restore1.div_pnl() + '-header div.tl.maximize';
	var restore3 = restore1.div_pnl() + '-header div.tl.toggle';
	$(restore1.div_main()).removeClass("fullscreen");
	$(restore1.div_pnl()).removeClass("fullscreen");
	$(restore1.div_main()).addClass("drsElement");
	$(restore2).removeClass("restore");
	$(restore3).show();
	$(restore1.div_pnl()).height(100 + '%'); // or clear this height value
	$(restore1.div_pnl_bwrap()).height(($(restore1.div_pnl()).height() - 30));
	if (dC.user.logged) {
		$(restore1.div_main() + " div.content").css('height', $(restore1.div_main() + " div.pnl-bwrap").height() - 2);
		$(restore1.div_main() + " div.content").css('width', $(restore1.div_main() + " div.pnl-bwrap").width() - 16);
		if (app == "ytinstant") $("div#ytinstant iframe#fblike").height(24);
	}
});

$("div.tl.minimize").click(function(e) {
	var minimize = new div_selection(e, 7);
	$(minimize.div_main()).css('visibility','hidden');
	if ($(minimize.div_pnl()).height() != 24) $(minimize.div_main() + " div.tl.toggle").click();
});

$("div.tl.toggle").click(function(e) { // WHEN TOGGLED CHANGE SIZE OF PANEL PARENT
	var toggle = new div_selection(e, 7);
	if ($(toggle.div_pnl_bwrap()).css('visibility') == "hidden") {
		$(toggle.div_pnl()).animate({'height':'100%'}, 0);
		$(toggle.div_pnl_bwrap()).css('visibility','visible');
	} else {
		if (!$(toggle.div_pnl()).hasClass("fullscreen")) {
			$(toggle.div_pnl()).animate({'height':'24px'}, 0);
			$(toggle.div_pnl_bwrap()).css('visibility','hidden');
		}
	}
});

$("div.tl.toggle").toggle(function (e) {
	var toggle_arrow = new div_selection(e, 7);
	if (!$(toggle_arrow.div_pnl()).hasClass("fullscreen")) $(this).addClass("toggledown");
},
function () {
	$(this).removeClass("toggledown");
});

/* end window tool functions */
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>

/* begin desktop functions */

$("div.desktop-body").click(function(e) {
	var target = new div_selection(e, 0);
	if (target.target_class() == "desktop-body") {
		$("div.desktop-body").children(".desktop-thumb-selected").removeClass("desktop-thumb-selected");
		if ($("div#startmenu").is(":visible")) $("div#startmenu").hide();
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
	if ($("div#startmenu").is(":visible")) $("div#startmenu").hide();
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
	$("div#" + tthumb + " div.pnl").removeClass("transparent5");
	$("div#" + tthumb + " div.tl").removeClass("transparent5");
	$("div#" + tthumb + " div.pnl-tl").css({'background-color':'','border-bottom':'0'});
	$("div#" + tthumb + " div.pnl-tl").css({
		'border-bottom-left-radius':'0',
		'border-bottom-right-radius':'0',
		'-khtml-border-radius-bottomleft':'0',
		'-khtml-border-radius-bottomright':'0',
		'-moz-border-radius-bottomleft':'0',
		'-moz-border-radius-bottomright':'0',
		'-webkit-border-bottom-left-radius':'0',
		'-webkit-border-bottom-right-radius':'0'
	});
	$("div#" + tthumb + " div.pnl-bwrap").show();
	$("div.application").each(function() { cur = parseInt($(this).css('z-index')); zmax = (cur > zmax) ? cur : zmax; });
	$("div#" + tthumb).css('z-index', (zmax + dC.settings.zindexint));
	try { for (a in dC.apps.list) eval('if (tthumb == "' + dC.apps.list[a] + '") display(' + dC.apps.list[a] + ');');
	} catch(e) {}
	setTimeout('$(tdthumb).removeClass("desktop-thumb-selected")', 1200);
	var app = tthumb;
	if (app == "twitter") {
		clearInterval(queryTwitter); setInterval(queryTwitter, 1500);
	}
});

$("div.application").click(function() {
	if ($("div#startmenu").is(":visible")) $("div#startmenu").hide();
});

/*
$("div.desktop-body").keydown(function(event) { // handle cursor keys
	var direction;
	
	if ($("div.desktop-body").children().hasClass("desktop-thumb-selected")) {
	if ($("div.desktop-body").children("desktop-thumb-selected")) {
		alert("has");
		$(this).nextAll(".desktop-thumb").click();

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
	}
	
	//$("*", document.body).each(function () {
	//	var parentTag = $(this).parent().get(0).tagName;
	//	$(this).prepend(document.createTextNode(parentTag + " > "));
	//});
});
*/

/* end desktop functions */
/* begin startmenu functions */

$("div#startmenu li.list-item").click(function(e) {
	var titem = new div_selection(e, 0);
	var app = titem.main();
	titem = "div#" + app;
	var zmax = 0, cur = 0;
	$("div#startmenu").hide();
	$(titem + " div.pnl").removeClass("transparent5");
	$(titem + " div.tl").removeClass("transparent5");
	$(titem + " div.pnl-tl").css({'background-color':'','border-bottom':'0'});
	$(titem + " div.pnl-tl").css({
		'border-bottom-left-radius':'0',
		'border-bottom-right-radius':'0',
		'-khtml-border-radius-bottomleft':'0',
		'-khtml-border-radius-bottomright':'0',
		'-moz-border-radius-bottomleft':'0',
		'-moz-border-radius-bottomright':'0',
		'-webkit-border-bottom-left-radius':'0',
		'-webkit-border-bottom-right-radius':'0'
	});
	$(titem + " div.pnl-bwrap").css('visibility','visible');
	$("div.application").each(function() { cur = parseInt($(this).css('z-index')); zmax = (cur > zmax) ? cur : zmax; });
	if ($(titem).is(":hidden")) $(titem).css('z-index', (zmax + dC.settings.zindexint)).show();
	else {
		if ($(titem).css('z-index') < zmax) $(titem).css('z-index', (zmax + dC.settings.zindexint));
		if ($(titem).css('visibility') == "hidden") $(titem).css('visibility','visible');
	}

	try { for (a in dC.apps.list) eval('if (titem == "div#' + dC.apps.list[a] + '") display(' + dC.apps.list[a] + ');');
	} catch(e) {}
	
	if (app == "twitter") {
		clearInterval(queryTwitter); setInterval(queryTwitter, 1500);
	}
});

$("div#startmenu li.item-logout").click(function() {
	$.get("logout.php", function() { location.reload(); });
});

/* end startmenu functions */
/* begin taskbar functions */

$("div#taskbar table#startbutton").click(function() {
	if ($("div#startmenu").is(":hidden")) $("div#startmenu").show();
	else $("div#startmenu").hide();
});

$("div#taskbar li.quickbutton").click(function(e) {
	var qbutton = new div_selection(e, 5);
	qbutton = "div#" + qbutton.main().slice(12);
	var zmax = 0, cur = 0;
	if ($("div#startmenu").is(":visible")) $("div#startmenu").hide();
	$(qbutton + " div.tl").removeClass("transparent5");
	$(qbutton + " div.pnl-tl").css({'background-color':'','border-bottom':'0'});
	$(qbutton + " div.pnl-tl").css({
		'border-bottom-left-radius':'0',
		'border-bottom-right-radius':'0',
		'-khtml-border-radius-bottomleft':'0',
		'-khtml-border-radius-bottomright':'0',
		'-moz-border-radius-bottomleft':'0',
		'-moz-border-radius-bottomright':'0',
		'-webkit-border-bottom-left-radius':'0',
		'-webkit-border-bottom-right-radius':'0'
	});
	$("div.application").each(function() { cur = parseInt($(this).css('z-index')); zmax = (cur > zmax) ? cur : zmax; });
	if ($(qbutton).is(":hidden")) $(qbutton).css('z-index', (zmax + dC.settings.zindexint)).show();
	else {
		if ($(qbutton).css('z-index') < zmax) $(qbutton).css('z-index', (zmax + dC.settings.zindexint));
		if ($(qbutton).css('visibility') == "hidden") $(qbutton).css('visibility','visible');
	}

	try { for (a in dC.apps.list) eval('if (qbutton == "div#' + dC.apps.list[a] + '") display(' + dC.apps.list[a] + ');');
	} catch(e) {}
});

$("div#taskbar li.taskbutton").click(function(e) {
	var tbutton = new div_selection(e, 5);
	tbutton = "div#" + tbutton.main().slice(11);
	var zmax = 0, cur = 0;
	if ($("div#startmenu").is(":visible")) $("div#startmenu").hide();
	$(tbutton + " div.tl").removeClass("transparent5");
	$(tbutton + " div.pnl-tl").css({'background-color':'','border-bottom':'0'});
	$(tbutton + " div.pnl-tl").css({
		'border-bottom-left-radius':'0',
		'border-bottom-right-radius':'0',
		'-khtml-border-radius-bottomleft':'0',
		'-khtml-border-radius-bottomright':'0',
		'-moz-border-radius-bottomleft':'0',
		'-moz-border-radius-bottomright':'0',
		'-webkit-border-bottom-left-radius':'0',
		'-webkit-border-bottom-right-radius':'0'
	});
	$("div.application").each(function() { cur = parseInt($(this).css('z-index')); zmax = (cur > zmax) ? cur : zmax; });
	if ($(tbutton).css('visibility') == 'hidden') {
		$(tbutton + " div.tl.toggle").click();
		$(tbutton).css('z-index', (zmax + dC.settings.zindexint)).css('visibility','visible');
	} else {
		if ($(tbutton).css('z-index') < zmax) $(tbutton).css('z-index', (zmax + dC.settings.zindexint));
		else if (!$(tbutton + " div.pnl").hasClass("transparent5")) $(tbutton).css('visibility','hidden');
	}
	
	$(tbutton + " div.pnl").removeClass("transparent5");
});

document.getElementById("taskbar").onmousedown = function(e) {
	if (IsRightButtonClicked(e)) alert("Right Button Down");
}

// $("div#taskbar li.taskbutton").contextMenu({ menu: 'myMenu' }, function(action, el, pos) { contextMenuWork(action, el, pos); });
/*
function contextMenuWork(action, el, pos) {
	switch (action) {
		case "delete":
		{
			alert("delete");
			break;
		}
		case "insert":
		{
			alert("insert");
			break;
		}
		case "edit":
		{
			alert("edit");
			break;
		}
	}
}
*/

$("div#taskbar div#quickstart-splitbar").mousedown(function() {
	var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;

	$("div#taskbar div#quickstart-splitbar").bind('mousemove', function(e) {
		diffX = 0;
		mouseX = e.pageX || (e.clientX + document.documentElement.scrollLeft);
		if (lastMouseX == 0) lastMouseX = mouseX;
		diffX = (mouseX - lastMouseX + mOffX);
		if (diffX > 10) diffX = 10; else if (diffX < -10) diffX = -10;
		if (((mouseX - diffX) > (dC.taskbar.start_width + dC.taskbar.quickstart_minwidth)) && ((mouseX + diffX) < (dC.taskbar.start_width + dC.taskbar.quickstart_maxwidth))) {
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
		if (lastMouseX == 0) lastMouseX = mouseX;
		diffX = (mouseX - lastMouseX + mOffX);
		if (diffX > 10) diffX = 10; else if (diffX < -10) diffX = -10;
		if (((mouseX - diffX) > (dC.config.width - dC.taskbar.tray_maxwidth)) && ((mouseX + diffX) < (dC.config.width - dC.taskbar.tray_minwidth))) {
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
	$("div.pnl").addClass("transparent5");
	$("div.pnl div.tl").addClass("transparent5");
	$("div.pnl-tl").css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});

	if ($("div.pnl").height() == 24) {
		$("div.pnl-tl").css({
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

	$("div.pnl-bwrap").hide();
},
function () {
	$("div.pnl").removeClass("transparent5");
	$("div.pnl div.tl").removeClass("transparent5");
	$("div.pnl-tl").css({'background-color':'','border-bottom':'0'});
	$("div.pnl-tl").css({
		'border-bottom-left-radius':'0',
		'border-bottom-right-radius':'0',
		'-khtml-border-radius-bottomleft':'0',
		'-khtml-border-radius-bottomright':'0',
		'-moz-border-radius-bottomleft':'0',
		'-moz-border-radius-bottomright':'0',
		'-webkit-border-bottom-left-radius':'0',
		'-webkit-border-bottom-right-radius':'0'
	});
	$("div.pnl-bwrap").show();
});

/* end taskbar functions */
/* begin app functions */
/** begin ytinstant */

loadPlayer();

$("div#ytinstant input[type='text']#searchBox").live('keydown', function(e) {
	var keyCode = e.keyCode || e.which;
	if (keyCode == 9) {
		e.preventDefault();
		if (currentSuggestion) {
			var regex1 = new RegExp("^" + $("div#ytinstant input[type='text']#searchBox").val() + "(.*?)( |$)", "ig");
			var tabkey = currentSuggestion.match(regex1);
			if (tabkey.length > 0) $("div#ytinstant input[type='text']#searchBox").val(tabkey);
		}
	}
});

$("div#ytinstant div.tl.refresh").click(function() {
	if (dC.user.apps.ytinstant.playlist == "") {
		var playlist = ['YouTube','AutoTune','Rihanna','Far East Movement','Glee Cast','Nelly','Usher','Katy Perry','Taio Cruz','Eminem','Shakira','Kesha','B.o.B','Taylor Swift','Akon','Bon Jovi','Michael Jackson','Lady Gaga','Paramore','Jay Z','My Chemical Romance','The Beatles','Led Zepplin','Guns N Roses','AC DC','System of a Down','Aerosmith','Tetris','8-bit','Borat','Basshunter','Fall Out Boy','Blink 182','Pink Floyd','Still Alive','Men at Work','MGMT','Justin Bieber','The Killers','Bed intruder song','Baba O Riley','Billy Joel','Drake','Jay Sean','The Ready Set'];
		var randomNumber = Math.floor(Math.random() * playlist.length);
		$("div#ytinstant input[type='text']#searchBox").val(playlist[randomNumber]).select().focus();
	} else {
		var playlist = dC.user.apps.ytinstant.playlist.split(',');
		var randomNumber = Math.floor(Math.random() * playlist.length);
		$("div#ytinstant input[type='text']#searchBox").val(playlist[randomNumber]).select().focus();
	}

	doInstantSearch();
});

if (dC.user.apps.ytinstant.playlist != "") {
	var playlist = dC.user.apps.ytinstant.playlist.split(',');
	$.each(playlist, function(index, value) { $("div#ytinstant div#userPlaylist div#playlist").append('<div class="searchItem">' + value + '</div>'); });
} else $("div#ytinstant div#userPlaylist div#playlist").html('<div class="empty">No Videos Are In Your Playlist</div>');

$("div#ytinstant div.tl.config").click(function() {
	if ($("div#ytinstant div.tl.config").hasClass("on")) $("div#ytinstant div.tl.config").attr('title','Show Your Playlist');
	else $("div#ytinstant div.tl.config").attr('title','Hide Your Playlist');
	$("div#ytinstant div.tl.config").toggleClass("on");
	if ($("div#ytinstant div.tl.help").hasClass("on")) $("div#ytinstant div.tl.help").removeClass("on");
	if ($("div#ytinstant div.tl.search").hasClass("on")) $("div#ytinstant div.tl.search").removeClass("on");
	if ($("div#ytinstant div#playlistWrapper").is(":visible")) { $("div#ytinstant div#playlistWrapper").hide(); $("div#ytinstant div#userPlaylist").show(); }
	else if ($("div#ytinstant div#userPlaylist").is(":visible")) { $("div#ytinstant div#playlistWrapper").show(); $("div#ytinstant div#userPlaylist").hide(); }
	else if ($("div#ytinstant div#songPlaylists").is(":visible")) { $("div#ytinstant div#userPlaylist").show(); $("div#ytinstant div#songPlaylists").hide(); }
	else if ($("div#ytinstant div#help").is(":visible")) { $("div#ytinstant div#userPlaylist").show(); $("div#ytinstant div#hide").hide(); }
});

$("div#ytinstant div.tl.plus").click(function() {
	addItemYTPlaylist($.trim($("div#ytinstant div#header input[type='text']#searchBox").val()).capitalize(), 2);
});

$("div#ytinstant div.tl.pinleft").click(function() {
	if ($("div#ytinstant div.tl.pinleft").hasClass("on")) $("div#ytinstant div.tl.pinleft").attr('title','Exact Search');
	else $("div#ytinstant div.tl.pinleft").attr('title','Suggestions Search');
	$("div#ytinstant div.tl.pinleft").toggleClass("on");
	if (currentSearch != currentSuggestion) { alert("not"); currentSearch = ''; doInstantSearch(); }
});

$("div#ytinstant div.tl.pindown").click(function() {
	if ($("div#ytinstant div.tl.pindown").hasClass("on")) $("div#ytinstant div.tl.pindown").attr('title','Repeat Current Video');
	else $("div#ytinstant div.tl.pindown").attr('title','Remove Repeat');
	$("div#ytinstant div.tl.pindown").toggleClass("on");
	if ($("div#ytinstant div.tl.dblarrowright").hasClass("on")) $("div#ytinstant div.tl.dblarrowright").removeClass("on");
});

$("div#ytinstant div.tl.dblarrowright").click(function() {
	$("div#ytinstant div.tl.dblarrowright").toggleClass("on");
	if ($("div#ytinstant div.tl.pindown").hasClass("on")) $("div#ytinstant div.tl.pindown").removeClass("on");	
});

$("div#ytinstant div.tl.arrowleft").click(function() {
	if (dC.user.apps.ytinstant.vidThumbs > 1) dC.user.apps.ytinstant.vidThumbs--;
});

$("div#ytinstant div.tl.arrowright").click(function() {
	dC.user.apps.ytinstant.vidThumbs++;
});

function getSongPlaylists() {
	if (dC.user.apps.ytinstant.songPlaylistsLoaded == true) return;
	$.getJSON("load.php", { id: "ytinstant", action: "songplaylists" }, function(rD) {
		if (rD.data) {
			var playlists = rD.data;
			var html = []; var allplaylists = [];
			$.each(playlists, function(playlist) {
				var numSongs = playlists[playlist].length;
				if (playlist.substring(0,5) == "Year ") html.push('<div id="' + playlist + '" class="searchItem">' + playlist.substring(5) + '</div>');
				else html.push('<div id="' + playlist + '" class="searchItem">' + playlist + '</div>');
				allplaylists.push('<div class="playlist ' + removeChars(' ', playlist) + '">');
				for (s = 0; s < numSongs; s++) allplaylists.push('<div class="searchItem">' + playlists[playlist][s] + '</div>');
				allplaylists.push('</div>');
			});
			$("div#ytinstant div#songPlaylists div#playlists").html(html.join(""));
			$("div#ytinstant div#songPlaylists").append(allplaylists.join(""));
			dC.user.apps.ytinstant.songPlaylistsLoaded = true;
		}
	});
}

function getFriendPlaylists() {
	if (dC.user.apps.ytinstant.friendPlaylistsLoaded == true) return;
	$.getJSON("load.php", { id: "ytinstant", action: "friendplaylists" }, function(rD) {
		if (rD.data) {
			var playlists = rD.data;
			var html = []; var allplaylists = [];
			$.each(playlists, function(playlist) {
				var numSongs = playlists[playlist].length;
				html.push('<div id="' + playlist + '" class="searchItem">' + playlist + '</div>');
				allplaylists.push('<div class="playlist ' + removeChars(' ', playlist) + '">');
				for (s = 0; s < numSongs; s++) allplaylists.push('<div class="searchItem">' + playlists[playlist][s] + '</div>');
				allplaylists.push('</div>');
			});
			$("div#ytinstant div#friendPlaylists div#playlists").html(html.join(""));
			$("div#ytinstant div#friendPlaylists").append(allplaylists.join(""));
			dC.user.apps.ytinstant.friendPlaylistsLoaded = true;
		}
	});
}

$("div#ytinstant div#songPlaylists div#playlistHeader div#friendsPlaylists div#fpButton").click(function() {
	if (dC.user.apps.ytinstant.friendPlaylistsLoaded == false) getFriendPlaylists();
	$("div#ytinstant div#songPlaylists").hide();
	$("div#ytinstant div#friendPlaylists").show();
});

$("div#ytinstant div#friendPlaylists div#playlistHeader div#songPlaylists div#spButton").click(function() {
	$("div#ytinstant div#songPlaylists").show();
	$("div#ytinstant div#friendPlaylists").hide();
});

$("div#ytinstant div.tl.search").click(function() {
	if ($("div#ytinstant div.tl.search").hasClass("on")) $("div#ytinstant div.tl.search").attr('title','View Song Playlists');
	else $("div#ytinstant div.tl.search").attr('title','See Search Results');
	if (dC.user.apps.ytinstant.songPlaylistsLoaded == false) getSongPlaylists();
	$("div#ytinstant div.tl.search").toggleClass("on");
	if ($("div#ytinstant div#playlistWrapper").is(":visible")) $("div#ytinstant div#playlistWrapper").hide();
	else if ($("div#ytinstant div.tl.config").hasClass("on") || $("div#ytinstant div#userPlaylist").is(":visible")) { $("div#ytinstant div.tl.config").removeClass("on"); $("div#ytinstant div#userPlaylist").hide(); }
	else if ($("div#ytinstant div.tl.help").hasClass("on") || $("div#ytinstant div#help").is(":visible")) { $("div#ytinstant div.tl.help").removeClass("on"); $("div#ytinstant div#help").hide(); }
	if ($("div#ytinstant div#friendPlaylists").is(":visible")) { $("div#ytinstant div#playlistWrapper").show(); $("div#ytinstant div#friendsPlaylists").hide(); $("div#ytinstant div#friendPlaylists").hide(); }
	else if ($("div#ytinstant div#songPlaylists").is(":visible")) { $("div#ytinstant div#playlistWrapper").show(); $("div#ytinstant div#songPlaylists").hide(); }
	else $("div#ytinstant div#songPlaylists").show();
});

$("div#ytinstant div.tl.help").click(function() {
	$("div#ytinstant div.tl.help").toggleClass("on");
	if ($("div#ytinstant div#main").is(":visible")) $("div#ytinstant div#main").hide();
	if ($("div#ytinstant div#suggestions").is(":hidden")) $("div#ytinstant div#suggestions").show();
	else { $("div#ytinstant div#main").show(); $("div#ytinstant div#suggestions").hide(); }
});

$("div#ytinstant div#userPlaylist input[type='text']#playlistBox").focus(function() {
	if ($(this).val() == "Add to Playlist") $(this).val('');
	dC.user.apps.ytinstant.playlistBoxFocus = true;
});

$("div#ytinstant div#userPlaylist input[type='text']#playlistBox").blur(function() {
	if ($(this).val() == "") $(this).val('Add to Playlist');
	dC.user.apps.ytinstant.playlistBoxFocus = false;
});

/*
$("?").hover(function() {
	$("").fadeTo("slow", 1.0);
},function() {
	$("").fadeTo("slow", 0.6);
});
*/
/*
$('?').bind('mouseenter mouseleave', function() { $(this).toggleClass('entered'); });
*/
/*
$("button").live('click', function() { something(); });
$("form").delegate('button','click', function() { something(); })
*/
/*
$('?').bind('custom', function(e, p1, p2) { alert(p1 + "\n" + p2); });
$('?').trigger('custom', ['Custom', 'Event']);
*/
/*
$('form').submit(function() {
	console.log($(this).serializeArray());
	return false;
});
[
  {
    name: a
    value: 1
  },
  {
    name: b
    value: 2
  },
  {
    name: c
    value: 3
  },
  {
    name: d
    value: 4
  },
  {
    name: e
    value: 5
  }
]
*/
/*
$('form').submit(function() {
	alert($(this).serialize());
	return false;
});
// Produces a=1&b=2&c=3&d=4&e=5
*/
/*
$.ajaxSetup({ url: 'ping.php' }); // Now each time an Ajax request is made, the "ping.php" URL will be used automatically:
$.ajax({ data: {'name': 'Dan'} });
*/
/*
$("input[type='text']").change( function() {
	// check input ($(this).val()) for validity here
});
*/

// $("div#ytinstant div#userPlaylist div#playlist").disableContextMenu();

$("div#ytinstant div#userPlaylist div#playlist div.searchItem").live('mousedown', function(e) {
	var searchItem = new div_selection(e, 0);
	searchItem = searchItem.target_html();
	
	if (IsRightButtonClicked(e)) {
		e.preventDefault();
		var index = playlist.vIndex(searchItem);
		playlist.remove(index);
		$.ajax({
			url: 'load.php',
			data: 'id=ytinstant&action=remove&data=' + playlist,
			type: 'get',
			success: function (data) {
				if (playlist == "") $("div#ytinstant div#userPlaylist div#playlist").html('<div class="empty">No Videos Are In Your Playlist</div>');
				$("div#ytinstant div#userPlaylist div#playlist div.searchItem").remove(":contains('" + searchItem + "')");
				dC.user.apps.ytinstant.playlist = playlist;
			}
		});
	} else {
		$("div#ytinstant input[type='text']#searchBox").val(searchItem);
		doInstantSearch();
		$("div#ytinstant div.tl.config").click();
	}
});

$("div#ytinstant div#songPlaylists div#playlists div.searchItem").live('click', function(e) {
	var searchItem = new div_selection(e, 0);
	searchItem = searchItem.target_id();
	$("div#ytinstant div#songPlaylists div#playlists").hide();
	$("div#ytinstant div#songPlaylists div#playlistHeader div#friendsPlaylists").hide();
	$("div#ytinstant div#songPlaylists div#playlistHeader div#songsHeader div#playlistName").html(searchItem);
	$("div#ytinstant div#songPlaylists div#playlistHeader div#songsHeader").show();
	$("div#ytinstant div#songPlaylists div.playlist." + removeChars(' ', searchItem)).show();
});

$("div#ytinstant div#songPlaylists div.playlist div.searchItem").live('click', function(e) {
	var searchItem = new div_selection(e, 0);
	searchItem = searchItem.target_html();
	$("div#ytinstant input[type='text']#searchBox").val(searchItem);
	doInstantSearch();
	$("div#ytinstant div.tl.search").click();
});

$("div#ytinstant div#songPlaylists div#playlistHeader img#backtoplaylists").click(function(e) {
	$("div#ytinstant div#songPlaylists div#playlistHeader div#friendsPlaylists").show();
	$("div#ytinstant div#songPlaylists div#playlistHeader div#songsHeader").hide();
	$("div#ytinstant div#songPlaylists div#playlistHeader div#songsHeader div#playlistName").html('');
	$("div#ytinstant div#songPlaylists div#playlists").show();
	$("div#ytinstant div#songPlaylists div.playlist").hide();
});

$("div#ytinstant div#playlistWrapper div#playlist img.addvideo").live('click', function(e) {
	var videoTitle = new div_selection(e, 0);
	addItemYTPlaylist($.trim(videoTitle.target_content()).capitalize(), 2);
});

$("div#ytinstant div#playlistWrapper div#playlist img.viewvideo").live('click', function(e) {
	var videoTitle = new div_selection(e, 0);
	$("div#ytinstant input[type='text']#searchBox").val(videoTitle.target_content());
	doInstantSearch();
});

$("div#ytinstant div#playlistWrapper div#playlist img.videolink").live('click', function(e) {
	var videoTitle = new div_selection(e, 0);
	var videoId = videoTitle.target_content();
	window.open('http://www.youtube.com/watch?v=' + videoId);
});

$("div#ytinstant div#playlistWrapper div#playlist img.dvideolink").live('click', function(e) {
	var videoTitle = new div_selection(e, 0);
	var videoId = videoTitle.target_content();
	window.open('http://keepvid.com/?url=http://www.youtube.com/watch?v=' + videoId);
});

$("div#ytinstant div#playlistWrapper div#playlist img.daudiolink").live('click', function(e) {
	var videoTitle = new div_selection(e, 0);
	var videoId = videoTitle.target_content();
	window.open('http://www.listentoyoutube.com/index.php?url=http://www.youtube.com/watch?v=' + videoId);
});

$("div#ytinstant div.tl.help").attr('title','Show Search Suggestions');
$("div#ytinstant div.tl.search").attr('title','Show Song Playlists');
$("div#ytinstant div.tl.plus").attr('title','Add Term To Playlist');
$("div#ytinstant div.tl.refresh").attr('title','Random From Playlist');
$("div#ytinstant div.tl.dblarrowright").attr('title','Repeat Current Playlist');
$("div#ytinstant div.tl.pinleft").attr('title','Exact Search');
$("div#ytinstant div.tl.pindown").attr('title','Repeat Current Video');
$("div#ytinstant div.tl.arrowleft").attr('title','Decrease Number Of Loaded Videos');
$("div#ytinstant div.tl.arrowright").attr('title','Increase Number Of Loaded Videos');
$("div#ytinstant div.tl.config").attr('title','Show Your Playlist');

/* end ytinstant **/
/** begin preferences */
/*** begin splash */

$("div#preferences div#splash ul li").click(function(e) {
	var target = new div_selection(e, 0);
	targetdiv = "div#" + target.target_class();
	$("div#preferences div#splash").hide();
	$("div#preferences " + targetdiv).show();
	$("div#preferences div.tl.dblarrowleft").show();
	$("div#preferences div.tl.maximize").show();
	
	if (target.target_class() == "wallpaper") {
		$("div#preferences div.tl.maximize").click();
		$("div#preferences div.tl.restore").hide();
	}
});

$("div#preferences div.tl.dblarrowleft").click(function() {
	if ($("div#preferences div.body div#splash").is(":hidden")) {
		$("div#preferences div.tl.dblarrowleft").hide();
		$("div#preferences div.tl.maximize").hide();
		if ($("div#preferences").hasClass("fullscreen")) $("div#preferences div.tl.restore").click();
		$("div#preferences div.body").children().hide();
		$("div#preferences div#splash").show("slide", {direction:"right"}, 384);
	}
});

$("div#preferences div#splash ul li.wallpaper").click(function(e) {
	$.get("load.php", { id: "wallpaper_slideshow" }, function(data) { $("div#preferences div#wallpaper div.rc").html(data); });
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
	var taskbar = $("div#taskbar");
	if (taskbar.hasClass("transparent8")) taskbar.removeClass("transparent8");
	else taskbar.addClass("transparent8");
});

$("div#preferences div#themes div#new").click(function () {
	display(new dialog('Dialog Name','newdialog',false,false,false,false,50,50,100,200,'absolute',0,0,'l','t',true,'Dialog Message!').display());
});

/* end themes ***/
/*** begin wallpaper */

$("div#preferences div#wallpaper div.rc").css('width',(dC.config.width - 320));
$("div#preferences div#wallpaper div.lc div.albums").css('height',(dC.config.height - 300));
//var margin = (((dC.config.width - 400) - ((Math.floor((dC.config.width - 400) / 113)) * 113)) / 2);
//$("div#preferences div#wallpaper div.rc div#slideshow").css('margin-left',50+'px');

$("div#preferences div#wallpaper").click(function(e) {
	var thumbclick = new div_selection(e, 4);
	if (thumbclick.target_class() == "thumbnail") {
		$.get("load.php", { id: "update_hns_desktop", action: "wallpaper_file", data: thumbclick.target_id() }, function() {
			$("html").css('background-image','url("i/wallpapers/' + thumbclick.target_id() + '")'); 
		});
	}
});

/* end wallpaper ***/
/* end preferences **/
/** begin flash_name */

/* Netflix
http://odata.netflix.com/v1/Catalog/Titles
http://odata.netflix.com/v1/Catalog/Languages('Japanese')
http://odata.netflix.com/v1/Catalog/Languages('Japanese')/Titles?filter=Instant/Available&$format=json&$callback=?

$("#movie-template").render(response.d.results).appendTo("#movie-list");
$.tmpl("#movie-template", response.d.results);

*/
/*
$.getJSON("http://odata.netflix.com/v1/Catalog/Languages('Japanese')/Titles?filter=Instant/Available&$format=json&$callback=?", function(response) {
	$.tmpl("#movie-template", response.d.results);
});
*/

/* end flash_name **/
/** begin notepad */

$("div#notepad div.tl.save").click(function() {
	$.get("load.php", { id: "update_hns_desktop", action: "notepad", data: $("div#notepad textarea").val() });
});

$("div#notepad textarea").keyup(function(event) {
	$.get("load.php", { id: "update_hns_desktop", action: "notepad", data: $("div#notepad textarea").val() });
});

/* end notepad **/
/** begin piano */

var piano_dir = "flash/piano/";
var instruments = ['piano','organ','saxophone','flute','panpipes','guitar','steeldrums','doublebass'];
var pianoswf = $("div#piano div#pianoswf");
var piano = function(instrument) {
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

$("div#piano div.buttons a#piano").click(function() { pianoswf.html(piano("piano")); });
$("div#piano div.buttons a#organ").click(function() { pianoswf.html(piano("organ")); });
$("div#piano div.buttons a#saxophone").click(function() { pianoswf.html(piano("saxophone")); });
$("div#piano div.buttons a#flute").click(function() { pianoswf.html(piano("flute")); });
$("div#piano div.buttons a#panpipes").click(function() { pianoswf.html(piano("panpipes")); });
$("div#piano div.buttons a#strings").click(function() { pianoswf.html(piano("strings")); });
$("div#piano div.buttons a#guitar").click(function() { pianoswf.html(piano("guitar")); });
$("div#piano div.buttons a#steeldrums").click(function() { pianoswf.html(piano("steeldrums")); });
$("div#piano div.buttons a#doublebass").click(function() { pianoswf.html(piano("doublebass")); });
$("div#piano div.buttons a#all").click(function() {
	pianoswf.html(piano_allswf());
	$("div#piano div.tl.maximize").click();
	pianoswf.css('height', ($("div#piano div.content").height() - 40));
});

/* end piano **/
/** begin tic_tac_toe */

function _tic_tac_toe_() {
$.get('load.php', { id: "tic_tac_toe" }, function (data) { $("div#tic_tac_toe div.wrapper").html(data); });
var ctx = document.getElementsByTagName('canvas')[0].getContext("2d");
var grid = [];
var debug = "none";
var spintimes = 0;
var canclick = false;

function spin() {
	document.getElementById("grid").style.webkitTransform = "rotateY(-" + (++spintimes * 360) + "deg)";
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
		if (counter == n) { if (click(x,0)) return true; if (click(x,1)) return true; if (click(x,2)) return true; }
	}

	for (y = 0; y < 3; y++) {
		counter = 0;
		counter += (1 * (grid[y][0].innerHTML == "X"));
		counter += (1 * (grid[y][1].innerHTML == "X"));
		counter += (1 * (grid[y][2].innerHTML == "X"));
		if (counter == n) { if (click(0,y)) return true; if (click(1,y)) return true; if (click(2,y)) return true; }
	}

	counter = 0;
	counter += (1 * (grid[0][0].innerHTML == "X"));
	counter += (1 * (grid[1][1].innerHTML == "X"));
	counter += (1 * (grid[2][2].innerHTML == "X"));

	if (counter == n) { if (click(0,0)) return true; if (click(1,1)) return true; if (click(2,2)) return true; }

	counter = 0;
	counter += (1 * (grid[0][2].innerHTML == "X"));
	counter += (1 * (grid[1][1].innerHTML == "X"));
	counter += (1 * (grid[2][0].innerHTML == "X"));

	if (counter == n) { if (click(2,0)) return true; if (click(1,1)) return true; if (click(0,2)) return true; }

	for (x = 0; x < 3; x++) { // check for potential losing positions
		counter = 0;
		counter += (1 * (grid[0][x].innerHTML == "O"));
		counter += (1 * (grid[1][x].innerHTML == "O"));
		counter += (1 * (grid[2][x].innerHTML == "O"));
		if (counter == n) { if (click(x,0)) return true; if (click(x,1)) return true; if (click(x,2)) return true; }
	}
	
	for (y = 0; y < 3; y++) {
		counter = 0;
		counter += (1 * (grid[y][0].innerHTML == "O"));
		counter += (1 * (grid[y][1].innerHTML == "O"));
		counter += (1 * (grid[y][2].innerHTML == "O"));
		if (counter == n) { if (click(0,y)) return true; if (click(1,y)) return true; if (click(2,y)) return true; }
	}
	
	counter = 0;
	counter += (1 * (grid[0][0].innerHTML == "O"));
	counter += (1 * (grid[1][1].innerHTML == "O"));
	counter += (1 * (grid[2][2].innerHTML == "O"));
	if (counter == n) { if (click(0,0)) return true; if (click(1,1)) return true; if (click(2,2)) return true; }

	counter = 0;
	counter += (1 * (grid[0][2].innerHTML == "O"));
	counter += (1 * (grid[1][1].innerHTML == "O"));
	counter += (1 * (grid[2][0].innerHTML == "O"));
	if (counter == n) { if (click(2,0)) return true; if (click(1,1)) return true; if (click(0,2)) return true; }

	return false;
}

function ai_fillm(n) {
	var counter = 0;

	for (x = 0; x < 3; x++) {
		counter = 1;
		counter *= (1 * (grid[0][x].innerHTML != "O"));
		counter *= (1 * (grid[1][x].innerHTML != "O"));
		counter *= (1 * (grid[2][x].innerHTML != "O"));
		if (counter) { if (click(x,0)) return true; if (click(x,1)) return true; if (click(x,2)) return true; }
	}

	for (y = 0; y < 3; y++) {
		counter = 1;
		counter *= (1 * (grid[y][0].innerHTML != "O"));
		counter *= (1 * (grid[y][1].innerHTML != "O"));
		counter *= (1 * (grid[y][2].innerHTML != "O"));
		if (counter) { if (click(0,y)) return true; if (click(1,y)) return true; if (click(2,y)) return true; }
	}

	counter = 1;
	counter *= (1 * (grid[0][0].innerHTML != "O"));
	counter *= (1 * (grid[1][1].innerHTML != "O"));
	counter *= (1 * (grid[2][2].innerHTML != "O"));
	if (counter) { if (click(0,0)) return true; if (click(1,1)) return true; if (click(2,2)) return true; }

	counter = 1;
	counter *= (1 * (grid[0][2].innerHTML != "O"));
	counter *= (1 * (grid[1][1].innerHTML != "O"));
	counter *= (1 * (grid[2][0].innerHTML != "O"));
	if (counter) { if (click(2,0)) return true; if (click(1,1)) return true; if (click(0,2)) return true; }

	return false;
}

var currentgame = "";

function ai_go() { // check for any winning positions
	think(1);
	if (click(1,1)) return;
	think(1);
	if (ai_fill(2)) return true;
	think(5);
	if (ai_fillm(1)) return true;
	// need to fork
	think(9);
	
	if (grid[0][0].innerHTML == "O") { if (click(2,2)) return true; }
	think(1);
	if (grid[0][2].innerHTML == "O") { if (click(0,2)) return true; }
	think(1);
	if (grid[2][0].innerHTML == "O") { if (click(2,0)) return true; }
	think(1);
	if (grid[2][2].innerHTML == "O") { if (click(0,0)) return true; }
	think(1);

	if (click(0,0)) return true;
	if (click(2,0)) return true;
	if (click(0,2)) return true;
	if (click(2,2)) return true;
	think(4);
	if (click(1,0)) return true;
	if (click(2,1)) return true;
	if (click(1,2)) return true;
	think(9);
	if (click(0,1)) return true;
}

function win(cha,type,index) {
	if (cha != "") {
		ctx.lineWidth = 20;
		ctx.strokeStyle = "red";
		ctx.beginPath();

		if (type == 0) {
			ctx.moveTo((80 + (167 * index)),20);
			ctx.lineTo((80 + (167 * index)),481);
		} else if (type == 1) {
			ctx.moveTo(20,(80 + (167 * index)));
			ctx.lineTo(481,(80 + (167 * index)));
		} else if (type == 2) {
			if (index == 0) { ctx.moveTo(20,20); ctx.lineTo(481,481); }
			else { ctx.moveTo(20,481); ctx.lineTo(481,20); }
		}

		if (cha == "O") {
			if (currentgame == lastgame) alert("It's not my fault I can't learn - This game doesn't count.");
			else { winc(1); lastgame = currentgame; }
		} else if (cha == "X") losec(1);
		
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
			if (win(grid[0][x].innerHTML,0,x)) return true;
		}
	}

	for (y = 0; y < 3; y++) {
		if ((grid[y][0].innerHTML == grid[y][1].innerHTML) && (grid[y][1].innerHTML == grid[y][2].innerHTML)) {
			if (win(grid[y][0].innerHTML,1,y)) return true;
		}
	}

	if ((grid[0][0].innerHTML == grid[1][1].innerHTML) && (grid[1][1].innerHTML == grid[2][2].innerHTML)) {
		if (win(grid[0][0].innerHTML,2,0)) return true;
	}

	if ((grid[0][2].innerHTML == grid[1][1].innerHTML) && (grid[1][1].innerHTML == grid[2][0].innerHTML)) {
		if (win(grid[0][2].innerHTML,2,1)) return true;
	}

	return false;
}

function absclick(x,y) { click(Math.floor(x / 167),Math.floor(y / 167)); }

function ob(t) {
	if (t == "") return "-";
	return t;
}

function click(x,y) {
	if (!canclick) return false;
	if (gameover) { newgame(); return true; }

	if (grid[y][x].innerHTML == "") {
		grid[y][x].innerHTML = turn ? "X" : "O";
		currentgame += "\n\n" + ob(grid[0][0].innerHTML) + ob(grid[0][1].innerHTML) + ob(grid[0][2].innerHTML);
		currentgame += "\n" + ob(grid[1][0].innerHTML) + ob(grid[1][1].innerHTML) + ob(grid[1][2].innerHTML);
		currentgame += "\n" + ob(grid[2][0].innerHTML) + ob(grid[2][1].innerHTML) + ob(grid[2][2].innerHTML);
		grid[y][x].style.opacity = 1;
		filled++;
		checkwin();
		if (gameover) return true;
		turn = !turn;
		if (filled == 9) { gameover = true; return true; }
		if (turn && ai) ai_go();
		return true;
	}

	return false;
}

function lsinc(keyn) {
	if (window.localStorage) {
		if (localStorage.getItem(keyn)) localStorage.setItem(keyn, (parseInt(localStorage.getItem(keyn)) + 1));
		else localStorage.setItem(keyn, 1);
	}
}

function think(x) { document.getElementById("think").innerHTML = parseInt(document.getElementById("think").innerHTML) + x; }
function winc(x) { document.getElementById("win").innerHTML = parseInt(document.getElementById("win").innerHTML) + x; lsinc("win"); }
function losec(x) { document.getElementById("lose").innerHTML = parseInt(document.getElementById("lose").innerHTML) + x; lsinc("lost"); }

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
	if (wincc) document.getElementById("win").innerHTML = wincc;
	if (losecc) document.getElementById("lose").innerHTML = losecc;
}

$("div#tic_tac_toe canvas").mousedown(function() {
	if (event.layerX) absclick(event.layerX,event.layerY); else absclick(event.x,event.y);
});
}

/* end tic_tac_toe **/
/** begin friends */



/* end friends **/
/** begin goom_radio */

(function() {
var goomPartnerId = "FriendsOrEnemies-EMBED";
var goomWidth = 215;
var goomHeight = 215;
var goomAutoPlay = 1;
var goomDefaultVolume = 3;
var goomBuySong = 1;
var goomDefaultRadio = 2716945;
var goomBgColor = "0xffffff";
var goomPlayerColor = "0x000000";
var goomBgXPos = 0;
var goomBgYPos = 0;
var goomMyLogoURL = "http://www.goommarketing.com/partnerplayers/foeradiobg.jpg";
var goomPopUpMode = 0;
var goomKnobType = "partner";
var goomDim = [300, 300];
var goomBgURL, goomMyLogoLinkURL, goomCoverButtonURL, goomMountPolicy, goomCachedMute, goomCustomUI, goomShuffleMode, goomActiveZoneURL;

if (!goomPartnerId) return;
var env = window.goomEnv == "" || !window.goomEnv ? "" : window.goomEnv + ".";
var baseURL = 'http://slam.' + env + 'goomradio.com/?partnerId=' + encodeURI(goomPartnerId);
var queryStr = [];

if (goomBgColor) queryStr.push('&bgColor=' + encodeURI(goomBgColor));
if (goomBgURL) queryStr.push('&bgURL=' + encodeURI(goomBgURL));
if (goomBgXPos) queryStr.push('&bgXPos=' + encodeURI(goomBgXPos));
if (goomBgYPos) queryStr.push('&bgYPos=' + encodeURI(goomBgYPos));
if (goomPlayerColor) queryStr.push('&playerColor=' + encodeURI(goomPlayerColor));
if (goomMyLogoURL) queryStr.push('&myLogoURL=' + encodeURI(goomMyLogoURL));
if (goomMyLogoLinkURL) queryStr.push('&myLogoLinkURL=' + encodeURI(goomMyLogoLinkURL));
if (goomCoverButtonURL) queryStr.push('&coverButtonURL=' + encodeURI(goomCoverButtonURL));
if (goomDefaultRadio) queryStr.push('&defaultradio=' + encodeURI(goomDefaultRadio));
else if (goomLocalRadioId && goomDomain) queryStr.push('&defaultradio=' + A2ItoGoom(encodeURI(goomLocalRadioId), encodeURI(goomDomain), 1));
if (goomMountPolicy) queryStr.push('&mountPolicy=' + encodeURI(goomMountPolicy));
if (goomAutoPlay) queryStr.push('&autoPlay=' + encodeURI(goomAutoPlay));
if (goomPopUpMode) queryStr.push('&popupMode=' + encodeURI(goomPopUpMode));
if (goomKnobType) queryStr.push('&knobType=' + encodeURI(goomKnobType));
else queryStr.push('&knobType=partner');
if (goomDefaultVolume) queryStr.push('&defaultVolume=' + encodeURI(goomDefaultVolume));
if (goomCachedMute) queryStr.push('&cachedMute=' + encodeURI(goomCachedMute));
if (goomCustomUI) queryStr.push('&customUI=' + encodeURI(goomCustomUI));
if (goomBuySong) queryStr.push('&buySong=' + encodeURI(goomBuySong));
if (window.goomShuffleMode) queryStr.push('&shuffleMode=' + encodeURI(goomShuffleMode));
if (window.goomActiveZoneURL) queryStr.push('&activeZoneURL=' + encodeURI(goomActiveZoneURL));
if (goomHeight) { queryStr.push('&height=' + encodeURI(goomHeight)); goomDim[0] = parseInt(goomHeight, 10); }
if (goomWidth) { queryStr.push('&width=' + encodeURI(goomWidth)); goomDim[1] = parseInt(goomWidth, 10); }

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');

	for (var i = 0, l = ca.length; i < l; i++) {
		var c = ca[i], cl = c.length;
		while (c.charAt(0) == ' ') c = c.substring(1,cl);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,cl);
	}

	return null;
}

function A2ItoGoom(radioId, domainId, originId) { return (radioId * Math.pow(2, 8)) + (domainId * Math.pow(2, 4)) + originId; }

if (!window.goomPopUp) {
	var radiohtml = '<iframe frameborder="0" scrolling="no" style="height: '+ goomDim[0] +'px; width: '+goomDim[1]+'px;" src="'+ baseURL + queryStr.join('') +'"></iframe>';
	if (in_array('goom_radio', dC.launchers.autorun)) $("div#goom_radio div#goom").html(radiohtml);
	else {
		$("div#startmenu li#goom_radio").click(function() { $("div#goom_radio div#goom").html(radiohtml); });
		$("div#desktop div.desktop-body div#thumb-goom_radio").click(function() { $("div#goom_radio div#goom").html(radiohtml); });
	}
} else {
	if (!readCookie('__goompopplayer')) {
		var winPop = document.open(queryStr.join(''),'goomPopup', 'width=' +  (goomDim[1] + 10) + ', height=' +  (goomDim[0] + 10));
		if (winPop) {
			var date = new Date();
			date.setTime(date.getTime() + (15 * 60 * 1000));
			document.cookie = '__goompopplayer'+'=goom; expires=' + date.toGMTString() +'; path=/';
			if (focus) winPop.focus();
		}
	}
}
})();

/* end goom_radio **/
/** begin search */



/* end search **/
/** begin chat */

(function() {
if (in_array('chat', dC.launchers.autorun)) {
	refreshChat();
}

$("div#startmenu li#chat").click(function() {
	refreshChat();
	focusMessage();
});

$("div#desktop div.desktop-body div#thumb-chat").dblclick(function() {
	refreshChat();
	focusMessage();
});

$("div#chat div.tl.config").click(function() {
	$.ajax({
		url: 'load.php',
		data: 'id=chat&action=clear',
		type: 'get',
		dataType: 'text'
	});
});

function clearMessage() {
	$("div#chat input[type='text']#message").val('');
	focusMessage();
}

function focusMessage() {
	$("div#chat input[type='text']#message").focus();
}

function scrollChatArea() {
	var chatarea = document.getElementById('chatarea');
	chatarea.scrollTop = chatarea.scrollHeight;
}

function refreshChat() {
	$.ajax({
		url: 'load.php',
		data: 'id=chat&action=refresh',
		type: 'get',
		dataType: 'text',
		success: function (data) {
			var obj = document.getElementById('chatarea');
			var html = obj.innerHTML;
			var newhtml = data;

			if (html != newhtml) { // Notify
				obj.innerHTML = newhtml;
			}
			
			scrollChatArea();
		}
	});

	setTimeout(refreshChat, 1000);
}

function onEnter(e) {
	var keyCode = null;
	if (e.keyCode) keyCode = e.keyCode;

	if (keyCode == 13) {
		var msg = $("div#chat input[type='text']#message").val().trim();
		
		function valid_msg(msg) { // # & + \
			var objRegExp = /\w/;
			return objRegExp.test(msg);
		}

		if (((msg.length > 0) && (msg != " ")) || (valid_msg(msg))) {
			$.ajax({
				url: 'load.php',
				data: 'id=chat&action=send&data=' + msg,
				type: 'get',
				dataType: 'html',
				success: function (data) {
					clearMessage();
				}
			});

			return false;
		}
	}

	return true;
}

$("div#chat input[type='text']#message").keyup(function(e) {
	onEnter(e);
});
})();

/* end chat **/
/** begin music */

/* end music **/
/** begin web_browser */
<?php /* Allowed List
Google Home
Bing Home
Pandora
Bank of America
Best Buy
Myspace
*/ ?><?php // var oDoc = (browser.contentWindow || browser.contentDocument);
// if (oDoc.document) oDoc = oDoc.document;
/*
if (browser.contentDocument) {
src_doc = browser.contentDocument;
working_title = src_doc.title;
alert(working_title);
}
*/ ?>

(function() {
	var browser = document.createElement("iframe");
	browser.id = "browser";
	browser.name = "browser";
	browser.src = "http://www.google.com";
	$("div#web_browser div#window").append(browser);
})()

/* end web_browser **/
/** begin torus */



/* end torus **/
/** begin calendar */

var events = new Array(
	["Y",	"1",	"1",	"2006",	"1:00 AM",	"12:00 PM",	"New Year's Day",		"New Year's Day will be ushered in with great joy and celebration. Come as you are."],
	["F",	"1",	"3",	"2",		"1:00 AM",	"12:59 PM",	"Martin Luther King Day",	"Honors civil rights leader Rev Martin Luther King."],
	["Y",	"2",	"2",	"2005",	"1:00 AM",	"12:59 PM",	"Groundhog Day",			"If Philadelphia's groundhog 'Punxsutawney Phil' sees his shadow, there will be six more weeks of winter weather. If he does not see his shadow, there will be an early spring."],
	["Y",	"2",	"14",	"2005",	"1:00 AM",	"12:59 PM",	"Valentine's Day",			"Traditional celebration of love and romance, including the exchange of cards, candy, flowers, and other gifts."],
	["F",	"2",	"3",	"2",		"1:00 AM",	"12:59 PM",	"President's Day",			"Honors the birthdays of George Washington, Abraham Lincoln and other past American Presidents."],
	["F",	"3",	"0",	"0",		"1:00 AM",	"12:59 PM",	"Easter",				"Traditional celebration of the resurrection of Jesus Christ."],
	["Y",	"3",	"17",	"2005",	"1:00 AM",	"12:59 PM",	"St. Patrick's Day",		"A celebration of Irish heritage and culture, based on the Catholic feast of St. Patrick. Primary activity is simply the wearing of green clothing ('wearing of the green')."],
	["Y",	"3",	"22",	"2005",	"1:00 AM",	"12:59 PM",	"World Water Day",		"A day to promote appreciation of the world's most valuable commodity - water."],
	["Y",	"4",	"1",	"2005",	"1:00 AM",	"12:59 PM",	"April Fool's Day",			"A day to play tricks on or 'fool' family, friends, and coworkers, if so inclined. As Ecclesiastes says: 'There is a time for everything'; in this case, a time to be silly."],
	["F",	"5",	"2",	"1",		"1:00 AM",	"12:59 PM",	"Mother's Day",			"Honors mothers and motherhood (made a Federal Holiday by Presidential order)."],
	["F",	"5",	"3",	"7",		"1:00 AM",	"12:59 PM",	"Armed Forces Day",		"Celebrates the United States Army, Navy, Air Force and Marine Corps; formerly - each used to have separate days."],
	["F",	"5",	"4",	"2",		"1:00 AM",	"12:59 PM",	"Memorial Day",			"Honors the nation's war dead, and those we love who have passed away. Traditionally a time to decorate graves and remember those who have gone before us. Also marks traditional beginning of summer."],
	["Y",	"6",	"14",	"2005",	"1:00 AM",	"12:59 PM",	"Flag Day",				"Honors the American flag, encourages patriotism. Citizens are urged to fly the flag and study its traditions."],
	["F",	"6",	"3",	"1",		"1:00 AM",	"12:59 PM",	"Father's Day",			"Honors all Fathers and fatherhood."],
	["Y",	"7",	"4",	"2005",	"1:00 AM",	"12:59 PM",	"Independence Day",		"Celebrates our Declaration of Independence from England in 1776, usually called the Fourth of July."],
	["F",	"9",	"1",	"2",		"1:00 AM",	"12:59 PM",	"Labor Day",			"Celebrates the achievements of workers, giving them a day of rest - marks traditional end of summer."],
	["F",	"10",	"2",	"2",		"1:00 AM",	"12:59 PM",	"Columbus' Day",			"Honors the traditional discovery of the Americas by Christopher Columbus."],
	["Y",	"10",	"31",	"2005",	"1:00 AM",	"12:59 PM",	"Halloween",			"Celebrates All Hallow's Eve, decorations include jack o'lanterns, costume wearing parties, and candy - considered a pagan holiday by many Christians."],
	["Y",	"11",	"11",	"2005",	"1:00 AM",	"12:59 PM",	"Veteran's Day",			"Honors all veterans of the United States armed forces. A traditional observation is a moment of silence at 11 AM remembering those who fought for peace."],
	["F",	"11",	"4",	"5",		"1:00 AM",	"12:59 PM",	"Thanksgiving",			"A day to give thanks for your many blessings - traditionally for the Autumn harvest, and it marks the beginning of the 'holiday season'."],
	["Y",	"12",	"25",	"2005",	"1:00 AM",	"12:59 PM",	"Christmas",			"Celebration of the traditional day of Jesus' birth - God was made flesh and dwelt among us."]
);
/*
var myimages = new Array();

function preloadimages() {
	for (i = 0; i < preloadimages.arguments.length; i++){
		myimages[i] = new Image();
		myimages[i].src = preloadimages.arguments[i];
	}
}

preloadimages("i/apps/calendar/pyoff.jpg","i/apps/calendar/pyon.jpg","i/apps/calendar/pmoff.jpg","i/apps/calendar/pmon.jpg","i/apps/calendar/nyoff.jpg","i/apps/calendar/nyon.jpg","i/apps/calendar/nmoff.jpg","i/apps/calendar/nmon.jpg");
*/
var thisDate = 1;
var wordMonth = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
var today = new Date();
var todaysDay = (today.getDay() + 1);
var todaysDate = today.getDate();
var todaysMonth = (today.getUTCMonth() + 1);
var todaysYear = today.getFullYear();
var monthNum = todaysMonth;
var yearNum = todaysYear;
var firstDate = new Date(String(monthNum) + "/1/" + String(yearNum));
var firstDay = firstDate.getUTCDay();
var lastDate = new Date(String(monthNum + 1) + "/0/" + String(yearNum));
var numbDays = 0;
var calendarString = "";
var eastermonth = 0;
var easterday = 0;

function changedate(buttonpressed) {
	if (buttonpressed == "prevyr") yearNum--;
	else if (buttonpressed == "nextyr") yearNum++;
	else if (buttonpressed == "prevmo") monthNum--;
	else if (buttonpressed == "nextmo") monthNum++;
	else  if (buttonpressed == "return") { 
		monthNum = todaysMonth;
		yearNum = todaysYear;
	}

	if (monthNum == 0) {
		monthNum = 12;
		yearNum--;
	} else if (monthNum == 13) {
		monthNum = 1;
		yearNum++
	}

	lastDate = new Date(String(monthNum + 1) + "/0/" + String(yearNum));
	numbDays = lastDate.getDate();
	firstDate = new Date(String(monthNum) + "/1/" + String(yearNum));
	firstDay = (firstDate.getDay() + 1);
	createCalendar();
	return;
}

function easter(year) {
	var a = (year % 19);
	var b = Math.floor(year / 100);
	var c = (year % 100);
	var d = Math.floor(b / 4);
	var e = (b % 4);
	var f = Math.floor((b + 8) / 25);
	var g = Math.floor((b - f + 1) / 3);
	var h = (((19 * a) + b - d - g + 15) % 30);
	var i = Math.floor(c / 4);
	var j = (c % 4);
	var k = ((32 + (2 * e) + (2 * i) - h - j) % 7);
	var m = Math.floor((a + (11 * h) + (22 * k)) / 451);
	var month = Math.floor((h + k - (7 * m) + 114) / 31);
	var day = (((h + k - (7 * m) + 114) % 31) + 1);
	eastermonth = month;
	easterday = day;
}

function createCalendar() {
	calendarString = '';
	calendarString += '<table width="312" border="1" cellpadding="0" cellspacing="1">';
	calendarString += '<tr>';
	calendarString += '<td align="center" valign="center" width="40" height="40"><a href="#" onMouseOver="document.PrevYr.src=\'i/apps/calendar/pyon.jpg\';" onMouseOut="document.PrevYr.src=\'i/apps/calendar/pyoff.jpg\';" onClick="changedate(\'prevyr\')"><img name="PrevYr" src="i/apps/calendar/pyoff.jpg" width="40" height="40" border="0" alt="Prev Yr" /></a></td>';
	calendarString += '<td align="center" valign="center" width="40" height="40"><a href="#" onMouseOver="document.PrevMo.src=\'i/apps/calendar/pmon.jpg\';" onMouseOut="document.PrevMo.src=\'i/apps/calendar/pmoff.jpg\';" onClick="changedate(\'prevmo\')"><img name="PrevMo" src="i/apps/calendar/pmoff.jpg" width="40" height="40" border="0" alt="Prev Mo" /></a></td>';
	calendarString += '<td bgcolor="#c8c896" align="center" valign="center" width="128" height="40" colspan="3"><b>' + wordMonth[monthNum - 1] + '&nbsp;&nbsp;' + yearNum + '</b></td>';
	calendarString += '<td align="center" valign="center" width="40" height="40"><a href="#" onMouseOver="document.NextMo.src=\'i/apps/calendar/nmon.jpg\';" onMouseOut="document.NextMo.src=\'i/apps/calendar/nmoff.jpg\';" onClick="changedate(\'nextmo\')"><img name="NextMo" src="i/apps/calendar/nmoff.jpg" width="40" height="40" border="0" alt="Next Mo" /></a></td>';
	calendarString += '<td align="center" valign="center" width="40" height="40"><a href="#" onMouseOver="document.NextYr.src=\'i/apps/calendar/nyon.jpg\';" onMouseOut="document.NextYr.src=\'i/apps/calendar/nyoff.jpg\';" onClick="changedate(\'nextyr\')"><img name="NextYr" src="i/apps/calendar/nyoff.jpg" width="40" height="40" border="0" alt="Next Yr" /></a></td>';
	calendarString += '</tr>';
	calendarString += '<tr>';
	calendarString += '<td bgcolor="#ddd" align="center" valign="center" width="40" height="22">Sun</td>';
	calendarString += '<td bgcolor="#ddd" align="center" valign="center" width="40" height="22">Mon</td>';
	calendarString += '<td bgcolor="#ddd" align="center" valign="center" width="40" height="22">Tue</td>';
	calendarString += '<td bgcolor="#ddd" align="center" valign="center" width="40" height="22">Wed</td>';
	calendarString += '<td bgcolor="#ddd" align="center" valign="center" width="40" height="22">Thu</td>';
	calendarString += '<td bgcolor="#ddd" align="center" valign="center" width="40" height="22">Fri</td>';
	calendarString += '<td bgcolor="#ddd" align="center" valign="center" width="40" height="22">Sat</td>';
	calendarString += '</tr>';

	var daycounter = 0;
	thisDate == 1;

	for (var i = 1; i <= 6; i++) {
		calendarString += '<tr>';

		for (var x = 1; x <= 7; x++) {
			daycounter = ((thisDate - firstDay) + 1);
			thisDate++;
			if ((daycounter > numbDays) || (daycounter < 1)) {
				calendarString += '<td align="center" bgcolor="#888" height="30" width="40">&nbsp;</td>';
			} else {
				if (checkevents(daycounter,monthNum,yearNum,i,x) || ((todaysDay == x) && (todaysDate == daycounter) && (todaysMonth == monthNum))){
					if ((todaysDay == x) && (todaysDate == daycounter) && (todaysMonth == monthNum)) {
						calendarString += '<td align="center" bgcolor="#afa" height="30" width="40"><a href="javascript:showevents(' + daycounter + ',' + monthNum + ',' + yearNum + ',' + i + ',' + x + ');">' + daycounter + '</a></td>';
					}
 					else	calendarString += '<td align="center" bgcolor="#ffffc8" height="30" width="40"><a href="javascript:showevents(' + daycounter + ',' + monthNum + ',' + yearNum + ',' + i + ',' + x + ');">' + daycounter + '</a></td>';
				} else {
					calendarString += '<td align="center" bgcolor="#dff" height="30" width="40">' + daycounter + '</td>';
				}
			}
		}

		calendarString += '</tr>';
	}

	calendarString += '<tr><td colspan="7" nowrap align="center" valign="center" bgcolor="#c8c896" width="280" height="22"><a href="javascript:changedate(\'return\');"><b>Show Current Date</b></a></td></tr></table>';
	$("div#calendar div#calendararea").html(calendarString);
	thisDate = 1;
}


function checkevents(day, month, year, week, dayofweek) {
	var numevents = 0;
	var floater = 0;

	for (var i = 0; i < events.length; i++) {
		if (events[i][0] == "W") {
			if ((events[i][2] == dayofweek)) numevents++;
		} else if (events[i][0] == "Y") {
			if ((events[i][2] == day) && (events[i][1] == month)) numevents++;
		} else if (events[i][0] == "F") {
			if ((events[i][1] == 3) && (events[i][2] == 0) && (events[i][3] == 0) ) {
				easter(year);
				if (easterday == day && eastermonth == month) numevents++;
			} else {
				floater = floatingholiday(year,events[i][1],events[i][2],events[i][3]);
				if ((month == 5) && (events[i][1] == 5) && (events[i][2] == 4) && (events[i][3] == 2)) {
					if ((floater + 7 <= 31) && (day == floater + 7)) numevents++;
					else if ((floater + 7 > 31) && (day == floater)) numevents++;
				} else if ((events[i][1] == month) && (floater == day)) numevents++;
			}
		} else if ((events[i][2] == day) && (events[i][1] == month) && (events[i][3] == year)) numevents++;
	}

	if (numevents == 0) return false;
	else return true;
}

function showevents(day, month, year, week, dayofweek) {
	var theevent = "";
	var floater = 0;

	for (var i = 0; i < events.length; i++) {
		if (events[i][0] != "") {
			if (events[i][0] == "D") {}
			if (events[i][0] == "W") {
				if ((events[i][2] == dayofweek)) {
					theevent += "Events of: \n" + month + '/' + day + '/' + year + '\n';
					theevent += events[i][6] + '\n';
					theevent += 'Start Time: ' + events[i][4] + '\n';
					theevent += 'Ending Time: ' + events[i][5] + '\n';
					theevent += 'Description: ' + events[i][7] + '\n';
					theevent += '\n -------------- \n\n';
					document.forms.eventform.eventlist.value = theevent;
				}
			}
			if (events[i][0] == "M") {}
			if (events[i][0] == "Y") {
				if ((events[i][2] == day) && (events[i][1] == month)) {
					theevent += "Events of: \n" + month + '/' + day + '/' + year + '\n';
					theevent += events[i][6] + '\n';
					theevent += 'Start Time: ' + events[i][4] + '\n';
					theevent += 'Ending Time: ' + events[i][5] + '\n';
					theevent += 'Description: ' + events[i][7] + '\n';
					theevent += '\n -------------- \n\n';
					document.forms.eventform.eventlist.value = theevent;
				}
			}
			if (events[i][0] == "F") {
				if ((events[i][1] == 3) && (events[i][2] == 0) && (events[i][3] == 0) ) {
					if (easterday == day && eastermonth == month) {
						theevent += "Events of: \n" + month + '/' + day + '/' + year + '\n';
						theevent += events[i][6] + '\n';
						theevent += 'Start Time: ' + events[i][4] + '\n';
						theevent += 'Ending Time: ' + events[i][5] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';
						theevent += '\n -------------- \n\n';
						document.forms.eventform.eventlist.value = theevent;
					} 
				} else {
					floater = floatingholiday(year,events[i][1],events[i][2],events[i][3]);

					if ((month == 5) && (events[i][1] == 5) && (events[i][2] == 4) && (events[i][3] == 2)) {
						if ((floater + 7 <= 31) && (day == floater + 7)) {
							theevent += "Events of: \n" + month + '/' + day + '/' + year + '\n';
							theevent += events[i][6] + '\n';
							theevent += 'Start Time: ' + events[i][4] + '\n';
							theevent += 'Ending Time: ' + events[i][5] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';
							theevent += '\n -------------- \n\n';
							document.forms.eventform.eventlist.value = theevent;
						} else if ((floater + 7 > 31) && (day == floater)) {
							theevent += "Events of: \n" + month + '/' + day + '/' + year + '\n';
							theevent += events[i][6] + '\n';
							theevent += 'Start Time: ' + events[i][4] + '\n';
							theevent += 'Ending Time: ' + events[i][5] + '\n';
							theevent += 'Description: ' + events[i][7] + '\n';
							theevent += '\n -------------- \n\n';
							document.forms.eventform.eventlist.value = theevent;
						}
					} else if ((events[i][1] == month) && (floater == day)) {
						theevent += "Events of: \n" + month + '/' + day + '/' + year + '\n';
						theevent += events[i][6] + '\n';
						theevent += 'Start Time: ' + events[i][4] + '\n';
						theevent += 'Ending Time: ' + events[i][5] + '\n';
						theevent += 'Description: ' + events[i][7] + '\n';
						theevent += '\n -------------- \n\n';
						document.forms.eventform.eventlist.value = theevent;
					}
				}
			}
		} else if ((events[i][2] == day) && (events[i][1] == month) && (events[i][3] == year)) {
			theevent += "Events of: \n" + month + '/' + day + '/' + year + '\n';
			theevent += events[i][6] + '\n';
			theevent += 'Start Time: ' + events[i][4] + '\n';
			theevent += 'Ending Time: ' + events[i][5] + '\n';
			theevent += 'Description: ' + events[i][7] + '\n';
			theevent += '\n -------------- \n\n';
			document.forms.eventform.eventlist.value = theevent;
		}
	}

	if (theevent == "") document.forms.eventform.eventlist.value = 'No events to show.';
}

function floatingholiday(targetyr, targetmo, cardinaloccurrence, targetday) {
	var firstdate = new Date(String(targetmo) + "/1/" + String(targetyr));
	var firstday = firstdate.getUTCDay();
	var dayofmonth = 0;
	targetday = (targetday - 1);

	if (targetday >= firstday) {
		cardinaloccurrence--;
		dayofmonth = ((cardinaloccurrence * 7) + ((targetday - firstday) + 1));
	} else {
		dayofmonth = ((cardinaloccurrence * 7) + ((targetday - firstday) + 1));
	}

	return dayofmonth;
}

changedate('return');

/* end calendar **/
/** begin app_explorer */

$("div#app_explorer div.body").addClass("scroll");

/* end app_explorer **/
/** begin calculator */

var currentCalc = 1;
var histCalc = [];
var histposCalc = 0;
var pi = Math.PI;
var e = Math.E;
var ln = log;

function loadCalc() {
	try {	histCalc = JSON.parse(localStorage.histCalc);
	} catch(e) { localStorage.clear();
	}
}

function saveCalc() {
	localStorage.histCalc = JSON.stringify(histCalc);
	localStorage.histposCalc = histposCalc;
	localStorage.currentCalc = currentCalc;
}

function clearCalc() {
	currentCalc = 1;
	histCalc = [];
	histposCalc = 0;
	$("div#calculator div#out-inner").html('');
	localStorage.clear();
}

if (localStorage.histCalc != undefined) {
	loadCalc();
	for (var i = 0; i < histCalc.length; ++i) gotCalc(histCalc[i]);
}

function htmlifyCalc(str) {
	return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}

function scrollCalc() {
	$("div#calculator div#out-scroll").scrollTop($("div#calculator div#out-inner").height());
}

function echoCalc(msg) {
	mCalc('');
	$("div#calculator div#out-inner").append("<span class='echo'>" + htmlifyCalc(msg.toString()) + "</span><br>");
	scrollCalc();
}

function mCalc(msg) {
	$("div#calculator div#out-inner").append((msg.toString()) + "<br>");
	scrollCalc();
}

function beautifyCalc(s) {
	s = s.replace(/(\W|^)pi(\W|$)/g, '$1π$2').replace(/\*/g, '×').replace(/-/g, '−');
	return s;
}

function gotCalc(line) {
	line = line.trim();
	if ((line === 'quit') || (line == 'q')) {
		echoCalc('quit');
		mCalc('Good night<span class="f">, milady</span><span class="m">, sir</span>. It has been a pleasure.');
		setTimeout(function() { clearCalc(); $("div#calculator div.tl.close").click(); }, 1300);
	} else if ((line == 'help') || (line == 'h') || (line == '?')) {
		echoCalc('help');
		mCalc('');
		mCalc("Thank you for asking. Here is how I can serve you:");
		mCalc('');
		mCalc("Type in an equation and I will calculate it for you. For example: <b>1 * 2 + 3 / 4</b>");
		mCalc("The following arithmetic operators are available: <b>+ − * / % == !=</b>");
		mCalc("The following bitwise operators are available: <b>& | ^ ~ << >> >>></b>");
		mCalc("You can define new variables, for example: <b>a = 1 + 2 * 3</b>");
		mCalc("You can also define functions, for example: <b>f(x) = pow(x, 2)</b>");
		mCalc("The following builtin functions are available: <b>" + math.join(" ") + "</b>");
		mCalc("The trigonometric functions normally take radians; to use degrees, try: <b>sin(45deg)</b>");
		mCalc("The following constants are available: <b>pi</b> and <b>e</b>.");
		mCalc("You can input hexadecimal values (<b>0x1234abcd</b>) and octal values (<b>0755</b>).");
		mCalc("To convert numbers to hex or oct, try: <b>100 in hex</b> or <b>0x1ff in oct</b>");
		mCalc("Additional commands: <b>units conversions prefixes setkey password</b>");
		mCalc("Also try the following commands: <b>clear quit d</b>");
		mCalc('');
		mCalc("That is all I know. Now, what else could one ask for?");
	} else if (line == 'clear') { clearCalc(); }
	else if (line.match(/^ *$/)) { mCalc("Shall I calculate something for you<span class='f'>, milady</span><span class='m'>, sir</span>?"); }
	else if (line == 'units') { unitsCalc(); }
	else if (line == 'prefixes') { prefixesCalc(); }
	else { computeCalc(line); }
	saveCalc();
}

var cset = '$%^NOZ1&PQR(./~`"CDEFG!@STUVWZghij}:<pHB*#8uvwx>?[]\',ef34590qrklmnoIJ)_+{st67 abcdAyzKLM2Y';
var funRegex = /^ *([a-zA-Z$_][a-zA-Z0-9$_]*) *\( *([a-zA-Z$_][a-zA-Z0-9$_]*) *\) *= *(.+)/;

function isFunctionCalc(what) {
	return what.match(funRegex);
}

function handleFunctionCalc(what) {
	return what.replace(funRegex, "$1 = function($2) { return $3 }");
}

function insertCalc(resultIndex, formula, result) {
	var nice = htmlifyCalc(beautifyCalc(formula));
	var resultOrNothing = result != undefined ? " = <span class='result final'>" + result + "</span>" : "";
	$("div#calculator div#out-inner").append("<div class='left'>r" + resultIndex + " = </div><div class='result'><span class='expr'>" + nice + "</span>" + resultOrNothing + "</div>");
	scrollCalc();
}

function computeCalc(expr) {
	var hex = expr.match(/in hex$/); if (hex) expr = expr.replace(/in hex$/, '');
	var oct = expr.match(/in oct$/); if (oct) expr = expr.replace(/in oct$/, '');
	
	echoCalc(expr);
	
	var expr = expr.replace(/(\d)deg([^a-zA-Z0-9$_]|$)/, '$1 * (2 * pi / 360)$2');
	var actualExpr = handleFunctionCalc(expr);

	try {
		currentVar = "r" + currentCalc;
		var result = eval(currentVar + "=" + actualExpr);
		if (abs(result) < 2.5e-16) result = 0;
	} catch(err) {
		mCalc(err + ". (Terribly sorry<span class='f'>, milady</span><span class='m'>, sir</span>.)");
		return;
	}

	if (isFunctionCalc(expr)) insertCalc(currentCalc, expr);
	else {
		if (hex) result = "0x" + result.toString(16);
		if (oct) result = "0" + result.toString(8);
		insertCalc(currentCalc, expr, result);
	}

	++currentCalc;
}

function setkey() {

}

function password() {
	if (arguments > 0) {
		return pencrypt(arguments[0]);
	}
}

/* ! Factorial Equation
n! | n >= 0

function factorial(n) {
if (n == 0) return 1;
else if (n > 0) return (factorial(n - 1) * n);
else if (n < 0) return 0;
}
*/
/* SQRT of Negative / Imaginary Numbers */
/* Solve Function */
/*

solve(5x=2)

*/

function unitsCalc() {
	echoCalc('SI Units');
	mCalc("<b>unit		symbol	derivation	base units		quantity</b>");
	mCalc("ampere	A		--		A			electric current");
	mCalc("becquerel	Bq		1/s		s-1			activity");
	mCalc("candela	cd		--		cd			luminous intensity");
	mCalc("coulomb	C		A s		A s			charge");
	mCalc("farad	F		A s/V		kg-1 m-2 s4 A2	capacitance");
	mCalc("gray	Gy		J/kg		m2 s-2		absorbed dose");
	mCalc("henry	H		V s/A		kg m2 s-2 A-2	inductance");
	mCalc("hertz	Hz		1/s		s-1			frequency");
	mCalc("joule	J		N m		kg m2 s-2		energy");
	mCalc("kelvin	K		--		K			temperature");
	mCalc("kilogram	kg		--		kg			mass");
	mCalc("lumen	lm		cd sr		cd sr			luminous flux");
	mCalc("lux	lx	lm/m2	cd sr 	m-2			illumination");
	mCalc("metre	m		--		m			length");
	mCalc("mole	mol		--		mol			amount of substance");
	mCalc("newton	N		kg m/s2	kg m s-2		force");
	mCalc("ohm	O		V/A		kg m2 s-3 A-2	resistance");
	mCalc("pascal	Pa		N/m2		kg m-1 s-2		pressure");
	mCalc("radian	rad		--		rad			plane angle");
	mCalc("second	s		--		s			time");
	mCalc("siemens	S		1/O		kg-1 m-2 s3 A2	electric conductance");
	mCalc("sievert	Sv		J/kg		m2 s-2		dose equivalent");
	mCalc("steradian	sr		--		sr			solid angle");
	mCalc("tesla	T		Wb/m2	kg s-2 A-1		magnetic flux density");
	mCalc("volt	V	W/A		kg m2 	s-3 A-1		voltage");
	mCalc("watt	W		J/s		kg m2 s-3		power");
	mCalc("weber	Wb		V s		kg m2 s-2 A-1	magnetic flux");
	echoCalc('Non-SI Units approved for use with SI.');
	mCalc("<b>unit		symbol	value</b>");
	mCalc("minute	min		60 s");
	mCalc("hour	h		60 min = 3600 s");
	mCalc("day		d		24 h = 86 400 s");
	mCalc("degree	deg 		(pi/180) rad");
	mCalc("arcminute	', arcmin	(1/60) deg = (pi/10 800) rad");
	mCalc("arcsecond	\", arcsec	(1/60)' = (pi/648 000) rad");
	mCalc("litre	l, L	1 		dm3 = 10-3 m3");
	mCalc("tonne	t		103 kg");
	mCalc("electronvolt	eV	(1.602 177 33 +- 0.000 000 49) x 10-19 J");
	mCalc("unified atomic mass unit	u	(1.660 540 2 +- 0.000 001 0) x 10-27 kg");
	mCalc("nautical mile	--	1852 m");
	mCalc("knot	--		1 nautical mile per hour = (1852/3600) m/s");
	mCalc("angstrom	A		10-10 m");
	mCalc("are	a	1		dam2 = 102 m2");
	mCalc("hectare	ha		104 m2");
	mCalc("barn	b		10-28 m2");
	mCalc("bar		bar		105 Pa");
	mCalc("gal		Gal		10-2 m/s2");
	mCalc("curie	Ci		3.7 x 1010 Bq");
	mCalc("roentgen	R		2.58 x 10-4 C/kg");
	mCalc("rad	rd, 	rad		10-2 Gy");
	mCalc("rem		rem		10-2 S");
}

function prefixesCalc() {
	echoCalc('SI Prefixes');
	mCalc("<b>prefix		symbol	value		expanded value					English name</b>");
	mCalc("yotta		Y		1024		1 000 000 000 000 000 000 000 000	U.S. septillion; U.K. quadrillion");
	mCalc("zetta		Z		1021		1 000 000 000 000 000 000 000		U.S. sextillion");
	mCalc("exa			E		1018		1 000 000 000 000 000 000			U.S. quintillion; U.K. trillion");
	mCalc("peta		P		1015		1 000 000 000 000 000				U.S. quadrillion");
	mCalc("tera		T		1012		1 000 000 000 000				U.S. trillion; U.K. billion");
	mCalc("giga		G		109		1 000 000 000					U.S. billion");
	mCalc("mega		M		106		1 000 000						million");
	mCalc("kilo			k		103		1 000							thousand");
	mCalc("hecto		h		102		100							hundred");
	mCalc("deca		da		101		10							ten");
	mCalc("					100		1							one");
	mCalc("deci		d		10-1		0.1							tenth");
	mCalc("centi		c		10-2		0.01							hundredth");
	mCalc("milli			m		10-3		0.001							thousandth");
	mCalc("micro		u		10-6		0.000 001						millionth");
	mCalc("nano		n		10-9		0.000 000 001					U.S. billionth");
	mCalc("pico		p		10-12	0.000 000 000 001				U.S. trillionth; U.K. billionth");
	mCalc("femto		f		10-15	0.000 000 000 000 001				U.S. quadrillionth");
	mCalc("atto		a		10-18	0.000 000 000 000 000 001			U.S. quintillionth; U.K. trillionth");
	mCalc("zepto		z		10-21	0.000 000 000 000 000 000 001		U.S. sextillionth");
	mCalc("yocto		y		10-24	0.000 000 000 000 000 000 000 001	U.S. septillionth; U.K. quadrillionth");
}

$('div#calculator div#in input').keydown(function(e) {
	var it = $(this);
	var code = e.keyCode ? e.keyCode : e.which;
	var what = it.attr('value');

	if (code == 13) {
		it.val('');
		histposCalc = histCalc.push(what);
		gotCalc(what);
	} else if (code == 38) {
		if (histposCalc > 0) --histposCalc;
		it.val(histCalc[histposCalc]);
	} else if (code == 40) {
		if (histposCalc < (histCalc.length - 1)) {
			++histposCalc;
			it.val(histCalc[histposCalc]);
		} else if (histposCalc == (histCalc.length - 1)) it.val('');
	} else if (code == 9) {
	} else return true;
	return false;
});

function focusCalc() {
	$('div#calculator div#in input').focus();
}

function startCalc() {
	clearCalc();
	mCalc("Welcome<span class='f'>, milady</span><span class='m'>, esteemed sir</span>. Please enter your calculation.");
	mCalc("Type &apos;help&apos; to get instructions.");
	focusCalc();
}

$("div#startmenu li#calculator").click(function() {
	if ($("div#calculator").is(":visible")) startCalc();
});

$("div#desktop div.desktop-body div#thumb-calculator").dblclick(function() {
	if ($("div#calculator").is(":visible")) startCalc();
});

$("div#calculator").click(focusCalc);
$("div#calculator div.tl.config").click(startCalc);
$("div#calculator div.tl.help").click(function() { gotCalc('help'); });
$("div#calculator div.tl.close").click(clearCalc);

/* end calculator **/
/** begin twitter */

$("div#twitter div.tl.plus").click(function() {
	addItemTWTTRPlaylist($.trim($("div#twitter input[type='text']#search").val()).capitalize(), 2);
});

$("div#twitter div.tl.config").click(function() {
	alert("show playlist");
});

$("div#twitter div.tl.refresh").click(function() {
	loadRandomTweets();
});

$("div#twitter input[type='text']#search").keyup(function() { dC.user.apps.twitter.tweetvalue = $(this).val(); }).submit(function() { dC.user.apps.twitter.tweetvalue = $(this).val(); });
$("div#twitter div.body").addClass("scroll");

function addItemTWTTRPlaylist(value) {
	if (dC.user.apps.twitter.playlist != "") var playlist = dC.user.apps.twitter.playlist + "," + value; else var playlist = value;
	var inArray = $.inArray(value, dC.user.apps.twitter.playlist.split(','));
	if ((inArray == -1) || isNaN(inArray)) {
		$.get("load.php", { id: "twitter", action: "add", data: playlist }, function() {
			if (dC.user.apps.twitter.playlist == "") $("div#twitter div#playlist div.empty").remove();
			$("div#twitter div#playlist").append('<div class="searchItem">' + value + '</div>');
			dC.user.apps.twitter.playlist = playlist;
		});
	}
}

function loadRandomTweets() {
	if (dC.user.apps.twitter.playlist == "") {
		var playlist = ['YouTube','AutoTune','Rihanna','Far East Movement','Glee Cast','Nelly','Usher','Katy Perry','Taio Cruz','Eminem','Shakira','Kesha','B.o.B','Taylor Swift','Akon','Bon Jovi','Michael Jackson','Lady Gaga','Paramore','Jay Z','My Chemical Romance','The Beatles','Led Zepplin','Guns N Roses','AC DC','System of a Down','Aerosmith','Tetris','8-bit','Borat','Basshunter','Fall Out Boy','Blink 182','Pink Floyd','Still Alive','Men at Work','MGMT','Justin Bieber','The Killers','Bed intruder song','Baba O Riley','Billy Joel','Drake','Jay Sean','The Ready Set'];
		var randomNumber = Math.floor(Math.random() * playlist.length);
		$("div#twitter input[type='text']#search").val(playlist[randomNumber]).select().focus().submit();
	} else {
		var playlist = dC.user.apps.twitter.playlist.split(',');
		var randomNumber = Math.floor(Math.random() * playlist.length);
		$("div#twitter input[type='text']#search").val(playlist[randomNumber]).select().focus().submit();
	}
}

function queryTwitter() {
	if (dC.user.apps.twitter.tweetvalue != "") {
		var head = document.getElementsByTagName('head')[0];
		var elem = document.createElement('script');
		elem.setAttribute('src', 'http://search.twitter.com/search.json?callback=writeToTable&q=' + dC.user.apps.twitter.tweetvalue +"'");
		head.appendChild(elem);
		dC.user.apps.twitter.tweetvalue = "";
	}
}

$("div#twitter div.tl.plus").attr('title','Add Term To Playlist');
$("div#twitter div.tl.refresh").attr('title','Random From Playlist');
$("div#twitter div.tl.config").attr('title','Show Your Playlist');

/* end twitter **/
/* end app functions */
<?php } ?>
});<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>
/* begin pre app functions */
/** begin ytinstant */

function loadPlayer() {
	currentVideoId = "_2c5Fh3kfrI";
	var params = {allowScriptAccess:"always"};
	var atts = {id:"ytplayer",allowFullScreen:"true"};
	swfobject.embedSWF("http://www.youtube.com/v/" + currentVideoId + "?enablejsapi=1&playerapiid=ytplayer&autoplay=0&loop=1&fs=1&hd=0&showsearch=0&showinfo=1&iv_load_policy=3&color1=0x28a7f0&color2=0x52ccfe","innerVideoDiv","720","405","8",null,null,params,atts);
}

function onYouTubePlayerReady(playerId) {
	ytplayer = document.getElementById("ytplayer");
	ytplayer.addEventListener("onStateChange","onPlayerStateChange");
	ytplayer.addEventListener("onError","onPlayerError");
	var searchBox = $("div#ytinstant input[type='text']#searchBox");
	searchBox.keyup(doInstantSearch);
	$(document.documentElement).keydown(onKeyDown);
	$("div#ytinstant #buttonControl").click(playPause);
	if (window.location.hash) {
		var hash = getHash();
		if (hash.slice(0,2) != "yt") return;
		hash = hash.substring(3);
		$("div#ytinstant input[type='text']#searchBox").val(hash).focus();
	} else loadRandomVideo();
	onBodyLoad();
	doInstantSearch();
}

function onBodyLoad() {
	currentSearch = '';
	currentSuggestion = '';
	currentVideoId = '';
	currentVideoTitle = '';
	currentVideoTitles = [];
	playlistShowing = false;
	playlistArr = [];
	currentPlaylistPos = 0;
	currentPlaylistPage = 0;
	xhrWorking = false;
	pendingSearch = false;
	pendingDoneWorking = false;
	playerState = -1;
	hashTimeout = false;
}

function onPlayerStateChange(newState) {
	playerState = newState;
	if (pendingDoneWorking && playerState == 1) { doneWorking(); pendingDoneWorking = false; }
	else if (playerState == 0) {
		if (!($("div#ytinstant div.tl.pindown").hasClass("on"))) goNextVideo();
		// if (!playlistShowing) alert("no playlist");
	}
}

function onError(error) { <?php /* 100: not found 101: blocked */ ?>
	alert(error);
}

function addItemYTPlaylist(value, type) {
	if (dC.user.apps.ytinstant.playlist != "") var playlist = dC.user.apps.ytinstant.playlist + "," + value; else var playlist = value;
	var inArray = $.inArray(value, dC.user.apps.ytinstant.playlist.split(','));
	if ((inArray == -1) || isNaN(inArray)) {
		$.get("load.php", { id: "ytinstant", action: "add", data: playlist }, function() {
			if (dC.user.apps.ytinstant.playlist == "") $("div#ytinstant div#userPlaylist div#playlist div.empty").remove();
			$("div#ytinstant div#userPlaylist div#playlist").append('<div class="searchItem">' + value + '</div>');
			dC.user.apps.ytinstant.playlist = playlist;
			if (type === 1) $("div#ytinstant div#userPlaylist input[type='text']#playlistBox").val('');
		});
	}
}

function loadRandomVideo() {
	if (dC.user.apps.ytinstant.playlist == "") {
		var playlist = ['YouTube','AutoTune','Rihanna','Far East Movement','Glee Cast','Nelly','Usher','Katy Perry','Taio Cruz','Eminem','Shakira','Kesha','B.o.B','Taylor Swift','Akon','Bon Jovi','Michael Jackson','Lady Gaga','Paramore','Jay Z','My Chemical Romance','The Beatles','Led Zepplin','Guns N Roses','AC DC','System of a Down','Aerosmith','Tetris','8-bit','Borat','Basshunter','Fall Out Boy','Blink 182','Pink Floyd','Still Alive','Men at Work','MGMT','Justin Bieber','The Killers','Bed intruder song','Baba O Riley','Billy Joel','Drake','Jay Sean','The Ready Set'];
		var randomNumber = Math.floor(Math.random() * playlist.length);
		$("div#ytinstant input[type='text']#searchBox").val(playlist[randomNumber]).select().focus();
	} else {
		var playlist = dC.user.apps.ytinstant.playlist.split(',');
		var randomNumber = Math.floor(Math.random() * playlist.length);
		$("div#ytinstant input[type='text']#searchBox").val(playlist[randomNumber]).select().focus();
	}
}

function onKeyDown(e) {
	if (e.keyCode == 39 || e.keyCode == 40) goNextVideo();
	else if (e.keyCode == 37 || e.keyCode == 38) goPrevVideo();
	else if (e.keyCode == 13) {
		if (dC.user.apps.ytinstant.playlistBoxFocus && $("div#ytinstant div#userPlaylist").is(":visible") && $("div#ytinstant div#playlistWrapper").is(":hidden")) {
			if (($.trim($("div#ytinstant div#userPlaylist input[type='text']#playlistBox").val()) != '' && $.trim($("div#ytinstant div#userPlaylist input[type='text']#playlistBox").val()) != 'Add to Playlist')) {
				addItemYTPlaylist($.trim($("div#ytinstant div#userPlaylist input[type='text']#playlistBox").val()).capitalize(), 1);
			}
		} else playPause();
	}
}

function goNextVideo() {
	if (currentPlaylistPos == (dC.user.apps.ytinstant.vidThumbs - 1)) {
		if ($("div#ytinstant div.tl.dblarrowright").hasClass("on")) goVid(0,currentPlaylistPage);
		else { loadRandomVideo(); doInstantSearch(); }
		return;
	}
	goVid((currentPlaylistPos + 1),currentPlaylistPage);
}

function goPrevVideo() {
	if (currentPlaylistPos == 0) return;
	goVid((currentPlaylistPos - 1),currentPlaylistPage);
}

function goVid(playlistPos,playlistPage) {
	if (!playlistShowing) return;
	if (playlistPage != currentPlaylistPage) { currentPlaylistPage = playlistPage; return; }
	loadAndPlayVideo(playlistArr[playlistPage][playlistPos].id,playlistPos);
}

function doInstantSearch() {
	if (xhrWorking) { pendingSearch = true; return; }
	var searchBox = $("div#ytinstant input[type='text']#searchBox");
	if (searchBox.val() == currentSearch) return;
	currentSearch = searchBox.val();
	if (searchBox.val() == '') {
		$("div#ytinstant div#playlistWrapper").slideUp('slow');
		playlistShowing = false;
		pauseVideo();
		clearVideo();
		clearHash();
		resetTitle();
		playlistArr = [];
		currentSuggestion = '';
		currentVideoTitle = 'YouTube Instant';
		currentVideoTitles = [];
		updateSuggestedKeyword('<strong>Search YouTube Instantly</strong>');
		var dVideo = "_2c5Fh3kfrI";
		loadVideo(dVideo);
		var fblikesrc = "http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.youtube.com&amp;layout=standard&amp;show_faces=false&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=24&amp;width=720";
		var buzzsrc = "http://www.youtube.com/watch?v=" + dVideo;
		var twittersrc = "http://platform.twitter.com/widgets/tweet_button.html?count=horizontal&amp;text=Watch%20Videos20On%20YouTube&amp;url=http%3A%2F%2Fwww.youtube.com&amp;via=youtube";
		var fbsharesrc = "http://s.youtube-3rd-party.com/facebook_share.html?appid=87741124305&amp;href=http%3A%2F%2Fwww.youtube.com&amp;base_url=http%3A%2F%2Fwww.youtube.com&amp;locale=US";
		$("div#ytinstant div#footer iframe#fblike").attr('src',fblikesrc);
		$("div#ytinstant div#footer a.google-buzz-button").attr('data-url',buzzsrc);
		$("div#ytinstant div#footer iframe#twitter").attr('src',twittersrc);
		$("div#ytinstant div#footer iframe#fbshare").attr('src',fbsharesrc);
		return;
	}
	searchBox.attr('class','statusLoading');
	keyword = searchBox.val();
	var the_url = 'http://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&jsonp=window.yt.www.suggest.handleResponse&q=' + encodeURIComponent(searchBox.val()) + '&cp=1';
	$.ajax({type:"GET",url:the_url,dataType:"script"});
	xhrWorking = true;
}

yt = {}, yt.www = {}, yt.www.suggest = {};
yt.www.suggest.handleResponse = function(suggestions) {
	if (!$("div#ytinstant div.tl.pinleft").hasClass("on")) { if (suggestions[1][0]) var searchTerm = suggestions[1][0][0]; else var searchTerm = null; }
	else var searchTerm = null;
	instantHash(currentSearch);
	if (!searchTerm) { searchTerm = keyword; updateSuggestedKeyword(searchTerm + ' (Exact search)'); }
	else { updateSuggestedKeyword(searchTerm); if (searchTerm == currentSuggestion) { doneWorking(); return; }}
	getTopSearchResult(searchTerm);
	currentSuggestion = searchTerm;
	if ($("div#ytinstant div#suggestions").is(":visible")) {
		var ItemCounter = 0;
		SearchCorrection.value = "";
		var FoundBestSuggest = 0;
		var CurrentQuery = suggestions[0];
		var html = ['<ul>'];
		for (var i = 0; i < suggestions[1].length; i++) {
			if ((suggestions[1][i][0].startsWith(CurrentQuery)) && (FoundBestSuggest == 0)) {
				SearchCorrection.value = suggestions[1][i][0];
				CurrentTopSuggestion = suggestions[1][i][0];
				FoundBestSuggest = 1;
			}
			if (suggestions[1][i][0] != CurrentQuery) {
				html.push("<li title=\"" + suggestions[1][i][0] + "\" id=\"suggest_" + ItemCounter + "\" onclick=\"SuggestListClick(this)\" >" + suggestions[1][i][0].replace(CurrentTextboxQuery, "<b>" + CurrentTextboxQuery + "</b>") + "</li>");
				ItemCounter++;
			}
		}
		html.push('</ul><h4 onclick="SuggestionClose()">close</h4>');
		$("div#ytinstant div#suggestions").html(html.join(''));
	}
/*
if (ItemCounter > 0) {
	SuggestionDiv.style.visibility = "visible";
	SuggestionListLength = data[1].length;
} else {
	SuggestionDiv.innerHTML = "";
	SuggestionDiv.style.visibility = "hidden";
	SuggestionListLength = 0;
}
if (EnterPress == 1) {
	SuggestionDiv.innerHTML = "";
	SuggestionDiv.style.visibility = "hidden";
	SuggestionListLength = 0;
}
*/
};
/*
function SuggestListClick(ListItem) {
	document.getElementById("txtInput").value = ListItem.title;
	LoopIt(document.getElementById("txtInput").value);
	document.getElementById("SearchSuggestion").innerHTML = "";
	document.getElementById("SearchSuggestion").style.visibility = "hidden";
}
function SuggestionClose() {
	document.getElementById("SearchSuggestion").innerHTML = "";
	document.getElementById("SearchSuggestion").style.visibility = "hidden";
}
*/

function getTopSearchResult(keyword) {
	var the_url = 'http://gdata.youtube.com/feeds/api/videos?q=' + encodeURIComponent(keyword) + '&format=5&max-results=' + dC.user.apps.ytinstant.vidThumbs + '&v=2&alt=jsonc';
	$.ajax({type:"GET",url:the_url,dataType:"jsonp",success:function(responseData,textStatus,XMLHttpRequest) {
		if (responseData.data.items) {
			var videos = responseData.data.items;
			playlistArr = [];
			playlistArr.push(videos);
			updateVideoDisplay(videos);
			pendingDoneWorking = true;
		} else {
			updateSuggestedKeyword('No results for "' + keyword + '"');
			doneWorking();
		}
	}});
}

function updateVideoDisplay(videos) {
	var numThumbs = (videos.length >= dC.user.apps.ytinstant.vidThumbs) ? dC.user.apps.ytinstant.vidThumbs : videos.length;
	var playlist = $("<div />").attr('id','playlist');

	for (var i = 0; i < numThumbs; i++) {
		var vID = videos[i].id, vTitle = videos[i].title, currentVideoTitles = []; currentVideoTitles.push(vTitle);
		var videoWrap = $("<div />").attr('class','videoWrap');
		var a = $("<a />").attr('href',"javascript:loadAndPlayVideo('" + vID + "'," + i + ");");
		var overlay = $("<div />").attr('class','overlay');
		var img = $("<img />").attr('class','thumb').attr('src',videos[i].thumbnail.sqDefault);
		var title = $("<div />").attr('class','title').html(vTitle);
		var playdiv = $("<div />").attr('class','play-symbol');
		var playimg = $("<img />").attr('src','i/apps/ytinstant/overlay-play.png').attr('title',videos[i].description);
		var tinfo = $("<div />").attr('class','thumb-info');
		var newdate = new Date(videos[i].uploaded);
		var day = new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		var month = new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		var fulldate = day[newdate.getDay()] + ", " + month[newdate.getMonth()] + " " + newdate.getDate() + ", " + newdate.getFullYear();
		var udate = $("<p />").attr('class','date').html(fulldate);
		var vtime = $("<p />").attr('class','time').html(gettime(videos[i].duration));
		var addimg = $("<img />").attr('class','addvideo').attr('src','i/apps/ytinstant/add.png').attr('title','Add To Playlist').attr('content',vTitle);
		var viewimg = $("<img />").attr('class','viewvideo').attr('src','i/apps/ytinstant/view.png').attr('title','Watch Related Videos').attr('content',vTitle);
		var videolinkimg = $("<img />").attr('class','videolink').attr('src','i/apps/ytinstant/film_link.png').attr('title','Watch on YouTube').attr('content',vID);
		var dvideolinkimg = $("<img />").attr('class','dvideolink').attr('src','i/apps/ytinstant/film_save.png').attr('title','Download Video').attr('content',vID);
		var daudiolinkimg = $("<img />").attr('class','daudiolink').attr('src','i/apps/ytinstant/music.png').attr('title','Download MP3').attr('content',vID);
		var videoTools = $("<span />").attr('class','videoTools');
		var viewCount = $("<span />").attr('class','viewCount').html(videos[i].viewCount).digits();
		playlist.append(videoWrap.html(a.append(overlay).append(img).append(title)).append(playdiv.html(playimg)).append(tinfo.append(udate).append(vtime)).append(videoTools.append(viewCount).append(addimg).append(viewimg).append(videolinkimg).append(dvideolinkimg).append(daudiolinkimg)));
	}

	var playlistWrapper = $("div#ytinstant div#playlistWrapper");
	$("div#ytinstant div#playlistWrapper div#playlist").remove();
	playlistWrapper.append(playlist);
	
	if (!playlistShowing) {
		if ($("div#ytinstant div#userPlaylist").is(":hidden")) {
			playlistWrapper.slideDown('slow');
			playlistShowing = true;
		}
	}

	currentPlaylistPos = -1;
	if (currentVideoId != videos[0].id) loadAndPlayVideo(videos[0].id,0,true);
}

function doneWorking() {
	xhrWorking = false;
	if (pendingSearch) { pendingSearch = false; doInstantSearch(); }
	var searchBox = $("div#ytinstant input[type='text']#searchBox");
	searchBox.attr('class','statusPlaying');
}

function updateHTML(elmId,value) { document.getElementById(elmId).innerHTML = value; }
function updateSuggestedKeyword(keyword) { updateHTML('searchTermKeyword',keyword); $("div#ytinstant div#searchTermKeyword").attr('title',keyword); }

function instantHash(hash) {
	if (hashTimeout) clearTimeout(hashTimeout);
	hashTimeout = setTimeout(function() {
		setAHash(hash, "yt");
		if (currentSuggestion != '') setTitle('"' + currentSuggestion.toTitleCase() + '" on YouTube Instant!');
		else setTitle('YouTube Instant - Real-time YouTube video surfing.');
	}, 1000);
}

function setVideoVolume() {
	var volume = parseInt(document.getElementById("volumeSetting").value);
	if (isNaN(volume) || volume < 0 || volume > 100) alert("Please enter a valid volume between 0 and 100.");
	else setVolume(volume);
}

function loadVideo(videoId) {
	if (ytplayer) { ytplayer.cueVideoById(videoId); currentVideoId = videoId; }
}

function loadAndPlayVideo(videoId,playlistPos,bypassXhrWorkingCheck) {
	if (currentPlaylistPos == playlistPos) { playPause(); return; }
	if (!bypassXhrWorkingCheck && xhrWorking) return;
	if (ytplayer) { xhrWorking = true; ytplayer.loadVideoById(videoId); currentVideoId = videoId; currentVideoTitle = currentVideoTitles[playlistPos]; pendingDoneWorking = true; }
	var playlistWrapper = $("div#ytinstant div#playlistWrapper");
	var videourl = "http%3A%2F%2Fwww.youtube.com/watch%3Fv%3D" + videoId + "&amp;src=sp";
	var fblikesrc = "http://www.facebook.com/plugins/like.php?href=" + videourl + "&amp;layout=standard&amp;show_faces=false&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=24&amp;width=720";
	var buzzsrc = "http://www.youtube.com/watch?v=" + videoId;
	var twittersrc = "http://platform.twitter.com/widgets/tweet_button.html?count=horizontal&amp;text=Check%20this%20video%20out%20--%20" + encodeURIComponent(currentVideoTitle) + "&amp;url=" + videourl + "&amp;via=youtube";
	var fbsharesrc = "http://s.youtube-3rd-party.com/facebook_share.html?appid=87741124305&amp;href=" + videourl + "&amp;base_url=" + videourl + "&amp;locale=US";
	$("div#ytinstant div#footer iframe#fblike").attr('src',fblikesrc);
	$("div#ytinstant div#footer a.google-buzz-button").attr('data-url',buzzsrc);
	$("div#ytinstant div#footer iframe#twitter").attr('src',twittersrc);
	$("div#ytinstant div#footer iframe#fbshare").attr('src',fbsharesrc);
	// alert(currentVideoTitles[0]);
	currentPlaylistPos = playlistPos;
	playlistWrapper.attr('class','pauseButton play' + currentPlaylistPos);
	var playlist = $('div#ytinstant div#playlistWrapper div#playlist');
	playlist.children().removeClass('selectedThumb');
	playlist.children(':nth-child(' + (playlistPos + 1) + ')').addClass('selectedThumb');
	var st = 800;
	
	// alert(playlistPos % 2); // 0,0  1,1  2,0  3,1  4,0  5,1  6,0  7,1  8,0  9,1  10,0  11,1  12,0  13,1  14,0
	// alert(playlistPos % 3); // 0,0  1,1  2,2  3,0  4,1  5,2  6,0  7,1  8,2  9,0  10,1  11,2  12,0  13,1  14,2
	// alert(playlistPos % 4); // 0,0  1,1  2,2  3,3  4,0  5,1  6,2  7,3  8,0  9,1  10,2  11,3  12,0  13,1  14,2
	
	// 0-2 = 0
	// 3-5 = 306 (306 + 0(299))
	// 6-8 = 605 (306 + 1(299))
	// 9-11 = 905 (306 + 2(299))
	// 12-14 = 1204 (306 + 3(299))
	
	// a = (i - 3)
	// i = 3; a = (3 - 3); a = 0; 306 + 0(299) = 306
	// i = 4; a = (4 - 3); a = 1; 306 + 1(299) = 306
	// i = 5; a = (5- 3); a = 2; 306 + 2(299) = 306
	// i = 6; a = (6 - 3); a = 3; 306 + 3(299) = 306
	// i = 11; a = (11 - 3); a = 8; 306 + 8(299) = 306
	// floor(a / 3)
	
	if (playlistPos > 2) {
		if ((playlistPos > 2) && (playlistPos < 6)) playlistWrapper.scrollTo(306, st); // +4 | -1
		else if ((playlistPos > 5) && (playlistPos < 9)) playlistWrapper.scrollTo(605, st); // +300-1
		else if (playlistPos > 8) playlistWrapper.scrollTo(904, st);
	} else playlistWrapper.scrollTo(0, st);
	var buttonControl = $("div#ytinstant div#buttonControl");
	if (playlistPos > 2) buttonControl.css('top', (237 + ((playlistPos - 2) * 101)) + 'px');
	else {
		if (playlistPos == 0) buttonControl.css('top', 32 + 'px');
		if (playlistPos == 1) buttonControl.css('top', 136 + 'px');
		if (playlistPos == 2) buttonControl.css('top', 237 + 'px');
	}
}

function playPause() {
	if (ytplayer) {
		var playlistWrapper = $("div#ytinstant div#playlistWrapper");
		if (playerState == 1) { pauseVideo(); playlistWrapper.removeClass('pauseButton').addClass('playButton'); }
		else if (playerState == 2) { playVideo(); playlistWrapper.removeClass('playButton').addClass('pauseButton'); }
	}
}

function playVideo() { if (ytplayer) ytplayer.playVideo(); }
function pauseVideo() { if (ytplayer) ytplayer.pauseVideo(); }
function stopVideo() { if (ytplayer) return ytplayer.stopVideo(); }
function clearVideo() { if (ytplayer) ytplayer.clearVideo(); }
function muteVideo() { if (ytplayer) ytplayer.mute(); }
function unMuteVideo() { if (ytplayer) ytplayer.unMute(); }
function isMutedVideo() { if (ytplayer) return ytplayer.isMuted(); }
function setVolume(v) { if (ytplayer) ytplayer.setVolume(v); }
function getVolume() { if (ytplayer) return ytplayer.getVolume(); }
function getDuration() { if (ytplayer) return ytplayer.getDuration(); }
function getBytesLoaded() { if (ytplayer) return ytplayer.getVideoBytesLoaded(); }
function getBytesTotal() { if (ytplayer) return ytplayer.getVideoBytesTotal(); }
function getStartBytes() { if (ytplayer) return ytplayer.getStartBytes(); }
function getPlayerState() { if (ytplayer) return ytplayer.getPlayerState(); }
function getCurrentTime() { if (ytplayer) return ytplayer.getCurrentTime(); }
function getEmbedCode() { alert(ytplayer.getVideoEmbedCode()); }
function getVideoUrl() { alert(ytplayer.getVideoUrl()); }
function getQualityLevels() { if (ytplayer) return ytplayer.getAvailableQualityLevels(); }
function getPlaybackQuality() { if (ytplayer) return ytplayer.getPlaybackQuality(); }
function setPlaybackQuality(quality) { if (ytplayer) ytplayer.setPlaybackQuality(quality); }
function setSize(w, h) { if (ytplayer) return ytplayer.setSize(w, h); }
function seekTo(s) { if (ytplayer) return ytplayer.seekTo(s, false); }

/* end ytinstant **/
/** begin torus */

if (!window.CanvasRenderingContext2D) $("div#torus div#loading").html('Your browser doesn\'t support canvas, if you are using IE then the <a href="v1/">older version</a> will likely work.<br>I suggest you download a standards compliant browser such as <a href="http://www.google.com/chrome">Google Chrome</a>.');
else $("div#torus div#loading").html('<img src="i/apps/torus/loading.gif" alt="" style="width: 16px; height: 16px; vertical-align: top;"> Loading game...');

function CubicMotion(duration) {
this._duration=duration||1000;
this._date=new Date()*1;
this._path=[0,0,0,0];
this._target=0;
}

CubicMotion.prototype={
reset:function() {this._path=[0,0,0,0];this._target=0;},
setTarget:function(targ) {
var pos=this.getPosition();
var x=(new Date()-this._date);
var vel=0;
this._date+=x;
x/=this._duration;
if(x>=0&&x<1) {vel=(3*this._path[0]*x+2*this._path[1])*x+this._path[2];}
this._target=targ;targ-=pos;
this._path=[(vel-2*targ),(3*targ-2*vel),vel,pos];
},
getPosition:function() {
var x=(new Date()-this._date)/this._duration;
if(x<0||x>=1) {return this._target;}
return((this._path[0]*x+this._path[1])*x+this._path[2])*x+this._path[3];
}
};

var Game=new function() {
var self=this;
var ctx=null;
var nextType=null;
var dropping=0;
var pieceCount;
var block;
var x=-2;
var posY;
var type;
var rotated;
this.displayGold=0;
this.innerRadius=40;
this.mode=0;
this.lines=0;
this.score=0;
this.time=0;
this.paused=true;
var field;
var viewPort=new CubicMotion(250);
function iso(x,y,r,theta) {
r=r?Game.innerRadius:60;
var v=30;
return{x:r*Math.cos((2*Math.PI)*((x-theta)/15-1/4))*(y+v)/v,y:200-y*20*(y/2+60)/60-0.3*r*Math.sin((2*Math.PI)*((x-theta)/15-1/4))}
}

CanvasRenderingContext2D.prototype.drawFront=function(x,y,r,theta,joinLeft,joinRight,joinTop,joinBottom) {
this.beginPath();
var co=[iso(x-0.015,y+0.015,r,theta),iso(x+1.015,y+0.015,r,theta),iso(x+1.015,y-1.015,r,theta),iso(x-0.015,y-1.015,r,theta)];
this.moveTo(co[0].x,co[0].y);
this.lineTo(co[1].x,co[1].y);
this.lineTo(co[2].x,co[2].y);
this.lineTo(co[3].x,co[3].y);
this.closePath();
this.fill();
if(joinTop||joinBottom||joinLeft||joinRight){
this.beginPath();
if(joinTop) {
this.moveTo(co[1].x,co[1].y);
}else{
this.moveTo(co[0].x,co[0].y);
this.lineTo(co[1].x,co[1].y);
}
if(joinRight){this.moveTo(co[2].x,co[2].y);}else{this.lineTo(co[2].x,co[2].y);}
if(joinBottom) {this.moveTo(co[3].x,co[3].y);
}else{
this.lineTo(co[3].x,co[3].y);
}
if(!joinLeft){this.lineTo(co[0].x,co[0].y);}
}
this.stroke();
};

CanvasRenderingContext2D.prototype.drawTop=function(x,y,theta,joinLeft,joinRight,noLines) {
var co=[iso(x-0.015,y,false,theta),iso(x-0.015,y,true,theta),iso(x+1.015,y,true,theta),iso(x+1.015,y,false,theta)]
this.beginPath();
this.moveTo(co[0].x,co[0].y);
this.lineTo(co[1].x,co[1].y);
this.lineTo(co[2].x,co[2].y);
this.lineTo(co[3].x,co[3].y);
this.closePath();
this.fill();
if(noLines){return;}
if(joinLeft||joinRight) {
this.beginPath();
if(joinLeft) {
this.moveTo(co[1].x,co[1].y);
}else {
this.moveTo(co[0].x,co[0].y);
this.lineTo(co[1].x,co[1].y);
}
this.lineTo(co[2].x,co[2].y);
if(joinRight) {this.moveTo(co[3].x,co[3].y);}else {this.lineTo(co[3].x,co[3].y);}
this.lineTo(co[0].x,co[0].y);}
this.stroke();
};

CanvasRenderingContext2D.prototype.drawSide=function(x,y,theta,joinTop,joinBottom) {
var co=[iso(x,y-1.015,false,theta),iso(x,y+0.015,false,theta),iso(x,y+0.015,true,theta),iso(x,y-1.015,true,theta)];
this.beginPath();
this.moveTo(co[0].x,co[0].y);
this.lineTo(co[1].x,co[1].y);
this.lineTo(co[2].x,co[2].y);
this.lineTo(co[3].x,co[3].y);
this.closePath();
this.fill();
if(joinTop||joinBottom) {
this.beginPath();
this.moveTo(co[0].x,co[0].y);
this.lineTo(co[1].x,co[1].y);
if(joinTop) {
this.moveTo(co[2].x,co[2].y);
}else{
this.lineTo(co[2].x,co[2].y);
}
this.lineTo(co[3].x,co[3].y);
if(!joinBottom) {this.lineTo(co[0].x,co[0].y);}
}
this.stroke();
}

var blockData=[
{view:0.08,theme:0,frequency:1,coords:[[{x:1,y:0},{x:2,y:0},{x:1,y:1},{x:2,y:1}]]},
{view:0.25,theme:1,frequency:1,coords:[[{x:0,y:0},{x:1,y:0},{x:2,y:0},{x:3,y:0}],[{x:1,y:-1},{x:1,y:0},{x:1,y:1},{x:1,y:2}]]},
{view:0.5,theme:2,frequency:1,coords:[[{x:1,y:1},{x:0,y:0},{x:1,y:0},{x:2,y:0}],[{x:1,y:1},{x:2,y:0},{x:1,y:-1},{x:1,y:0}],[{x:2,y:0},{x:1,y:-1},{x:0,y:0},{x:1,y:0}],[{x:1,y:1},{x:0,y:0},{x:1,y:-1},{x:1,y:0}]]},
{view:0.5,theme:3,frequency:1,coords:[[{x:0,y:0},{x:1,y:0},{x:2,y:0},{x:0,y:1}],[{x:1,y:-1},{x:1,y:0},{x:1,y:1},{x:2,y:1}],[{x:0,y:0},{x:2,y:0},{x:1,y:0},{x:2,y:-1}],[{x:1,y:-1},{x:1,y:0},{x:1,y:1},{x:0,y:-1}]]},
{view:0.5,theme:4,frequency:1,coords:[[{x:2,y:0},{x:1,y:0},{x:0,y:0},{x:2,y:1}],[{x:1,y:-1},{x:1,y:0},{x:1,y:1},{x:2,y:-1}],[{x:0,y:0},{x:1,y:0},{x:2,y:0},{x:0,y:-1}],[{x:1,y:-1},{x:1,y:0},{x:1,y:1},{x:0,y:1}]]},
{view:0.5,theme:5,frequency:1,coords:[[{x:2,y:1},{x:1,y:1},{x:1,y:0},{x:0,y:0}],[{x:1,y:1},{x:1,y:0},{x:0,y:2},{x:0,y:1}]]},
{view:0.5,theme:6,frequency:1,coords:[[{x:1,y:1},{x:0,y:1},{x:2,y:0},{x:1,y:0}],[{x:1,y:1},{x:1,y:0},{x:2,y:2},{x:2,y:1}]]},
{view:-0.15,theme:0,frequency:0.025,coords:[[{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0},{x:3,y:0}],[{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0},{x:1,y:-1}],[{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0},{x:0,y:1}],[{x:2,y:2},{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0}]]},
{view:0.15,theme:0,frequency:0.025,coords:[[{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0},{x:0,y:0}],[{x:1,y:2},{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0}],[{x:1,y:1},{x:3,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0}],[{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:2,y:0},{x:2,y:-1}]]},
{view:0.5,theme:1,frequency:0.025,coords:[[{x:-1,y:0},{x:0,y:0},{x:1,y:0},{x:2,y:0},{x:3,y:0}],[{x:1,y:-2},{x:1,y:-1},{x:1,y:0},{x:1,y:1},{x:1,y:2}]]},
{view:0.5,theme:1,frequency:0.025,coords:[[{x:0,y:0},{x:1,y:0},{x:2,y:0}],[{x:1,y:1},{x:1,y:0},{x:1,y:-1}]]},
{view:0.5,theme:2,frequency:0.05,coords:[[{x:1,y:2},{x:0,y:1},{x:1,y:1},{x:2,y:1},{x:1,y:0}],]},
{view:0.25,theme:3,frequency:0.05,coords:[[{x:1,y:1},{x:1,y:0},{x:2,y:0}],[{x:1,y:1},{x:2,y:1},{x:1,y:0}],[{x:1,y:1},{x:2,y:1},{x:2,y:0}],[{x:2,y:1},{x:1,y:0},{x:2,y:0}]]},
{view:0.25,theme:4,frequency:0.05,coords:[[{x:2,y:1},{x:1,y:0},{x:2,y:0}],[{x:1,y:1},{x:1,y:0},{x:2,y:0}],[{x:1,y:1},{x:2,y:1},{x:1,y:0}],[{x:1,y:1},{x:2,y:1},{x:2,y:0}]]},
{view:0.5,theme:5,frequency:0.025,coords:[[{x:2,y:2},{x:1,y:2},{x:1,y:1},{x:1,y:0},{x:0,y:0}],[{x:0,y:2},{x:0,y:1},{x:1,y:1},{x:2,y:1},{x:2,y:0}]]},
{view:0.5,theme:6,frequency:0.025,coords:[[{x:0,y:2},{x:1,y:2},{x:1,y:1},{x:1,y:0},{x:2,y:0}],[{x:2,y:2},{x:2,y:1},{x:1,y:1},{x:0,y:1},{x:0,y:0}]]},
{view:0.5,theme:7,frequency:0.025,coords:[[{x:0,y:1},{x:2,y:1},{x:1,y:0},{x:0,y:0},{x:2,y:0}],[{x:1,y:1},{x:2,y:1},{x:1,y:0},{x:1,y:-1},{x:2,y:-1}],[{x:1,y:0},{x:0,y:0},{x:2,y:0},{x:0,y:-1},{x:2,y:-1}],[{x:1,y:1},{x:0,y:1},{x:1,y:0},{x:1,y:-1},{x:0,y:-1}]]},
{view:0.5,theme:7,frequency:0.025,coords:[[{x:1,y:2},{x:0,y:2},{x:2,y:2},{x:1,y:1},{x:1,y:0}],[{x:2,y:2},{x:1,y:1},{x:2,y:1},{x:0,y:1},{x:2,y:0}],[{x:1,y:2},{x:1,y:1},{x:1,y:0},{x:0,y:0},{x:2,y:0}],[{x:0,y:2},{x:1,y:1},{x:0,y:1},{x:2,y:1},{x:0,y:0}]]},
{view:0.5,theme:7,frequency:0.05,coords:[[{x:1,y:0}]]},
{view:0.5,theme:7,frequency:0.01,coords:[[{x:1,y:0},{x:0,y:0},{x:14,y:0},{x:2,y:0},{x:13,y:0},{x:3,y:0},{x:12,y:0},{x:4,y:0},{x:11,y:0},{x:5,y:0},{x:10,y:0},{x:6,y:0},{x:9,y:0},{x:7,y:0},{x:8,y:0}]]}];
var totalFrequency=0;
for(var i=0;i<blockData.length;i++){totalFrequency+=blockData[i].frequency;}

function getRandomPieceType() {
var r=Math.random()*totalFrequency;
var sum=0;
for(var i=0;i<blockData.length;i++){
sum+=blockData[i].frequency;
if(r<sum) {return i;}
}
return i-1;
}

this.init=function() {
ctx=g('canvas').getContext('2d');
ctx.translate(100,150);
ctx.lineJoin=ctx.lineCap='round';
ctx.globalAlpha=0.9;
ctx.lineWidth=0.7;
ctx.strokeStyle='#000';
}

var frameInterval=0;
var lastFrameTime=0;
var lastMoveTime=0;
var pieceSpawnTime=0;
var animating=0;
var animatingStartTime=0;
var animatingLines=null;

function nextFrame(junk,keyForce) {
var now=new Date().getTime();
var elapsed=(now-lastFrameTime);
elapsed=Math.max(0,Math.min(1000,elapsed));
self.time+=elapsed;
if(self.mode==2&&self.time>181*1000){
Control.gameOver();
}else {
var t=self.mode==2?(181*1000-self.time):self.time;
g('time').innerHTML=niceTime(t);
}
var delay=(self.mode==3?1000:(20+2980*Math.exp(-Game.lines/35))>>0);
if(keysDown.down) {
Game.score+=elapsed/100;
if(self.mode!=3){g('score').innerHTML=Math.floor(Game.score);}
delay=Math.min(delay,30);
}
posY-=Math.max(0,Math.min(1,elapsed/delay));lastFrameTime=now;
if(animating==1) {elapsed=(self.time-animatingStartTime)/Math.sqrt(animatingLines.length);
if(elapsed>300||elapsed<0) {animating=0;afterPlace();return;}
else {Game.drawCylinder(false,false,elapsed/300,animatingLines);return;}}
if(keyForce||(keysDown.left^keysDown.right)&&(now-lastMoveTime>150)) {lastMoveTime=now;Game.move(keyForce=='left'?-1:keyForce=='right'?1:keysDown.left?-1:keysDown.right?1:0);}
slotY=Math.floor(posY);
if(block.length==1) {
for(var y=slotY;y>=0;y--) {if(!field[((x+block[0].x)%15+15)%15][y]) {break;}}
if(y<0) {place(slotY+1);return;}
} else {
for(var i=block.length-1;i>=0;i--){if(slotY+block[i].y<0||field[((x+block[i].x)%15+15)%15][slotY+block[i].y]){place(slotY+1);return;}}
}

Game.drawCylinder(true);
}

this.setMode=function(mode) {
self.mode=mode;
self.clear();
};

this.start=function() {
nextType=getRandomPieceType();
self.prepare();
self.pause();
self.resume();
self.drawCylinder();
self.time=0;
}

this.pause=function() {
if(Game.paused){return;}
Game.paused=true;
document.removeEventListener('keyup',keyup,false);
document.removeEventListener('keydown',keydown,false);
clearInterval(frameInterval);frameInterval=0;
};

this.resume=function() {
if(!Game.paused){return;}

Game.paused=false;
document.addEventListener('keyup',keyup,false);
document.addEventListener('keydown',keydown,false);
keysDown.left=false;
keysDown.right=false;
keysDown.down=false;
lastFrameTime=new Date().getTime();
frameInterval=setInterval(nextFrame,0);
};

this.gameOver=function() {self.pause();}
var keysDown={down:false};
function keyup(evt){
switch(evt.keyCode){
case 65:
case 37:keysDown.left=false;break;
case 68:
case 39:keysDown.right=false;break;
case 83:
case 40:keysDown.down=false;break;
}

evt.preventDefault();
return false;
};

function keydown(evt) {
switch(evt.keyCode){
case 65:
case 37:if(!keysDown.left){keysDown.left=true;nextFrame(null,'left');}break;
case 68:
case 39:if(!keysDown.right){keysDown.right=true;nextFrame(null,'right');}break;
case 83:
case 40:if(keysDown.down===false){keysDown.down=true;nextFrame();}break;
case 87:
case 38:Game.rotate(+1);break;
case 32:Game.rotate(-1);break;
}

evt.preventDefault();
return false;
}

function getBlockColor(type,intensity,lightness) {
if(type<20) {type=blockData[type].theme;}
var L=lightness||0;
switch(type){
case 0:return'rgb('+((intensity*255)>>0)+','+((intensity*L)>>0)+','+((intensity*L)>>0)+')';
case 1:return'rgb('+((intensity*L)>>0)+','+((intensity*255)>>0)+','+((intensity*L)>>0)+')';
case 2:return'rgb('+((intensity*L)>>0)+','+((intensity*L)>>0)+','+((intensity*255)>>0)+')';
case 3:return'rgb('+((intensity*255)>>0)+','+((intensity*255)>>0)+','+((intensity*L)>>0)+')';
case 4:return'rgb('+((intensity*255)>>0)+','+((intensity*L)>>0)+','+((intensity*255)>>0)+')';
case 5:return'rgb('+((intensity*L)>>0)+','+((intensity*255)>>0)+','+((intensity*255)>>0)+')';
case 6:return'rgb('+((intensity*220)>>0)+','+((intensity*220)>>0)+','+((intensity*220)>>0)+')';
case 20:return'rgb('+((intensity*100)>>0)+','+((intensity*100)>>0)+','+((intensity*100)>>0)+')';
case 30:return'rgb('+((intensity*190)>>0)+','+((intensity*190)>>0)+','+((intensity*0)>>0)+')';
default:return'rgb('+((intensity*220)>>0)+','+((intensity*220)>>0)+','+((intensity*220)>>0)+')';
}
return'black';
}

this.drawPiece=function(){
var theta=(viewPort.getPosition()%15+15)%15;
var thetaTarget=(viewPort._target%15+15)%15;
var ghost=Control.config.ghost;
var slotY=Math.floor(posY);
var intensity=Math.sin(new Date().getTime()/150)*0.05+0.95;ctx.fillStyle=getBlockColor(type,intensity,140);
var joinTop;
var joinBottom;
var joinLeft;
var joinRight;
var opacityMultiplier=self.time>pieceSpawnTime?Math.min(1,(self.time-pieceSpawnTime)/250):1;
if(ghost) {
var shadowDrop=solveShadow();
if(Game.innerRadius==0)Game.innerRadius=41;
ctx.globalAlpha=0.4*opacityMultiplier;
var j;
for(i=0;i<block.length;i++){
joinBottom=joinRight=false;
for(j=block.length-1;j>=0;j--){
if(j!=i){
if(block[j].x==block[i].x&&block[j].y==block[i].y-1){
joinBottom=true;
}else if(block[j].y==block[i].y&&block[j].x==block[i].x+1){
joinRight=true;
}
}
}
ctx.drawFront(x+block[i].x,shadowDrop+block[i].y,false,theta);
ctx.drawTop(x+block[i].x,shadowDrop+block[i].y,theta);
ctx.drawTop(x+block[i].x,shadowDrop+block[i].y,theta);
ctx.drawSide(x+block[i].x,shadowDrop+block[i].y,theta);
if(!joinRight){ctx.drawSide(x+block[i].x+1,shadowDrop+block[i].y,theta);}
if(!joinBottom){ctx.drawTop(x+block[i].x,shadowDrop+block[i].y-1,theta);}
}

if(Game.innerRadius==41)Game.innerRadius=0;
}
ctx.globalAlpha=0.9*opacityMultiplier;
ctx.fillStyle=getBlockColor(type,intensity);
var j;
for(var i=block.length-1;i>=0;i--){
joinTop=joinBottom=joinLeft=joinRight=false;
for(j=block.length-1;j>=0;j--){
if(j!=i){
if(block[j].x==block[i].x){
if(block[j].y==block[i].y+1){
joinTop=true;
}else if(block[j].y==block[i].y-1){
joinBottom=true;
}
}else if(block[j].y==block[i].y){
if(block[j].x==(block[i].x+14)%15){
joinLeft=true;
}else if(block[j].x==(block[i].x+1)%15){
joinRight=true;
}
}
}
}

ctx.drawFront(x+block[i].x,posY+block[i].y,false,thetaTarget,joinLeft,joinRight,joinTop,joinBottom);
if(block[i].x+blockData[type].view<1&&!field[((x+block[i].x+1)%15+15)%15][posY+block[i].y]){
for(j=block.length-1;j>=0;j--){
if(block[j].x==1&&block[j].y==block[i].y){
break;
}
}
if(j<0){
ctx.drawSide(x+block[i].x+1,posY+block[i].y,thetaTarget,joinTop,joinBottom);
}
}

if(block[i].x+blockData[type].view>2&&!field[((x+block[i].x-1)%15+15)%15][slotY+block[i].y]){
for(j=block.length-1;j>=0;j--){
if(block[j].x==block[i].x-1&&block[j].y==block[i].y){
break;
}
}
if(j<0){
ctx.drawSide(x+block[i].x,posY+block[i].y,thetaTarget,joinTop,joinBottom);
}
}
if(1||!field[((x+block[i].x)%15+15)%15][slotY+block[i].y+1]){
for(j=block.length-1;j>=0;j--){
if(block[j].x==block[i].x&&block[j].y-1==block[i].y){
break;
}
}
if(j<0){
ctx.drawTop(x+block[i].x,posY+block[i].y,thetaTarget,joinLeft,joinRight);
}
}
}
}

this.drawCylinder=function(includePiece,hideTop,progress,clearing) {
var theta=(viewPort.getPosition()%15+15)%15;
ctx.clearRect(-100,-150,200,400);
var xOff=((theta)%15+15)%15>>0;
var x=0;
var y;
var i;
var j;
var yPos=0;
var xSlot=0;var intensity;
var now=new Date();
var block_type;
var obj;
var clearedBelow=0;
var maxBlock=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
for(i=0;i<15;i++){
x=[7,8,6,9,5,10,4,11,3,12,2,13,1,14,0][i];
clearedBelow=0;
for(y=0;y<15;y++){
xSlot=(x+xOff)%15;
if(field[xSlot][y]){
maxBlock[xSlot]=y;
intensity=0.6+0.4*Math.cos(2*Math.PI*(xSlot-theta)/15);
var block_type=field[xSlot][y][0]-1;
var theme=blockData[block_type].theme;
if(self.mode==3&&y>=3)theme=20;
if(self.displayGold)theme=30;
if(progress&&clearing.contains(y)){
clearedBelow++;
ctx.globalAlpha=Math.max(0,Math.min(1,intensity*(1-progress*1.5)));
yPos=y;
}else{
if(self.mode==3){
ctx.globalAlpha=Math.max((intensity-0.3)/0.7,0);
}else{
ctx.globalAlpha=0.9;
}
yPos=y-clearedBelow*Math.pow(Math.max(0,progress||0),5);
}

intensity*=1+Math.sin(xSlot*77777+now/871)*Math.sin(xSlot*31247+now/1713)*Math.sin(y*41996+now/1713)*Math.sin(y*85555+now/797)/3;
intensity=intensity<0?0:intensity>1?1:intensity;
switch(theme){
case 0:ctx.fillStyle='rgb('+((intensity*255)>>0)+','+((intensity*0)>>0)+','+((intensity*0)>>0)+')';break;
case 1:ctx.fillStyle='rgb('+((intensity*0)>>0)+','+((intensity*255)>>0)+','+((intensity*0)>>0)+')';break;
case 2:ctx.fillStyle='rgb('+((intensity*0)>>0)+','+((intensity*0)>>0)+','+((intensity*255)>>0)+')';break;
case 3:ctx.fillStyle='rgb('+((intensity*255)>>0)+','+((intensity*255)>>0)+','+((intensity*0)>>0)+')';break;
case 4:ctx.fillStyle='rgb('+((intensity*255)>>0)+','+((intensity*0)>>0)+','+((intensity*255)>>0)+')';break;
case 5:ctx.fillStyle='rgb('+((intensity*0)>>0)+','+((intensity*255)>>0)+','+((intensity*255)>>0)+')';break;
case 6:ctx.fillStyle='rgb('+((intensity*220)>>0)+','+((intensity*220)>>0)+','+((intensity*220)>>0)+')';break;
case 20:ctx.fillStyle='rgb('+((intensity*100)>>0)+','+((intensity*100)>>0)+','+((intensity*100)>>0)+')';break;
case 30:ctx.fillStyle='rgb('+((intensity*190)>>0)+','+((intensity*190)>>0)+','+((intensity*0)>>0)+')';break;
default:ctx.fillStyle='rgb('+((intensity*220)>>0)+','+((intensity*220)>>0)+','+((intensity*220)>>0)+')';break;
}

var angle=((xSlot-theta)%15+15)%15;
ctx.drawFront(xSlot,yPos,angle>3.3&&angle<10.7,theta,(angle>11.9||angle<10.9)&&((obj=field[(xSlot+14)%15][y])&&obj[1]==field[xSlot][y][1]),(angle<2.1||angle>3.1)&&((obj=field[(xSlot+1)%15][y])&&obj[1]==field[xSlot][y][1]),((obj=field[xSlot][y+1])&&obj[1]==field[xSlot][y][1]),((obj=field[xSlot][y-1])&&obj[1]==field[xSlot][y][1]));
if(!field[xSlot][y+1]||(obj=clearing&&clearing.contains(y+1)))
{ctx.drawTop(xSlot,yPos,theta,((obj||!field[(xSlot+14)%15][y+1])&&(obj=field[(xSlot+14)%15][y])&&obj[1]==field[xSlot][y][1]),((obj||!field[(xSlot+1)%15][y+1])&&(obj=field[(xSlot+1)%15][y])&&obj[1]==field[xSlot][y][1]))}
if(angle>6.5&&angle<14){
if(!field[((x+1+xOff)%15+15)%15][y]){
ctx.drawSide(xSlot+1,yPos,theta,((obj=field[xSlot][y+1])&&obj[1]==field[xSlot][y][1]),((obj=field[xSlot][y-1])&&obj[1]==field[xSlot][y][1]));
}
}
if(angle<7.5){
if(!field[((x-1+xOff)%15+15)%15][y]){
ctx.drawSide(xSlot,yPos,theta,((obj=field[xSlot][y+1])&&obj[1]==field[xSlot][y][1]),((obj=field[xSlot][y-1])&&obj[1]==field[xSlot][y][1]));
}
}
}
}
}

for(i=0;i<15&&!hideTop;i++) {
intensity=maxBlock[i];
for(j=1;j<5;j++){
intensity=Math.max(intensity,maxBlock[(i+j)%15]-j,maxBlock[(i-j+15)%15]-j);
}
if(intensity>9) {
ctx.globalAlpha=(intensity-9)/5;
ctx.fillStyle='rgb('+(255*(Math.sin(new Date()/200)/2+1/2)>>0)+',30,0)';
ctx.drawTop(i,14,theta,null,null,true);
}
}
if(includePiece) {Game.drawPiece();}
}

this.clear=function() {
var i,j,r;x=0;field=[];
for(i=0;i<15;i++){field[i]=new Array(15);}
viewPort.reset();
Game.lines=0;
Game.score=0;
g('score').innerHTML=(self.mode==3)?'+6':'0';
if(self.mode==1){
var f=field;
f[10][0]=f[11][0]=f[10][1]=f[11][1]=[1,1];
f[9][0]=f[9][1]=f[9][2]=f[9][3]=[2,2];
f[8][0]=f[7][0]=f[7][1]=f[6][0]=[3,3];
f[12][0]=f[13][0]=f[13][1]=f[13][2]=[4,4];
f[3][0]=f[4][0]=f[5][0]=f[5][1]=[5,5];
f[1][0]=f[2][0]=f[2][1]=f[3][1]=[6,6];
f[7][3]=f[7][2]=f[6][2]=f[6][1]=[7,7];
pieceCount=8;
}

if(self.mode==2){
var f=field;
f[0][0]=f[3][0]=f[6][0]=f[9][0]=f[12][0]=[(Math.random()*6+1)>>0,0];
pieceCount=1;
}
if(self.mode==3){
for(i=0;i<9;i++){
for(j=0;j<5;j++){
r=(Math.random()*15)>>0;
if(field[r][i]){j--;continue;}
else field[r][i]=[1,0];
}
}
pieceCount=1;
}
}

this.change=function(){
type=nextType;
nextType=getRandomPieceType();
g('next').style.backgroundPosition=(-blockData[nextType].theme*80)+'px 0';
rotated=0;
posY=16;
viewPort.setTarget(viewPort._target-blockData[type].view);
block=blockData[type].coords[0];
pieceSpawnTime=self.time;
}

function solveShadow() {
slotY=Math.floor(posY);
var j;
var i;
if(block.length==1){
for(var i=0;;i++){
if(!field[(((x+block[0].x)%15)+15)%15][i]){
return i;
}
}
}
for(j=0;;j++){
for(i=block.length-1;i>=0;i--){
if(slotY+block[i].y-j<0||field[((x+block[i].x)%15+15)%15][slotY+block[i].y-j]){return slotY-j+1;}
}
}
}

function place(slotY) {
keysDown.down=null;
lastDrop=new Date().getTime();
for(var i=block.length-1;i>=0;i--){
if(slotY+block[i].y>14){
self.drawCylinder(false,true);
Control.gameOver();
return;
}
}
for(var i=block.length-1;i>=0;i--){
field[((x+block[i].x)%15+15)%15][slotY+block[i].y]=[type+1,pieceCount];
}
++pieceCount;
var cleared=[];
for(var j=0;j<15;j++){
for(i=0;i<15;i++){
if(!field[i][j])break;
}
if(i==15){
for(i=0;i<15;i++){field[i][j]=[field[i][j][0],0];}
cleared.push(j);
}
}
if(cleared.length){
animating=1;
animatingStartTime=self.time;
animatingLines=cleared;
}else{afterPlace();}
}

function afterPlace() {
var cleared=0;
for(var j=0;j<15;j++){
for(i=0;i<15;i++){if(!field[i][j])break;}
if(i==15){
for(i=0;i<15;i++){field[i].splice(j,1);}
j--;
Game.lines++;
cleared++;
}
}
Game.score+=[0,100,250,400,600,1000][cleared];
if(self.mode==3){
for(j=14;j>2;j--){
for(i=0;i<15;i++)if(field[i][j])break;
if(i<15)break;
}
g('score').innerHTML='+'+(j-2);
if(j==2){
Game.change();
Game.drawCylinder();
Control.gameOver(true);
viewPort.setTarget(viewPort._target+blockData[type].view);
return;
}
}else{
g('score').innerHTML=Math.floor(Game.score);
}
viewPort.setTarget(viewPort._target+blockData[type].view);
Game.change();
}

this.prepare=function(){x=-2;this.change();}
function overlaps(){
var X,Y;
var slotY=Math.floor(posY);
var i;
if(block.length==1){
for(Y=slotY;Y>=0;Y--){
if(!field[((x+block[0].x)%15+15)%15][Y]){return false;}
}
return true;
}

for(i=block.length-1;i>=0;i--){
X=((x+block[i].x)%15+15)%15;
Y=slotY+block[i].y;
if(Y<0||field[X][Y])return true;
}

if(posY%1>1/2){
slotY=Math.ceil(posY);

for(i=block.length-1;i>=0;i--){
X=((x+block[i].x)%15+15)%15;
Y=slotY+block[i].y;
if(Y<0||field[X][Y])return true;
}
}

return false;
}

this.move=function(xDir){
x+=xDir;
if(overlaps()){
x-=xDir;
return false;
}

viewPort.setTarget(viewPort._target+xDir);
return true;
}

this.rotate=function(dir,idle){
if(type==0)return false;
rotated=(rotated+dir+4)%blockData[type].coords.length;
block=blockData[type].coords[rotated];
if(idle)return false;
if(overlaps() && !this.move(1) && !this.move(-1)){
this.rotate(-dir,true);
return false;
}
return true;
}
};

var MENU_QUOTES=['"If you love someone, put their name in a <B>circle</B>; because hearts can be broken, but <B>circles</B> never end."<BR><SPAN>- Brian Littrell</SPAN>','"I made a <B>circle</B> with a smile for a mouth on yellow paper, because it was sunshiny and bright."<BR><SPAN>- Harvey Ball</SPAN>','"A <B>circle</B> may be small, yet it may be as mathematically beautiful and perfect as a large one."<BR><SPAN>- Isaac Disraeli</SPAN>','"When the tribe first sat down in a <B>circle</B> and agreed to allow only one person to speak at a time - that was the longest step forward in the history of law"<BR><SPAN>- Judge Curtis Bok</SPAN>','"The nature of God is a <B>circle</B> of which the center is everywhere and the circumference is nowhere"<BR><SPAN>- Empedocles</SPAN>','"The mind petrifies if a <B>circle</B> be drawn around it, and it can hardly be that dogma draws a <B>circle</B> round the mind."<BR><SPAN>- George Moore</SPAN>','"Let mathematicians and geometrician \'talk of <B>circles</B>\' and triangles\' charms, The figure I prize is a girl with bright eyes, And the <B>circle</B> that\'s formed by her arms"<BR><SPAN>- Anonymous</SPAN>','"Round, like a <B>circle</B> in a spiral<BR>Like a wheel within a wheel."<BR><SPAN>- Sting</SPAN>'];

var UI=new function(){
var active_menu=true;

function scrollMenu(x0,x1,dir,funct) {
active_menu=false;
var x;
var i=0;
var dist;
if(dir=='x')dir='scrollLeft';
if(dir=='y')dir='scrollTop';

var loopy=setInterval(function(){
i++;
dist=(1-Math.cos(i*Math.PI/20))/2;
dist=i==20?x1:(x0*(1-dist)+x1*dist);
g('menu_area')[dir]=dist>>0;
if(i==20){
active_menu=true;
clearInterval(loopy);
if(funct)funct();
}
},30);
}

function menuMode(){
window.widget && window.resizeTo(460,450);
g('menu').style.display='block';
g('menu_area').scrollLeft=321;
g('menu_area').scrollTop=157;
active_menu=true;
g('gameover').style.display='none';
g('close').style.top='264px';
g('close').style.left='425px';
Game.mode=1;
Game.clear();
Game.drawCylinder();
}

this.init=function() {
menuMode();

function applyBase(n){
var str='url(i/apps/torus/base' + Control.config.skin + '.png)';
g('playing').style.backgroundImage=str;
}

g('set_base').options.selectedIndex=Control.config.skin;
applyBase(Control.config.skin);
g('set_base').onchange=function() { var skin=Control.config.skin=this.options.selectedIndex;applyBase(skin);localStorage.setItem('base',skin);};
g('but_main4').onclick=function() { Control.gameOver(false);menuMode();}
g('go1').onclick=function() { Control.startGame(1);}
g('go2').onclick=function() { Control.startGame(2);}
g('go3').onclick=function() { Control.startGame(3);}
g('close').onclick=Control.close;
g('bestType').onchange=function() {var n=this.options.selectedIndex;for(var i=0;i<3;i++) {g('best'+(i+1)).style.display=(i==n)?'block':'none';}}
g('set_ghost').onclick=function() {Control.config.ghost=this.checked;localStorage.setItem('ghost',(this.checked?1:0));}
if(Control.config.ghost) {g('set_ghost').checked=true;}
window.onblur=function() { if(!active_menu) {Control.pauseGame();}};
g('quote').innerHTML=MENU_QUOTES[(Math.random()*MENU_QUOTES.length)>>0];
g('but_play').onclick=function() { if(active_menu)scrollMenu(321,0,'x');}
g('but_settings').onclick=function(){ if(active_menu)scrollMenu(157,314,'y');}
g('but_high').onclick=function(){ if(active_menu)scrollMenu(321,642,'x');Game.displayGold=true;Game.drawCylinder();}
g('but_help').onclick=function(){ if(active_menu) {scrollMenu(157,0,'y',function() {g('helpBox').style.display='block';});}}
g('but_main0').onclick=function() { if(active_menu) {g('helpBox').style.display='none';scrollMenu(0,157,'y');}}
g('but_main1').onclick=function() { if(active_menu) {scrollMenu(0,321,'x');}}
g('but_main2').onclick=function() { if(active_menu) scrollMenu(642,321,'x'); Game.displayGold=false; Game.drawCylinder();}
g('but_main3').onclick=function() { if(active_menu) scrollMenu(314,157,'y');};
g('but_pause').onclick=function() { Game.paused ? Control.resumeGame() : Control.pauseGame(); };
g('but_resume').onclick=Control.resumeGame;
g('but_restart').onclick=g('but_restart2').onclick=Control.restartGame;

g('but_quit').onclick=function() {
Game.pause();
g('canvas').style.opacity='';
g('paused').style.display=g('panel').style.display='none';
Control.gameOver(false);menuMode();
}
};

this.setGameMode=function(mode) {
active_menu=false;g('menu').style.display='none';
g('gameover').style.display='none';
window.widget && window.resizeTo(380,450);
for(var i=1;i<=3;i++)g('title'+i).style.display=(i==mode?'block':'none');
g('panel').style.display='block';
var x,y;
if(mode==1)x=328,y=202;
if(mode==2)x=328,y=197;
if(mode==3)x=330,y=170;
g('close').style.left=x+'px';
g('close').style.top=y+'px';
};

this.pauseGame=function() {pauseAnimation.start(true);};
this.resumeGame=function(){pauseAnimation.start(false);};

var pauseAnimation={
motion:new CubicMotion(300),interval:0,frame:function(){
var self=pauseAnimation;
var pos=self.motion.getPosition();
g('canvas').style.opacity=1-pos;
g('paused').style.opacity=pos;
g('paused').style.display=pos?'block':'none';
if(pos==self.motion._target){
clearInterval(self.interval);
self.interval=0;
}
},
start:function(doPause){
this.motion.setTarget(doPause?1:0);
if(!this.interval) {this.interval=setInterval(this.frame,0);}
}
}

this.gameOver=function() {
g('panel').style.display='none';
g('paused').style.display='none';
g('close').style.left='435px';
g('close').style.top='185px';
window.widget && window.resizeTo(470,450);
}
};

(function(){
var list=[];
Function.prototype.wait=function(){
var i=list.length;
while(i-->0){
if(list[i][0]==this)return;
}

i=arguments;
list[list.length]=[this,setTimeout(function(){list.shift()[0].apply(window,i);},1)];
}
})();

function niceTime(t) {
t/=1000;
t>>=0;
return((t/60)>>0)+':'+(t%60).toLength(2)
}

window.addEventListener('load',function() {
g('loading').style.display='none';
g('container').style.visibility='visible';
Game.init();
Control=new Control();
UI.init();
},false);



function Control() {
this.config={ghost:(localStorage.getItem('ghost')!=='0'),skin:parseInt(localStorage.getItem('base'))||0};

function storeBest(){
var pos;
for(var gameType=0;gameType<3;gameType++){
for(pos=0;pos<3;pos++){
localStorage.setItem('best'+gameType+''+pos+'score',best[gameType][pos][0]);
localStorage.setItem('best'+gameType+''+pos+'name',best[gameType][pos][1]);
}
}
}

function getBestStr(i){
str='<B>'+['Traditional','Time Attack','Garbage'][i]+'</B>';
for(j=0;j<3;j++){
str+='<BR>'+(j+1)+'. '+best[i][j][1]+' ('+(i==2?niceTime(best[i][j][0]):best[i][j][0])+')';
}
return str;
}

function displayBest(){
var str,j;
for(var i=0;i<3;i++) {
g('best'+(i+1)).innerHTML=getBestStr(i);
}
}

var best=[[['0','Empty'],['0','Empty'],['0','Empty']],[['0','Empty'],['0','Empty'],['0','Empty']],[['3599000','Empty'],['3599000','Empty'],['3599000','Empty']]];
if(localStorage.getItem('best11score')==null) {
storeBest();
}else {
for(var gameType=0;gameType<3;gameType++) {
for(pos=0;pos<3;pos++){
best[gameType][pos][0]=Number(localStorage.getItem('best'+gameType+''+pos+'score'))||0;
best[gameType][pos][1]=localStorage.getItem('best'+gameType+''+pos+'name');
}
}
}

displayBest();

this.gameOver=function(complete) {
Game.gameOver();
var score=Math.floor(Game.score);
var time=Game.time;
if(complete===false)return;
var message='Your score of '+score+' did not achieve a high score.';
var hasWon=false;
if(Game.mode==1) {if(score>best[0][2][0])hasWon=true;}
if(Game.mode==2) {
if(time>181*1000) {
if(score>best[1][2][0])hasWon=true;
}else {
message='Failure. You must survive for 3 minutes to qualify for a high score in <I>Time Attack</I>.';
}
}

if(Game.mode==3) {
if(!complete) {
message='Failure. You must clear all but three rows to qualify for a high score in <I>Garbage</I>.';
}else if(time<best[2][2][0]) {
hasWon=true;
}else{
message='Your time of '+niceTime(time)+' did not achieve a high score.';
}
}

UI.gameOver();
g('winner').style.display=hasWon?'block':'none';
g('newgame').style.display=hasWon?'none':'block';
g('sorryText').innerHTML=hasWon?"":message;
g('gameover').style.display='block';};

this.close=function() {window.close();};
this.restartGame=function() {Game.gameOver(false);Control.startGame(Game.mode);};
this.startGame=function(mode) {UI.setGameMode(mode||1);Game.setMode(mode);Game.start();};
this.pauseGame=function() {Game.pause();UI.pauseGame();};
this.resumeGame=function() {Game.resume();UI.resumeGame();}

g('high_form').onsubmit=function() {
var str=g('high_name').value;
if(!str)return;
g('winner').style.display='none';
g('newgame').style.display='block';
var score=Game.mode<3?Math.floor(Game.score):Game.time;
for(var i=2;i>=0;i--) {
if(Game.mode<3&&score>best[Game.mode-1][i][0]||Game.mode==3&&score<best[2][i][0]){
if(i<2) {best[Game.mode-1][i+1][0]=best[Game.mode-1][i][0];best[Game.mode-1][i+1][1]=best[Game.mode-1][i][1];}
}
else break;
}

i++;
best[Game.mode-1][i][0]=score;
best[Game.mode-1][i][1]=str;
storeBest();
displayBest();
g('sorryText').innerHTML='<div style="padding-left: 60px;">'+getBestStr(Game.mode-1)+'</div>';
return false;
}

document.getElementsByTagName('body')[0].style.visibility='visible';
}

/* end torus **/
/** begin calculator */

try {
	math = ['abs','acos','asin','atan','atan2','ceil','cos','exp','floor','log','max','min','pow','random','round','sin','sqrt','tan'];
	for (f in math) eval('var ' + math[f] + ' = Math.' + math[f]);
} catch(e) {}

/* end calculator **/
/** begin twitter */

function writeToTable(data) {
	var table = $('div#twitter table#tweets'); table.children().remove();
	var tweets = data.results;
	for (var i in tweets) {
		table.append('<tr><td><img src="' + tweets[i].profile_image_url + '" class="pimage" /></td><td><b>' + tweets[i].from_user + ' says: </b> <i>' + tweets[i].text + '</i></td></tr>');
	}
}

/* end twitter **/
/* end pre app functions */
/* begin dragresize functions */

if (typeof addEvent != 'function') {
	var addEvent = function(o,t,f,l) {
		var d = 'addEventListener', n = 'on' + t, rO = o, rT = t, rF = f, rL = l;
		if (o[d] && !l) return o[d](t,f,false);
		if (!o._evts) o._evts = {};
		if (!o._evts[t]) {
			o._evts[t] = o[n] ? {b:o[n]} : {};
			o[n] = new Function('e','var r = true, o = this, a = o._evts["' + t + '"], i; for (i in a) { o._f = a[i]; r = o._f(e || window.event) != false && r; o._f = null } return r;');
			if (t != 'unload') addEvent(window,'unload',function() { removeEvent(rO,rT,rF,rL); })
		}
		if (!f._i) f._i = addEvent._i++;
		o._evts[t][f._i] = f;
	};
	addEvent._i = 1;
	var removeEvent = function(o,t,f,l) {
		var d = 'removeEventListener';
		if (o[d] && !l) return o[d](t,f,false);
		if (o._evts && o._evts[t] && f._i) delete o._evts[t][f._i];
	};
}

function cancelEvent(e,c) {
	e.returnValue = false;
	if (e.preventDefault) e.preventDefault();
	if (c) { e.cancelBubble = true; if (e.stopPropagation) e.stopPropagation(); }
}

function dResize(myName,config) {
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

dResize.prototype.apply = function(node) { var obj = this;
	addEvent(node,'mousedown',function(e) { obj.mouseDown(e); });
	addEvent(node,'mousemove',function(e) { obj.mouseMove(e); });
	addEvent(node,'mouseup',function(e) { obj.mouseUp(e); })
};

dResize.prototype.select = function(newElement) {
	with (this) {
		if (!document.getElementById || !enabled) return;
		if (newElement && (newElement != element) && enabled) {
			element = newElement;
			var zmax = 0, cur = 0;
			$("div.application").each(function() {
				cur = parseInt($(this).css('z-index'));
				zmax = (cur > zmax) ? cur : zmax;
			});
			$(element).css('z-index', (zmax + dC.settings.zindexint));
			if (this.resizeHandleSet) this.resizeHandleSet(element,true);
			elmX = parseInt(element.style.left);
			elmY = parseInt(element.style.top);
			elmW = element.offsetWidth;
			elmH = element.offsetHeight;
			if (ondragfocus) this.ondragfocus();
		}
	}
};

dResize.prototype.deselect = function(delHandles) {
	with (this) {
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

dResize.prototype.mouseDown = function(e) {
	with (this) {
		if (!document.getElementById || !enabled) return true;
		var elm = e.target || e.srcElement, newElement = null, newHandle = null, hRE = new RegExp(myName + '-([trmbl]{2})','');
		while (elm) {
			if (elm.className) {
				if (!newHandle && (hRE.test(elm.className) || isHandle(elm))) newHandle = elm;
				if (isElement(elm)) { newElement = elm;	break; }
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

dResize.prototype.mouseMove = function(e) {
	with (this) {
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
		if (this.resizeHandleDrag && this.resizeHandleDrag(diffX,diffY)) isResize = true;
		else { var dX = diffX, dY = diffY;
			if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = minLeft - elmX));
			else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = (maxLeft - elmX - elmW)));
			if ((elmY + dY) < minTop) mOffY = (dY - (diffY = (minTop - elmY)));
			else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
			elmX += diffX; elmY += diffY;
		}
		with (element.style) {
			left = elmX + 'px';
			width = elmW + 'px';
			top = elmY + 'px';
			height = elmH + 'px';
		}
		var new_element = 'div#' + $(element).attr('id') + ' div.pnl-bwrap';
		$(new_element).css('height', elmH - 30);
		var carray;
		if ($(element).attr('id') == "documents") {
			dC.user.apps.documents[0] = elmX; dC.user.apps.documents[1] = elmY;
			for (var i = 0; i < 10; i++) {
				if (i == 0) carray = dC.user.apps.documents[i] + ", ";
				else if ((i > 0) && (i < 9)) carray += dC.user.apps.documents[i] + ", ";
				else if (i == 9) carray += dC.user.apps.documents[i];
			}
		}
		try { for (a in dC.apps.list) if (a > 0) eval(' else if ($(element).attr("id") == "' + dC.apps.list[a] + '") { dC.user.apps.' + dC.apps.list[a] + '[0] = elmX; dC.user.apps.' + dC.apps.list[a] + '[1] = elmY; for (var i = 0; i < 10; i++) { if (i == 0) carray = dC.user.apps.' + dC.apps.list[a] + '[i] + ", "; else if ((i > 0) && (i < 9)) carray += dC.user.apps.' + dC.apps.list[a] + '[i] + ", "; else if (i == 9) carray += dC.user.apps.' + dC.apps.list[a] + '[i]; }}');
		} catch(e) {}
		$.get("load.php", { id: "update_apps", action: $(element).attr('id'), data: carray });
		if (window.opera && document.documentElement) {
			var oDF = document.getElementById('op-drag-fix');
			if (!oDF) { var oDF = document.createElement('input'); oDF.id = 'op-drag-fix'; oDF.style.display = 'none'; document.body.appendChild(oDF); }
			oDF.focus();
		}
		if (ondragmove) this.ondragmove(isResize);
		cancelEvent(e);
	}
};

dResize.prototype.mouseUp = function(e) {
	with (this) {
		if (!document.getElementById || !enabled) return;
		var hRE = new RegExp(myName + '-([trmbl]{2})','');
		if (handle && ondragend) this.ondragend(hRE.test(handle.className));
		deselect(false);
	}
};

dResize.prototype.resizeHandleSet = function(elm,show) {
	with (this) {
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

dResize.prototype.resizeHandleDrag = function(diffX,diffY) {
	with (this) {
		var hClass = handle && handle.className && handle.className.match(new RegExp(myName + '-([tmblr]{2})')) ? RegExp.$1 : '';
		var dY = diffY, dX = diffX, processed = false;
		if (hClass.indexOf('t') >= 0) { rs = 1;
			if ((elmH - dY) < minHeight) mOffY = (dY - (diffY = elmH - minHeight));
			else if ((elmY + dY) < minTop) mOffY = (dY - (diffY = minTop - elmY));
			elmY += diffY; elmH -= diffY;
			processed = true;
		}
		if (hClass.indexOf('b') >= 0) { rs = 1;
			if ((elmH + dY) < minHeight) mOffY = (dY - (diffY = (minHeight - elmH)));
			else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
			elmH += diffY;
			processed = true;
		}
		if (hClass.indexOf('l') >= 0) { rs = 1;
			if ((elmW - dX) < minWidth) mOffX = (dX - (diffX = (elmW - minWidth)));
			else if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = (minLeft - elmX)));
			elmX += diffX; elmW -= diffX;
			processed = true;
		}
		if (hClass.indexOf('r') >= 0) { rs = 1;
			if (elmW + dX < minWidth) mOffX = (dX - (diffX = minWidth - elmW));
			else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = maxLeft - elmX - elmW));
			elmW += diffX;
			processed = true;
		}
		$("div#" + $(element).attr('id') + " div.content").height(elmH - 32);
		$("div#" + $(element).attr('id') + " div.content").width(elmW - 16);
		var carray;
		if ($(element).attr('id') == "documents") {
			dC.user.apps.documents[2] = elmH; dC.user.apps.documents[3] = elmW;
			for (var i = 0; i < 10; i++) {
				if (i == 0) carray = dC.user.apps.documents[i] + ", ";
				else if ((i > 0) && (i < 9)) carray += dC.user.apps.documents[i] + ", ";
				else if (i == 9) carray += dC.user.apps.documents[i];
			}
		}
		try { for (a in dC.apps.list) if (a > 0) eval(' else if ($(element).attr("id") == "' + dC.apps.list[a] + '") { dC.user.apps.' + dC.apps.list[a] + '[2] = elmH; dC.user.apps.' + dC.apps.list[a] + '[3] = elmW; for (var i = 0; i < 10; i++) { if (i == 0) carray = dC.user.apps.' + dC.apps.list[a] + '[i] + ", "; else if ((i > 0) && (i < 9)) carray += dC.user.apps.' + dC.apps.list[a] + '[i] + ", "; else if (i == 9) carray += dC.user.apps.' + dC.apps.list[a] + '[i]; }}');
		} catch(e) {}
		$.get("load.php", { id: "update_apps", action: $(element).attr('id'), data: carray });
		return processed;
	}
};

var dResize = new dResize('dResize', { minWidth: 10, minHeight: 10, minLeft: 0, maxLeft: dC.config.width, minTop: 0, maxTop: <?php if ($_SESSION['logged'] == 1) { ?> (dC.config.height - (dC.taskbar.height2)) <?php } else { echo 'dC.config.height'; } ?>});
dResize.isElement = function(elm) { if (elm.className && elm.className.indexOf('drsElement') > -1) return true; };
dResize.isHandle = function(elm) { if (elm.className && elm.className.indexOf('drsMoveHandle') > -1) return true; };
dResize.ondragfocus = function() {};
dResize.ondragstart = function(isResize) {};
dResize.ondragmove = function(isResize) {};
dResize.ondragend = function(isResize) {};
dResize.ondragblur = function() {};
dResize.apply(document);

/* end dragresize functions */
<?php } ob_end_flush(); ?>