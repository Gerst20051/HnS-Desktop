<?php
session_start();
include ("db.inc.php");
include ("users_online.inc.php");

if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("auth.inc.php");
include ("check_session.inc.php");
}

if (!isset($_POST['hash'])) {
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password = (isset($_POST['password'])) ? trim($_POST['password']) : '';
} else {
$username = (isset($_POST['username'])) ? substr(base64_decode(substr(trim($_POST['username']), 4)), 4) : '';
$password = (isset($_POST['password'])) ? substr(base64_decode(substr(trim($_POST['password']), 4)), 4) : '';
}

$time = time();
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($username, $db) . '" AND pass = PASSWORD("' . mysql_real_escape_string($password, $db) . '")';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);

if (isset($_POST['remember'])) {
setcookie("hnsrememberme[username]", $row['username'], ($time + 604800));
setcookie("hnsrememberme[password]", $row['password'], ($time + 604800));
}

$_SESSION['logged'] = 1;
$_SESSION['username'] = $username;
$_SESSION['access_level'] = $row['access_level'];
$_SESSION['last_login'] = $row['last_login'];
$_SESSION['last_login_ip'] = $row['last_login_ip'];
$_SESSION['fullname'] = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['middlename'] = $row['middlename'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['email'] = $row['email'];
$_SESSION['status'] = $row['status'];
$_SESSION['mood'] = $row['mood'];
$_SESSION['alarm'] = $row['alarm'];
$_SESSION['default_image'] = $row['default_image'];
$_SESSION['pref_song_astart'] = $row['pref_song_astart'];
$_SESSION['pref_psong_astart'] = $row['pref_psong_astart'];
$_SESSION['pref_upstyle'] = $row['pref_upstyle'];
$_SESSION['pref_pupstyle'] = $row['pref_pupstyle'];
$_SESSION['pref_upview'] = $row['pref_upview'];
$_SESSION['setting_vmode'] = $row['setting_vmode'];
$_SESSION['setting_theme'] = $row['setting_theme'];
$_SESSION['setting_language'] = $row['setting_language'];
$_SESSION['user_id'] = $row['user_id'];
$user_id = null;
$username = null;

$last_login = date('Y-m-d');
$logins++;

$query = 'UPDATE info SET logins = ' . $logins . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

$query = 'UPDATE login SET last_login = "' . $last_login . '", last_login_ip = "' . $ip . '" WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

echo "Success";
} else {
header('refresh: 0; url=index.php');
}
?>