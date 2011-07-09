<?php
$expires = 60;
header("Pragma: public");
header("Cache-Control: maxage=" . $expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
session_start();
header('Content-Type: text/css; charset: utf-8');
if (isset($_GET['id']) && ($_GET['id'] >= 1)) $theme_id = $_GET['id']; else $theme_id = 1;
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Style Sheet  <<< ----------- */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    HnS Desktop
/* Site Creator: Andrew Gerst
/* Site Created: Wed, 24 Mar 2010 21:22:05 -0400
/* Last Updated: <?php echo date(r, filemtime('css.php')) . "\n"; ?>
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>/* Current User: <?php echo $_SESSION['fullname'] . "\n";} ?>
/* Select Theme: <?php echo $theme_id . "\n"; ?>
/* ---------------------------------------------------- */

<?php include('compress.php'); ob_start('compressCSS'); ?>
/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* CSS Reset
/* CCS Base
/* Buttons
/* - SPN
/* - Shiny
/* Main
/* Transparency
/* Floating & Clearing
/* Drag / Resize
/* Panel
/* - Tools
/* - Panel Icons
/* -- Logged Out
/* -- Logged In
/* Dialog
/* User Interface
/* - Splash
/* - Desktop
/* -- Desktop Thumbs
/* --- Desktop Thumb Icons
/* -- Login
/* -- Logout
/* -- Preferences
/* -- Notepad
/* - Taskbar
/* -- Splitbars
/* -- Start
/* -- Quickstart
/* -- Taskbuttons
/* --- Taskbutton Icons
/* -- Tray
/* - Apps
/* ---------------------------------------------------- */

/* Begin CSS Reset */

html {
background-color: #fff;
color: #000;
font-size: 100.01%;
}

body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td {
margin: 0;
padding: 0;
}

table {
border-collapse: collapse;
border-spacing: 0;
}

fieldset, img {
border: 0;
}

address, caption, cite, code, dfn, em, strong, th, var {
font-style: normal;
font-weight: normal;
}

li {
list-style: none;
}

caption, th {
text-align: left;
}

h1, h2, h3, h4, h5, h6 {
font-size: 100%;
font-weight: normal;
}

q:before, q:after {
content: '';
}

abbr, acronym {
border: 0;
font-variant: normal;
}

sup {
vertical-align: text-top;
}

sub {
vertical-align: text-bottom;
}

input, textarea, select {
font-family: inherit;
font-size: inherit;
font-weight: inherit;
}

input, textarea, select {
*font-size: 100%;
}

legend {
color: #000;
}

/*
input {
box-sizing: content-box;
-moz-box-sizing: content-box;
-webkit-box-sizing: content-box;
}

textarea {  // declared width
box-sizing: border-box;
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
}
*/

/* End CSS Reset */
/* Begin CSS Base */

html, body {
font-family: tahoma, arial, verdana, sans-serif;
font-size: 1em;
height: 100%;
line-height: 1.4;
margin: 0 auto;
overflow: hidden;
padding: 0 auto;
width: 100%;
}

html {
background-color: #fff;
background-image: url(i/wallpapers/vista.jpg); /* http://i55.tinypic.com/2zggdq0.jpg */
background-position: center center;
background-repeat: no-repeat;
color: #000;
}

body {
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
}

/*
.wallpaper-tile {
background-repeat: repeat;
background-position: left top;
}

.wallpaper-center {
background-position: center;
}
*/

h1 { font-size: 138.5%; }
h2 { font-size: 123.1%; }
h3 { font-size: 108%; }

h1, h2, h3 {
margin: 1em 0;
}

h1, h2, h3, h4, h5, h6, strong {
font-weight: bold;
}

abbr, acronym {
border-bottom: 1px dotted #000;
cursor: help;
}

em {
font-style: italic;
}

blockquote, ul, ol, dl {
margin: 1em;
}

ol, ul, dl {
margin-left: 2em;
}

ol li {
list-style: decimal outside;
}

ul li {
list-style: disc outside;
}

dl dd {
margin-left: 1em;
}

th, td {
border: 1px solid #000;
padding: .5em;
}

th {
font-weight: bold;
text-align: center;
}

caption {
margin-bottom: .5em;
text-align: center;
}

p, fieldset, table {
margin-bottom: 1em;
}

/*
pre {
background: #eee;
padding: 10px;
border: 2px solid #c94a29;
overflow: hidden;
margin: 0 0 15px 0;
width: 563px;
font-family: "courier new", courier, monospace;
}
*/

/* End CSS Base */
/* Begin HTML 5 */

address, article, aside, footer, header, hgroup, nav, section, time {
display: block;
}

address {
margin: 0 0 0.2em 0;
}

time {
margin: 0 0 1.5em 0;
}

/*
article:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
aside:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
div:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
form:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
header:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
nav:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
section:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
ul:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
*/

/* End HTML5 */
/* Begin Custom Styles */

.signaturefont { font-family: "comic sans ms", "brush script mt", cursive; }
.gothicfont { font-family: "avant garde", "century gothic", sans-serif; }
.fantasyfont { font-family: impact, haettenschweiler, fantasy; }
  
/* End Custom Styles */
/* Begin Buttons */

.buttons a,
.buttons button {
background-color: #f5f5f5;
border: 1px solid #dedede;
border-left: 1px solid #eee;
border-top: 1px solid #eee;
color: #565656;
cursor: pointer;
display: block;
float: left;
font-family: "lucida grande", tahoma, arial, verdana, sans-serif;
font-size: 10pt;
font-weight: bold;
line-height: 130%;
margin: 0 7px 0 0;
padding: 5px 10px 6px 7px;
text-decoration: none;
}

.buttons button {
overflow: visible;
padding: 4px 10px 3px 7px;
width: auto;
}

.buttons button[type] {
line-height: 17px;
padding: 5px 10px 5px 7px;
}

*:first-child+html button[type] {
padding: 4px 10px 3px 7px;
}

.buttons a img,
.buttons button img {
border: none;
height: 16px;
margin: 0 3px -3px 0 !important;
padding: 0;
width: 16px;
}

/* STANDARD */

button:hover,
.buttons a:hover {
background-color: #dff4ff;
border: 1px solid #c2e1ef;
color: #336699;
}

.buttons a:active {
background-color: #6299c5;
border: 1px solid #6299c5;
color: #fff;
}

/* POSITIVE */

button.positive,
.buttons a.positive {
color: #529214;
}

.buttons a.positive:hover,
button.positive:hover {
background-color: #e6efc2;
border: 1px solid #c6d880;
color: #529214;
}

.buttons a.positive:active {
background-color: #529214;
border: 1px solid #529214;
color: #fff;
}

/* NEGATIVE */

.buttons a.negative,
button.negative {
color: #d12f19;
}

.buttons a.negative:hover,
button.negative:hover {
background: #fbe3e4;
border: 1px solid #fbc2c4;
color: #d12f19;
}

.buttons a.negative:active {
background-color: #d12f19;
border: 1px solid #d12f19;
color: #fff;
}

/** Begin Shiny Buttons */

.shiny-button1,
.shiny-button2,
.shiny-button3 {
background-color: #666;
background-color: rgba(128,128,128,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(64,64,64,0.75)), to(rgba(192,192,192,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(64,64,64,0.75)), to(rgba(192,192,192,0.9)));
border: 2px solid #999;
border-radius: 16px;
-khtml-border-radius: 16px;
-moz-border-radius: 16px;
-opera-border-radius: 16px;
-webkit-border-radius: 16px;
box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
-khtml-box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
-moz-box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
-webkit-box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
color: #fff;
cursor: pointer;
display: inline-block;
font-size: 1.5em;
font-weight: bold;
padding: 0.25em 0.5em 0.3em 0.5em;
position: relative;
text-align: center;
text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
width: 8em;
}

.shiny-button1 span,
.shiny-button2 span,
.shiny-button3 span {
background-color: rgba(255,255,255,0.25);
background-image: -moz-linear-gradient(top, bottom, from(rgba(255,255,255,0.75)), to(rgba(255,255,255,0)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255,255,255,0.75)), to(rgba(255,255,255,0)));
border-radius: 8px;
-khtml-border-radius: 8px;
-moz-border-radius: 8px;
-opera-border-radius: 8px;
-webkit-border-radius: 8px;
display: block;
height: 50%;
left: 3.5%;
position: absolute;
top: 0;
width: 94%;
}

.shiny-button1:hover { /* red */
background-color: rgba(255,0,0,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(128,64,64,0.75)), to(rgba(192,128,128,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(128,64,64,0.75)), to(rgba(256,128,128,0.9)));
border-color: #aa7777;
box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
-khtml-box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
-moz-box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
-webkit-box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
}

.shiny-button2:hover { /* green */
background-color: rgba(0,128,0,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(64,128,64,0.75)), to(rgba(128,192,128,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(64,128,64,0.75)), to(rgba(128,255,128,0.9)));
border-color: #77cc77;
box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
-khtml-box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
-moz-box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
-webkit-box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
}

.shiny-button3:hover { /* blue */
background-color: rgba(64,128,192,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(16,96,192,0.75)), to(rgba(96,192,255,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(16,96,192,0.75)), to(rgba(96,192,255,0.9)));
border-color: #6699cc;
box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
-khtml-box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
-moz-box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
-webkit-box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
}

/* End Shiny Buttons **/
/* End Buttons */

/* ----------------------------------------------------- */
/* -------------- >>>  Global Layout  <<< -------------- */
/* ----------------------------------------------------- */

/* Begin Main */

div#blackout {
background-color: #000;
filter: alpha(opacity=60);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
height: 100%;
opacity: 0.6;
-khtml-opacity: 0.6;
-moz-opacity: 0.6;
width: 100%;
}

div#whiteout {
background-color: #fff;
filter: alpha(opacity=60);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
height: 100%;
opacity: 0.6;
-khtml-opacity: 0.6;
-moz-opacity: 0.6;
width: 100%;
}

div.breakwrap {
white-space: normal;
white-space: pre-wrap;
white-space: -pre-wrap;
white-space: -moz-pre-wrap;
white-space: -o-pre-wrap;
word-break: break-all;
word-wrap: break-word;
}

/* End Main */
/* Begin Transparency */

.transparent1 { filter: alpha(opacity=10) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=10)" !important; opacity: 0.1 !important; -khtml-opacity: 0.1 !important; -moz-opacity: 0.1 !important; }
.transparent2 { filter: alpha(opacity=20) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=20)" !important; opacity: 0.2 !important; -khtml-opacity: 0.2 !important; -moz-opacity: 0.2 !important; }
.transparent3 { filter: alpha(opacity=30) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)" !important; opacity: 0.3 !important; -khtml-opacity: 0.3 !important; -moz-opacity: 0.3 !important; }
.transparent4 { filter: alpha(opacity=40) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=40)" !important; opacity: 0.4 !important; -khtml-opacity: 0.4 !important; -moz-opacity: 0.4 !important; }
.transparent5 { filter: alpha(opacity=50) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=50)" !important; opacity: 0.5 !important; -khtml-opacity: 0.5 !important; -moz-opacity: 0.5 !important; }
.transparent6 { filter: alpha(opacity=60) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)" !important; opacity: 0.6 !important; -khtml-opacity: 0.6 !important; -moz-opacity: 0.6 !important; }
.transparent7 { filter: alpha(opacity=70) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=70)" !important; opacity: 0.7 !important; -khtml-opacity: 0.7 !important; -moz-opacity: 0.7 !important; }
.transparent8 { filter: alpha(opacity=80) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=80)" !important; opacity: 0.8 !important; -khtml-opacity: 0.8 !important; -moz-opacity: 0.8 !important; }
.transparent9 { filter: alpha(opacity=90) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=90)" !important; opacity: 0.9 !important; -khtml-opacity: 0.9 !important; -moz-opacity: 0.9 !important; }
.transparent10 { filter: alpha(opacity=100) !important; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=100)" !important; opacity: 1 !important; -khtml-opacity: 1 !important; -moz-opacity: 1 !important; }

/* End Transparency */
/* Begin Floating & Clearing */

.clear { clear: both !important; }
.left { float: left !important; }
.right { float: right !important; }

/** Begin Clear Fix */

.clearfix:after {
clear: both;
content: " ";
display: block;
font-size: 0;
height: 0;
line-height: 0;
visibility: hidden;
width: 0;
}

.clearfix {
display: inline-table;
display: inline-block;
}

html[xmlns] .clearfix {
display: block;
}

/* Begin Hide From IE-Mac \*/

* html .clearfix {
height: 1%;
}

.clearfix {
display: block;
}

/* End Hide From IE-Mac */
/* End Clear Fix **/
/* End Floating & Clearing */
/* Begin Drag/Resize */

.drsElement {
position: absolute;
z-index: 1;
}

.drsMoveHandle {
background-color: transparent;
cursor: move;
height: 28px;
width: 100%;
}

.dResize {
background-color: transparent;
border: 0;
font-size: 1px;
position: absolute;
}

.dResize-tl { cursor: nw-resize; height: 6px; left: 0; top: 0; width: 6px; z-index: 101; }
.dResize-tm { cursor: n-resize; height: 6px; left: 0; top: 0; width: 100%; z-index: 100; }
.dResize-tr { cursor: ne-resize; height: 6px; right: 0; top: 0; width: 6px; z-index: 101; }
.dResize-ml { cursor: w-resize; top: 0; left: 0; height: 100%; width: 6px; z-index: 100; }
.dResize-mr { cursor: e-resize; height: 100%; top: 0; right: 0; width: 6px; z-index: 100; }
.dResize-bl { bottom: 0; cursor: sw-resize; height: 6px; left: 0; width: 6px; z-index: 101; }
.dResize-bm { bottom: 0; cursor: s-resize; height: 6px; left: 0; width: 100%; z-index: 100; }
.dResize-br { bottom: 0; cursor: se-resize; height: 6px; right: 0; width: 6px; z-index: 101; }

/* End Drag/Resize */
/* Begin ContextMenu */

.contextMenu {
background: #eee;
border: solid 1px #ccc;
display: none;
margin: 0;
padding: 0;
position: absolute;
width: 120px;
z-index: 99999;
}

.contextMenu li {
list-style: none;
margin: 0;
padding: 0;
}

.contextMenu a {
background-position: 6px center;
background-repeat: no-repeat;
color: #333;
display: block;
height: 20px;
line-height: 20px;
outline: none;
padding: 1px 5px;
padding-left: 28px;
text-decoration: none;
}

.contextMenu li.hover a {
background-color: #39f;
color: #fff;
}

.contextMenu li.disabled a {
color: #aaa;
cursor: default;
}

.contextMenu li.hover.disabled a {
background-color: transparent;
}

.contextMenu li.separator {
border-top: solid 1px #ccc;
}

/* Adding Icons */

.contextMenu li.edit a { background-image: url(i/icons/edit.png); }
.contextMenu li.cut a { background-image: url(i/icons/cut.png); }
.contextMenu li.copy a { background-image: url(i/icons/page_white_copy.png); }
.contextMenu li.paste a { background-image: url(i/icons/page_white_paste.png); }
.contextMenu li.delete a { background-image: url(i/icons/delete.png); }
.contextMenu li.quit a { background-image: url(i/icons/door.png); }
.contextMenu li.insert a { background-image: url(i/icons/plus.png); }

/* End ContextMenu */
/* Begin Panel */

div.pnl {
background-color: #333;
border: 1px solid #99bbe8;
border-radius: 4px;
-khtml-border-radius: 4px;
-moz-border-radius: 4px;
-opera-border-radius: 4px;
-webkit-border-radius: 4px;
box-shadow: rgba(0,0,0,0.5) 0 0 24px;
-khtml-box-shadow: rgba(0,0,0,0.5) 0 0 24px;
-moz-box-shadow: rgba(0,0,0,0.5) 0 0 24px;
-webkit-box-shadow: rgba(0,0,0,0.5) 0 0 24px;
height: 100%;
overflow: hidden;
}

div.pnl-tl {
border-top-left-radius: 4px;
border-top-right-radius: 4px;
-khtml-border-top-left-radius: 4px;
-khtml-border-top-right-radius: 4px;
-moz-border-radius-topleft: 4px;
-moz-border-radius-topright: 4px;
-opera-border-radius: 4px; /* Fix */
-webkit-border-top-left-radius: 4px;
-webkit-border-top-right-radius: 4px;
height: 24px;
padding-left: 6px;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
}

div.pnl-tl div.pnl-tr {
padding-right: 6px;
}

div.pnl-tc div.phdr {
background-image: url(i/ux/application.png);
background-position: 0 4px;
background-repeat: no-repeat;
cursor: move;
width: 100%;
}

div.pnl-tc div.phdr span.phdr-text {
color: #fff;
font: normal normal bold 11px/normal tahoma, arial, verdana, sans-serif;
line-height: 26px;
padding-left: 20px !important;
}

/** Begin Tools */
/*
Close
Close (Corners)
Maximize
Maximize (Middle)
Maximize (Corners)
Restore
Restore (Middle)
Restore (Corners)
Minimize
Minimize (Middle)
Minimize (Corners)
Blank
Toggle
Toggle (Middle)
Toggle (End)
Toggle Down
Toggle Down (Middle)
Toggle Down (End)
Config
Config (Middle)
Config (End)
Arrow Left
Arrow Right
Pin Down
Pin Left
Dbl Arrow Right
Dbl Arrow Left
Dbl Arrow Down
Dbl Arrow Up
Refresh
Plus
Minus
Search
Save
Help
Print
*/

div.phdr div.tls {
height: 18px;
overflow: hidden;
position: absolute;
right: 6px;
top: 1px;
width: auto;
}

div.phdr div.tls span.maintlsapart div.tl {
margin-right: 3px;
}

div.phdr div.tls span.subtls div.tl {
margin-right: 3px;
}

div.phdr div.tls span.subtlsattached div.tl {
margin-right: 0;
}

div.phdr div.tls div.tl {
background-image: url(i/ux/tools.gif);
background-repeat: no-repeat;
cursor: pointer;
float: right;
height: 18px;
overflow: hidden;
width: 25px;
}

div.phdr div.tls div.close {
background-position: -10px -36px;
width: 44px;
}

div.phdr div.tls div.close:hover,
div.phdr div.tls div.close.on {
background-position: -10px -54px;
}

div.phdr div.tls div.close_corners {
background-position: -9px 0 !important;
width: 45px !important;
}

div.phdr div.tls div.close_corners:hover,
div.phdr div.tls div.close_corners.on {
background-position: -9px -18px !important;
}

div.phdr div.tls div.maximize {
background-position: -4px -144px;
}

div.phdr div.tls div.maximize:hover,
div.phdr div.tls div.maximize.on {
background-position: -29px -144px;
}

div.phdr div.tls div.maximize_end {
background-position: -2px -127px !important;
width: 26px;
}

div.phdr div.tls div.maximize_end:hover,
div.phdr div.tls div.maximize_end.on {
background-position: -28px -127px !important;
}

div.phdr div.tls div.maximize_corners {
background-position: -4px -162px !important;
}

div.phdr div.tls div.maximize_corners:hover,
div.phdr div.tls div.maximize_corners.on {
background-position: -29px -162px !important;
}

div.phdr div.tls div.restore {
background-position: -4px -198px;
}

div.phdr div.tls div.restore:hover,
div.phdr div.tls div.restore.on {
background-position: -29px -198px;
}

div.phdr div.tls div.restore_end{
background-position: -2px -180px !important;
width: 26px;
}

div.phdr div.tls div.restore_end:hover,
div.phdr div.tls div.restore_end.on {
background-position: -28px -180px !important;
}

div.phdr div.tls div.restore_corners {
background-position: -4px -216px !important;
}

div.phdr div.tls div.restore_corners:hover,
div.phdr div.tls div.restore_corners.on {
background-position: -29px -216px !important;
}

div.phdr div.tls div.minimize {
background-position: -2px -72px;
width: 26px;
}

div.phdr div.tls div.minimize:hover {
background-position: -28px -72px;
}

div.phdr div.tls div.minimize_middle {
background-position: -4px -90px !important;
width: 25px !important;
}

div.phdr div.tls div.minimize_middle:hover,
div.phdr div.tls div.minimize_middle.on {
background-position: -29px -90px !important;
}

div.phdr div.tls div.minimize_corners {
background-position: -4px -108px !important;
width: 25px !important;
}

div.phdr div.tls div.minimize_corners:hover,
div.phdr div.tls div.minimize_corners.on {
background-position: -29px -108px !important;
}

div.phdr div.tls div.blank {
background-position: -4px -288px;
}

div.phdr div.tls div.blank:hover,
div.phdr div.tls div.blank.on {
background-position: -29px -288px;
}

div.phdr div.tls div.blank_middle {
background-position: -4px -270px !important;
}

div.phdr div.tls div.blank_middle:hover,
div.phdr div.tls div.blank_middle.on {
background-position: -29px -270px !important;
}

div.phdr div.tls div.blank_end {
background-position: -2px -252px !important;
width: 26px;
}

div.phdr div.tls div.blank_end:hover,
div.phdr div.tls div.blank_end.on {
background-position: -28px -252px !important;
}

div.phdr div.tls div.blank_begin {
background-position: -2px -234px !important;
width: 26px;
}

div.phdr div.tls div.blank_begin:hover,
div.phdr div.tls div.blank_begin.on {
background-position: -28px -234px !important;
}

div.phdr div.tls div.toggle {
background-position: -4px -360px;
}

div.phdr div.tls div.toggle:hover,
div.phdr div.tls div.toggle.on {
background-position: -29px -360px;
}

div.phdr div.tls div.toggle_middle {
background-position: -4px -342px !important;
}

div.phdr div.tls div.toggle_middle:hover,
div.phdr div.tls div.toggle_middle.on {
background-position: -29px -342px !important;
}

div.phdr div.tls div.toggle_end {
background-position: -2px -324px !important;
width: 26px;
}

div.phdr div.tls div.toggle_end:hover,
div.phdr div.tls div.toggle_end.on {
background-position: -28px -324px !important;
}

div.phdr div.tls div.toggle_begin {
background-position: -2px -306px !important;
width: 26px;
}

div.phdr div.tls div.toggle_begin:hover,
div.phdr div.tls div.toggle_begin.on {
background-position: -28px -306px !important;
}

div.phdr div.tls div.toggledown {
background-position: -4px -432px;
}

div.phdr div.tls div.toggledown:hover,
div.phdr div.tls div.toggledown.on {
background-position: -29px -432px;
}

div.phdr div.tls div.toggledown_middle {
background-position: -4px -414px !important;
}

div.phdr div.tls div.toggledown_middle:hover,
div.phdr div.tls div.toggledown_middle.on {
background-position: -29px -414px !important;
}

div.phdr div.tls div.toggledown_end {
background-position: -2px -396px !important;
width: 26px;
}

div.phdr div.tls div.toggledown_end:hover,
div.phdr div.tls div.toggledown_end.on {
background-position: -28px -396px !important;
}

div.phdr div.tls div.toggledown_begin {
background-position: -2px -378px !important;
width: 26px;
}

div.phdr div.tls div.toggledown_begin:hover,
div.phdr div.tls div.toggledown_begin.on {
background-position: -28px -378px !important;
}

div.phdr div.tls div.config {
background-position: -4px -504px;
}

div.phdr div.tls div.config:hover,
div.phdr div.tls div.config.on {
background-position: -29px -504px;
}

div.phdr div.tls div.config_middle {
background-position: -4px -486px !important;
}

div.phdr div.tls div.config_middle:hover,
div.phdr div.tls div.config_middle.on {
background-position: -29px -486px !important;
}

div.phdr div.tls div.config_end {
background-position: 0 -468px !important;
width: 27px;
}

div.phdr div.tls div.config_end:hover,
div.phdr div.tls div.config_end.on {
background-position: -27px -468px !important;
}

div.phdr div.tls div.config_begin {
background-position: -2px -450px !important;
width: 26px;
}

div.phdr div.tls div.config_begin:hover,
div.phdr div.tls div.config_begin.on {
background-position: -28px -450px !important;
}

div.phdr div.tls div.arrowleft {
background-position: -4px -576px;
}

div.phdr div.tls div.arrowleft:hover,
div.phdr div.tls div.arrowleft.on {
background-position: -29px -576px;
}

div.phdr div.tls div.arrowleft_middle {
background-position: -4px -558px !important;
}

div.phdr div.tls div.arrowleft_middle:hover,
div.phdr div.tls div.arrowleft_middle.on {
background-position: -29px -558px !important;
}

div.phdr div.tls div.arrowleft_end {
background-position: 0 -540px !important;
width: 27px;
}

div.phdr div.tls div.arrowleft_end:hover,
div.phdr div.tls div.arrowleft_end.on {
background-position: -27px -540px !important;
}

div.phdr div.tls div.arrowleft_begin {
background-position: -2px -522px !important;
width: 26px;
}

div.phdr div.tls div.arrowleft_begin:hover,
div.phdr div.tls div.arrowleft_begin.on {
background-position: -28px -522px !important;
}

div.phdr div.tls div.arrowright {
background-position: -4px -648px;
}

div.phdr div.tls div.arrowright:hover,
div.phdr div.tls div.arrowright.on {
background-position: -29px -648px;
}

div.phdr div.tls div.arrowright_middle {
background-position: -4px -630px !important;
}

div.phdr div.tls div.arrowright_middle:hover,
div.phdr div.tls div.arrowright_middle.on {
background-position: -29px -630px !important;
}

div.phdr div.tls div.arrowright_end {
background-position: -2px -612px !important;
width: 27px;
}

div.phdr div.tls div.arrowright_end:hover,
div.phdr div.tls div.arrowright_end.on {
background-position: -28px -612px !important;
}

div.phdr div.tls div.arrowright_begin {
background-position: 0 -594px !important;
width: 26px;
}

div.phdr div.tls div.arrowright_begin:hover,
div.phdr div.tls div.arrowright_begin.on {
background-position: -27px -594px !important;
}

div.phdr div.tls div.pindown {
background-position: -4px -720px;
}

div.phdr div.tls div.pindown:hover,
div.phdr div.tls div.pindown.on {
background-position: -29px -720px;
}

div.phdr div.tls div.pindown_middle {
background-position: -4px -702px !important;
}

div.phdr div.tls div.pindown_middle:hover,
div.phdr div.tls div.pindown_middle.on {
background-position: -29px -702px !important;
}

div.phdr div.tls div.pindown_end {
background-position: 0 -684px !important;
width: 27px;
}

div.phdr div.tls div.pindown_end:hover,
div.phdr div.tls div.pindown_end.on {
background-position: -27px -684px !important;
}

div.phdr div.tls div.pindown_begin {
background-position: -2px -666px !important;
width: 26px;
}

div.phdr div.tls div.pindown_begin:hover,
div.phdr div.tls div.pindown_begin.on {
background-position: -28px -666px !important;
}

div.phdr div.tls div.pinleft {
background-position: -4px -792px;
}

div.phdr div.tls div.pinleft:hover,
div.phdr div.tls div.pinleft.on {
background-position: -29px -792px;
}

div.phdr div.tls div.pinleft_middle {
background-position: -4px -774px !important;
}

div.phdr div.tls div.pinleft_middle:hover,
div.phdr div.tls div.pinleft_middle.on {
background-position: -29px -774px !important;
}

div.phdr div.tls div.pinleft_end {
background-position: 0 -756px !important;
width: 27px;
}

div.phdr div.tls div.pinleft_end:hover,
div.phdr div.tls div.pinleft_end.on {
background-position: -27px -756px !important;
}

div.phdr div.tls div.pinleft_begin {
background-position: -2px -738px !important;
width: 26px;
}

div.phdr div.tls div.pinleft_begin:hover,
div.phdr div.tls div.pinleft_begin.on {
background-position: -28px -738px !important;
}

div.phdr div.tls div.dblarrowright {
background-position: -4px -864px;
}

div.phdr div.tls div.dblarrowright:hover,
div.phdr div.tls div.dblarrowright.on {
background-position: -29px -864px;
}

div.phdr div.tls div.dblarrowright_middle {
background-position: -4px -846px !important;
}

div.phdr div.tls div.dblarrowright_middle:hover,
div.phdr div.tls div.dblarrowright_middle.on {
background-position: -29px -846px !important;
}

div.phdr div.tls div.dblarrowright_end {
background-position: 0 -828px !important;
width: 27px;
}

div.phdr div.tls div.dblarrowright_end:hover,
div.phdr div.tls div.dblarrowright_end.on {
background-position: -27px -828px !important;
}

div.phdr div.tls div.dblarrowright_begin {
background-position: -2px -810px !important;
width: 26px;
}

div.phdr div.tls div.dblarrowright_begin:hover,
div.phdr div.tls div.dblarrowright_begin.on {
background-position: -28px -810px !important;
}

div.phdr div.tls div.dblarrowleft {
background-position: -4px -936px;
}

div.phdr div.tls div.dblarrowleft:hover,
div.phdr div.tls div.dblarrowleft.on {
background-position: -29px -936px;
}

div.phdr div.tls div.dblarrowleft_middle {
background-position: -4px -918px !important;
}

div.phdr div.tls div.dblarrowleft_middle:hover,
div.phdr div.tls div.dblarrowleft_middle.on {
background-position: -29px -918px !important;
}

div.phdr div.tls div.dblarrowleft_end {
background-position: 0 -900px !important;
width: 27px;
}

div.phdr div.tls div.dblarrowleft_end:hover,
div.phdr div.tls div.dblarrowleft_end.on {
background-position: -27px -900px !important;
}

div.phdr div.tls div.dblarrowleft_begin {
background-position: -2px -882px !important;
width: 26px;
}

div.phdr div.tls div.dblarrowleft_begin:hover,
div.phdr div.tls div.dblarrowleft_begin.on {
background-position: -28px -882px !important;
}

div.phdr div.tls div.dblarrowdown {
background-position: -4px -1008px;
}

div.phdr div.tls div.dblarrowdown:hover,
div.phdr div.tls div.dblarrowdown.on {
background-position: -29px -1008px;
}

div.phdr div.tls div.dblarrowdown_middle {
background-position: -4px -990px !important;
}

div.phdr div.tls div.dblarrowdown_middle:hover,
div.phdr div.tls div.dblarrowdown_middle.on {
background-position: -29px -990px !important;
}

div.phdr div.tls div.dblarrowdown_end {
background-position: 0 -972px !important;
width: 27px;
}

div.phdr div.tls div.dblarrowdown_end:hover,
div.phdr div.tls div.dblarrowdown_end.on {
background-position: -27px -972px !important;
}

div.phdr div.tls div.dblarrowdown_begin {
background-position: -2px -954px !important;
width: 26px;
}

div.phdr div.tls div.dblarrowdown_begin:hover,
div.phdr div.tls div.dblarrowdown_begin.on {
background-position: -28px -954px !important;
}

div.phdr div.tls div.dblarrowup {
background-position: -4px -1080px;
}

div.phdr div.tls div.dblarrowup:hover,
div.phdr div.tls div.dblarrowup.on {
background-position: -29px -1080px;
}

div.phdr div.tls div.dblarrowup_middle {
background-position: -4px -1062px !important;
}

div.phdr div.tls div.dblarrowup_middle:hover,
div.phdr div.tls div.dblarrowup_middle.on {
background-position: -29px -1062px !important;
}

div.phdr div.tls div.dblarrowup_end {
background-position: 0 -1044px !important;
width: 27px;
}

div.phdr div.tls div.dblarrowup_end:hover,
div.phdr div.tls div.dblarrowup_end.on {
background-position: -27px -1044px !important;
}

div.phdr div.tls div.dblarrowup_begin {
background-position: -2px -1026px !important;
width: 26px;
}

div.phdr div.tls div.dblarrowup_begin:hover,
div.phdr div.tls div.dblarrowup_begin.on {
background-position: -28px -1026px !important;
}

div.phdr div.tls div.refresh {
background-position: -4px -1152px;
}

div.phdr div.tls div.refresh:hover,
div.phdr div.tls div.refresh.on {
background-position: -29px -1152px;
}

div.phdr div.tls div.refresh_middle {
background-position: -4px -1134px !important;
}

div.phdr div.tls div.refresh_middle:hover,
div.phdr div.tls div.refresh_middle.on {
background-position: -29px -1134px !important;
}

div.phdr div.tls div.refresh_end {
background-position: 0 -1116px !important;
width: 27px;
}

div.phdr div.tls div.refresh_end:hover,
div.phdr div.tls div.refresh_end.on {
background-position: -27px -1116px !important;
}

div.phdr div.tls div.refresh_begin {
background-position: -2px -1098px !important;
width: 26px;
}

div.phdr div.tls div.refresh_begin:hover,
div.phdr div.tls div.refresh_begin.on {
background-position: -28px -1098px !important;
}

div.phdr div.tls div.plus {
background-position: -4px -1224px;
}

div.phdr div.tls div.plus:hover,
div.phdr div.tls div.plus.on {
background-position: -29px -1224px;
}

div.phdr div.tls div.plus_middle {
background-position: -4px -1206px !important;
}

div.phdr div.tls div.plus_middle:hover,
div.phdr div.tls div.plus_middle.on {
background-position: -29px -1206px !important;
}

div.phdr div.tls div.plus_end {
background-position: 0 -1188px !important;
width: 27px;
}

div.phdr div.tls div.plus_end:hover,
div.phdr div.tls div.plus_end.on {
background-position: -27px -1188px !important;
}

div.phdr div.tls div.plus_begin {
background-position: -2px -1170px !important;
width: 26px;
}

div.phdr div.tls div.plus_begin:hover,
div.phdr div.tls div.plus_begin.on {
background-position: -28px -1170px !important;
}

div.phdr div.tls div.minus {
background-position: -4px -1296px;
}

div.phdr div.tls div.minus:hover,
div.phdr div.tls div.minus.on {
background-position: -29px -1296px;
}

div.phdr div.tls div.minus_middle {
background-position: -4px -1278px !important;
}

div.phdr div.tls div.minus_middle:hover,
div.phdr div.tls div.minus_middle.on {
background-position: -29px -1278px !important;
}

div.phdr div.tls div.minus_end {
background-position: 0 -1260px !important;
width: 27px;
}

div.phdr div.tls div.minus_end:hover,
div.phdr div.tls div.minus_end.on {
background-position: -27px -1260px !important;
}

div.phdr div.tls div.minus_begin {
background-position: -2px -1242px !important;
width: 26px;
}

div.phdr div.tls div.minus_begin:hover,
div.phdr div.tls div.minus_begin.on {
background-position: -28px -1242px !important;
}

div.phdr div.tls div.search {
background-position: -4px -1368px;
}

div.phdr div.tls div.search:hover,
div.phdr div.tls div.search.on {
background-position: -29px -1368px;
}

div.phdr div.tls div.search_middle {
background-position: -4px -1350px !important;
}

div.phdr div.tls div.search_middle:hover,
div.phdr div.tls div.search_middle.on {
background-position: -29px -1350px !important;
}

div.phdr div.tls div.search_end {
background-position: 0 -1332px !important;
width: 27px;
}

div.phdr div.tls div.search_end:hover,
div.phdr div.tls div.search_end.on {
background-position: -27px -1332px !important;
}

div.phdr div.tls div.search_begin {
background-position: -2px -1314px !important;
width: 26px;
}

div.phdr div.tls div.search_begin:hover,
div.phdr div.tls div.search_begin.on {
background-position: -28px -1314px !important;
}

div.phdr div.tls div.save {
background-position: -4px -1440px;
}

div.phdr div.tls div.save:hover,
div.phdr div.tls div.save.on {
background-position: -29px -1440px;
}

div.phdr div.tls div.save_middle {
background-position: -4px -1422px !important;
}

div.phdr div.tls div.save_middle:hover,
div.phdr div.tls div.save_middle.on {
background-position: -29px -1422px !important;
}

div.phdr div.tls div.save_end {
background-position: 0 -1404px !important;
width: 27px;
}

div.phdr div.tls div.save_end:hover,
div.phdr div.tls div.save_end.on {
background-position: -27px -1404px !important;
}

div.phdr div.tls div.save_begin {
background-position: -2px -1386px !important;
width: 26px;
}

div.phdr div.tls div.save_begin:hover,
div.phdr div.tls div.save_begin.on {
background-position: -28px -1386px !important;
}

div.phdr div.tls div.help {
background-position: -4px -1512px;
}

div.phdr div.tls div.help:hover,
div.phdr div.tls div.help.on {
background-position: -29px -1512px;
}

div.phdr div.tls div.help_middle {
background-position: -4px -1494px !important;
}

div.phdr div.tls div.help_middle:hover,
div.phdr div.tls div.help_middle.on {
background-position: -29px -1494px !important;
}

div.phdr div.tls div.help_end {
background-position: 0 -1476px !important;
width: 27px;
}

div.phdr div.tls div.help_end:hover,
div.phdr div.tls div.help_end.on {
background-position: -27px -1476px !important;
}

div.phdr div.tls div.help_begin {
background-position: -2px -1458px !important;
width: 26px;
}

div.phdr div.tls div.help_begin:hover,
div.phdr div.tls div.help_begin.on {
background-position: -28px -1458px !important;
}

div.phdr div.tls div.print {
background-position: -4px -1584px;
}

div.phdr div.tls div.print:hover,
div.phdr div.tls div.print.on {
background-position: -29px -1584px;
}

div.phdr div.tls div.print_middle {
background-position: -4px -1566px !important;
}

div.phdr div.tls div.print_middle:hover,
div.phdr div.tls div.print_middle.on {
background-position: -29px -1566px !important;
}

div.phdr div.tls div.print_end {
background-position: 0 -1548px !important;
width: 27px;
}

div.phdr div.tls div.print_end:hover,
div.phdr div.tls div.print_end.on {
background-position: -27px -1548px !important;
}

div.phdr div.tls div.print_begin {
background-position: -2px -1530px !important;
width: 26px;
}

div.phdr div.tls div.print_begin:hover,
div.phdr div.tls div.print_begin.on {
background-position: -28px -1530px !important;
}

/* End Tools **/

div.pnl-bwrap {
height: 100%;
overflow: hidden;
}

div.pnl-ml {
height: 100%;
padding-left: 6px;
}

div.pnl-ml div.pnl-mr {
padding-right: 6px;
height: 100%;
}

div.pnl-ml div.pnl-mr div.pnl-mc {
background-color: #fff;
border: 1px solid #99bbe8;
overflow: hidden;
}

div.pnl-mc div.content {
height: 100%;
margin: 0;
width: 100%;
}

div.pnl-mc div.content div.body {
height: 100%;
text-align: left;
width: 100%;
}

div.pnl-mc div.content div.body.scroll {
overflow-y: auto;
}

div.pnl-mc div.content div.body.scroll div.wrapper {
margin: 10px;
}

div.pnl-mc div.content div.body div.wrapper div.heading {
font-size: 20pt;
padding: 5px;
padding-bottom: 2px;
padding-top: 10px;
text-align: center;
}

div.pnl-bl {
height: 6px;
padding-left: 6px;
}

div.pnl-bl div.pnl-br {
padding-right: 6px;
}

div.pnl-bl div.pnl-br div.pnl-bc {
padding-bottom: 6px;
}

/* End Panel */
/* Begin Dialog */

div.dialog {
background-color: #fff;
border: 2px solid #99bbe8;
border-radius: 10px;
-khtml-border-radius: 10px;
-moz-border-radius: 10px;
-opera-border-radius: 10px;
-webkit-border-radius: 10px;
box-shadow: rgba(153,187,232,0.5) 0 0 24px;
-khtml-box-shadow: rgba(153,187,232,0.5) 0 0 24px;
-moz-box-shadow: rgba(153,187,232,0.5) 0 0 24px;
-webkit-box-shadow: rgba(153,187,232,0.5) 0 0 24px;
height: 100%;
overflow: hidden;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
width: 100%;
}

div.dialog div.content {
}

div.dialog div.content div.heading {
color: #000;
font-size: 16pt;
margin: 10px;
text-align: center;
}

div#loading div.dialog div.content div.heading {
background-image: url(i/icons/loading.gif);
background-repeat: no-repeat;
background-position: 9px 6px;
padding-left: 42px;
text-align: left;
}

div#notice div.dialog div.content div.heading {
}

/* End Dialog */
/* Begin User Interface */
/** Begin Splash */

div.fullscreen {
left: 0 !important;
top: 0 !important;
width: 100% !important;
}

canvas#c_animation {
background-color: #fff;
visibility: hidden;
}

/* End Splash **/
/**  Begin Desktop */

div#desktop {
background-color: transparent;
display: block;
left: 0;
overflow: hidden;
position: absolute;
top: 0;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
width: 100%;
}

div#desktop div#desktop-view {
left: 0;
overflow: hidden;
position: absolute;
top: 0;
width: 100%;
}

div#desktop div.desktop-body {
left: 0;
overflow-x: hidden;
overflow-y: auto;
position: absolute;
top: 0;
width: 100%;
}

/*** Begin Desktop Thumbs */

div#desktop div.desktop-body div.desktop-thumb {
border: 1px solid transparent;
border-radius: 8px;
-khtml-border-radius: 8px;
-moz-border-radius: 8px;
-opera-border-radius: 8px;
-webkit-border-radius: 8px;
clear: right;
cursor: pointer;
display: none;
float: left;
margin: 6px;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
}

div#desktop div.desktop-body div.desktop-thumb:hover {
border: 1px solid #99bbe8;
background-color: #fff;
filter: alpha(opacity=30) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)" !important;
opacity: 0.3 !important;
-khtml-opacity: 0.3 !important;
-moz-opacity: 0.3 !important;
}

div#desktop div.desktop-body div.desktop-thumb-selected {
background-color: fff;
border: 1px solid #99bbe8;
}

div#desktop div.desktop-body div.desktop-thumb div.thumb-button {
margin: 4px 0 0 0;
padding: 5px;
text-align: center;
}

div#desktop div.desktop-body div.desktop-thumb div.thumb-button img {
background-image: url(i/ux/thumbs.png);
border-width: 0;
height: 48px;
width: 48px;
}

div#desktop div.desktop-body div.desktop-thumb div.thumb-name {
color: #fff;
cursor: pointer;
font-size: 85%;
margin: 0 auto;
margin-bottom: 10px;
overflow: hidden;
text-align: center;
text-transform: capitalize;
width: 92%;
}

div#desktop div.desktop-body div.desktop-thumb:hover div.thumb-name {
color: #000;
font-weight: bold;
}

/* End Desktop Thumbs ***/
/*** Begin Login */

div#login div.pnl-mc {
background-color: #fff;
background-image: url(i/apps/splash/wave.jpg);
background-repeat: no-repeat;
background-position: top center;
border: 1px solid #99bbe8;
overflow: hidden;
}

div#login form#login {
margin: 0;
}

div#login table td {
border: 0;
vertical-align: middle;
}

div#login table td.label {
font-size: 75%;
padding: 6px;
text-align: right;
}

div#login table td.input {
padding: 6px;
text-align: left;
}

div#login table td.input input[type="text"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div#login table td.input input[type="password"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div#login table td.input input[type="checkbox"] {
float: left;
height: 35px;
}

div#login div.buttons {
margin-top: 4px;
}

/* End Login ***/
/*** Begin Register */

div#register div.pnl-mc {
background-color: #dee;
background-image: none;
}

div#register div.pnl-mc div.content div.body {
margin: 0 auto;
text-align: center;
}

div#register fieldset {
border: 2px solid #fff;
display: block;
font-family: verdana, sans-serif;
line-height: 1.5em;
margin: 0 auto;
margin-bottom: 0.5em;
padding: 5px;
padding-left: 20px;
padding-right: 20px;
width: 75%;
}

div#register legend {
background: #fff url(i/ux/form.gif) repeat-x 0% 50%;
border: 3px solid #fff;
color: #000;
font-family: georgia, sans-serif;
font-size: 1.1em;
font-weight: bold;
margin-bottom: 5px;
padding: 3px;
padding-left: 6px;
text-align: left;
width: 260px;
}

div#register small.formreminder {
color: red;
}

div#register table {
border: 0;
margin: 0 auto;
margin-bottom: 10px;
margin-top: 10px;
width: 100%;
}

div#register table tr.error,
div#register div.error {
background-color: rgba(255,0,0,0.75);
border: 1px solid rgba(255,0,0,0.75);
}

div#register table tr.securitycodeerror {
background-color: rgba(255,0,0,0.75);
border: 1px solid rgba(255,0,0,0.75);
display: none;
}

div#register table td {
border: 0;
vertical-align: top;
}

div#register table td.label {
color: #888;
padding: 9px;
text-align: right;
width: 20%;
}

div#register table td.label label {
}

div#register table td.input {
padding: 6px;
text-align: left;
width: 80%;
}

div#register table td.input input {
background: #fff url(i/ux/form.gif) repeat-x 0% 50%;
border: 1px solid #fff;
margin-right: 10px;
}

div#register table td.input select {
margin-right: 10px;
}

div#register table td.input select optgroup {
background: #abb;
color: #fff;
font-family: georgia, serif;
font-weight: bolder;
}

div#register table td.input select option {
background-color: #788;
font: inherit !important;
}

div#register input[type="text"] {
background: #fff url(i/ux/form.gif) repeat-x 0% 50%;
border: 1px solid #fff;
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div#register input[type="password"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div#register input[type="email"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div#register input[type="radio"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
margin: 3px 3px 0 5px;
}

div#register input[type="submit"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div#register table td.input span.goom_radio {
left: 2px;
position: relative;
top: -6.5px;
}

div#register table td.input span.error {
color: #000;
}

div#register div#register-button {
margin-bottom: 20px;
margin-top: 5px;
}

/**** Begin Security Code */

div#register input[type="text"]#securitycode {
font-size: 18pt;
height: 30px;
letter-spacing: 2px;
line-height: 30px;
margin-right: 5px;
text-align: center;
}

div#register img.captcharefresh {
border: 0;
margin-left: 5px;
margin-top: 7px;
}

/* End Security Code ****/
/* End Register ***/
/* End Desktop **/
/** Begin Startmenu */

div#startmenu {
background: transparent;
border: none;
border-radius: 4px;
-khtml-border-radius: 4px;
-moz-border-radius: 4px;
-opera-border-radius: 4px;
-webkit-border-radius: 4px;
bottom: 2px;
box-shadow: rgba(153,187,232,1) 0 0 28px;
-khtml-box-shadow: rgba(153,187,232,1) 0 0 28px;
-moz-box-shadow: rgba(153,187,232,1) 0 0 28px;
-webkit-box-shadow: rgba(153,187,232,1) 0 0 28px;
display: none;
left: 0;
position: absolute;
width: 340px;
z-index: 15000;
}

div.startmenu {
background: #333;
border: 1px solid #99bbe8;
border-radius: 4px;
-khtml-border-radius: 4px;
-moz-border-radius: 4px;
-opera-border-radius: 4px;
-webkit-border-radius: 4px;
height: 100%;
overflow: hidden;
}

div.startmenu-tl {
border-top-left-radius: 4px;
border-top-right-radius: 4px;
-khtml-border-top-left-radius: 4px;
-khtml-border-top-right-radius: 4px;
-moz-border-radius-topleft: 4px;
-moz-border-radius-topright: 4px;
-opera-border-radius: 4px; /* FIX */
-webkit-border-top-left-radius: 4px;
-webkit-border-top-right-radius: 4px;
height: 24px;
padding-left: 6px;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
}

div.startmenu-tl div.startmenu-tr {
padding-right: 6px;
}

div.startmenu-tl div.startmenu-tr div.startmenu-tc {

}

div.startmenu-tc div.startmenu-header {
background-image: url(i/apps/icons/friends.png);
background-position: 0 4px;
background-repeat: no-repeat;
cursor: default;
width: 100%;
}

div.startmenu-tc div.startmenu-header span.startmenu-header-text {
color: #fff;
font: normal normal bold 11px/normal tahoma, arial, verdana, sans-serif;
line-height: 26px;
padding-left: 20px !important;
}

div.startmenu-tc div.startmenu-header div.image {
background-image: url(i/ux/startmenu/user_image.png);
background-repeat: no-repeat;
height: 70px;
position: absolute;
right: 42px;
top: -48px;
width: 70px;
}

div.startmenu-tc div.startmenu-header div.image img.userimage {
border-radius: 1px;
-khtml-border-radius: 1px;
-moz-border-radius: 1px;
-opera-border-radius: 1px;
-webkit-border-radius: 1px;
height: 53px;
position: relative;
left: 9px;
top: 8px;
width: 53px;
}

div.startmenu-bwrap {
height: 100%;
overflow: hidden;
}

div.startmenu-ml {
height: 100%;
padding-left: 6px;
}

div.startmenu-ml div.startmenu-mr {
padding-right: 6px;
height: 100%;
}

div.startmenu-ml div.startmenu-mr div.startmenu-mc {
height: 100%;
margin: 0;
overflow: hidden;
padding: 0;
}

div.startmenu-mc div.startmenu-body {
height: 340px;
position: relative;
}

div.startmenu-mc div.startmenu-body ul {
list-style: none;
margin: 0;
width: 100%;
}

div.startmenu-mc div.startmenu-body li.list-item {
display: block;
font: normal normal normal 11px/normal tahoma, arial, sans-serif;
line-height: 100%;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
white-space: nowrap;
}

div.startmenu-mc div.startmenu-body li.list-item a.menu-item {
cursor: pointer;
display: block;
line-height: 16px;
outline: 0 none;
padding: 7px 3px 7px 7px;
text-decoration: none;
white-space: nowrap;
}

div.startmenu-mc div.startmenu-body li.list-item a.menu-item img.item-icon {
background-color: transparent;
background-image: url(i/ux/icons.png);
background-position: 50% 50%; /* hmmm */
background-repeat: no-repeat;
border: 0;
height: 16px;
margin: 0 8px 0 0;
padding: 0;
vertical-align: top;
width: 16px;
}

div.startmenu-mc div.startmenu-body div.apps {
background-color: #fff;
left: 0;
position: absolute;
top: 0;
}

div.startmenu-mc div.startmenu-body div.apps div.apps-body {
border: 1px solid #1e2124;
height: 338px;
overflow-x: hidden;
overflow-y: auto;
}

div.startmenu-mc div.startmenu-body div.apps div.apps-menu {
width: 177px;
}

div.startmenu-mc div.startmenu-body div.apps ul.apps-menu-list li.list-item {
display: none;
}

div.startmenu-mc div.startmenu-body div.apps ul.apps-menu-list a.menu-item {
color: #000;
}

div.startmenu-mc div.startmenu-body div.apps ul.apps-menu-list a.menu-item:hover {
background-color: #e0e0e0;
}

div.startmenu-mc div.startmenu-body div.tls {
height: 339px;
left: 179px;
overflow: hidden;
position: absolute;
top: 0;
width: 144px;
}

div.startmenu-mc div.startmenu-body div.tls div.tls-menu {
width: 100%;
}

div.startmenu-mc div.startmenu-body div.tls a.menu-item {
color: #fff;
}

div.startmenu-mc div.startmenu-body div.tls a.menu-item:hover {
background-color: #666;
}

div.startmenu-mc div.startmenu-body div.tls ul.tls-menu-list li.list-item {
display: none;
}

div.startmenu-mc div.startmenu-body div.tls ul.tls-logout-list {
bottom: 0;
position: absolute;
}

div.startmenu-bl {
height: 6px;
padding-left: 6px;
}

div.startmenu-bl div.startmenu-br {
padding-right: 6px;
}

div.startmenu-bl div.startmenu-br div.startmenu-bc {
padding-bottom: 6px;
}

/* End Startmenu **/
/** Begin Taskbar */

div#taskbar {
background: transparent url(i/ux/taskbar/taskbar-bg.gif) repeat-x left top;
bottom: 0;
display: block;
left: 0;
overflow: hidden;
position: absolute;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
width: 100%;
}

div#taskbar div#panel-wrap {
height: 100%;
left: 90px;
position: absolute;
top: 0;
}

/*** Begin Splitbars */

div#taskbar div.splitbar {
background: transparent url(i/ux/taskbar/taskbar-split-h.gif) no-repeat 0 0;
cursor: col-resize;
height: 100%;
position: absolute;
top: 0;
width: 14px;
}

div#taskbar div#quickstart-splitbar {
left: 0;
}

div#taskbar div#tray-splitbar {
right: 0;
}

/* End Splitbars ***/
/*** Begin Start */

div#taskbar div#start {
height: 100%;
margin: 0;
padding: 0;
width: 90px;
}

div#taskbar div#start table {
border-spacing: 0;
border-width: 0;
cursor: pointer;
float: left;
margin: 0;
margin-left: 8px;
white-space: nowrap;
}

div#taskbar div#start table td {
background-image: url(i/ux/taskbar/startbutton.gif);
border-width: 0;
margin: 0;
padding: 0;
}

div#taskbar div#start td.start-left, 
div#taskbar div#start td.start-right {
font-size: 1px;
height: 30px;
line-height: 1px;
margin: 0;
padding: 0;
width: 10px;
}

div#taskbar div#start td.start-left {
background-position: 0 0;
}

div#taskbar div#start table:hover td.start-left {/* background-position: 0 -90px;- click: background-position: 0 -180px;*/
background-position: 0 -270px;
}

div#taskbar div#start td.start-center {
background-repeat: repeat-x;
background-position: 0 -60px;
}

div#taskbar div#start table:hover td.start-center {/* background-position: 0 -150px;- click: background-position: 0 -240px;*/
background-position: 0 -330px;
}

div#taskbar div#start td.start-right {
background-position: 0 -30px;
}

div#taskbar div#start table:hover td.start-right {/* background-position: 0 -120px;- click: background-position: 0 -210px;*/
background-position: 0 -300px;
}

div#taskbar div#start em {
background-color: transparent;
}

div#taskbar div#start button[type="button"].start {
background-color: transparent;
background-image: url(i/ux/taskbar/startbutton-icon.gif);
background-repeat: no-repeat;
background-position: 0 2px;
border: 0;
cursor: pointer;
font: normal normal bold 11px/normal tahoma, verdana, helvetica;
outline: 0;
overflow: visible;
padding: 6px 0 8px 27px;
}

/* End Start ***/
/*** Begin Quickstart */

div#taskbar div#quickstart-panel {
height: 100%;
left: 0;
position: absolute;
top: 0;
}

div#taskbar div.quickstart-strip-wrap {
height: 100%;
left: 0;
position: absolute;
top: 0;
}

div#taskbar ul#quickstart-strip {
height: 100%;
list-style: none;
margin: 0;
padding: 0;
}

div#taskbar ul#quickstart-strip li {
display: none;
float: left;
list-style: none;
}

div#taskbar ul#quickstart-strip table {
border-spacing: 0;
border-width: 0;
cursor: pointer;
float: left;
margin: 1px 0 0 1px;
white-space: nowrap;
}

div#taskbar ul#quickstart-strip table td {
border-width: 0;
margin: 0;
padding: 0;
}

div#taskbar ul#quickstart-strip li:hover td {
background-image: url(i/ux/taskbar/quickstart-button.gif);
}

div#taskbar ul#quickstart-strip td.button-left, 
div#taskbar ul#quickstart-strip td.button-right {
font-size: 1px;
height: 28px;
line-height: 1px;
width: 4px;
}

div#taskbar ul#quickstart-strip td.button-left {
background-repeat: no-repeat;
background-position: 0 0;
}

div#taskbar ul#quickstart-strip li:hover td.button-left {
background-position: 0 -252px;
}

div#taskbar ul#quickstart-strip td.button-center {
background-repeat: repeat-x;
background-position: 0 -56px;
}

div#taskbar ul#quickstart-strip li:hover td.button-center {
background-position: 0 -308px;
}

div#taskbar ul#quickstart-strip td.button-right {
background-repeat: no-repeat;
background-position: 0 -28px;
}

div#taskbar ul#quickstart-strip li:hover td.button-right {
background-position: 0 -280px;
}

div#taskbar ul#quickstart-strip em {
background-color: transparent;
}

div#taskbar ul#quickstart-strip button[type="button"].quick {
background-color: transparent;
background-image: url(i/ux/icons.png);
background-position: 50% 50%; /* hmmm */
background-repeat: no-repeat;
border: 0;
color: #fff;
cursor: pointer;
float: left;
font: normal normal bold 11px/normal tahoma, verdana, helvetica;
height: 28px;
line-height: 24px;
margin: 0;
min-width: 18px;
outline: 0;
padding: 0;
width: auto;
}

/* End Quickstart ***/
/*** Begin Taskbuttons */

div#taskbar div#taskbuttons-panel {
height: 100%;
position: absolute;
top: 0;
}

div#taskbar div.taskbuttons-strip-wrap {
height: 100%;
left: 0;
position: absolute;
top: 0;
}

div#taskbar ul#taskbuttons-strip {
height: 100%;
list-style: none;
margin: 0;
margin-left: 15px;
padding: 0;
}

div#taskbar ul#taskbuttons-strip li {
display: none;
float: left;
list-style: none;
margin-left: 2px;
}


div#taskbar ul#taskbuttons-strip table {
border-spacing: 0;
border-width: 0;
cursor: pointer;
float: left;
margin: 1px 0 0 1px;
white-space: nowrap;
}

div#taskbar ul#taskbuttons-strip table td {
background-image: url(i/ux/taskbar/taskbutton.gif);
border-width: 0;
margin: 0;
padding: 0;
}

div#taskbar ul#taskbuttons-strip td.button-left, 
div#taskbar ul#taskbuttons-strip td.button-right {
font-size: 1px;
height: 28px;
line-height: 1px;
width: 4px;
}

div#taskbar ul#taskbuttons-strip td.button-left {
background-repeat: no-repeat;
background-position: 0 0;
}

div#taskbar ul#taskbuttons-strip li:hover td.button-left {/* background-position: 0 -84px;- click: background-position: 0 -90px;*/
background-position: 0 -252px;
}

div#taskbar ul#taskbuttons-strip td.button-center {
background-repeat: repeat-x;
background-position: 0 -56px;
}

div#taskbar ul#taskbuttons-strip li:hover td.button-center {/* background-position: 0 -140px;- click: background-position: 0 -90px;*/
background-position: 0 -308px;
}

div#taskbar ul#taskbuttons-strip td.button-right {
background-position: 0 -28px;
}

div#taskbar ul#taskbuttons-strip li:hover td.button-right {/* background-position: 0 -112px;- click: background-position: 0 -90px;*/
background-position: 0 -280px;
}

div#taskbar ul#taskbuttons-strip em {
background-color: transparent;
}

div#taskbar ul#taskbuttons-strip button[type="button"].task {
background-color: transparent;
background-image: url(i/ux/icons.png);
background-position: 2px 6px;
background-repeat: no-repeat;
border: 0;
color: #fff;
cursor: pointer;
float: left;
font: normal normal bold 11px/normal tahoma, verdana, helvetica;
height: 28px;
line-height: 24px;
margin: 0;
margin-left: 2px;
min-width: 140px;
outline: 0;
overflow: visible;
padding: 0 10px 0 22px;
text-align: left;
width: auto;
}

/* End Taskbuttons ***/
/*** Begin Tray */

div#taskbar div#tray-panel {
height: 100%;
position: absolute;
right: 0;
top: 0;
}

div#taskbar div.tray-strip-wrap {
height: 100%;
}

div#taskbar div.tray-strip-wrap ul#tray-strip {
height: 100%;
list-style: none;
margin: 0;
margin-left: 10px;
padding: 0;
}

div#taskbar div.tray-strip-wrap ul#tray-strip li {
float: left;
margin-left: 2px;
}

div#taskbar div.tray-strip-wrap ul#tray-strip li .tray {
border: 0;
color: #fff;
float: left;
height: 25px;
line-height: 24px;
margin: 0;
margin-left: 2px;
}

div#taskbar div#tray-panel div#tray-currentinfo {
color: #fff;
cursor: default;
font-size: 7pt;
height: 100%;
letter-spacing: 1px;
line-height: 1.2;
margin-right: 4px;
padding-left: 4px;
position: absolute;
right: 18px;
text-align: right;
top: 0;
}

div#taskbar div#tray-panel div#tray-currentinfo div#clock {
padding-top: 3px;
}

div#taskbar div#tray-panel div#tray-currentinfo div#date {
padding-top: 3px;
}

div#taskbar div#tray-panel div#tray-toggle {
background-color: #fff;
cursor: pointer;
filter: alpha(opacity=18);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=18)";
height: 100%;
opacity: 0.18;
-khtml-opacity: 0.18;
-moz-opacity: 0.18;
position: absolute;
right: 0;
top: 0;
width: 14px;
}

/* End Tray ***/
/* End Taskbar **/
/** Begin Icons */

.icon-login  { background-image: url(i/ux/login.png) !important; }
.icon-register  { background-image: url(i/ux/register.png) !important; }
.icon-logout { background-image: url(i/ux/logout.png) !important; }

/*** Begin Apps */

.icon-documents { background-position: -16px 0; }
.icon-preferences { background-position: -px 0; }
.icon-notepad { background-position: -px 0; }
.icon-flash_name { background-position: -px 0; }
.icon-ytinstant { background-position: -px 0; }
.icon-piano { background-position: -px 0; }
.icon-about_hnsdesktop { background-position: -px 0; }
.icon-feedback { background-position: -px 0; }
.icon-tic_tac_toe { background-position: -px 0; }
.icon-friends { background-position: -px 0; }
.icon-goom_radio { background-position: -px 0; }
.icon-search { background-position: -px 0; }
.icon-chat { background-position: -px 0; }
.icon-music { background-position: -px 0; }
.icon-web_browser { background-position: -px 0; }
.icon-torus { background-position: -px 0; }
.icon-calendar { background-position: -px 0; }
.icon-app_explorer { background-position: -px 0; }
.icon-calculator { background-position: -px 0; }
.icon-twitter { background-position: -px 0; }

/**** Begin Thumbs */

.thumb-documents img { background-position: -48px 0; }
.thumb-preferences img { background-position: -px 0; }
.thumb-notepad img { background-position: -px 0; }
.thumb-flash_name img { background-position: -px 0; }
.thumb-ytinstant img { background-position: -px 0; }
.thumb-piano img { background-position: -px 0; }
.thumb-about_hnsdesktop img { background-position: -px 0; }
.thumb-feedback img { background-position: -px 0; }
.thumb-tic_tac_toe img { background-position: -px 0; }
.thumb-friends img { background-position: -px 0; }
.thumb-goom_radio img { background-position: -px 0; }
.thumb-search img { background-position: -px 0; }
.thumb-chat img { background-position: -px 0; }
.thumb-music img { background-position: -px 0; }
.thumb-web_browser img { background-position: -px 0; }
.thumb-torus img { background-position: -px 0; }
.thumb-calendar img { background-position: -px 0; }
.thumb-app_explorer img { background-position: -px 0; }
.thumb-calculator img { background-position: -px 0; }
.thumb-twitter img { background-position: -px 0; }

/* End Thumbs ****/
/* End Apps ***/
/* End Icons **/
/** Begin Apps */
/*** Begin Documents */

/* End Documents ***/
/*** Begin Preferences */

div#preferences {
}

div#preferences div.tl.dblarrowleft,
div#preferences div.tl.maximize {
display: none;
}

div#preferences div.pnl-mc {
background-image: none;
overflow: hidden;
}

div#preferences div#splash ul {
cursor: pointer;
margin: 0;
}

div#preferences div#splash ul li {
list-style: none;
padding: 11px 0 11px 0;
}

div#preferences div#splash ul li:hover {
background-color: #e0e0e0;
}

div#preferences div#splash ul li img {
border: 0;
float: left;
height: 32px;
margin-bottom: 2px;
margin-left: 10px;
margin-right: 12px;
vertical-align: middle;
width: 32px;
}

div#preferences div#splash ul li.thumbs img { background-image: url(i/ux/preferences/thumbs.png); }
div#preferences div#splash ul li.autorun img { background-image: url(i/ux/preferences/autorun.png); }
div#preferences div#splash ul li.quickstart img { background-image: url(i/ux/preferences/quickstart.png); }
div#preferences div#splash ul li.themes img { background-image: url(i/ux/preferences/appearance.png); }
div#preferences div#splash ul li.wallpaper img { background-image: url(i/ux/preferences/wallpaper.png); }

div#preferences div#splash div#name {
color: #369;
font: normal normal bold 11px/normal tahoma, arial, helvetica, sans-serif;
font-weight: bold;
}

div#preferences div#splash div#description {
font: normal normal normal 11px/normal tahoma, arial, helvetica, sans-serif;
padding-left: 56px;
padding-top: 6px;
}

div#preferences div#thumbs,
div#preferences div#autorun,
div#preferences div#quickstart,
div#preferences div#themes,
div#preferences div#wallpaper {
display: none;
}

/**** Begin Thumbs */



/* End Thumbs ****/
/**** Begin Autorun */



/* End Autorun ****/
/**** Begin Quickstart */



/* End Quickstart ****/
/**** Begin Themes */



/* End Themes ****/
/**** Begin Wallpaper */

div#preferences div#wallpaper {
background-color: #ecffff;
background-image: none;
height: 100%;
overflow: hidden;
width: 100%;
}

div#preferences div#wallpaper div.lc {
background-color: #fff;
display: block;
float: left;
height: 100%;
width: 300px;
}

div#preferences div#wallpaper div.lc div.albums {
display: block;
overflow-y: auto;
}

div#preferences div#wallpaper div.lc div.config {
display: block;
height: 300px;
}

div#preferences div#wallpaper div.rc {
display: block;
float: right;
height: 100%;
overflow-y: auto;
}

div#preferences div#wallpaper div.rc div#slideshow {
height: 100%;
overflow-y: auto;
}

div#preferences div#wallpaper div.rc div#slideshow img.thumbnail {
border: 2px solid #fff;
border-radius: 2px;
-khtml-border-radius: 2px;
-moz-border-radius: 2px;
-opera-border-radius: 2px;
-webkit-border-radius: 2px;
cursor: pointer;
margin: 1px;
padding: 1px;
}

div#preferences div#wallpaper div.rc div#slideshow img.thumbnail:hover {
border: 2px solid #99bbe8;
}

/* End Wallpaper ****/
/* End Preferences ***/
/*** Begin Notepad */

div#notepad div.pnl-mc {
background-color: #ecffff;
background-image: none;
}

div#notepad div.content {
margin: 0;
}

div#notepad textarea {
border: 0;
height: 100%;
overflow: auto;
width: 100%;
}

/* End Notepad ***/
/*** Begin Flash Name */

/* End Flash Name ***/
/*** Begin YTInstant */

div#ytinstant div.tl.plus,
div#ytinstant div.tl.refresh,
div#ytinstant div.tl.dblarrowright,
div#ytinstant div.tl.pinleft,
div#ytinstant div.tl.pindown,
div#ytinstant div.tl.arrowleft,
div#ytinstant div.tl.arrowright {
margin-right: 0 !important;
}

div#ytinstant div.pnl-mc {
background-color: #eeeff4;
color: #000;
font-size: 12px;
}

div#ytinstant div#wrapper {
margin: 0 auto;
width: 1050px;
}

div#ytinstant a:link,
div#ytinstant a:visited {
color: #3b5998;
text-decoration: none;
}

div#ytinstant a:hover,
div#ytinstant a:active {
text-decoration: underline;
}

div#ytinstant div#logo {
float: left;
margin: 0 15px 0 0;
}

div#ytinstant div#logo div {
background: transparent url(i/apps/ytinstant/logo2.png) no-repeat top left;
display: block;
height: 32px;
width: 180px;
}

div#ytinstant div#logo span {
display: none;
}

div#ytinstant div#header {
margin: 30px 0 19px 0;
width: 1050px;
}

div#ytinstant input[type="text"]#searchBox {
border: 2px solid #999;
border-radius: 5px;
-khtml-border-radius: 5px;
-moz-border-radius: 5px;
-opera-border-radius: 5px;
-webkit-border-radius: 5px;
font-size: 20px;
height: 30px;
margin-right: 15px;
outline: none;
padding: 0 35px 0 4px;
width: 310px;
}

div#ytinstant input[type="text"]#searchBox:focus,
div#ytinstant input[type="text"]#searchBox:hover {
border: 2px solid #000;
}

div#ytinstant input[type="text"].statusLoading {
background: #fff url(i/apps/ytinstant/loading.gif) no-repeat 325px 50%;
}

div#ytinstant input[type="text"].statusPlaying {
background: #fff url(i/apps/ytinstant/playing.gif) no-repeat 325px 50%;
}

div#ytinstant div#searchTermWrapper {
cursor: default;
float: right;
position: relative;
top: -5px;
width: 484px;
}

div#ytinstant div#searchTermKeyword {
font-family: 'reenie beanie', arial, serif;
font-size: 30px;
font-weight: bold;
overflow: hidden;
text-align: left;
text-overflow: ellipsis;
-o-text-overflow: ellipsis;
white-space: nowrap;
}

div#ytinstant div#main {
display: block;
}

div#ytinstant div#videoDiv {
float: left;
margin: 0 10px 0 0;
}

div#ytinstant div#playlistWrapper {
display: none;
float: left;
height: 405px;
overflow-x: hidden;
overflow-y: auto;
position: relative;
vertical-align: top;
width: 320px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap {
clear: both;
display: block;
height: 100px;
position: relative;
width: 298px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap a {
color: #183a52;
display: block;
width: 300px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap img.thumb {
clear: both;
float: left;
height: 90px;
margin: 0 5px 12px 0;
vertical-align: top;
width: 120px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.title {
float: left;
font-family: helvetica;
font-size: 12px;
height: 40px;
line-height: 15px;
margin: 6px 0 0;
width: 175px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap.selectedThumb div.title {
font-weight: bold;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.overlay {
background-color: #000;
display: none;
filter: alpha(opacity=70);
height: 90px;
left: 0;
opacity: 0.7;
position: absolute;
top: 0;
width: 120px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap:hover div.overlay {
display: block;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.play-symbol {
display: none;
left: 5px;
position: absolute;
top: 73px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap:hover div.play-symbol  {
display: block;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.play-symbol img {
height: 9px;
width: 9px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.thumb-info {
cursor: pointer;
display: none;
line-height: 1.6em;
position: absolute;
right: 183px;
top: 0;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap:hover div.thumb-info {
display: block;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.thumb-info p {
clear: both;
display: block;
float: right;
font-family: helvetica;
font-weight: normal;
margin: 0;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.thumb-info p.date {
color: #ccc;
font-size: 10px;
margin-top: 8px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap div.thumb-info p.time {
color: #fff;
font-size: 18px;
line-height: 14px;
margin-top: 2px;
zoom: 1;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap span.videoTools {
border: 1px solid transparent;
color: #000;
cursor: default;
font: 7pt arial, sans-serif;
float: right;
padding-right: 5px;
position: relative;
top: 27px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap span.videoTools:hover {
background-color: #666;
border: 1px solid #000;
border-radius: 4px;
-khtml-border-radius: 4px;
-moz-border-radius: 4px;
-opera-border-radius: 4px;
-webkit-border-radius: 4px;
color: #fff;
padding: 0 5px 5px 5px;
}

div#ytinstant div#playlistWrapper div#playlist div.videoWrap span.videoTools img {
cursor: pointer;
margin-left: 5px;
position: relative;
top: 4.5px;
}

div#ytinstant div#buttonControl {
left: 44px;
position: absolute;
top: 32px;
z-index: 1000;
}

div#ytinstant div#buttonControl a {
display: block;
height: 32px;
width: 32px;
}

div#ytinstant div.playButton div#buttonControl { background: transparent url(i/apps/ytinstant/player_play-1.png) no-repeat top left; }
div#ytinstant div.pauseButton div#buttonControl { background: transparent url(i/apps/ytinstant/player_pause-1.png) no-repeat top left; }

div#ytinstant div#footer {
font-size: 12px;
margin: 0;
width: 1050px;
}

div#ytinstant div#footer div#socialapis {
height: 30px;
}

div#ytinstant div#footer div#socialapis iframe#fblike {
border: none;
height: 24px;
margin-top: 2px;
min-width: 600px;
overflow: hidden;
width: auto; /* 708 */
}

div#ytinstant div#footer div#socialapis div#sub {
float: right;
margin-top: 2px;
width: auto; /* 342 */
}

div#ytinstant div#footer div#socialapis div#sub div#buzz-container {
border: none;
float: left;
height: 20px;
margin-top: 2px;
width: 109px;
}

div#ytinstant div#footer div#socialapis div#sub iframe#twitter {
height: 20px;
width: 109px;
}

div#ytinstant div#footer div#socialapis div#sub iframe#fbshare {
height: 21px;
width: 124px;
}

div#ytinstant .clearfix:after {
clear: both;
content: ".";
display: block;
height: 0;
line-height: 0;
visibility: hidden;
}

div#ytinstant .clearfix {
display: inline-block;
}

html[xmlns] div#ytinstant .clearfix {
display: block;
}

* html div#ytinstant .clearfix {
height: 1%;
}

div#ytinstant div#searchDiv {
float: left;
}

div#ytinstant div#userPlaylist {
display: none;
float: left;
height: 405px;
position: relative;
vertical-align: top;
width: 320px;
}

div#ytinstant div#userPlaylist div#playlistInput {
height: 40px;
width: 100%;
}

div#ytinstant div#userPlaylist div#playlistInput input[type="text"]#playlistBox {
border: 2px solid #999;
border-radius: 5px;
-khtml-border-radius: 5px;
-moz-border-radius: 5px;
-opera-border-radius: 5px;
-webkit-border-radius: 5px;
font-size: 16px;
height: 30px;
margin-right: 15px;
outline: none;
padding: 0 5px 0 4px;
width: 307px;
}

div#ytinstant div#userPlaylist div#playlistInput input[type="text"]#playlistBox:focus {
border: 2px solid #000;
}

div#ytinstant div#userPlaylist div#playlist {
height: 365px;
overflow-x: hidden;
overflow-y: auto;
width: 320px;
}

div#ytinstant div#userPlaylist div#playlist div.searchItem,
div#ytinstant div#songPlaylists div.searchItem,
div#ytinstant div#friendPlaylists div.searchItem {
background-color: #99bbe8;
border: 1px solid #999;
border-radius: 4px;
-khtml-border-radius: 4px;
-moz-border-radius: 4px;
-opera-border-radius: 4px;
-webkit-border-radius: 4px;
cursor: pointer;
float: left;
margin: 1px;
padding: 2px 6px;
}

div#ytinstant div#userPlaylist div#playlist div.searchItem {
font-family: 'reenie beanie', arial, serif;
font-size: 14px;
font-weight: bold;
}

div#ytinstant div#songPlaylists div.searchItem,
div#ytinstant div#friendPlaylists div.searchItem {
font-family: verdana;
font-size: 11px;
}

div#ytinstant div#userPlaylist div#playlist div.searchItem:hover,
div#ytinstant div#songPlaylists div.searchItem:hover,
div#ytinstant div#friendPlaylists div.searchItem:hover {
background-color: #88aadd;
border: 1px solid #888;
}

div#ytinstant div#songPlaylists,
div#ytinstant div#friendPlaylists {
display: none;
float: left;
height: 405px;
position: relative;
vertical-align: top;
width: 320px;
}

div#ytinstant div#songPlaylists div#playlists,
div#ytinstant div#friendPlaylists div#playlists {
height: 367px;
overflow-x: hidden;
overflow-y: auto;
width: 320px;
}

div#ytinstant div#songPlaylists div.playlist,
div#ytinstant div#friendPlaylists div.playlist {
display: none;
height: 365px;
overflow-x: hidden;
overflow-y: auto;
width: 320px;
}

div#ytinstant div#songPlaylists div#playlistHeader,
div#ytinstant div#friendPlaylists div#playlistHeader {
height: 38px;
width: 100%;
}

div#ytinstant div#songPlaylists div#playlistHeader div#friendsPlaylists,
div#ytinstant div#friendPlaylists div#playlistHeader div#friendsPlaylists {
}

div#ytinstant div#songPlaylists div#playlistHeader div#friendsPlaylists div#fpButton,
div#ytinstant div#friendPlaylists div#playlistHeader div#songPlaylists div#spButton {
font-size: 1.2em;
padding: 0.25em 0 0.3em 0;
width: 99.5%%;
}

div#ytinstant div#songPlaylists div#playlistHeader div#songsHeader,
div#ytinstant div#friendPlaylists div#playlistHeader div#songsHeader {
display: none;
}

div#ytinstant div#songPlaylists div#playlistHeader div#songsHeader div#playlistName,
div#ytinstant div#friendPlaylists div#playlistHeader div#songsHeader div#playlistName {
cursor: default;
font-family: 'reenie beanie', arial, serif;
font-size: 26px;
font-weight: bold;
}

div#ytinstant div#songPlaylists div#playlistHeader div#songsHeader img#backtoplaylists,
div#ytinstant div#friendPlaylists div#playlistHeader div#songsHeader img#backtoplaylists {
cursor: pointer;
position: absolute;
right: 2px;
top: 8px;
}

div#ytinstant div#help {
display: none;
float: left;
height: 405px;
position: relative;
vertical-align: top;
width: 320px;
}

div#ytinstant div#help div.container {
width: 305px;
}

div#ytinstant div#gallery {
display: none;
height: 428px;
width: 1050px;
}

div#ytinstant div#gallery div.container {
overflow-x: hidden;
overflow-y: auto;
}

div#ytinstant div#suggestions {
display: none;
height: 428px;
width: 1050px;
}

div#ytinstant div#suggestions div.container {
background: #daf3fd;
border: 3px solid #8edcf9;
margin: 0;
overflow-x: hidden;
overflow-y: auto;
padding: 5px;
}

div#ytinstant div#suggestions li {
cursor: pointer;
font-weight: bold;
padding: 3px;
}

/* End YTInstant ***/
/*** Begin Piano */

div#piano div.pnl-mc {
background-color: #fff;
background-image: none;
}

div#piano div#instruments {
background-color: #666;
border-bottom: 1px solid #99bbe8;
display: block;
height: 29px;
padding: 5px;
}

div#piano div#instruments div.buttons a,
div#piano div#instruments div.buttons button {
padding-left: 10px;
}

div#piano div#pianoswf {
width: 100%;
}

div#piano object.pianoswf {
height: 88%;
width: 99%;
}

div#piano table#all {
height: 100%;
width: 100%;
}

div#piano table#all object.pianoswf {
height: 100%;
width: 100%;
}

/* End Piano ***/
/*** Begin About HnS Desktop */

div#about_hnsdesktop iframe#hnsfblike {
height: 70px;
width: 450px;
}

/* End About HnS Desktop ***/
/*** Begin Feedback */

/* End Feedback ***/
/* Begin Tic Tac Toe ***/

div#tic_tac_toe div.pnl-mc {
background-color: #fff;
background-image: none;
}

div#tic_tac_toe div.stats {
background-color: #666;
border-bottom: 1px solid #99bbe8;
color: #fff;
display: block;
font-weight: bold;
height: 29px;
margin-bottom: 7px;
padding: 5px;
padding-top: 12px;
text-align: center;
}

div#tic_tac_toe div.game {
height: 501px;
margin: auto;
perspective: 800;
-moz-perspective: 800;
-o-perspective: 800;
-webkit-perspective: 800;
position: relative;
width: 501px;
}

div#tic_tac_toe canvas#c_tic_tac_toe {
height: 501px;
left: 0;
position: absolute;
top: 0;
width: 501px;
z-index: 999;
}

div#tic_tac_toe #grid {
box-shadow: 0 2px 5px black;
-moz-box-shadow: 0 2px 5px #000;
-o-box-shadow: 0 2px 5px #000;
-webkit-box-shadow: 0 2px 5px #000;
background: #222;
border: none;
color: #000;
font: 128px sans-serif;
height: 501px;
left: 0;
position: absolute;
text-align: center;
text-shadow: white 1px 1px 3px;
top: 0;
transition: transform 1s ease-in-out;
-moz-transition: -moz-transform 1s ease-in-out;
-o-transition: -o-transform 1s ease-in-out;
-webkit-transition: -webkit-transform 1s ease-in-out;
width: 501px;
z-index: 1;
}

div#tic_tac_toe #grid tr {
height: 167px;
}

div#tic_tac_toe #grid td {
border: 1px solid #ccc;
height: 165px;
padding: 0;
vertical-align: top;
width: 165px;
}

div#tic_tac_toe #grid div {
background: #eee;
height: 167px;
position: relative;
width: 167px;
}

div#tic_tac_toe #grid a {
color: #000;
display: block;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=0)";
height: 155px;
left: 0;
opacity: 0;
-khtml-opacity: 0;
-moz-opacity: 0;
padding-top: 10px;
position: absolute;
text-decoration: none;
top: 0;
transition: opacity 0.5s ease-in-out;
-moz-transition: opacity 0.5s ease-in-out;
-o-transition: opacity 0.5s ease-in-out;
-webkit-transition: opacity 0.5s ease-in-out;
width: 165px;
z-index: 8;
}

div#tic_tac_toe #grid div div {
background: #fefefe;
border: 0;
height: 30%;
position: absolute;
z-index: 3;
}

/* End Tic Tac Toe ***/
/*** Begin Friends */

div#friends div.friendsection {
background-color: #ffffff;
border-radius: 6px;
-khtml-border-radius: 6px;
-moz-border-radius: 6px;
-opera-border-radius: 6px;
-webkit-border-radius: 6px;
clear: right;
display: block;
float: left;
margin: 0 auto;
margin: 5px;
padding: 5px;
text-align: center;
width: 120px;
}

div#friends div.friendsection img.friend {
border-radius: 6px;
-khtml-border-radius: 6px;
-moz-border-radius: 6px;
-opera-border-radius: 6px;
-webkit-border-radius: 6px;
border-width: 0;
height: auto;
margin-top: 4px;
width: 100px;
}

div#friends div.friendsection div.name {
margin-top: 4px;
}

/* End Friends ***/
/*** Begin Goom Radio */

div#goom_radio div#data {
height: 340px;
margin: 0 auto;
width: 300px;
}

div#goom_radio div#goomdiv iframe {
border: 0;
margin: 0;
overflow: hidden;
padding: 0;
}

/* End Goom Radio ***/
/*** Begin Search */

div#search div.pnl-mc {
overflow: auto;
}

/* End Search ***/
/*** Begin Chat */

div#chat div.pnl-mc {
}

div#chat div#chatarea {
background-color: #fff;
border: 1px solid #acd8f0;
color: #000000;
height: 400px;
margin: 0 auto;
overflow: auto;
padding: 5px;
text-align: left;
width: 600px;
}

div#chat div#messagearea {
}

div#chat div#messagearea input[type="text"]#message {
margin: 0 auto;
padding-bottom: 5px;
padding-top: 5px;
text-align: center;
width: 400px;
}

/* End Chat ***/
/*** Begin Music */

/* End Music ***/
/*** Begin Web Broswer */

div#web_browser {

}

div#web_browser div#nav { /* back, forward, refresh, url, go, fav, home, settings { favorites manager, history } */
width: 100%;
}

div#web_browser div#nav input[type="text"]#address {
border: 2px solid #999;
border-radius: 5px;
-khtml-border-radius: 5px;
-moz-border-radius: 5px;
-opera-border-radius: 5px;
-webkit-border-radius: 5px;
font-size: 20px;
height: 30px;
margin-right: 15px;
outline: none;
padding: 0 5px 0 4px;
width: 340px;
}

div#web_browser div#nav input[type="text"]#address:focus {
border: 2px solid #000;
}

div#web_browser div#window {

}

div#web_browser div#window iframe#browser {
height: 100%;
overflow: auto;
width: 100%;
}

/* End Web Broswer ***/
/*** Begin Torus */

div#torus {

}

div#torus #content {
height: 480px;
}

div#torus #container {
visibility: hidden;
/*
position: absolute;
top: 0;
left: 170px;
right: 170px;
*/
font-family: arial;
background-color: red;
}

div#torus #link {
position: absolute;
top: 470px;
width: 100%;
text-align: center;
font-size: small;
}

div#torus #footer {
display: block;
padding-top: 500px;
}

div#torus canvas {
position: absolute;
top: 0;
left: 0;
}

div#torus #paused {
width: 110px;
height: 30px;
position: absolute;
top: 346px;
left: 48px;
background-image: url(i/apps/torus/paused.png);
display: none;
}

div#torus #but_resume {
top: -150px;
left: 7px;
width: 86px;
background-image: url(i/apps/torus/but_resume.png);
}

div#torus #but_restart {
top: -110px;
left: 7px;
width: 86px;
background-image: url(i/apps/torus/but_restart.png);
}

div#torus #but_quit {
top: -70px;
left: 7px;
width: 86px;
background-image: url(i/apps/torus/but_quit.png);
}

div#torus #score {
position: absolute;
top: 33px;
left: 19px;
font-size: 14pt;
color: #666;
font-family: arial;
font-weight: 700;
}

div#torus #time {
position: absolute;
top: 83px;
left: 19px;
font-size: 14pt;
color: #666;
font-family: arial;
font-weight: 700;
}

div#torus #playing {
position: absolute;
top: 0;
left: 0;
width: 200px;
height: 450px;
background-image: url(i/apps/torus/base0.png);
background-repeat: no-repeat;
background-position: 8px 320px;
}

div#torus #panel {
display: none;
position: absolute;
top: 200px;
left: 250px;
width: 94px;
height: 233px;
background-image: url(i/apps/torus/panel.png);
}

div#torus #title1 {
position: absolute;
top: -74px;
left: -17px;
width: 125px;
height: 126px;
background-image: url(i/apps/torus/title_traditional.png);
}

div#torus #title2 {
position: absolute;
top: -76px;
left: -29px;
width: 150px;
height: 108px;
background-image: url(i/apps/torus/title_time.png);
}

div#torus #title3 {
position: absolute;
top: -83px;
left: -8px;
width: 112px;
height: 97px;
background-image: url(i/apps/torus/title_garbage.png);
}

div#torus #gameover {
display: none;
position: absolute;
top: 175px;
left: 200px;
width: 253px;
height: 221px;
background-image: url(i/apps/torus/game_over.png);
font-size: 10pt;
color: #333;
}

div#torus #winner {
position: absolute;
top: 50px;
left: 19px;
padding-left: 11px;
width: 205px;
height: 200px;
background-image: url(i/apps/torus/coins.png);
background-repeat: no-repeat;
background-position: 0 64px;
}

div#torus #winner form {
margin: 0;
padding: 0;
}

div#torus #but_main4 {
top: 167px;
left: 150px;
width: 86px;
background-image: url(i/apps/torus/but_main.png);
}

div#torus #but_restart2 {
top: 127px;
left: 150px;
width: 86px;
background-image: url(i/apps/torus/but_restart.png);
}

div#torus #sorryText {
position: absolute;
top: 45px;
left: 30px;
width: 205px;
}

div#torus #skull {
position: absolute;
top: 90px;
left: -35px;
width: 120px;
height: 150px;
background-image: url(i/apps/torus/skull.png);
}

div#torus #but_pause {
top: 180px;
left: 15px;
width: 64px;
background-image: url(i/apps/torus/but_pause.png);
}

div#torus #next {
position: absolute;
top: 127px;
left: 7px;
width: 80px;
height: 50px;
background-image: url(i/apps/torus/blocks.png);
}

div#torus #menu {
position: absolute;
top: 234px;
left: 0px;
width: 450px;
height: 220px;
background-image: url(i/apps/torus/menu.png);
background-repeat: no-repeat;
background-position: 92px 0px;
}

div#torus #menu_area {
position: absolute;
top: 39px;
left: 111px;
width: 321px;
height: 157px;
overflow: hidden;
}

div#torus .nonstick {
-apple-dashboard-region: dashboard-region(control rectangle 0 0 0 0);
}

div#torus .but {
-apple-dashboard-region: dashboard-region(control rectangle 0 0 0 0);
position: absolute;
cursor: pointer;
height: 36px;
}

div#torus .but:hover {
background-position: 0 -36px;
}

div#torus .but:active {
background-position: 0 -72px;
}

div#torus #screen0 {
position: absolute;
left: 321px;
top: 0;
width: 321px;
height: 157px;
background-image: url(i/apps/torus/title_help.png);
background-repeat: no-repeat;
background-position: 30px 4px;
}

div#torus #copy {
position: absolute;
top: 125px;
left: 90px;
font-size: 10pt;
color: #444;
}

div#torus #helpBox {
display: none;
position: absolute;
top: 8px;
left: 90px;
width: 220px;
height: 100px;
overflow: auto;
font-size: 9pt;
}

div#torus #but_main0 {
top: 117px;
left: 229px;
width: 86px;
background-image: url(i/apps/torus/but_main.png);
}

div#torus #screen1 {
position: absolute;
left:0;
top: 157px;
width: 321px;
height: 157px;
background-image: url(i/apps/torus/modes.png);
background-position: 45px 7px;
background-repeat: no-repeat;
}

div#torus #go1,
div#torus #go2,
div#torus #go3 {
position: absolute;
width: 40px;
height: 36px;
background-image: url(i/apps/torus/but_go.png);
cursor: pointer;
}

div#torus #go1 {
top: 110px;
left: 75px;
}

div#torus #go2 {
top: 110px;
left: 152px;
}

div#torus #go2:hover {
background-position: 0 -108px;
}

div#torus #go2:active {
background-position: 0 -144px;
}

div#torus #go3 {
top: 68px;
left: 229px;
}

div#torus #go3:hover {
background-position: 0 -180px;
}

div#torus #go3:active {
background-position: 0 -216px;
}

div#torus #but_main1 {
top: 117px;
left: 229px;
width: 86px;
background-image: url(i/apps/torus/but_main.png);
}

div#torus #screen2 {
position: absolute;
left:321px;
top: 157px;
width: 321px;
height: 157px;
}

div#torus #quote {
position: absolute;
top: 7px;
left: 62px;
width: 250px;
font-family: arial;
color: #fff;
font-weight: 700;
font-size: 10pt;
font-style: italic;
}

div#torus #quote b {
color: #000;
}

div#torus #quote span {
font-style: normal;
padding-left: 50px;
}

div#torus #but_play {
top: 115px;
left: 71px;
width: 62px;
background-image: url(i/apps/torus/but_play.png);
}

div#torus #but_settings {
top: 115px;
left: 137px;
width: 75px;
background-image: url(i/apps/torus/but_settings.png);
}

div#torus #but_help {
top: 76px;
left: 256px;
width: 60px;
background-image: url(i/apps/torus/but_help.png);
}

div#torus #but_high {
position: absolute;
top: 115px;
left: 216px;
width: 98px;
background-image: url(i/apps/torus/but_high.png);
}

div#torus #screen3 {
position: absolute;
left:642px;
top: 157px;
width: 321px;
height: 157px;
background-image: url(i/apps/torus/title_high.png);
background-repeat: no-repeat;
background-position: 32px 5px;
font-size: 9pt;
font-family: arial;
}

div#torus #bestType {
position: absolute;
top: 10px;
left: 200px;
width: 110px;
}

div#torus #best1,
div#torus #best2,
div#torus #best3 {
display: none;
position: absolute;
top: 40px;
left: 90px;
}

div#torus #best1 {
display:block;
}

div#torus #but_main2 {
top: 115px;
left: 228px;
width: 86px;
background-image: url(i/apps/torus/but_main.png);
}

div#torus #screen4 {
position: absolute;
left:321px;
top:314px;
height: 157px;
width: 321px;
background-image: url(i/apps/torus/title_settings.png);
background-repeat: no-repeat;
background-position: 32px 5px;
font-family: arial;
font-size: 10pt;
}

div#torus #screen4 select {
width: 90px;
}

div#torus #div_base {
position: absolute;
top: 10px;
left: 150px;
width: 160px;
text-align: right;
}

div#torus #div_blocks {
position: absolute;
top: 35px;
left: 150px;
width: 160px;
text-align: right;
}

div#torus #div_ghost {
position: absolute;
top: 40px;
left: 217px;
width: 160px;
}

div#torus #but_main3 {
top: 115px;
left: 228px;
width: 86px;
background-image: url(i/apps/torus/but_main.png);
}

div#torus #close {
position: absolute;
width: 20px;
height: 20px;
background-image: url(i/apps/torus/close.png);
display: none;
}

div#torus #close:hover {
background-position: 0 20px;
}

div#torus #close:active {
background-position: 0 40px;
}

/* End Torus ***/
/*** Begin Calendar */

div#calendar {
}

div#calendar table.maintable {
border-collapse: collapse;
border-color: #111;
border-spacing: 0;
padding: 0;
}

div#calendar table.maintable td {
border-color: #000;
border-bottom-style: none;
border-bottom-width: medium;
border-left-style: none;
border-left-width: medium;
border-right-style: solid;
border-right-width: 1;
border-top: 1px solid #000;
}

div#calendar table.maintable table#evtcal {
border-collapse: collapse;
border-spacing: 0;
padding: 0;
text-align: center;
}

div#calendar table.maintable table#evtcal td {
background-color: #adf;
padding: 3px;
text-align: center;
vertical-align: top;
width: 314px;
}

div#calendar #evtcal a:link {
color: #040;
font: normal 12pt arial, helvetica, "sans serif";
text-decoration: none;
}

div#calendar #evtcal a:visited {
color: #040;
font: normal 12pt arial, helvetica, "sans serif";
text-decoration: none;
}

div#calendar #evtcal a:hover {
color: #040;
font: normal 12pt arial, helvetica, "sans serif";
text-decoration: underline;
}

div#calendar #evtcal a:active {
color: #040;
font: normal 12pt arial, helvetica, "sans serif";
text-decoration: none;
}

div#calendar #calendararea {
}

div#calendar #eventform {
}

/* End Calendar ***/
/*** Begin App Explorer */

div#app_explorer {

}

/* End App Explorer ***/
/*** Begin Calculator */

div#calculator div.tl.help {
margin-right: 0 !important;
}

div#calculator div#out {
cursor: default;
padding: 12px 0 0 0;
}

div#calculator div#out-scroll {
max-height: 550px;
overflow: auto;
}

div#calculator div#out-inner {
line-height: 25px;
margin-left: 60px;
margin-right: 20px;
}

div#calculator div.left {
float: left;
width: 56px;
margin-left: -60px;
text-align: right;
color: #888;
}

div#calculator span.echo {
color: #888;
}

div#calculator div#in {
background-color: #ffffd4;
margin-bottom: 20px;
margin-top: 8px;
}

div#calculator div#in div.left {
margin-left: 0;
width: 58px;
margin-right: 1px;
}

div#calculator div#in input {
border: none;
background-color: transparent;
margin: 0;
padding: 0;
outline: none;
width: 610px;
}

div#calculator span.result {
color: black;
}

div#calculator span.result.final {
color: green;
}

div#calculator span.op,
div#calculator span.var {
cursor: pointer;
}

div#calculator span.var {
color: black;
}

div#calculator span.var.new, b {
font-weight: 600;
}

div#calculator div.content ::-moz-selection {
background-color: #cfcfcf;
}

div#calculator div.content ::selection {
background-color: #cfcfce;
}

div#calculator div.content ::-webkit-selection {
background-color: #cfcecf;
}

div#calculator span.f,
div#calculator span.m {
display: none;
}

/* End Calculator ***/
/*** Begin Calculator */

div#twitter div.tl.plus,
div#twitter div.tl.refresh {
margin-right: 0 !important;
}

div#twitter div.body {
background-color: darkgrey;
text-align: center;
user-select: text;
-khtml-user-select: text;
-moz-user-select: text;
-webkit-user-select: text;
}

div#twitter input[type="text"]#search {
border: 2px solid #999;
border-radius: 5px;
-khtml-border-radius: 5px;
-moz-border-radius: 5px;
-opera-border-radius: 5px;
-webkit-border-radius: 5px;
font-size: 20px;
height: 30px;
margin: 0 15px 10px 0;
outline: none;
padding: 0 35px 0 4px;
width: 310px;
}

div#twitter input[type="text"]#search:focus {
border: 2px solid #000;
}

div#twitter table#tweets {
background-color: lightgray;
margin: 2px;
padding: 5px;
spacing: 4px;
text-align: left;
}

div#twitter table#tweets tr {
background-color: darkgrey;
}

div#twitter table#tweets tr td {
margin: 2px;
padding: 2px;
spacing: 2px;
}

div#twitter table#tweets img.pimage {
height: 48px;
width: 48px;
}

/* End Calculator ***/
/* End Apps **/
/* End User Interface */
<?php ob_end_flush(); ?>