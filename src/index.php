<?php
$expires = 60;
header("Pragma: public");
header("Cache-Control: maxage=" . $expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
session_start();
include ('db.inc.php');
include ('login.inc.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Homenet Spaces OS | Welcome to HnS Desktop!</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="HnS Desktop" />
<meta name="keywords" content="Homenet, Spaces, HnS, Desktop, OS, Web, WebOS, Webtop, Online, Operating, System, Applications, Application, Apps, App, Services, Internet, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profile, Profiles" />
<meta name="description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering!" />
<link rel="image_src" href="i/ux/friends.png" />
<meta property="og:title" content="Homenet Spaces OS | Welcome to HnS Desktop!" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://hnsdesktop.tk" />
<meta property="og:site_name" content="HnS Desktop" />
<meta property="fb:admins" content="637458869" />
<meta property="og:description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering!" />
<noscript><meta http-equiv="X-Frame-Options" content="deny" /></noscript>
<style type="text/css">
@media screen {@font-face{font-family:'josefin sans std light';font-style:normal;font-weight:normal;src:local('josefin sans std light'),local('josefinsansstd-light'),url('http://themes.googleusercontent.com/font?kit=doRWK9Qks0OQGenH-kW8nje4rGmx_oKyPTpXBjgU-s4')format('truetype');}}
@media screen {@font-face{font-family:'reenie beanie';font-style:normal;font-weight:normal;src:local('reenie beanie'),local('reeniebeanie'),url('http://themes.googleusercontent.com/font?kit=ljpKc6CdXusL1cnGUSamXybsRidxnYrfzLNRqJkHfFo')format('truetype');}}
</style>
<script type="text/javascript">
(function() {
var s=["https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js","https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js","http://www.google.com/buzz/api/button.js","scrollto.min.js"];
var sc="script",tp="text/javascript",ce="createElement",sa="setAttribute",d=document,tn="getElementsByTagName",ua=window.navigator.userAgent,ls=localStorage;
for(var i=0,l=s.length;i<l;++i){if(ua.indexOf("Firefox")!==-1||ua.indexOf("Opera")!==-1){var t=d[ce](sc);t[sa]("type",tp);t[sa]("src",s[i]);d[tn]("head")[0].appendChild(t);}else{d.write("<"+sc+" type=\""+tp+"\" src=\""+s[i]+"\"></"+sc+">");}}
function ss(id){var sc="link",tp="text/css",rel="stylesheet";if(ua.indexOf("Firefox")!==-1||ua.indexOf("Opera")!==-1){var t=d[ce](sc);t[sa]("rel",rel);t[sa]("type",tp);t[sa]("href","css.php?id="+id);d[tn]("head")[0].appendChild(t);}else{d.write("<"+sc+" rel=\""+rel+"\" type=\""+tp+"\" href=\"css.php?id="+id+"\" />");}}
if(window.ls){if(ls.getItem('themeid')){ss(ls.getItem('themeid'));}else{ls.setItem('themeid',1);ss(1);}}else ss(1);
})();
</script>
</head>
<body id="main">
<canvas id="c_animation"></canvas>
<script type="text/javascript" src="javascript.php"></script>
</body>
</html>