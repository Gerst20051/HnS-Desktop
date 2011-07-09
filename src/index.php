<?php
session_start();
include ('db.inc.php');
include ('login.inc.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" dir="ltr" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
<title>Homenet Spaces OS | Welcome to HnS Desktop!</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="HnS Desktop" />
<meta name="keywords" content="Homenet, Spaces, HnS, Desktop, OS, Web, WebOS, Webtop, Online, Operating, System, Applications, Application, Apps, App, Services, Internet, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profile, Profiles" />
<meta name="description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering!" />
<link rel="image_src" href="i/apps/thumbs/friends.png" />
<meta property="og:title" content="Homenet Spaces OS | Welcome to HnS Desktop!" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://hnsdesktop.tk" />
<meta property="og:site_name" content="HnS Desktop" />
<meta property="fb:admins" content="637458869" />
<meta property="og:description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering!" />
<noscript><meta http-equiv="X-Frame-Options" content="deny" /></noscript>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Reenie+Beanie|Josefin+Sans+Std+Light" />
<script type="text/javascript">
(function() {
var s=["https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js","https://ajax.googleapis.com/ajax/libs/swfobject/2/swfobject.js","js/min/jquery.ellipsis.min.js","js/min/jquery.scrollto.min.js"];
var sc="script",tp="text/javascript",sa="setAttribute",doc=document,ua=window.navigator.userAgent;
for(var i=0,l=s.length;i<l;++i){if(ua.indexOf("Firefox")!==-1||ua.indexOf("Opera")!==-1){var t=d.createElement(sc);t[sa]("src",s[i]);t[sa]("type",tp);doc.getElementsByTagName("head")[0].appendChild(t);}else{doc.write("<"+sc+" type=\""+tp+"\" src=\""+s[i]+"\"></"+sc+">");}}
})();

/*
if(!window.jQuery){document.write('<script type="text/javascript" src="js/min/jquery-1.4.4.min.js"></script>');}if(!swfobject){document.write('<script type="text/javascript" src="js/min/swfobject-2.1.min.js"></script>');}
function ss(id){document.write('<link rel="stylesheet" type="text/css" href="css.php?id='+id+'" />');}
*/
if(window.localStorage){if(localStorage.getItem('themeid')){ss(localStorage.getItem('themeid'));}else{localStorage.setItem('themeid',1);/*ss(1);*/}}//else ss(1);
</script>
</head>

<body id="main">
<div class="noscript">
We Are Sorry! HnS Desktop Requires A Browser That Supports HTML5, jQuery, and Javascript.
</div>
<canvas id="c_animation"></canvas>
<script type="text/javascript" src="javascript.php"></script>
</body>

</html>
<?php if ($db) mysql_close($db); ?>