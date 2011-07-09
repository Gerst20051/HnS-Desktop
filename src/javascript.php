<?php
session_start();
header("Content-Type: application/x-javascript");
?>

var dConfig = {
"user":{
"username":"guest",
"id":0,
"access_level":0,
"first_name":"",
"last_name":"",
"isGuest":1
},

"styles":{
"theme_id":"1",
"theme_name":"default",
"wallpaper_file":"i/vista.jpg",
"wallpaper_position":"center center",
"background_color":"ffffff",
"font_color":"000000",
"transparency":true
},

"desktop":{
},

"taskbar":{
"height":30,
"start_width":110,
"quickstart_width":60,
"quickstart_minwidth":30,
"quickstart_maxwidth":300,
"tray_width":75,
"tray_minwidth":30,
"tray_maxwidth":300
},

"launchers":{
"startmenutool":["preferences","feedback","about-desktop"],
"quickstart":["notepad","preferences","feedback"],
"contextmenu":["preferences","feedback","about-desktop"],
"shortcut":["notepad","preferences","feedback"],
"startmenu":["notepad"],
"autorun":["a"]
}
}

var stylesheet = '<link rel="stylesheet" type="text/css" href="css.php?id=' + dConfig.styles.theme_id + '" media="all" />';
$('head').append(stylesheet);

var myHeight = 0, myWidth = 0;
if (typeof(window.innerWidth) == 'number') {// Non-IE
myHeight = window.innerHeight;
myWidth = window.innerWidth;
} else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {// IE 6+ in 'standards compliant mode'
myHeight = document.documentElement.clientHeight;
myWidth = document.documentElement.clientWidth;
} else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {// IE 4 compatible
myHeight = document.body.clientHeight;
myWidth = document.body.clientWidth;
}

var blackout = document.createElement('div');
blackout.setAttribute('id','blackout');

var whiteout = document.createElement('div');
whiteout.setAttribute('id','whiteout');

function div_selection(e, eq) {
this.e = e;
this.eq = eq;

if (this.e.target) {
this.event = this.e.target;
} else {
this.event = this.e.srcElement;
}

if (this.event.nodeType == 3) { // defeat Safari bug text node
this.targ = this.event.parentNode;
}

this.selection = $(this.event).parents().eq(this.eq).attr('id');
this.div_panel = function() { return ['#', this.selection, ' div.panel'].join(''); }
this.div_panel_tl = function() { return ['#', this.selection, ' div.panel-tl'].join(''); }
this.div_panel_bwrap = function() { return ['#', this.selection, ' div.panel-bwrap'].join(''); }
}

function panel(a,b,c,d,e,f,g,h,i,j,x,y,xPos,yPos,z,content) {
this.div = document.createElement('div');
this.title = a;
this.id = b;
this.closeable = c;
this.draggable = d;
this.resizable = e;
this.minHeight = f;
this.height = g;
this.minWidth = h;
this.width = i;
this.position = j;
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
this.y = ((myHeight / 2) - (this.height / 2));
}

this.display = function() {
this.div.setAttribute("id",b);
this.div.setAttribute("class","drsElement");

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
this.div.style.top = ((myHeight - dConfig.taskbar.height) - (this.height + this.y)) + 'px';
}
} else {
this.div.style.left = this.x + 'px';
this.div.style.top = this.y + 'px';
}

document.getElementById("main").appendChild(this.div);

this.assemble();
}

this.createPanel = function(content) {
return ['<div class="panel">',
'<div class="panel-tl"><div class="panel-tr"><div class="panel-tc"></div></div></div><div class="panel-bwrap">',
'<div class="panel-ml"><div class="panel-mr"><div class="panel-mc">', content, '</div></div></div>',
'<div class="panel-bl"><div class="panel-br"><div class="panel-bc"></div></div></div>',
'</div></div>'].join('');
}

if (this.draggable == true) {
this.addHeader = function(title) {
return ['<div class="panel-header drsMoveHandle">',
'<span class="panel-header-text">', title, '</span>',
'<div class="tools">',
'<div class="tool close"></div>',
'<div class="tool maximize"></div>',
'<div class="tool minimize"></div>',
'<div class="tool toggle"></div>',
'</div></div>'].join('');
}
} else {
this.addHeader = function(title) {
return ['<div class="panel-header">',
'<span class="panel-header-text">', title, '</span>',
'<div class="tools">',
'<div class="tool close"></div>',
'<div class="tool maximize"></div>',
'<div class="tool minimize"></div>',
'<div class="tool toggle"></div>',
'</div></div>'].join('');
}
}

this.assemble = function() {
this.html = this.createPanel(this.content);
this.div.innerHTML = this.html;
var maindiv = 'div#' + this.id;
var ptdiv = 'div#' + this.id + ' div.panel-tc';
$(ptdiv).append(this.addHeader(this.title));
$('div.panel-bwrap').height(($(maindiv).height() - 30));
}
}

function dialog(a,b,c,d,e,f,g,h,i,j,x,y,xPos,yPos,z,content) {
this.div = document.createElement('div');
this.title = a;
this.id = b;
this.closeable = c;
this.draggable = d;
this.resizable = e;
this.minHeight = f;
this.height = g;
this.minWidth = h;
this.width = i;
this.position = j;
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
this.y = ((myHeight / 2) - (this.height / 2));
}

this.display = function() {
this.div.setAttribute("id",b);
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
this.div.style.top = ((myHeight - dConfig.taskbar.height) - (this.height + this.y)) + 'px';
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
}
}

<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("auth.inc.php");

/* used to temporary change a users access level
if ($_SESSION['username'] == null) {
$_SESSION['access_level'] = 2;
}
*/
?>

function desktop(desktop_content, taskbar_start_content, taskbar_quickstart_content) {
this.desktop = document.createElement('div');
this.taskbar = document.createElement('div');
this.desktop_thumbs = document.createElement('div');
this.desktop_content = desktop_content;
this.taskbar_start_content = taskbar_start_content;
this.taskbar_quickstart_content = taskbar_quickstart_content;

this.display = function() {
this.desktop.setAttribute("id","desktop");
this.taskbar.setAttribute("id","taskbar");
this.desktop.style.height = (myHeight - dConfig.taskbar.height) + 'px';
this.taskbar.style.height = dConfig.taskbar.height + 'px';
document.getElementById("main").appendChild(this.desktop);
document.getElementById("main").appendChild(this.taskbar);

this.assemble();
}

this.createDesktop = function(desktop_content) {
return ['<div id="desktop-view"><div class="desktop-body">', desktop_content, '</div></div>'].join('');
}

this.createDesktopThumb = function(thumb_name) {
return ['<div class="desktop-thumb thumb-', thumb_name, '">', thumb_name, '</div>'].join('');
}

this.createTaskbar = function(taskbar_start_content, taskbar_quickstart_content) {
return [
'<div id="start">', taskbar_start_content, '</div>',
'<div id="panel-wrap">',
'<div id="quickstart-panel">', taskbar_quickstart_content, '</div>',
'<div id="taskbuttons-panel">',
'<div class="taskbuttons-strip-wrap">',
'<div id="quickstart-splitbar" class="splitbar"></div>',
'<ul id="taskbuttons-strip">',
'<li id="taskbutton-notepad" class="taskbutton">',
'<table class="button-wrap">',
'<tbody>',
'<tr>',
'<td class="button-left">',
'</td>',
'<td class="button-center">',
'<em unselectable="on">',
'<button type="button" class="">',
'Notepad',
'</button>',
'</em>',
'</td>',
'<td class="button-right">',
'</td>',
'</tr>',
'</tbody>',
'</table>',
'</li>',
'</ul>',
'<div id="tray-splitbar" class="splitbar"></div>',
'</div>',
'<div id="tray-panel">',
'<div class="tray-strip-wrap">',
'<ul class="tray-strip">',
'</ul>',
'</div>',
'</div>',
'</div>',
'</div>'].join('');
}

this.createTaskButton = function(task_name) {
alert(this.createTaskButton);
return ['<li id="taskbutton-', task_name, '" class="taskbutton">', task_name, '</li>'].join('');
}

this.assemble = function() {
this.desktop_html = this.createDesktop(this.desktop_content);
this.desktop.innerHTML = this.desktop_html;
this.desktop_thumbs_html = this.createDesktopThumb('Notepad');
this.desktop_thumbs.innerHTML = this.desktop_thumbs_html;
this.taskbar_html = this.createTaskbar(this.taskbar_start_content, this.taskbar_quickstart_content);
this.taskbar.innerHTML = this.taskbar_html;
}
}

var desktop_content = this.desktop_thumbs;
var taskbar_start_content = ['<div></div>'].join('');
var taskbar_quickstart_content = ['<div></div>'].join('');
var logout_content = [
'<div class="content">',
'<div class="heading">Homenet Spaces OS</div>',
'<div class="body">',
'<form action="javascript: return false" name="logout" id="logout">',
'<input type="submit" name="logout" id="logout" accesskey="l" tabindex="1" value="Logout!" />',
'</form>',
'</div></div>'
].join('');

var dialog_loading = new dialog('Loading','loading',false,false,false,50,50,100,168,'absolute',0,0,'l','t',true,'Loading...');
var user_desktop = new desktop(desktop_content, taskbar_start_content, taskbar_quickstart_content);
var logout = new panel('Logout','logout',false,true,false,200,250,400,450,'absolute',0,0,'r','t',false,logout_content);

<?php
} else {
?>

var login_content = [
'<div class="content">',
'<div class="heading">Homenet Spaces OS</div>',
'<div class="body">',
'<form action="javascript: return false" name="login" id="login">',
'<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">',
'<tbody>',
'<tr>',
'<td class="label">',
'<label for="username">Username: </label>',
'</td>',
'<td class="input">',
'<input type="text" name="username" id="username" size="26" maxlength="20" accesskey="u" tabindex="1" value="" />',
'</td>',
'</tr>',
'<tr>',
'<td class="label">',
'<label for="password">Password: </label>',
'</td>',
'<td class="input">',
'<input type="password" name="password" id="password" size="26" maxlength="20" accesskey="p" tabindex="2" value="" />',
'</td>',
'</tr>',
'<tr>',
'<td class="label">',
'<label for="checkbox">Remember: </label>',
'</td>',
'<td class="input">',
'<input type="checkbox" name="remember" accesskey="m" tabindex="3" value="remember" />',
'<span>',
'<input type="submit" name="signin" id="signin" accesskey="l" tabindex="4" value="Login!" />',
'<input type="reset" name="reset" id="reset" accesskey="c" tabindex="5" value="Clear" />',
'<input type="button" name="register" id="register" accesskey="r" tabindex="6" value="Register" />',
'</span>',
'</td>',
'</tr>',
'</tbody>',
'</table>',
'</form>',
'</div></div>'
].join('');

var login = new panel('Login','login',false,true,true,200,250,400,450,'absolute',0,0,'l','t',true,login_content);
var register = new panel('Register','register',false,true,false,200,250,400,450,'absolute',0,0,'l','t',true,'Please Register');
var dialog_tryagain = new dialog('Try Again','notice',false,false,false,50,50,100,200,'absolute',0,0,'l','t',true,'Please Try Again!');

<?php
}
?>

$(document).ready(function() {
<?php
if (!isset($_SESSION['logged']) || (!$_SESSION['logged'] == 1)) {
?>
login.display();
$("input[type='text']#username").focus();
$("input[type='submit']#signin").click(function() {
if (($("input[type='text']#username").val() != "") && ($("input[type='password']#password").val() != "")) {
$("div#login").hide();
var str = $("form#login").serialize();
$.post("login.php", str, function(data) {
if (data == "Success") {
location.reload();
} else {
$("div#notice").css('opacity',1)
dialog_tryagain.display();
$("div#login").css('opacity',0).show().animate({opacity:0}, 1500).animate({opacity:1}, 1500);
$("div#notice").animate({opacity:1}, 1000).animate({opacity:0}, 1000)
$("input[type='text']#username").focus();
}
});
}
});

$("input[type='button']#register").click(function() {
$("div#login").hide();
register.display();
$("div#register div.content").load("register.php");
$("div#register div.panel").css('overflow','scroll');
$("div#register").addClass("fullscreen");
});

<?php
} else {
?>
dialog_loading.display();
$("div#loading").css('opacity',0).show().animate({opacity:1}, 1500);
$("div#main").prepend(blackout);
user_desktop.display();

$("div#taskbar div#panel-wrap").width(myWidth - dConfig.taskbar.start_width);
$("div#taskbar div#panel-wrap div#taskbuttons-panel").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width));
$("div#taskbar div#panel-wrap div#taskbuttons-panel div.taskbuttons-strip-wrap").width(myWidth - (dConfig.taskbar.start_width + dConfig.taskbar.quickstart_width + dConfig.taskbar.tray_width));

logout.display();

$("input[type='submit']#logout").click(function() {
$("div#logout").hide();
var str = $("form#logout").serialize();
$.post("logout.php", str, function() {
location.reload();
});
});

<?php
}
?>
});

$(window).load(function() {
/* begin window drag effect functions */
$("div.panel-header").mousedown(function(e) {
var mdown = new div_selection(e, 4);
if (!$(mdown.event).hasClass("tool")) {
$(mdown.div_panel()).addClass("transparent");
$(mdown.div_panel_tl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});
if ($(mdown.div_panel()).height() == 24) {
$(mdown.div_panel_tl()).css({
'border-bottom-left-radius':'4px',
'border-bottom-right-radius':'4px',
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
$(mdown.div_panel()).addClass("transparent");
$(mdown.div_panel_tl()).css({'background-color':'#181818','border-bottom':'1px solid #99bbe8'});
if ($(mdown.div_panel()).height() == 24) {
$(mdown.div_panel_tl()).css({
'border-bottom-left-radius':'4px',
'border-bottom-right-radius':'4px',
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
$(mup.div_panel()).removeClass("transparent");
$(mup.div_panel_tl()).css({'background-color':'','border-bottom':'0'});
$(mup.div_panel_tl()).css({
'border-bottom-left-radius':'0px',
'border-bottom-right-radius':'0px',
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
$(mup.div_panel()).removeClass("transparent");
$(mup.div_panel_tl()).css({'background-color':'','border-bottom':'0'});
$(mup.div_panel_tl()).css({
'border-bottom-left-radius':'0px',
'border-bottom-right-radius':'0px',
'-moz-border-radius-bottomleft':'0px',
'-moz-border-radius-bottomright':'0px',
'-webkit-border-bottom-left-radius':'0px',
'-webkit-border-bottom-right-radius':'0px'
});
$(mup.div_panel_bwrap()).show();
}
});

/* begin window tool functions */
$("div.panel-header div.tools div.close").click(function(e) {
var close = new div_selection(e, 6);
$(close.div_panel()).parent().remove();
});

$("div.panel-header div.tools div.maximize").toggle(function(e) {
var maximize1 = new div_selection(e, 6);
var maximize2 = maximize1.div_panel() + '-header div.tools div.maximize';
var maximize3 = maximize1.div_panel() + '-header div.tools div.toggle';
$(maximize1.div_panel()).parent().addClass("fullscreen");
$(maximize1.div_panel()).addClass("fullscreen");
$(maximize2).addClass("restore");
$(maximize3).hide();
$(maximize3).removeClass("toggledown");
$(maximize1.div_panel_bwrap()).css('height',myHeight - dConfig.taskbar.height);

if ($(maximize1.div_panel_bwrap()).is(":hidden")) {
$(maximize1.div_panel()).animate({'height':'100%'}, 0);
$(maximize1.div_panel_bwrap()).show();
}
},
function(e) {
var restore1 = new div_selection(e, 6);
var restore2 = restore1.div_panel() + '-header div.tools div.maximize';
var restore3 = restore1.div_panel() + '-header div.tools div.tool.toggle';
$(restore1.div_panel()).parent().removeClass("fullscreen");
$(restore1.div_panel()).removeClass("fullscreen");
$(restore2).removeClass("restore");
$(restore3).show();
$(restore1.div_panel_bwrap()).height(($(restore1.div_panel()).height() - dConfig.taskbar.height));
}
);

$("div.panel-header div.tools div.minimize").click(function(e) {
var minimize = new div_selection(e, 6);
$(minimize.div_panel()).parent().hide();
$('ul#taskbuttons-strip').appendTo(this.createTaskButton(minimize.div_panel().parent()));
});

$("div.panel-header div.tools div.toggle").click(function(e) {
var toggle = new div_selection(e, 6);
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
var toggle_arrow = new div_selection(e, 6);
if (!$(toggle_arrow.div_panel()).hasClass("fullscreen")) {
$(this).addClass("toggledown");
}
},
function () {
$(this).removeClass("toggledown");
}
);

/* begin taskbar functions */
$("div#quickstart-splitbar").mousedown(function() {
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;

$("div#quickstart-splitbar").bind('mousemove', function(e) {
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
$("div#taskbar div#quickstart-panel").css('width',$("div#taskbar div#quickstart-panel").width() + diffX);
$("div#taskbar div#taskbuttons-panel").css('left',$("div#taskbar div#taskbuttons-panel").position().left + diffX);
$("div#taskbar div#taskbuttons-panel").css('width',$("div#taskbar div#taskbuttons-panel").width() - diffX);
$("div#taskbar div.taskbuttons-strip-wrap").css('width',$("div#taskbar div.taskbuttons-strip-wrap").width() - diffX);
lastMouseX = mouseX;
}
});
});

$("div#tray-splitbar").mousedown(function() {
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;

$("div#tray-splitbar").bind('mousemove', function(e) {
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

$("div.splitbar").mouseleave(function() {
$("div.splitbar").unbind('mousemove');
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;
});

$("div.splitbar").mouseup(function() {
$("div.splitbar").unbind('mousemove');
var mouseX = 0, lastMouseX = 0, mOffX = 0, diffX = 0;
});
});

/* begin dragresize functions */
if (typeof addEvent != 'function') {
var addEvent = function(o,t,f,l) {
var d = 'addEventListener', n = 'on' + t, rO = o, rT = t, rF = f, rL = l;
if (o[d]&&!l) return o[d](t,f,false);
if (!o._evts)o._evts = {};
if (!o._evts[t]) {
o._evts[t] = o[n] ? {b:o[n]} : {};
o[n] = new Function('e','var r = true,o = this,a = o._evts["' + t + '"],i;for (i in a) {o._f = a[i];r = o._f(e||window.event)!= false&&r;o._f = null}return r');
if (t != 'unload') addEvent(window,'unload',function() {
removeEvent(rO,rT,rF,rL)
})
}

if (!f._i)f._i = addEvent._i++;
o._evts[t][f._i] = f
};

addEvent._i = 1;

var removeEvent = function(o,t,f,l) {
var d = 'removeEventListener';
if (o[d] && !l) return o[d](t,f,false);
if (o._evts && o._evts[t] && f._i) delete o._evts[t][f._i]
}
}

function cancelEvent(e,c) {
e.returnValue = false;

if (e.preventDefault) e.preventDefault();
if (c) {
e.cancelBubble = true;

if (e.stopPropagation) e.stopPropagation()
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

for (var p in props)
this[p] = (typeof config[p] == 'undefined') ? props[p] : config[p]
};

DragResize.prototype.apply = function(node) {
var obj = this;

addEvent(node,'mousedown',function(e) {
obj.mouseDown(e)
});

addEvent(node,'mousemove',function(e) {
obj.mouseMove(e)
});

addEvent(node,'mouseup',function(e) {
obj.mouseUp(e)
})
};

DragResize.prototype.select = function(newElement) {
with(this) {
if (!document.getElementById || !enabled) return;

if (newElement && (newElement != element) && enabled) {
element = newElement;
element.style.zIndex = ++zIndex;

if (this.resizeHandleSet) this.resizeHandleSet(element,true);
elmX = parseInt(element.style.left);
elmY = parseInt(element.style.top);
elmW = element.offsetWidth;
elmH = element.offsetHeight;
if (ondragfocus) this.ondragfocus()
}}};

DragResize.prototype.deselect = function(delHandles) {
with(this) {
if (!document.getElementById || !enabled) return;
if (delHandles) {
if (ondragblur) this.ondragblur();
if (this.resizeHandleSet) this.resizeHandleSet(element,false);
element = null
}

handle = null;
mOffX = 0;
mOffY = 0
}};

DragResize.prototype.mouseDown = function(e) {
with(this) {
if (!document.getElementById || !enabled) return true;
var elm = e.target || e.srcElement, newElement = null, newHandle = null, hRE = new RegExp(myName + '-([trmbl]{2})','');
while(elm) {
if (elm.className) {
if (!newHandle && (hRE.test(elm.className) || isHandle(elm))) newHandle = elm;
if (isElement(elm)) {
newElement = elm;
break
}}
elm = elm.parentNode
}

if (element && (element != newElement) && allowBlur) deselect(true);
if (newElement && (!element || (newElement == element))) {
if (newHandle)cancelEvent(e);
select(newElement,newHandle);
handle = newHandle;

if (handle && ondragstart) this.ondragstart(hRE.test(handle.className))
}}};

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
isResize = true
} else {
var dX = diffX, dY = diffY;
if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = minLeft - elmX));
else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = (maxLeft - elmX - elmW)));
if ((elmY + dY) < minTop) mOffY = (dY - (diffY = (minTop - elmY)));
else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
elmX += diffX;
elmY += diffY
}

with(element.style) {
left = elmX + 'px';
width = elmW + 'px';
top = elmY + 'px';
height = elmH + 'px'
}

var new_element = 'div#' + $(element).attr('id') + ' div.panel-bwrap';
$(new_element).css('height', elmH - 30);

if (window.opera && document.documentElement) {
var oDF = document.getElementById('op-drag-fix');
if (!oDF) {
var oDF = document.createElement('input');
oDF.id = 'op-drag-fix';
oDF.style.display = 'none';
document.body.appendChild(oDF)
}
oDF.focus()
}

if (ondragmove) this.ondragmove(isResize);
cancelEvent(e)
}};

DragResize.prototype.mouseUp = function(e) {
with(this) {
if (!document.getElementById || !enabled) return;
var hRE = new RegExp(myName + '-([trmbl]{2})','');
if (handle && ondragend) this.ondragend(hRE.test(handle.className));
deselect(false)
}};

DragResize.prototype.resizeHandleSet = function(elm,show) {
with(this) {
if (!elm._handle_tr) {
for (var h = 0; h < handles.length; h++) {
var hDiv = document.createElement('div');
hDiv.className = myName + ' ' + myName + '-' + handles[h];
elm['_handle_' + handles[h]] = elm.appendChild(hDiv)
}}

for (var h = 0; h < handles.length; h++) {
elm['_handle_' + handles[h]].style.visibility = show ? 'inherit' : 'hidden'
}}};

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
processed = true
}

if (hClass.indexOf('b') >= 0) {
rs = 1;

if ((elmH + dY) < minHeight) mOffY = (dY - (diffY = (minHeight - elmH)));
else if ((elmY + elmH + dY) > maxTop) mOffY = (dY - (diffY = (maxTop - elmY - elmH)));
elmH += diffY;
processed = true
}

if (hClass.indexOf('l') >= 0) {
rs = 1;

if ((elmW - dX) < minWidth) mOffX = (dX - (diffX = (elmW - minWidth)));
else if ((elmX + dX) < minLeft) mOffX = (dX - (diffX = (minLeft - elmX)));
elmX += diffX;
elmW -= diffX;
processed = true
}

if (hClass.indexOf('r') >= 0) {
rs = 1;

if (elmW + dX < minWidth) mOffX = (dX - (diffX = minWidth - elmW));
else if ((elmX + elmW + dX) > maxLeft) mOffX = (dX - (diffX = maxLeft - elmX - elmW));
elmW += diffX;
processed = true
}
return processed
}};

var dragresize = new DragResize('dragresize', { minWidth: 250, minHeight: 150, minLeft: 0, maxLeft: myWidth, minTop: 0, maxTop: <?php if ($_SESSION['logged'] == 1) { echo "(myHeight - 30)"; } else { echo "myHeight"; } ?>});

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