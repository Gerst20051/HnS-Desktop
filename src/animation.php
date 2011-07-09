<!DOCTYPE html> 
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
<title>Homenet Spaces OS | Welcome to HnS Desktop!</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© HnS Desktop" />
<meta name="keywords" content="Homenet, Spaces, HnS, Desktop, OS, Web, WebOS, Webtop, Online, Operating, System, Applications, Application, Apps, App, Services, Internet, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profile, Profiles" />
<meta name="description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! HnS Desktop" />
<meta property="og:title" content="HnS Desktop" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://hnsdesktop.tk" />
<meta property="og:site_name" content="HnS Desktop" />
<meta property="fb:admins" content="637458869" />
<meta property="og:description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! HnS Desktop" />
<script type="text/javascript" src="jquery.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="html5.js"></script>
<![endif]-->
<base href="" target="_top" />
</head>

<body id="main" scroll="no">
<canvas id="canvas1" width="400" height="500"></canvas>
<script type="text/javascript">
var canvas1;
var ctx;
var WIDTH = 400, HEIGHT = 500;
var timer1;
var currentX = 0, currentY = 0;

canvas1 = document.getElementById('canvas1');
ctx = canvas1.getContext('2d');
canvas1.width = WIDTH;
canvas1.height = HEIGHT;

var lastX = WIDTH * Math.random();
var lastY = HEIGHT * Math.random();

function line() {
ctx.save();
ctx.translate(WIDTH / 2, HEIGHT / 2);
ctx.scale(0.9, 0.9);
ctx.translate(-WIDTH / 2, -HEIGHT / 2);
ctx.beginPath();
ctx.lineWidth = 5 + Math.random() * 10;
ctx.moveTo(lastX, lastY);

lastX = WIDTH * Math.random();
lastY = HEIGHT * Math.random();

ctx.bezierCurveTo(
WIDTH * Math.random(),
HEIGHT * Math.random(),
WIDTH * Math.random(),
HEIGHT * Math.random(),
lastX, lastY);

var r = Math.floor(Math.random() * 255) + 70;
var g = Math.floor(Math.random() * 255) + 70;
var b = Math.floor(Math.random() * 255) + 70;
var s = 'rgba(' + r + ',' + g + ',' + b +', 1.0)';

ctx.shadowColor = 'white';
ctx.shadowBlur = 10;
ctx.strokeStyle = s;
ctx.stroke();
ctx.restore();
}
 
timer1 = setInterval(line, 50);

//http://ie.microsoft.com/testdrive/Graphics/CanvasPad/Default.html
</script>
</body>

</html>