<?php
session_start();
header("Content-Type: text/css");

if (isset($_GET['id']) && ($_GET['id'] >= 1)) {
$theme_id = $_GET['id'];
} else {
$theme_id = 1;
}
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Style Sheet  <<< ----------- */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    HnS Desktop
/* Site Creator: Andrew Gerst
/* Site Created: Wed, 24 Mar 2010 21:22:05 -0400
/* Last Updated: <?php echo date(r, filemtime('css.php')) . "\n";?>
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {?>/* Current User: <?php echo $_SESSION['fullname'] . "\n";} ?>
/* Select Theme: <?php echo $theme_id . "\n";?>
/* ---------------------------------------------------- */

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
font-size: 100.01%;/* 16px */
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
background-image: url(i/wallpapers/vista.jpg);
background-position: center center;
background-repeat: no-repeat;
color: #000;
user-select: text;
-khtml-user-select: text;
-moz-user-select: text;
-webkit-user-select: text;
}

body {
height: 100%;
overflow: hidden;
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
width: 100%;
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

h1 {
font-size: 138.5%;/* 18px */
}

h2 {
font-size: 123.1%;/* 16px */
}

h3 {
font-size: 108%;/* 14px */
}

h1, h2, h3 {
margin: 1em 0;/* top & bottom margin based on font size */
}

h1, h2, h3, h4, h5, h6, strong {
font-weight: bold;/* bringing boldness back to headers and the strong element */
}

abbr, acronym {/* indicating to users that more info is available */
border-bottom: 1px dotted #000;
cursor: help;
}

em {
font-style: italic;/* bringing italics back to the em element */
}

blockquote, ul, ol, dl {
margin: 1em;/* giving blockquotes and lists room to breath */
}

ol, ul, dl {
margin-left: 2em;/* bringing lists on to the page with breathing room */
}

ol li {
list-style: decimal outside;/* giving OL's LIs generated numbers */
}

ul li {
list-style: disc outside;/* giving UL's LIs generated disc markers */
}

dl dd {
margin-left: 1em;
}

th, td {/* borders and padding to make the table readable */
border: 1px solid #000;
padding: .5em;
}

th {/* distinguishing table headers from data cells */
font-weight: bold;
text-align: center;
}

caption {
margin-bottom: .5em;/* coordinated marking to match cell's padding */
text-align: center;/* centered so it doesn't blend in to other content */
}

p, fieldset, table {
margin-bottom: 1em;/* so things don't run into each other */
}

/* End CSS Base */
/* Begin Buttons */

.buttons a,
.buttons button {/* if no image in button add padding-left: 10px */
background-color: #f5f5f5;
border: 1px solid #dedede;
border-left: 1px solid #eee;
border-top: 1px solid #eee;
color: #565656;
cursor: pointer;
display: block;
float: left;
font-family: "lucida grande", tahoma, arial, verdana, sans-serif;
font-size: 10pt;/* 100% */
font-weight: bold;
line-height: 130%;
margin: 0 7px 0 0;
padding: 5px 10px 6px 7px;/* links */
text-decoration: none;
}

.buttons button {
overflow: visible;
padding: 4px 10px 3px 7px;/* IE6 */
width: auto;
}

.buttons button[type] {
line-height: 17px;/* Safari */
padding: 5px 10px 5px 7px;/* Firefox */
}

*:first-child+html button[type] {
padding: 4px 10px 3px 7px;/* IE7 */
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
box-shadow: rgba(192,192,192,0.75) 0px 8px 24px;
-khtml-box-shadow: rgba(192,192,192,0.75) 0px 8px 24px;
-moz-box-shadow: rgba(192,192,192,0.75) 0px 8px 24px;
-webkit-box-shadow: rgba(192,192,192,0.75) 0px 8px 24px;
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
top: 0px;
width: 94%;
}

.shiny-button1:hover { /* red */
background-color: rgba(255,0,0,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(128,64,64,0.75)), to(rgba(192,128,128,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(128,64,64,0.75)), to(rgba(256,128,128,0.9)));
border-color: #aa7777;
box-shadow: rgba(256,128,128,0.5) 0px 8px 24px;
-khtml-box-shadow: rgba(256,128,128,0.5) 0px 8px 24px;
-moz-box-shadow: rgba(256,128,128,0.5) 0px 8px 24px;
-webkit-box-shadow: rgba(256,128,128,0.5) 0px 8px 24px;
}

.shiny-button2:hover { /* green */
background-color: rgba(0,128,0,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(64,128,64,0.75)), to(rgba(128,192,128,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(64,128,64,0.75)), to(rgba(128,255,128,0.9)));
border-color: #77cc77;
box-shadow: rgba(128,256,128,0.6) 0px 8px 24px;
-khtml-box-shadow: rgba(128,256,128,0.6) 0px 8px 24px;
-moz-box-shadow: rgba(128,256,128,0.6) 0px 8px 24px;
-webkit-box-shadow: rgba(128,256,128,0.6) 0px 8px 24px;
}

.shiny-button3:hover { /* blue */
background-color: rgba(64,128,192,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(16,96,192,0.75)), to(rgba(96,192,255,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(16,96,192,0.75)), to(rgba(96,192,255,0.9)));
border-color: #6699cc;
box-shadow: rgba(128,192,255,0.75) 0px 8px 24px;
-khtml-box-shadow: rgba(128,192,255,0.75) 0px 8px 24px;
-moz-box-shadow: rgba(128,192,255,0.75) 0px 8px 24px;
-webkit-box-shadow: rgba(128,192,255,0.75) 0px 8px 24px;
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

.transparent1 {
filter: alpha(opacity=10) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=10)" !important;
opacity: 0.1 !important;
-khtml-opacity: 0.1 !important;
-moz-opacity: 0.1 !important;
}

.transparent2 {
filter: alpha(opacity=20) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=20)" !important;
opacity: 0.2 !important;
-khtml-opacity: 0.2 !important;
-moz-opacity: 0.2 !important;
}

.transparent3 {
filter: alpha(opacity=30) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)" !important;
opacity: 0.3 !important;
-khtml-opacity: 0.3 !important;
-moz-opacity: 0.3 !important;
}

.transparent4 {
filter: alpha(opacity=40) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=40)" !important;
opacity: 0.4 !important;
-khtml-opacity: 0.4 !important;
-moz-opacity: 0.4 !important;
}

.transparent5 {
filter: alpha(opacity=50) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=50)" !important;
opacity: 0.5 !important;
-khtml-opacity: 0.5 !important;
-moz-opacity: 0.5 !important;
}

.transparent6 {
filter: alpha(opacity=60) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)" !important;
opacity: 0.6 !important;
-khtml-opacity: 0.6 !important;
-moz-opacity: 0.6 !important;
}

.transparent7 {
filter: alpha(opacity=70) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=70)" !important;
opacity: 0.7 !important;
-khtml-opacity: 0.7 !important;
-moz-opacity: 0.7 !important;
}

.transparent8 {
filter: alpha(opacity=80) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=80)" !important;
opacity: 0.8 !important;
-khtml-opacity: 0.8 !important;
-moz-opacity: 0.8 !important;
}

.transparent9 {
filter: alpha(opacity=90) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=90)" !important;
opacity: 0.9 !important;
-khtml-opacity: 0.9 !important;
-moz-opacity: 0.9 !important;
}

.transparent10 {
filter: alpha(opacity=100) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=100)" !important;
opacity: 1 !important;
-khtml-opacity: 1 !important;
-moz-opacity: 1 !important;
}

/* End Transparency */
/* Begin Floating & Clearing */

.clear {
clear: both !important;
}

.left {
float: left !important;
}

.right {
float: right !important;
}

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

.dragresize {
background-color: transparent;
border: 0;
font-size: 1px;
position: absolute;
}

.dragresize-tl {
cursor: nw-resize;
height: 6px;
left: 0;
top: 0;
width: 6px;
z-index: 101;
}

.dragresize-tm {
cursor: n-resize;
height: 6px;
left: 0;
top: 0;
width: 100%;
z-index: 100;
}

.dragresize-tr {
cursor: ne-resize;
height: 6px;
right: 0;
top: 0;
width: 6px;
z-index: 101;
}

.dragresize-ml {
cursor: w-resize;
top: 0;
left: 0;
height: 100%;
width: 6px;
z-index: 100;
}

.dragresize-mr {
cursor: e-resize;
height: 100%;
top: 0;
right: 0;
width: 6px;
z-index: 100;
}

.dragresize-bl {
bottom: 0;
cursor: sw-resize;
height: 6px;
left: 0;
width: 6px;
z-index: 101;
}

.dragresize-bm {
bottom: 0;
cursor: s-resize;
height: 6px;
left: 0;
width: 100%;
z-index: 100;
}

.dragresize-br {
bottom: 0;
cursor: se-resize;
height: 6px;
right: 0;
width: 6px;
z-index: 101;
}

/* End Drag/Resize */
/* Begin ContextMenu */

.contextMenu {
background: #eee;
border: solid 1px #ccc;
display: none;
margin: 0px;
padding: 0px;
position: absolute;
width: 120px;
z-index: 99999;
}

.contextMenu li {
list-style: none;
margin: 0px;
padding: 0px;
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
background-color: #3399ff;
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

div.panel {
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

div.panel-tl {
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

div.panel-tl div.panel-tr {
padding-right: 6px;
}

div.panel-tl div.panel-tr div.panel-tc {

}

div.panel-tc div.panel-header {
background-image: url(i/apps/icons/application.png);
background-position: 0 4px;
background-repeat: no-repeat;
cursor: move;
width: 100%;
}

div.panel-tc div.panel-header span.panel-header-text {
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

div.panel-header div.tools {
height: 18px;
overflow: hidden;
position: absolute;
right: 6px;
top: 1px;
width: auto;
}

div.panel-header div.tools span.maintools {
}

div.panel-header div.tools span.maintools div.tool {
}

div.panel-header div.tools span.maintoolsapart {
}

div.panel-header div.tools span.maintoolsapart div.tool {
margin-right: 3px;
}

div.panel-header div.tools span.subtools {
}

div.panel-header div.tools span.subtools div.tool {
margin-right: 3px;
}

div.panel-header div.tools span.subtoolsattached {
}

div.panel-header div.tools span.subtoolsattached div.tool {
margin-right: 0;
}

div.panel-header div.tools div.tool {
background-image: url(i/ux/tools.gif);
background-repeat: no-repeat;
cursor: pointer;
float: right;
height: 18px;
overflow: hidden;
width: 25px;
}

div.panel-header div.tools div.close {
background-position: -10px -36px;
width: 44px;
}

div.panel-header div.tools div.close:hover {
background-position: -10px -54px;
}

div.panel-header div.tools div.close_corners {
background-position: -9px 0 !important;
width: 45px !important;
}

div.panel-header div.tools div.close_corners:hover {
background-position: -9px -18px !important;
}

div.panel-header div.tools div.maximize {
background-position: -4px -144px;
}

div.panel-header div.tools div.maximize:hover {
background-position: -29px -144px;
}

div.panel-header div.tools div.maximize_end {
background-position: -2px -127px !important;
width: 26px;
}

div.panel-header div.tools div.maximize_end:hover {
background-position: -28px -127px !important;
}

div.panel-header div.tools div.maximize_corners {
background-position: -4px -162px !important;
}

div.panel-header div.tools div.maximize_corners:hover {
background-position: -29px -162px !important;
}

div.panel-header div.tools div.restore {
background-position: -4px -198px;
}

div.panel-header div.tools div.restore:hover {
background-position: -29px -198px;
}

div.panel-header div.tools div.restore_end{
background-position: -2px -180px !important;
width: 26px;
}

div.panel-header div.tools div.restore_end:hover {
background-position: -28px -180px !important;
}

div.panel-header div.tools div.restore_corners {
background-position: -4px -216px !important;
}

div.panel-header div.tools div.restore_corners:hover {
background-position: -29px -216px !important;
}

div.panel-header div.tools div.minimize {
background-position: -2px -72px;
width: 26px;
}

div.panel-header div.tools div.minimize:hover {
background-position: -28px -72px;
}

div.panel-header div.tools div.minimize_middle {
background-position: -4px -90px !important;
width: 25px !important;
}

div.panel-header div.tools div.minimize_middle:hover {
background-position: -29px -90px !important;
}

div.panel-header div.tools div.minimize_corners {
background-position: -4px -108px !important;
width: 25px !important;
}

div.panel-header div.tools div.minimize_corners:hover {
background-position: -29px -108px !important;
}

div.panel-header div.tools div.blank {
background-position: -4px -288px;
}

div.panel-header div.tools div.blank:hover {
background-position: -29px -288px;
}

div.panel-header div.tools div.blank_middle {
background-position: -4px -270px !important;
}

div.panel-header div.tools div.blank_middle:hover {
background-position: -29px -270px !important;
}

div.panel-header div.tools div.blank_end {
background-position: -2px -252px !important;
width: 26px;
}

div.panel-header div.tools div.blank_end:hover {
background-position: -28px -252px !important;
}

div.panel-header div.tools div.blank_begin {
background-position: -2px -234px !important;
width: 26px;
}

div.panel-header div.tools div.blank_begin:hover {
background-position: -28px -234px !important;
}

div.panel-header div.tools div.toggle {
background-position: -4px -360px;
}

div.panel-header div.tools div.toggle:hover {
background-position: -29px -360px;
}

div.panel-header div.tools div.toggle_middle {
background-position: -4px -342px !important;
}

div.panel-header div.tools div.toggle_middle:hover {
background-position: -29px -342px !important;
}

div.panel-header div.tools div.toggle_end {
background-position: -2px -324px !important;
width: 26px;
}

div.panel-header div.tools div.toggle_end:hover {
background-position: -28px -324px !important;
}

div.panel-header div.tools div.toggle_begin {
background-position: -2px -306px !important;
width: 26px;
}

div.panel-header div.tools div.toggle_begin:hover {
background-position: -28px -306px !important;
}

div.panel-header div.tools div.toggledown {
background-position: -4px -432px;
}

div.panel-header div.tools div.toggledown:hover {
background-position: -29px -432px;
}

div.panel-header div.tools div.toggledown_middle {
background-position: -4px -414px !important;
}

div.panel-header div.tools div.toggledown_middle:hover {
background-position: -29px -414px !important;
}

div.panel-header div.tools div.toggledown_end {
background-position: -2px -396px !important;
width: 26px;
}

div.panel-header div.tools div.toggledown_end:hover {
background-position: -28px -396px !important;
}

div.panel-header div.tools div.toggledown_begin {
background-position: -2px -378px !important;
width: 26px;
}

div.panel-header div.tools div.toggledown_begin:hover {
background-position: -28px -378px !important;
}

div.panel-header div.tools div.config {
background-position: -4px -504px;
}

div.panel-header div.tools div.config:hover {
background-position: -29px -504px;
}

div.panel-header div.tools div.config_middle {
background-position: -4px -486px !important;
}

div.panel-header div.tools div.config_middle:hover {
background-position: -29px -486px !important;
}

div.panel-header div.tools div.config_end {
background-position: 0 -468px !important;
width: 27px;
}

div.panel-header div.tools div.config_end:hover {
background-position: -27px -468px !important;
}

div.panel-header div.tools div.config_begin {
background-position: -2px -450px !important;
width: 26px;
}

div.panel-header div.tools div.config_begin:hover {
background-position: -28px -450px !important;
}

div.panel-header div.tools div.arrowleft {
background-position: -4px -576px;
}

div.panel-header div.tools div.arrowleft:hover {
background-position: -29px -576px;
}

div.panel-header div.tools div.arrowleft_middle {
background-position: -4px -558px !important;
}

div.panel-header div.tools div.arrowleft_middle:hover {
background-position: -29px -558px !important;
}

div.panel-header div.tools div.arrowleft_end {
background-position: 0 -540px !important;
width: 27px;
}

div.panel-header div.tools div.arrowleft_end:hover {
background-position: -27px -540px !important;
}

div.panel-header div.tools div.arrowleft_begin {
background-position: -2px -522px !important;
width: 26px;
}

div.panel-header div.tools div.arrowleft_begin:hover {
background-position: -28px -522px !important;
}

div.panel-header div.tools div.arrowright {
background-position: -4px -648px;
}

div.panel-header div.tools div.arrowright:hover {
background-position: -29px -648px;
}

div.panel-header div.tools div.arrowright_middle {
background-position: -4px -630px !important;
}

div.panel-header div.tools div.arrowright_middle:hover {
background-position: -29px -630px !important;
}

div.panel-header div.tools div.arrowright_end {
background-position: -2px -612px !important;
width: 27px;
}

div.panel-header div.tools div.arrowright_end:hover {
background-position: -28px -612px !important;
}

div.panel-header div.tools div.arrowright_begin {
background-position: 0 -594px !important;
width: 26px;
}

div.panel-header div.tools div.arrowright_begin:hover {
background-position: -27px -594px !important;
}

div.panel-header div.tools div.pindown {
background-position: -4px -720px;
}

div.panel-header div.tools div.pindown:hover {
background-position: -29px -720px;
}

div.panel-header div.tools div.pindown_middle {
background-position: -4px -702px !important;
}

div.panel-header div.tools div.pindown_middle:hover {
background-position: -29px -702px !important;
}

div.panel-header div.tools div.pindown_end {
background-position: 0 -684px !important;
width: 27px;
}

div.panel-header div.tools div.pindown_end:hover {
background-position: -27px -684px !important;
}

div.panel-header div.tools div.pindown_begin {
background-position: -2px -666px !important;
width: 26px;
}

div.panel-header div.tools div.pindown_begin:hover {
background-position: -28px -666px !important;
}

div.panel-header div.tools div.pinleft {
background-position: -4px -792px;
}

div.panel-header div.tools div.pinleft:hover {
background-position: -29px -792px;
}

div.panel-header div.tools div.pinleft_middle {
background-position: -4px -774px !important;
}

div.panel-header div.tools div.pinleft_middle:hover {
background-position: -29px -774px !important;
}

div.panel-header div.tools div.pinleft_end {
background-position: 0 -756px !important;
width: 27px;
}

div.panel-header div.tools div.pinleft_end:hover {
background-position: -27px -756px !important;
}

div.panel-header div.tools div.pinleft_begin {
background-position: -2px -738px !important;
width: 26px;
}

div.panel-header div.tools div.pinleft_begin:hover {
background-position: -28px -738px !important;
}

div.panel-header div.tools div.dblarrowright {
background-position: -4px -864px;
}

div.panel-header div.tools div.dblarrowright:hover {
background-position: -29px -864px;
}

div.panel-header div.tools div.dblarrowright_middle {
background-position: -4px -846px !important;
}

div.panel-header div.tools div.dblarrowright_middle:hover {
background-position: -29px -846px !important;
}

div.panel-header div.tools div.dblarrowright_end {
background-position: 0 -828px !important;
width: 27px;
}

div.panel-header div.tools div.dblarrowright_end:hover {
background-position: -27px -828px !important;
}

div.panel-header div.tools div.dblarrowright_begin {
background-position: -2px -810px !important;
width: 26px;
}

div.panel-header div.tools div.dblarrowright_begin:hover {
background-position: -28px -810px !important;
}

div.panel-header div.tools div.dblarrowleft {
background-position: -4px -936px;
}

div.panel-header div.tools div.dblarrowleft:hover {
background-position: -29px -936px;
}

div.panel-header div.tools div.dblarrowleft_middle {
background-position: -4px -918px !important;
}

div.panel-header div.tools div.dblarrowleft_middle:hover {
background-position: -29px -918px !important;
}

div.panel-header div.tools div.dblarrowleft_end {
background-position: 0 -900px !important;
width: 27px;
}

div.panel-header div.tools div.dblarrowleft_end:hover {
background-position: -27px -900px !important;
}

div.panel-header div.tools div.dblarrowleft_begin {
background-position: -2px -882px !important;
width: 26px;
}

div.panel-header div.tools div.dblarrowleft_begin:hover {
background-position: -28px -882px !important;
}

div.panel-header div.tools div.dblarrowdown {
background-position: -4px -1008px;
}

div.panel-header div.tools div.dblarrowdown:hover {
background-position: -29px -1008px;
}

div.panel-header div.tools div.dblarrowdown_middle {
background-position: -4px -990px !important;
}

div.panel-header div.tools div.dblarrowdown_middle:hover {
background-position: -29px -990px !important;
}

div.panel-header div.tools div.dblarrowdown_end {
background-position: 0 -972px !important;
width: 27px;
}

div.panel-header div.tools div.dblarrowdown_end:hover {
background-position: -27px -972px !important;
}

div.panel-header div.tools div.dblarrowdown_begin {
background-position: -2px -954px !important;
width: 26px;
}

div.panel-header div.tools div.dblarrowdown_begin:hover {
background-position: -28px -954px !important;
}

div.panel-header div.tools div.dblarrowup {
background-position: -4px -1080px;
}

div.panel-header div.tools div.dblarrowup:hover {
background-position: -29px -1080px;
}

div.panel-header div.tools div.dblarrowup_middle {
background-position: -4px -1062px !important;
}

div.panel-header div.tools div.dblarrowup_middle:hover {
background-position: -29px -1062px !important;
}

div.panel-header div.tools div.dblarrowup_end {
background-position: 0 -1044px !important;
width: 27px;
}

div.panel-header div.tools div.dblarrowup_end:hover {
background-position: -27px -1044px !important;
}

div.panel-header div.tools div.dblarrowup_begin {
background-position: -2px -1026px !important;
width: 26px;
}

div.panel-header div.tools div.dblarrowup_begin:hover {
background-position: -28px -1026px !important;
}

div.panel-header div.tools div.refresh {
background-position: -4px -1152px;
}

div.panel-header div.tools div.refresh:hover {
background-position: -29px -1152px;
}

div.panel-header div.tools div.refresh_middle {
background-position: -4px -1134px !important;
}

div.panel-header div.tools div.refresh_middle:hover {
background-position: -29px -1134px !important;
}

div.panel-header div.tools div.refresh_end {
background-position: 0 -1116px !important;
width: 27px;
}

div.panel-header div.tools div.refresh_end:hover {
background-position: -27px -1116px !important;
}

div.panel-header div.tools div.refresh_begin {
background-position: -2px -1098px !important;
width: 26px;
}

div.panel-header div.tools div.refresh_begin:hover {
background-position: -28px -1098px !important;
}

div.panel-header div.tools div.plus {
background-position: -4px -1224px;
}

div.panel-header div.tools div.plus:hover {
background-position: -29px -1224px;
}

div.panel-header div.tools div.plus_middle {
background-position: -4px -1206px !important;
}

div.panel-header div.tools div.plus_middle:hover {
background-position: -29px -1206px !important;
}

div.panel-header div.tools div.plus_end {
background-position: 0 -1188px !important;
width: 27px;
}

div.panel-header div.tools div.plus_end:hover {
background-position: -27px -1188px !important;
}

div.panel-header div.tools div.plus_begin {
background-position: -2px -1170px !important;
width: 26px;
}

div.panel-header div.tools div.plus_begin:hover {
background-position: -28px -1170px !important;
}

div.panel-header div.tools div.minus {
background-position: -4px -1296px;
}

div.panel-header div.tools div.minus:hover {
background-position: -29px -1296px;
}

div.panel-header div.tools div.minus_middle {
background-position: -4px -1278px !important;
}

div.panel-header div.tools div.minus_middle:hover {
background-position: -29px -1278px !important;
}

div.panel-header div.tools div.minus_end {
background-position: 0 -1260px !important;
width: 27px;
}

div.panel-header div.tools div.minus_end:hover {
background-position: -27px -1260px !important;
}

div.panel-header div.tools div.minus_begin {
background-position: -2px -1242px !important;
width: 26px;
}

div.panel-header div.tools div.minus_begin:hover {
background-position: -28px -1242px !important;
}

div.panel-header div.tools div.search {
background-position: -4px -1368px;
}

div.panel-header div.tools div.search:hover {
background-position: -29px -1368px;
}

div.panel-header div.tools div.search_middle {
background-position: -4px -1350px !important;
}

div.panel-header div.tools div.search_middle:hover {
background-position: -29px -1350px !important;
}

div.panel-header div.tools div.search_end {
background-position: 0 -1332px !important;
width: 27px;
}

div.panel-header div.tools div.search_end:hover {
background-position: -27px -1332px !important;
}

div.panel-header div.tools div.search_begin {
background-position: -2px -1314px !important;
width: 26px;
}

div.panel-header div.tools div.search_begin:hover {
background-position: -28px -1314px !important;
}

div.panel-header div.tools div.save {
background-position: -4px -1440px;
}

div.panel-header div.tools div.save:hover {
background-position: -29px -1440px;
}

div.panel-header div.tools div.save_middle {
background-position: -4px -1422px !important;
}

div.panel-header div.tools div.save_middle:hover {
background-position: -29px -1422px !important;
}

div.panel-header div.tools div.save_end {
background-position: 0 -1404px !important;
width: 27px;
}

div.panel-header div.tools div.save_end:hover {
background-position: -27px -1404px !important;
}

div.panel-header div.tools div.save_begin {
background-position: -2px -1386px !important;
width: 26px;
}

div.panel-header div.tools div.save_begin:hover {
background-position: -28px -1386px !important;
}

div.panel-header div.tools div.help {
background-position: -4px -1512px;
}

div.panel-header div.tools div.help:hover {
background-position: -29px -1512px;
}

div.panel-header div.tools div.help_middle {
background-position: -4px -1494px !important;
}

div.panel-header div.tools div.help_middle:hover {
background-position: -29px -1494px !important;
}

div.panel-header div.tools div.help_end {
background-position: 0 -1476px !important;
width: 27px;
}

div.panel-header div.tools div.help_end:hover {
background-position: -27px -1476px !important;
}

div.panel-header div.tools div.help_begin {
background-position: -2px -1458px !important;
width: 26px;
}

div.panel-header div.tools div.help_begin:hover {
background-position: -28px -1458px !important;
}

div.panel-header div.tools div.print {
background-position: -4px -1584px;
}

div.panel-header div.tools div.print:hover {
background-position: -29px -1584px;
}

div.panel-header div.tools div.print_middle {
background-position: -4px -1566px !important;
}

div.panel-header div.tools div.print_middle:hover {
background-position: -29px -1566px !important;
}

div.panel-header div.tools div.print_end {
background-position: 0 -1548px !important;
width: 27px;
}

div.panel-header div.tools div.print_end:hover {
background-position: -27px -1548px !important;
}

div.panel-header div.tools div.print_begin {
background-position: -2px -1530px !important;
width: 26px;
}

div.panel-header div.tools div.print_begin:hover {
background-position: -28px -1530px !important;
}

/* End Tools **/

div.panel-bwrap {
height: 100%;
overflow: hidden;
}

div.panel-ml {
height: 100%;
padding-left: 6px;
}

div.panel-ml div.panel-mr {
padding-right: 6px;
height: 100%;
}

div.panel-ml div.panel-mr div.panel-mc {
background-color: #fff;
border: 1px solid #99bbe8;
overflow: hidden;
}

div.panel-mc div.content {
height: 100%;
margin: 0px;
width: 100%;
}

div.panel-mc div.content div.body {
height: 100%;
text-align: left;
width: 100%;
}

div.panel-mc div.content div.body div.heading {
font-size: 20pt;
padding: 5px;
padding-bottom: 2px;
padding-top: 10px;
text-align: center;
}

div.panel-bl {
height: 6px;
padding-left: 6px;
}

div.panel-bl div.panel-br {
padding-right: 6px;
}

div.panel-bl div.panel-br div.panel-bc {
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
margin: 11px;
text-align: center;
}

div#loading div.dialog div.content div.heading {
background-image: url(i/icons/loading.gif);
background-repeat: no-repeat;
background-position: 9px 6px;
color: #000;
font-size: 16pt;
margin: 11px;
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
background-color: #ffffff;
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
position: absolute;
top: 0;
width: 100%;
}

div#desktop div.desktop-body {
left: 0;
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
background-image: url(i/apps/thumbs/grid.gif);
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

<?php
$panel_bg = array('wave.jpg','splash_bg.jpg','splash_bg2.jpg','splash_bg3.jpg');
$bg = rand(0,3);
?>

div#login div.panel-mc {
background-color: #fff;
background-image: url(i/apps/splash/<?php echo $panel_bg[$bg]; ?>);
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

div#register div.panel-mc {
background-color: #dee;
background-image: none;
overflow: auto;
}

div#register div.panel-mc div.content div.body {
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

div#register table tr.error {
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

div#register input[type="goom_radio"] {
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

div#register img#captcharefresh {
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
display: block;
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
background-position: 50% 50%;
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

div.startmenu-mc div.startmenu-body div.apps ul.apps-menu-list {

}

div.startmenu-mc div.startmenu-body div.apps ul.apps-menu-list a.menu-item {
color: #000;
}

div.startmenu-mc div.startmenu-body div.apps ul.apps-menu-list a.menu-item:hover {
background-color: #e0e0e0;
}

div.startmenu-mc div.startmenu-body div.tools {
height: 339px;
left: 179px;
overflow: hidden;
position: absolute;
top: 0;
width: 144px;
}

div.startmenu-mc div.startmenu-body div.tools div.tools-menu {
width: 100%;
}

div.startmenu-mc div.startmenu-body div.tools a.menu-item {
color: #fff;
}

div.startmenu-mc div.startmenu-body div.tools a.menu-item:hover {
background-color: #666;
}

div.startmenu-mc div.startmenu-body div.tools ul.tools-menu-list {
}

div.startmenu-mc div.startmenu-body div.tools ul.tools-logout-list {
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
left: 110px;
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
width: 110px;
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
width: 60px;
}

/* End Quickstart ***/
/*** Begin Taskbuttons */

div#taskbar div#taskbuttons-panel {
height: 100%;
left: 60px;
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

div#taskbar ul#taskbuttons-strip button[type="button"].taskbutton {
background-color: transparent;
background-image: url(i/apps/icons/application.png);
background-repeat: no-repeat;
background-position: 2px 6px;
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

div#taskbar div.tray-strip-wrap ul#tray-strip li .traybutton {
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
/*** Begin Icons (Header) */
/**** Begin Panels */

div#login div.panel-header {
background-image: url(i/icons/padlock.png);
}

div#register div.panel-header {
background-image: url(i/apps/icons/friends.png);
}

/* End Panels ****/

div#documents div.panel-header {
background-image: url(i/icons/disk.png);
}

div#preferences div.panel-header {
background-image: url(i/apps/icons/preferences.png);
}

div#notepad div.panel-header {
background-image: url(i/apps/icons/notepad.png);
}

div#flash_name div.panel-header {
background-image: url(i/apps/icons/flash_name.png);
}

div#ytinstant div.panel-header {
background-image: url(i/apps/icons/ytinstant.png);
}

div#piano div.panel-header {
background-image: url(i/apps/icons/piano.png);
}

div#about_hnsdesktop div.panel-header {
background-image: url(i/apps/icons/info.png);
}

div#feedback div.panel-header {
background-image: url(i/apps/icons/feedback.png);
}

div#tic_tac_toe div.panel-header {
background-image: url(i/apps/icons/tic_tac_toe.png);
}

div#friends div.panel-header {
background-image: url(i/apps/icons/friends.png);
}

div#goom_radio div.panel-header {
background-image: url(i/apps/icons/goom_radio.png);
}

div#search div.panel-header {
background-image: url(i/icons/zoom.png);
}

div#chat div.panel-header {
background-image: url(i/apps/icons/chat.png);
}

div#music div.panel-header {
background-image: url(i/apps/icons/music.png);
}

div#web_browser div.panel-header {
background-image: url(i/apps/icons/web_browser.png);
}

/* End Icons (Header) ***/
/*** Begin Icons (Class) */
/**** Begin Panels */

.icon-logout {
background-image: url(i/icons/disconnect.png);
}

/* End Panels ****/

.icon-documents {
background-image: url(i/icons/disk.png);
}

.icon-preferences {
background-image: url(i/apps/icons/preferences.png);
}

.icon-notepad {
background-image: url(i/apps/icons/notepad.png);
}

.icon-piano {
background-image: url(i/apps/icons/piano.png);
}

.icon-flash_name {
background-image: url(i/apps/icons/flash_name.png);
}

.icon-ytinstant {
background-image: url(i/apps/icons/ytinstant.png);
}

.icon-about_hnsdesktop {
background-image: url(i/apps/icons/info.png);
}

.icon-feedback {
background-image: url(i/apps/icons/feedback.png);
}

.icon-tic_tac_toe {
background-image: url(i/apps/icons/tic_tac_toe.png);
}

.icon-friends {
background-image: url(i/apps/icons/friends.png);
}

.icon-goom_radio {
background-image: url(i/apps/icons/goom_radio.png);
}

.icon-search {
background-image: url(i/icons/zoom.png);
}

.icon-chat {
background-image: url(i/apps/icons/chat.png);
}

.icon-music {
background-image: url(i/apps/icons/music.png);
}

.icon-web_browser {
background-image: url(i/apps/icons/web_browser.png);
}

/* End Icons (Class) ***/
/*** Begin Icons (Taskbutton) */


div#taskbar button[type="button"]#taskbutton-documents {
background-image: url(i/icons/disk.png) !important;
}

div#taskbar button[type="button"]#taskbutton-preferences {
background-image: url(i/apps/icons/preferences.png) !important;
}

div#taskbar button[type="button"]#taskbutton-notepad {
background-image: url(i/apps/icons/notepad.png) !important;
}

div#taskbar button[type="button"]#taskbutton-flash_name {
background-image: url(i/apps/icons/flash_name.png) !important;
}

div#taskbar button[type="button"]#taskbutton-ytinstant {
background-image: url(i/apps/icons/ytinstant.png) !important;
}

div#taskbar button[type="button"]#taskbutton-piano {
background-image: url(i/apps/icons/piano.png) !important;
}

div#taskbar button[type="button"]#taskbutton-about_hnsdesktop {
background-image: url(i/apps/icons/info.png) !important;
}

div#taskbar button[type="button"]#taskbutton-feedback {
background-image: url(i/apps/icons/feedback.png) !important;
}

div#taskbar button[type="button"]#taskbutton-tic_tac_toe {
background-image: url(i/apps/icons/tic_tac_toe.png) !important;
}

div#taskbar button[type="button"]#taskbutton-friends {
background-image: url(i/apps/icons/friends.png) !important;
}

div#taskbar button[type="button"]#taskbutton-goom_radio {
background-image: url(i/apps/icons/goom_radio.png) !important;
}

div#taskbar button[type="button"]#taskbutton-search {
background-image: url(i/icons/zoom.png) !important;
}

div#taskbar button[type="button"]#taskbutton-chat {
background-image: url(i/apps/icons/chat.png) !important;
}

div#taskbar button[type="button"]#taskbutton-music {
background-image: url(i/apps/icons/music.png) !important;
}

div#taskbar button[type="button"]#taskbutton-web_browser {
background-image: url(i/apps/icons/web_browser.png) !important;
}

/* End Icons (Taskbutton) ***/
/*** Begin Icons (Thumb) */

div#desktop div.desktop-body div#thumb-documents div.thumb-button img {
background-image: url(i/apps/thumbs/documents.png) !important;
}

div#desktop div.desktop-body div#thumb-preferences div.thumb-button img {
background-image: url(i/apps/thumbs/preferences.png) !important;
}

div#desktop div.desktop-body div#thumb-notepad div.thumb-button img {
background-image: url(i/apps/thumbs/notepad.png) !important;
}

div#desktop div.desktop-body div#thumb-flash_name div.thumb-button img {
background-image: url(i/apps/thumbs/flash_name.png) !important;
}

div#desktop div.desktop-body div#thumb-ytinstant div.thumb-button img {
background-image: url(i/apps/thumbs/ytinstant.png) !important;
}

div#desktop div.desktop-body div#thumb-piano div.thumb-button img {
background-image: url(i/apps/thumbs/piano.png) !important;
}

div#desktop div.desktop-body div#thumb-about_hnsdesktop div.thumb-button img {
background-image: url(i/apps/thumbs/info.png) !important;
}

div#desktop div.desktop-body div#thumb-feedback div.thumb-button img {
background-image: url(i/apps/thumbs/feedback.png) !important;
}

div#desktop div.desktop-body div#thumb-tic_tac_toe div.thumb-button img {
background-image: url(i/apps/thumbs/tic_tac_toe.png) !important;
}

div#desktop div.desktop-body div#thumb-friends div.thumb-button img {
background-image: url(i/apps/thumbs/friends.png) !important;
}

div#desktop div.desktop-body div#thumb-goom_radio div.thumb-button img {
background-image: url(i/apps/thumbs/goom_radio.png) !important;
}

div#desktop div.desktop-body div#thumb-search div.thumb-button img {
background-image: url(i/apps/thumbs/search.png) !important;
}

div#desktop div.desktop-body div#thumb-chat div.thumb-button img {
background-image: url(i/apps/thumbs/chat.png) !important;
}

div#desktop div.desktop-body div#thumb-music div.thumb-button img {
background-image: url(i/apps/thumbs/music.png) !important;
}

div#desktop div.desktop-body div#thumb-web_browser div.thumb-button img {
background-image: url(i/apps/thumbs/web_browser.png) !important;
}

/* End Icons (Thumb) ***/
/* End Icons **/
/** Begin Apps */
/*** Begin Documents */

/* End Documents ***/
/*** Begin Preferences */

div#preferences {
}

div#preferences div.panel-mc {
background-image: none;
overflow: none;
}

div#preferences div#splash {
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

div#preferences div#splash ul li.thumbs img {
background-image: url(i/ux/preferences/thumbs.png);
}

div#preferences div#splash ul li.autorun img {
background-image: url(i/ux/preferences/autorun.png);
}

div#preferences div#splash ul li.quickstart img {
background-image: url(i/ux/preferences/quickstart.png);
}

div#preferences div#splash ul li.themes img {
background-image: url(i/ux/preferences/appearance.png);
}

div#preferences div#splash ul li.wallpaper img {
background-image: url(i/ux/preferences/wallpaper.png);
}

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

/**** Begin Wallpaper */

div#preferences div#wallpaper {
background-color: #ecffff;
background-image: none;
height: 100%;
overflow: none;
width: 100%;
}

div#preferences div#wallpaper div#slideshow {
height: 100%;
overflow-y: auto;
padding: 5px;
width: 100%;
}

div#preferences div#wallpaper div#slideshow img.thumbnail {
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

div#preferences div#wallpaper div#slideshow img.thumbnail:hover {
border: 2px solid #99bbe8;
}

div#preferences div#wallpaper div#config {
display: none;
}

/* End Wallpaper ****/
/* End Preferences ***/
/*** Begin Notepad */

div#notepad div.panel-mc {
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

div#ytinstant {
}

div#ytinstant div.panel-header div.tools div.refresh {
margin-right: 0 !important;
}

div#ytinstant div.panel-header div.tools div.plus {
margin-right: 0 !important;
}

div#ytinstant div.panel-mc {
background-color: #eeeff4;
color: #000;
font-size: 12px;
}

div#ytinstant #wrapper {
margin: 30px auto;
width: 1000px;
}

div#ytinstant a:link,
div#ytinstant a:visited {
color: #3b5998;
text-decoration: none;
}

div#ytinstant a:hover,
div#ytinstant a:active,
.underline:link,
.underline:visited {
text-decoration: underline;
}

div#ytinstant #logo {
float: left;
margin: 0 15px 0 0;
}

div#ytinstant #logo div {
background: transparent url(i/apps/ytinstant/logo2.png) no-repeat top left;
display: block;
height: 32px;
width: 180px;
}

div#ytinstant #logo span {
display: none;
}

div#ytinstant #header {
margin: 0 0 20px;
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
padding: 0 5px 0 4px;
width: 340px;
}

div#ytinstant input[type="text"]#searchBox:focus {
border: 2px solid #000;
}

div#ytinstant #searchTermKeyword {
font-family: 'Reenie Beanie', arial, serif;
font-size: 30px;
}

div#ytinstant .statusLoading {
background: #fff url(i/apps/ytinstant/loading.gif) no-repeat 325px 50%;
}

div#ytinstant .statusPlaying {
background: #fff url(i/apps/ytinstant/playing.gif) no-repeat 325px 50%;
}

div#ytinstant #main {
margin: 20px 0 0;
}

div#ytinstant #hidden {
display: none;
height: 0;
}

div#ytinstant #videoDiv {
float: left;
margin: 0 10px 0 0;
}

div#ytinstant #videoTools {
margin: 10px 0 0;
padding: 10px;
width: 695px;
}

div#ytinstant .boxText {
font-weight: 700;
margin-right: 10px;
}

div#ytinstant div#playlistWrapper {
display: none;
float: left;
height: 405px;
overflow-x: hidden;
overflow-y: auto;
position: relative;
vertical-align: top;
width: 270px;
}

div#ytinstant div#playlistWrapper div#playlist img {
clear: both;
float: left;
height: 90px;
margin: 0 5px 12px 0;
vertical-align: top;
width: 120px;
}

div#ytinstant  div#playlistWrapper div#playlist div {
float: left;
font-size: 12px;
height: 40px;
margin: 6px 0 0;
width: 125px;
}

div#ytinstant div#playlistWrapper div#playlist a {
display: block;
width: 260px;
}

div#ytinstant #buttonControl {
left: 44px;
position: absolute;
top: 32px;
z-index: 1000;
}

div#ytinstant .play0 #buttonControl {
top: 32px;
}

div#ytinstant .play1 #buttonControl {
top: 136px;
}

div#ytinstant .play2 #buttonControl {
top: 237px;
}

div#ytinstant .play3 #buttonControl {
top: 338px;
}

div#ytinstant .play4 #buttonControl {
top: 439px;
}

div#ytinstant .play5 #buttonControl {
top: 540px;
}

div#ytinstant .play6 #buttonControl {
top: 641px;
}

div#ytinstant .play7 #buttonControl {
top: 742px;
}

div#ytinstant .play8 #buttonControl {
top: 843px;
}

div#ytinstant .play9 #buttonControl {
top: 944px;
}

div#ytinstant #buttonControl a {
display: block;
height: 32px;
width: 32px;
}

div#ytinstant .playButton #buttonControl {
background: transparent url(i/apps/ytinstant/player_play-1.png) no-repeat top left;
}

div#ytinstant .pauseButton #buttonControl {
background: transparent url(i/apps/ytinstant/player_pause-1.png) no-repeat top left;
}

div#ytinstant #footer {
font-size: 12px;
margin: 20px 0 0;
}

div#ytinstant .boxHeader {
font-family: 'Josefin Sans Std Light', arial, serif;
font-size: 30px;
margin: 0 0 7px;
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

div#ytinstant del,
div#ytinstant ins,
div#ytinstant .underline:hover,
div#ytinstant .underline:active {
text-decoration: none;
}

div#ytinstant sup,
div#ytinstant sub {
vertical-align: baseline;
}

div#ytinstant strong,
div#ytinstant .selectedThumb {
font-weight: 700;
}

div#ytinstant #searchDiv {
float: left;
}

div#ytinstant div#userPlaylist {
display: none;
float: left;
height: 405px;
position: relative;
vertical-align: top;
width: 270px;
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
width: 245px;
}

div#ytinstant div#userPlaylist div#playlistInput input[type="text"]#playlistBox:focus {
border: 2px solid #000;
}

div#ytinstant div#userPlaylist div#playlist {
height: 365px;
overflow-x: hidden;
overflow-y: auto;
width: 258px;
}

div#ytinstant div#userPlaylist div#playlist div#container {
width: 255px;
}

div#ytinstant div#userPlaylist div#playlist div.searchItem {
background-color: #99bbe8;
border: 1px solid #999;
border-radius: 4px;
-khtml-border-radius: 4px;
-moz-border-radius: 4px;
-opera-border-radius: 4px;
-webkit-border-radius: 4px;
cursor: pointer;
float: left;
font-family: 'Reenie Beanie', arial, serif;
font-size: 14px;
font-weight: bold;
margin: 1px;
padding: 2px 6px;
}

div#ytinstant div#userPlaylist div#playlist div.searchItem:hover {
background-color: #88aadd;
border: 1px solid #888;
}

/* End YTInstant ***/
/*** Begin Piano */

div#piano div.panel-mc {
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

/* End About HnS Desktop ***/
/*** Begin Feedback */

/* End Feedback ***/
/* Begin Tic Tac Toe ***/

div#tic_tac_toe div.panel-mc {
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
box-shadow: 0px 2px 5px black;
-moz-box-shadow: 0px 2px 5px #000;
-o-box-shadow: 0px 2px 5px #000;
-webkit-box-shadow: 0px 2px 5px #000;
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

div#friends div.panel-mc {
overflow: auto;
}

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

div#search div.panel-mc {
overflow: auto;
}

/* End Search ***/
/*** Begin Chat */

div#chat div.panel-mc {
}

div#chat div#chatarea {
background-color: #ffffff;
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
/* End Apps **/
/* End User Interface */