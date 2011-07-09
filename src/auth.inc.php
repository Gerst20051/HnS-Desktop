<?php
session_start();

if (!isset($_SESSION['logged'])) {
include ("redirect.inc.php");

header('refresh: 4; url=login.php?redirect=' . $redirect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! " />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body>
<!-- Begin page content -->
<div class="pagecontent">
<?php
echo '<form name="counter" style="margin : 0px; "><p><strong style="color : #ff3333; font-weight : bold; ">You will be redirected to the login page in
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; color : #ff3333; font-weight : bold; width : 12px; ">
seconds.</strong></p></form>';
echo '<p>If your browser doesn\'t redirect you properly automatically, ' . '<a href="login.php?redirect=' . $redirect . '">click here</a>.</p>';
?>
</div>
<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>
<!-- End page content -->
<?php
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
die();
}
?>