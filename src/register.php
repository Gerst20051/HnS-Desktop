<?php
session_start();

include ("db.inc.php");

if (isset($_POST['register'])) {
$username_reg = (isset($_POST['username_reg'])) ? trim($_POST['username_reg']) : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$password_reg = (isset($_POST['password_reg'])) ? trim($_POST['password_reg']) : '';
$password_ver_reg = (isset($_POST['password_ver_reg'])) ? trim($_POST['password_ver_reg']) : '';
$fullname = (isset($_POST['fullname'])) ? trim(ucwords($_POST['fullname'])) : '';
$email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
$gender = (isset($_POST['gender'])) ? trim($_POST['gender']) : '';
$birth_month = (isset($_POST['birth_month'])) ? trim($_POST['birth_month']) : '';
$birth_day = (isset($_POST['birth_day'])) ? trim($_POST['birth_day']) : '';
$birth_year = (isset($_POST['birth_year'])) ? trim($_POST['birth_year']) : '';
$hometown = (isset($_POST['hometown'])) ? trim($_POST['hometown']) : '';
$community = (isset($_POST['community'])) ? trim($_POST['community']) : '';
$hobbies = (isset($_POST['hobbies'])) && is_array($_POST['hobbies']) ? $_POST['hobbies'] : array();
$security_question1 = (isset($_POST['security_question1'])) ? trim($_POST['security_question1']) : '';
$security_answer1 = (isset($_POST['security_answer1'])) ? trim($_POST['security_answer1']) : '';
$security_question2 = (isset($_POST['security_question2'])) ? trim($_POST['security_question2']) : '';
$security_answer2 = (isset($_POST['security_answer2'])) ? trim($_POST['security_answer2']) : '';
$txtsecuritycode = (isset($_POST['txtsecuritycode'])) ? trim($_POST['txtsecuritycode']) : '';

$registererrors = array();

if (empty($username_reg)) $registererrors[] = 'Username cannot be blank.';
if (preg_match('/[,]/', $username_reg)) $registererrors[] = 'Username cannot have commas.';
if (preg_match('/[ ]/', $username_reg)) $registererrors[] = 'Username cannot have spaces.';
if (preg_match('/[-]/', $username_reg)) $registererrors[] = 'Username cannot have dashes.';
if (preg_match('/[.]/', $username_reg)) $registererrors[] = 'Username cannot have periods.';

$query = 'SELECT username FROM login WHERE username = "' . $username_reg . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) > 0) { $registererrors[] = 'Username ' . $username_reg . ' is already registered.'; $username_reg = ''; }
mysql_free_result($result);

if (empty($password) && !empty($password_ver)) $registererrors[] = 'Password cannot be blank.';
if (empty($password) && empty($password_ver)) $registererrors[] = 'Passwords cannot be blank.';
if (!empty($password)) {
if (empty($password_ver)) $registererrors[] = 'Please confirm your password.';
if (!empty($password_ver)) if ($password != $password_ver) $registererrors[] = 'Both of your passwords need to match.';
if ($username == $password) $registererrors[] = 'Username & Password Cannot Be The Same.';
}
if (empty($fullname)) $registererrors[] = 'Full Name cannot be blank.';
if (empty($email)) $registererrors[] = 'Email Address cannot be blank.';
else if (!preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}?$/i", $email)) $registererrors[] = 'Email Address should be in correct form.';
if (empty($gender)) $registererrors[] = 'Gender cannot be blank.';
if ($birth_month == 0 && $birth_day == 0 && $birth_year == 0) $registererrors[] = 'Birth Date cannot be blank.';
elseif ($birth_month == 0) $registererrors[] = 'Birth Month cannot be blank.';
elseif ($birth_day == 0) $registererrors[] = 'Birth Day cannot be blank.';
elseif ($birth_year == 0) $registererrors[] = 'Birth Year cannot be blank.';
if (empty($hometown)) $registererrors[] = 'Hometown cannot be blank.';
if (empty($hobbies)) $registererrors[] = 'Hobbies cannot be blank.';
if ($security_question1 == $security_question2) $registererrors[] = 'Security Questions cannot be the same.';
if (empty($security_question1) || ($security_question1 == 0)) $registererrors[] = 'Security Question 1 cannot be blank.';
if (empty($security_answer1)) $registererrors[] = 'Security Answer 1 cannot be blank.';
if (empty($security_question2) || ($security_question2 == 0)) $registererrors[] = 'Security Question 2 cannot be blank.';
if (empty($security_answer2)) $registererrors[] = 'Security Answer 2 cannot be blank.';
if ($_POST['txtsecuritycode'] != $_SESSION['SECURITY_CODE']) $registererrors[] = 'Security Code cannot be incorrect.';

if (count($registererrors) > 0) {
foreach ($registererrors as $registererror) echo '<li>' . $registererror . '</li>' . "\n";
} else {
if (empty($community)) $community = $hometown;

$last_login = date('Y-m-d');
$date_joined = date('Y-m-d');
$access_level = 1;

list($firstname, $middlename, $lastname) = split(' ', $fullname);
if (!$lastname) { $lastname = $middlename; unset($middlename); }

$query = 'INSERT INTO login (user_id, username, password, access_level, last_login, date_joined)
VALUES
(NULL, "' . mysql_real_escape_string($username_reg, $db)  . '", PASSWORD("' . mysql_real_escape_string($password, $db)  . '"), "' . $access_level . '", "' . $last_login . '", "' . $date_joined . '") ';
mysql_query($query, $db) or die(mysql_error());

$user_id = mysql_insert_id($db);

$query = 'INSERT INTO info (user_id, firstname, middlename, lastname, email, gender, birth_month, birth_day, birth_year, hometown, community, hobbies, security_question1, security_answer1, security_question2, security_answer2)
VALUES
(' . $user_id . ', ' .
'"' . mysql_real_escape_string($firstname, $db)  . '", ' .
'"' . mysql_real_escape_string($middlename, $db)  . '", ' .
'"' . mysql_real_escape_string($lastname, $db)  . '", ' .
'"' . mysql_real_escape_string($email, $db)  . '", ' .
'"' . mysql_real_escape_string($gender, $db)  . '", ' .
'"' . mysql_real_escape_string($birth_month, $db)  . '", ' .
'"' . mysql_real_escape_string($birth_day, $db)  . '", ' .
'"' . mysql_real_escape_string($birth_year, $db)  . '", ' .
'"' . mysql_real_escape_string($hometown, $db)  . '", ' .
'"' . mysql_real_escape_string($community, $db)  . '", ' .
'"' . mysql_real_escape_string(join(', ', $hobbies), $db)  . '", ' . 
'"' . mysql_real_escape_string($security_question1, $db)  . '", ' .
'"' . mysql_real_escape_string($security_answer1, $db)  . '", ' .
'"' . mysql_real_escape_string($security_question2, $db)  . '", ' .
'"' . mysql_real_escape_string($security_answer2, $db)  . '") ';
mysql_query($query, $db) or die(mysql_error());

$query = 'INSERT INTO hns_desktop (user_id) VALUES (' . $user_id . ')';
mysql_query($query, $db) or die(mysql_error());

$query = 'CREATE TABLE ' . $username_reg . ' (
message_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
type VARCHAR(20) NOT NULL DEFAULT 0,
user VARCHAR(20) NOT NULL,
user_id INTEGER(10) NOT NULL DEFAULT 0,
user_mid INTEGER(10) NOT NULL,
status INTEGER(1) NOT NULL DEFAULT 0,
date DATETIME NOT NULL DEFAULT "0000-00-00 00:00:00",
subject VARCHAR(255) NOT NULL,
message TEXT(65536) NOT NULL,

PRIMARY KEY (message_id)
)
ENGINE=MyISAM';
mysql_query($query, $message_db) or die(mysql_error($message_db));

$query = 'CREATE TABLE ' . $username_reg . ' (
comment_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
type VARCHAR(20) NOT NULL DEFAULT 0,
user VARCHAR(20) NOT NULL,
user_id INTEGER(10) NOT NULL DEFAULT 0,
user_cid INTEGER(10) NOT NULL,
status INTEGER(1) NOT NULL DEFAULT 0,
date DATETIME NOT NULL DEFAULT "0000-00-00 00:00:00",
comment TEXT(65536) NOT NULL,

PRIMARY KEY (comment_id)
)
ENGINE=MyISAM';
mysql_query($query, $comment_db) or die(mysql_error($comment_db));

$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($username_reg, $db) . '" AND password = PASSWORD("' . mysql_real_escape_string($password, $db) . '")';
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$_SESSION['last_login'] = null;
$_SESSION['last_login_ip'] = null;
$_SESSION['status'] = null;
$_SESSION['mood'] = null;
$_SESSION['default_image'] = null;
$_SESSION['pref_song_astart'] = null;
$_SESSION['pref_psong_astart'] = null;
$_SESSION['pref_upstyle'] = null;
$_SESSION['pref_pupstyle'] = null;
$_SESSION['pref_upview'] = null;
$_SESSION['setting_vmode'] = null;
$_SESSION['setting_theme'] = null;
$_SESSION['setting_language'] = null;

$_SESSION['logged'] = 1;
$_SESSION['username'] = $row['username'];
$_SESSION['admin_level'] = 1;
$_SESSION['fullname'] = $row['fullname'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['middlename'] = $row['middlename'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['email'] = $row['email'];
$_SESSION['user_id'] = $row['user_id'];
$user_id = null;
$username = null;

$logins = 1;

$query = 'UPDATE info SET logins = ' . $logins . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

header('refresh: 8; url=index.php?login=1');
?>
<?php
$query = 'UPDATE login SET last_login_ip = "' . $ip . '" WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
?>
<div class="content">
<p><strong>Thank you <?php echo $_SESSION['username']; ?> for registering!</strong></p>
<p><strong style="color: #ff3333; font-weight: bold;">Your registration is complete! You are being sent to your personal page.</strong></p>
<form name="counter" style="margin: 0px;"><p>If your browser doesn't redirect properly after
<input type="text" size="1" name="cd" style="background-color: transparent; border: 0; font-weight: bold; width: 12px;">
seconds, <a href="user_personal.php?login=1">click here</a>.</strong></p></form>
</div>
<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 9; // add 1 to absolute value
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
<?php }} ?>