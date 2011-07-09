<?php
session_start();

include ("db.inc.php");
include ("login.inc.php");
?>
<!DOCTYPE html> 
<html lang="en" dir="ltr">

<head>
<title>Homenet Spaces OS | Welcome to HnS Desktop!</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1, windows-1252" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© HnS Desktop" />
<meta name="keywords" content="Homenet, Spaces, HnS, Desktop, OS, Web, WebOS, Webtop, Online, Operating, System, Applications, Application, Apps, App, Services, Internet, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profile, Profiles" />
<meta name="description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! HnS Desktop" />
<script type="text/javascript" src="jquery.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="html5.js"></script>
<![endif]-->
<script type="text/javascript" src="javascript.php"></script>
<base href="" target="_top" />
</head>

<body id="main" scroll="no">
<?php
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
mysql_close($db);
?>