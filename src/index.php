<?php
session_start();

include ("db.member.inc.php");
include ("login.inc.php");

if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { // user is logged in
include ("users_online.loggedin.inc.php"); // include db.om.inc if this gets removed
include ("check_session.inc.php");
} else {
include ("users_online.notloggedin.inc.php"); // include db.om.inc if this gets removed
include ("check_session.inc.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" dir="ltr">

<head>
<title>Homenet Spaces OS | Welcome to HnS Desktop!</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1, windows-1252" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© HnS Desktop" />
<meta name="keywords" content="Homenet, Spaces, HnS, OS, Web, Desktop, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profile, Profiles, Apps, Applications" />
<meta name="description" content="Welcome to Homenet Spaces OS | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! HnS Desktop" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.corners.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<base target="_top" />
</head>

<body scroll="no">
<!-- Begin page content -->
<div id="main">
</div>
<!-- End page content -->
<?php
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
mysql_close($db);
?>