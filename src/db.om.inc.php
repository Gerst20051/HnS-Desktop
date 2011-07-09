<?php
$host = "localhost"; // Your mySQL Server, most cases "localhost"
$db_user = ""; // Your mySQL Username
$db_pass = ""; // Your mySQL Password
$om = "members"; // Database Name

mysql_connect($host, $db_user, $db_pass) or die("Users Online Database CONNECT Error");
?>