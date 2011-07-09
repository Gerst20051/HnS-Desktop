<?php
session_start();

if (session_is_registered('logged')) {
session_unset();
session_destroy();

if (isset($_COOKIE['hnsrememberme'])) {
$time = time();
setcookie("hnsrememberme[username]", null, ($time - 3600));
setcookie("hnsrememberme[password]", null, ($time - 3600));
}
}

include ("check_session.inc.php");
header('refresh: 0; url=index.php');
?>