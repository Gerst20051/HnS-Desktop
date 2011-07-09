<?php
session_start();
header("Content-Type: text/css");
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Style Sheet  <<< ----------- */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    HnS Desktop
/* Site Creator: Andrew Gerst
/* Site Created: 03/25/2010
/* Last Updated: <?php echo date("m") . "/" , (date("d") - 1) . "/" . date("Y") . "\n"; ?>
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* CSS Reset
/* CCS Base
/* Buttons
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
/* ---------------------------------------------------- */

/* Begin CSS Reset */

html {
background-color: #fff;
color: #000;
font-size: 100.01%; /* 16px */
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
background-color: #fff;
background-image: url('i/wallpapers/vista.jpg');
background-position: center center;
background-repeat: no-repeat;
color: #000;
font-family: tahoma, arial, verdana, sans-serif;
font-size: 1em;
height: 100%;
line-height: 1.4;
margin: 0 auto;
overflow: hidden;
padding: 0 auto;
width: 100%;
}

h1 {
font-size: 138.5%; /* 18px */
}

h2 {
font-size: 123.1%; /* 16px */
}

h3 {
font-size: 108%; /* 14px */
}

h1, h2, h3 {
margin: 1em 0; /* top & bottom margin based on font size */
}

h1, h2, h3, h4, h5, h6, strong {
font-weight: bold; /* bringing boldness back to headers and the strong element */
}

abbr, acronym { /* indicating to users that more info is available */
border-bottom: 1px dotted #000;
cursor: help;
}

em {
font-style: italic; /* bringing italics back to the em element */
}

blockquote, ul, ol, dl {
margin: 1em; /* giving blockquotes and lists room to breath */
}

ol, ul, dl {
margin-left: 2em; /* bringing lists on to the page with breathing room */
}

ol li {
list-style: decimal outside; /* giving OL's LIs generated numbers */
}

ul li {
list-style: disc outside; /* giving UL's LIs generated disc markers */
}

dl dd {
margin-left: 1em;
}

th, td { /* borders and padding to make the table readable */
border: 1px solid #000;
padding: .5em;
}

th { /* distinguishing table headers from data cells */
font-weight: bold;
text-align: center;
}

caption {
margin-bottom: .5em; /* coordinated marking to match cell's padding */
text-align: center; /* centered so it doesn't blend in to other content */
}

p, fieldset, table {
margin-bottom: 1em; /* so things don't run into each other */
}

/* End CSS Base */
/* Begin Buttons */

.buttons a,
.buttons button {
display: block;
float: left;
margin: 0 7px 0 0;
background-color: #f5f5f5;
border: 1px solid #dedede;
border-top: 1px solid #eee;
border-left: 1px solid #eee;
font-family: "Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
font-size: 10pt; /* 100% */
line-height: 130%;
text-decoration: none;
font-weight: bold;
color: #565656;
cursor: pointer;
padding: 5px 10px 6px 7px; /* Links */
}

.buttons button {
width: auto;
overflow: visible;
padding: 4px 10px 3px 7px; /* IE6 */
}

.buttons button[type] {
padding: 5px 10px 5px 7px; /* Firefox */
line-height: 17px; /* Safari */
}

*:first-child+html button[type] {
padding: 4px 10px 3px 7px; /* IE7 */
}

.buttons button img,
.buttons a img {
margin: 0 3px -3px 0 !important;
padding: 0;
border: none;
width: 16px;
height: 16px;
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
color:#529214;
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

/* End Buttons */

/* ----------------------------------------------------- */
/* -------------- >>>  Global Layout  <<< -------------- */
/* ----------------------------------------------------- */

/* Begin Main */

div#main {
height: 100%;
overflow: hidden;
width: 100%;
}

div#blackout {
background-color: #000;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
filter: alpha(opacity=60);
height: 100%;
-moz-opacity: 0.6;
-khtml-opacity: 0.6;
opacity: 0.6;
width: 100%;
}

div#whiteout {
background-color: #fff;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
filter: alpha(opacity=60);
height: 100%;
-moz-opacity: 0.6;
-khtml-opacity: 0.6;
opacity: 0.6;
width: 100%;
}

/* End Main */
/* Begin Transparency */

.transparent1 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=10)" !important;
filter: alpha(opacity=10) !important;
-moz-opacity: 0.1 !important;
-khtml-opacity: 0.1 !important;
opacity: 0.1 !important;
}

.transparent2 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=20)" !important;
filter: alpha(opacity=20) !important;
-moz-opacity: 0.2 !important;
-khtml-opacity: 0.2 !important;
opacity: 0.2 !important;
}

.transparent3 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)" !important;
filter: alpha(opacity=30) !important;
-moz-opacity: 0.3 !important;
-khtml-opacity: 0.3 !important;
opacity: 0.3 !important;
}

.transparent4 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=40)" !important;
filter: alpha(opacity=40) !important;
-moz-opacity: 0.4 !important;
-khtml-opacity: 0.4 !important;
opacity: 0.4 !important;
}

.transparent5 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=50)" !important;
filter: alpha(opacity=50) !important;
-moz-opacity: 0.5 !important;
-khtml-opacity: 0.5 !important;
opacity: 0.5 !important;
}

.transparent6 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)" !important;
filter: alpha(opacity=60) !important;
-moz-opacity: 0.6 !important;
-khtml-opacity: 0.6 !important;
opacity: 0.6 !important;
}

.transparent7 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=70)" !important;
filter: alpha(opacity=70) !important;
-moz-opacity: 0.7 !important;
-khtml-opacity: 0.7 !important;
opacity: 0.7 !important;
}

.transparent8 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=80)" !important;
filter: alpha(opacity=80) !important;
-moz-opacity: 0.8 !important;
-khtml-opacity: 0.8 !important;
opacity: 0.8 !important;
}

.transparent9 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=90)" !important;
filter: alpha(opacity=90) !important;
-moz-opacity: 0.9 !important;
-khtml-opacity: 0.9 !important;
opacity: 0.9 !important;
}

.transparent10 {
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=100)" !important;
filter: alpha(opacity=100) !important;
-moz-opacity: 1 !important;
-khtml-opacity: 1 !important;
opacity: 1 !important;
}

/* End Transparency */
/* Begin Floating & Clearing */

.clear {
clear: both !important;
}

.right {
float: right !important;
}

.left {
float: left !important;
}

/* End Floating & Clearing */
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
color: #fff;
font: normal normal bold 11px/normal tahoma, arial, verdana, sans-serif;
line-height: 26px;
padding-left: 20px !important;
}

/** Begin Tools */

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

<?php
$panel_bg = array('wave.jpg','splash_bg.jpg','splash_bg2.jpg','splash_bg3.jpg');
$bg = rand(0,3);
?>


div.panel-ml div.panel-mr div.panel-mc {
background-color: #fff;
background-image: url('i/<?php echo $panel_bg[$bg]; ?>');
background-repeat: no-repeat;
background-position: top center;
border: 1px solid #99bbe8;
height: 100%;
overflow: auto;
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
}

div.panel-bl div.panel-br {
padding-right: 6px;
}

div.panel-bl div.panel-br div.panel-bc {
padding-bottom: 6px;
}

/** Begin Panel Icons */
/*** Begin Logged Out Icons */

div#login div.panel-header {
background-image: url('i/padlock.png');
}

div#register div.panel-header {
background-image: url('i/friends.png');
}

/* End Logged Out Icons ***/
/*** Begin Logged In Icons */

div#logout div.panel-header {
background-image: url('i/logout2.png');
}

div#notepad div.panel-header {
background-image: url('i/notepad.png');
}

div#preferences div.panel-header {
background-image: url('i/preferences.png');
}

/* End Logged In Icons ***/
/* End Panel Icons **/
/* End Panel */
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
color: #000;
font-size: 16pt;
margin: 11px;
text-align: center;
}

div#loading div.dialog div.content div.heading {
background-image: url('i/loading.gif');
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

/* End Splash **/
/**  Begin Desktop */

div#desktop {
background-color: transparent;
display: block;
left: 0;
position: absolute;
top: 0;
width: 100%;
}

div#desktop div#desktop-view {
width: 100%;
}

div#desktop div#desktop-view div.desktop-body {
width: 100%;
}

/*** Begin Desktop Thumbs */

div#desktop div#desktop-view div.desktop-body div.desktop-thumb {
border: 1px solid transparent;
border-radius: 8px;
-moz-border-radius: 8px;
-webkit-border-radius: 8px;
cursor: pointer;
margin: 6px;
}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb:hover {
border: 1px solid #99bbe8;
background-color: #fff;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)" !important;
filter: alpha(opacity=30) !important;
-moz-opacity: 0.3 !important;
-khtml-opacity: 0.3 !important;
opacity: 0.3 !important;
}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb-selected {
background-color: fff;
border: 1px solid #99bbe8;
}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb div.thumb-button {
margin: 4px 0 0 0;
padding: 5px;
text-align: center;
}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb div.thumb-button img {
background-image: url('i/thumb/grid.gif');
border-width: 0;
height: 48px;
width: 48px;
}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb div.thumb-name {
color: #fff;
cursor: pointer;
font-size: 85%;
margin: 0 auto;
margin-bottom: 10px;
text-align: center;
text-transform: capitalize;
width: 100%;
}

div#desktop div#desktop-view div.desktop-body div.desktop-thumb:hover div.thumb-name {
color: #99bbe8;
}

/**** Begin Desktop Thumb Icons */

div#desktop div#desktop-view div.desktop-body div#thumb-logout div.thumb-button img {
background-image: url('i/thumb/logout2.png') !important;
}

div#desktop div#desktop-view div.desktop-body div#thumb-notepad div.thumb-button img {
background-image: url('i/thumb/notepad.png') !important;
}

div#desktop div#desktop-view div.desktop-body div#thumb-preferences div.thumb-button img {
background-image: url('i/thumb/preferences.png') !important;
}

/* End Desktop Thumb Icons ****/
/* End Desktop Thumbs ***/
/*** Begin Login */

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body form#login {
margin: 0;
}

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body table td {
border: 0;
vertical-align: middle;
}

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.label {
font-size: 75%;
padding: 6px;
text-align: right;
}

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input {
padding: 6px;
text-align: left;
}

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input input[type="text"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input input[type="password"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body table td.input input[type="checkbox"] {
float: left;
height: 35px;
}

div#login div.panel-ml div.panel-mr div.panel-mc div.content div.body div {
float: right;
margin-top: 4px;
}

/* End Login ***/
/*** Begin Logout */

div#logout div.panel-ml div.panel-mr div.panel-mc div.content div.body input[type="submit"]#logout {
cursor: pointer;
font-size: 50pt;
height: 135px;
letter-spacing: 2px;
margin: 14px;
width: 360px;
}

div#logout div.panel-ml div.panel-mr div.panel-mc div.content div.body {
text-align: center;
}

/* End Logout ***/
/*** Begin Preferences */

div#preferences div.content div.body {
}

/* End Preferences ***/
/*** Begin Notepad */

div#notepad div.content {
margin: 0 auto;
margin-bottom: 40px;
margin-right: 6px;
}

div#notepad div.content div.body {
height: 100%;
padding: 5px;
}

div#notepad textarea {
height: 100%;
width: 100%;
}

/* End Notepad ***/
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

div#taskbar div#panel-wrap {
height: 100%;
left: 110px;
position: absolute;
top: 0;
}

/*** Begin Splitbars */

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
background-image: url('i/taskbar/startbutton.gif');
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

div#taskbar div#start table:hover td.start-left { /* background-position: 0 -90px; - click: background-position: 0 -180px; */
background-position: 0 -270px;
}

div#taskbar div#start td.start-center {
background-repeat: repeat-x;
background-position: 0 -60px;
}

div#taskbar div#start table:hover td.start-center { /* background-position: 0 -150px; - click: background-position: 0 -240px; */
background-position: 0 -330px;
}

div#taskbar div#start td.start-right {
background-position: 0 -30px;
}

div#taskbar div#start table:hover td.start-right { /* background-position: 0 -120px; - click: background-position: 0 -210px; */
background-position: 0 -300px;
}

div#taskbar div#start em {
background-color: transparent;
}

div#taskbar div#start button[type="button"].start {
background-color: transparent;
background-image: url('i/taskbar/startbutton-icon.gif');
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

div#taskbar div#panel-wrap div#quickstart-panel {
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

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap {
height: 100%;
left: 0;
position: absolute;
top: 0;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip {
height: 100%;
list-style: none;
margin: 0;
margin-left: 15px;
padding: 0;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip li {
float: left;
list-style: none;
margin-left: 2px;
}


div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip table {
border-spacing: 0;
border-width: 0;
cursor: pointer;
float: left;
margin: 1px 0 0 1px;
white-space: nowrap;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip table td {
background-image: url('i/taskbar/taskbutton.gif');
border-width: 0;
margin: 0;
padding: 0;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip td.button-left, 
div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip td.button-right {
font-size: 1px;
height: 28px;
line-height: 1px;
width: 4px;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip td.button-left {
background-repeat: no-repeat;
background-position: 0 0;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip li:hover td.button-left { /* background-position: 0 -84px; - click: background-position: 0 -90px; */
background-position: 0 -252px;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip td.button-center {
background-repeat: repeat-x;
background-position: 0 -56px;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip li:hover td.button-center { /* background-position: 0 -140px; - click: background-position: 0 -90px; */
background-position: 0 -308px;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip td.button-right {
background-position: 0 -28px;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip li:hover td.button-right { /* background-position: 0 -112px; - click: background-position: 0 -90px; */
background-position: 0 -280px;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip em {
background-color: transparent;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip button[type="button"].taskbutton {
background-color: transparent;
background-image: url('i/bogus.png');
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

/**** Begin Taskbutton Icons */

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip button[type="button"]#taskbutton-logout {
background-image: url('i/logout2.png') !important;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip button[type="button"]#taskbutton-notepad {
background-image: url('i/notepad.png') !important;
}

div#taskbar div#taskbuttons-panel div.taskbuttons-strip-wrap ul#taskbuttons-strip button[type="button"]#taskbutton-preferences {
background-image: url('i/preferences.png') !important;
}

/* End Taskbutton Icons ****/
/* End Taskbuttons ***/
/*** Begin Tray */

div#taskbar div#panel-wrap div#tray-panel {
height: 100%;
position: absolute;
right: 0;
top: 0;
}

div#taskbar div#panel-wrap div#tray-panel div.tray-strip-wrap {
height: 100%;
}

div#taskbar div#panel-wrap div#tray-panel div.tray-strip-wrap ul#tray-strip {
height: 100%;
list-style: none;
margin: 0;
margin-left: 10px;
padding: 0;
}

div#taskbar div#panel-wrap div#tray-panel div.tray-strip-wrap ul#tray-strip li {
float: left;
margin-left: 2px;
}

div#taskbar div#panel-wrap div#tray-panel div.tray-strip-wrap ul#tray-strip li .traybutton {
border: 0;
color: #fff;
float: left;
height: 25px;
line-height: 24px;
margin: 0;
margin-left: 2px;
}

div#taskbar div#panel-wrap div#tray-panel div#tray-currentinfo {
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

div#taskbar div#panel-wrap div#tray-panel div#tray-currentinfo div#clock {
padding-top: 3px;
}

div#taskbar div#panel-wrap div#tray-panel div#tray-currentinfo div#date {
padding-top: 3px;
}

div#taskbar div#panel-wrap div#tray-panel div#tray-toggle {
background-color: #fff;
cursor: pointer;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=18)";
filter: alpha(opacity=18);
height: 100%;
-moz-opacity: 0.18;
-khtml-opacity: 0.18;
opacity: 0.18;
position: absolute;
right: 0;
top: 0;
width: 14px;
}

/* End Tray ***/
/* End Taskbar **/
/* End User Interface */