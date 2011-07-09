<?php
include ("db.om.inc.php");
include ("validip.inc.php");

$t_stamp = time();
$to_secs = 600; // time to reset IP address's value in seconds, default here is 120 (2 minutes)
$timeout = $t_stamp - $to_secs;
$users_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != null) {
$phpself = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
} else {
$phpself = $_SERVER['PHP_SELF'];
}

mysql_db_query($om, "INSERT INTO users_online VALUES ('$t_stamp','$ip','$users_id','$username','$phpself')") or die("Database INSERT Error");
mysql_db_query($om, "DELETE FROM users_online WHERE timestamp < $timeout") or die("Database DELETE Error");
mysql_db_query($om, "DELETE FROM guests_online WHERE timestamp < $timeout") or die("Database DELETE Error");
?>