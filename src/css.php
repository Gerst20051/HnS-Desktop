<?php
session_start();
header("Content-Type: text/css");
?>

/* Universal Style Sheets */
/* Global Layout */

html, body {
background-color: #ffffff;
background-image: url('i/wallpapers/vista.jpg');
background-position: center center;
background-repeat: no-repeat;
color: #000000;
font-family: tahoma, arial, verdana, sans-serif;
font-size: 12px;
height: 100%;
margin: 0 auto;
overflow: hidden;
padding: 0 auto;
width: 100%;
}

/*
html, body {
height: 100%;
margin: 0 auto;
overflow: hidden;
padding: 0 auto;
width: 100%;
}
*/

div.transparent {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=50)";
filter: alpha(opacity=50);
-moz-opacity: 0.5;
-khtml-opacity: 0.5;
opacity: 0.5;
}

 /* Begin Drag/Resize */
 
.drsElement {
position: absolute;
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
/* Begin Panel */

div.panel {
background-color: #333;
border: 1px solid #99bbe8;
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
height: 100%;
overflow: hidden;
}

div.panel-tl {
border-top-left-radius: 4px;
border-top-right-radius: 4px;
-moz-border-radius-topleft: 4px;
-moz-border-radius-topright: 4px;
-webkit-border-top-left-radius: 4px;
-webkit-border-top-right-radius: 4px;
height: 24px;
padding-left: 6px;
}

div.panel-tl div.panel-tr {
padding-right: 6px;
}

div.panel-tl div.panel-tr div.panel-tc {

}

div.panel-tl div.panel-tr div.panel-tc div.panel-header {
background-image: url('i/bogus.png');
background-position: 0 4px;
background-repeat: no-repeat;
cursor: move;
width: 100%;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header span.panel-header-text {
color: #ffffff;
font: normal normal bold 11px/normal tahoma, arial, verdana, sans-serif;
line-height: 26px;
padding-left: 20px !important;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools {
height: 18px;
overflow: hidden;
position: absolute;
right: 6px;
top: 1px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.tool {
background-repeat: no-repeat;
cursor: pointer;
float: right;
height: 18px;
overflow: hidden;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.close {
background-image: url('i/ux-tools.gif');
background-position: 0 0;
width: 44px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.close:hover {
background-position: -44px 0;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.maximize {
background-image: url('i/ux-tools.gif');
background-position: -38px -36px;
width: 25px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.maximize:hover {
background-position: -63px -36px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.restore {
background-image: url('i/ux-tools.gif');
background-position: -38px -54px;
width: 25px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.restore:hover {
background-position: -63px -54px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.minimize {
background-image: url('i/ux-tools.gif');
background-position: -36px -18px;
width: 26px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.minimize:hover {
background-position: -62px -18px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.toggle {
background-image: url('i/ux-tools.gif');
background-position: -38px -72px;
margin-right: 3px;
width: 25px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.toggle:hover {
background-position: -63px -72px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.toggledown {
background-position: -38px -90px;
}

div.panel-tl div.panel-tr div.panel-tc div.panel-header div.tools div.toggledown:hover {
background-position: -63px -90px;
}

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

<?php
$panel_bg = array('wave.jpg','splash_bg.jpg','splash_bg2.jpg','splash_bg3.jpg');
$bg = rand(0,3);
?>


div.panel-ml div.panel-mr div.panel-mc {
background-color: #ffffff;
background-image: url('i/<?php echo $panel_bg[$bg]; ?>');
background-repeat: no-repeat;
background-position: top center;
border: 1px solid #99bbe8;
height: 100%;
overflow: hidden;
}

div.panel-ml div.panel-mr div.panel-mc div.content {
margin: 5px;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.heading {
font-size: 20pt;
padding: 5px;
padding-bottom: 2px;
padding-top: 10px;
text-align: center;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body {
padding: 5px;
padding-top: 0;
padding-bottom: 0;
text-align: left;
}

div.panel-bl {
height: 6px;
padding-left: 6px;
z-index: 101;
}

div.panel-bl div.panel-br {
padding-right: 6px;
z-index: 101;
}

div.panel-bl div.panel-br div.panel-bc {
padding-bottom: 6px;
z-index: 101;
}

/* End Panel */
/* Begin Panel Icons */

div#login div.panel-header {
background-image: url('i/padlock.png');
}

div#register div.panel-header {
background-image: url('i/friends.png');
}

/* End Panel Icons */
/* Begin Dialog */

div.dialog {
background-color: #fff;
border: 2px solid #99bbe8;
border-radius: 10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
height: 100%;
overflow: hidden;
width: 100%;
}

div.dialog div.content {
}

div.dialog div.content div.heading {
color: #000000;
font-size: 16pt;
margin: 11px;
text-align: center;
}

div#loading div.dialog div.content div.heading {
background-image: url('i/loading.gif');
background-repeat: no-repeat;
background-position: 9px 6px;
color: #000000;
font-size: 16pt;
margin: 11px;
padding-left: 42px;
text-align: left;
}

div#notice div.dialog div.content div.heading {
}

/* End Dialog */
/* Begin Global Pages */
/* End Global Pages */
/* Begin Main | Apply To Every Page */

div#main {
height: 100%;
width: 100%;
}

div#blackout {
background-color: #000000;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
filter: alpha(opacity=60);
height: 100%;
-moz-opacity: 0.6;
-khtml-opacity: 0.6;
opacity: 0.6;
width: 100%;
}

div#whiteout {
background-color: #ffffff;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
filter: alpha(opacity=60);
height: 100%;
-moz-opacity: 0.6;
-khtml-opacity: 0.6;
opacity: 0.6;
width: 100%;
}

/* End Main */
/* Begin Splash */

div.fullscreen {
height: 100% !important;
left: 0 !important;
top: 0 !important;
width: 100% !important;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body {
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body table td {
vertical-align: middle;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.label {
padding: 6px;
text-align: right;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input {
padding: 6px;
text-align: left;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input input[type="text"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input input[type="password"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input input[type="checkbox"] {
height: 35px;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body span {
float: right;
margin-top: 4px;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body span input[type="submit"] {
cursor: pointer;
font-size: 10pt;
height: 33px;
letter-spacing: 2px;
line-height: 26px;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body span input[type="reset"] {
cursor: pointer;
font-size: 10pt;
height: 33px;
letter-spacing: 2px;
line-height: 26px;
}

div.panel-ml div.panel-mr div.panel-mc div.content div.body span input[type='button'] {
cursor: pointer;
font-size: 10pt;
height: 33px;
letter-spacing: 2px;
line-height: 26px;
}

div#logout div.panel-ml div.panel-mr div.panel-mc div.content div.body {
text-align: center;
}

div#logout div.panel-ml div.panel-mr div.panel-mc div.content div.body input[type="submit"]#logout {
cursor: pointer;
font-size: 50pt;
height: 135px;
letter-spacing: 2px;
margin: 14px;
width: 360px;
}

/* End Splash */
/* Begin User Interface */
/**  Begin Desktop */

div#desktop {
background-color: transparent;
display: block;
left: 0;
position: absolute;
top: 0;
width: 100%;
}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb {

}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb div.thumb-button {

}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb div.thumb-button img {

}

/*** Begin Desktop Thumbs */

div#desktop div#desktop-view div.desktop-body div#thumb-notepad {

}

/* End Desktop Thumbs ***/
/* End Desktop **/
/** Begin Taskbar */

div#taskbar {
background: transparent url(i/taskbar/taskbar-bg.gif) repeat-x left top;
bottom: 0;
display: block;
left: 0;
overflow: hidden;
position: absolute;
width: 100%;
}

div#taskbar div#start {
height: 100%;
width: 110px;
}

div#taskbar div#panel-wrap {
height: 100%;
left: 110px;
position: absolute;
top: 0;
}

div#taskbar div#panel-wrap div#quickstart-panel {
height: 100%;
left: 0;
position: absolute;
top: 0;
width: 60px;
}

div#taskbar div#panel-wrap div#taskbuttons-panel {
height: 100%;
left: 60px;
position: absolute;
top: 0;
}

div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap {
height: 100%;
left: 0;
position: absolute;
top: 0;
}

div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip {
height: 100%;
list-style: none;
margin: 0;
padding: 0;
}

div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip li {
float: left;
height: 100%;
margin-left: 2px;
}

div#taskbar div#panel-wrap div#tray-panel {
height: 100%;
position: absolute;
right: 0;
top: 0;
width: 75px;
}

div#taskbar div.splitbar {
background: transparent url(i/taskbar/taskbar-split-h.gif) no-repeat 0 0;
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

/* End Taskbar **/
/* End User Interface */