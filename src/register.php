<?php
session_start();

include ("db.member.inc.php");
include ("login.inc.php");

$hobbies_list = array('Biking', 'Computers', 'Cooking', 'Dancing', 'Exercise', 'Flying', 'Gaming', 'Golfing', 'Hiking', 'Hunting', 'Internet', 'Reading', 'Running', 'School', 'Singing', 'Skiing', 'Swimming', 'Traveling', 'Other than listed', 'Websites');

if (isset($_POST['register']) && $_POST['register'] == 'Register') {
// filter incoming values
$username_reg = (isset($_POST['username_reg'])) ? trim($_POST['username_reg']) : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$password_ver = (isset($_POST['password_ver'])) ? $_POST['password_ver'] : '';
$first_name = (isset($_POST['first_name'])) ? trim($_POST['first_name']) : '';
$last_name = (isset($_POST['last_name'])) ? trim($_POST['last_name']) : '';
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

$header_registererrors = array();

// make sure manditory fields have been entered
if (empty($username_reg)) {
$header_registererrors[] = 'Username cannot be blank.';
}

if (preg_match('/[,]/', $username_reg)) {
$header_registererrors[] = 'Username cannot have commas.';
}

if (preg_match('/[ ]/', $username_reg)) {
$header_registererrors[] = 'Username cannot have spaces.';
}

if (preg_match('/[-]/', $username_reg)) {
$header_registererrors[] = 'Username cannot have dashes.';
}

if (preg_match('/[.]/', $username_reg)) {
$header_registererrors[] = 'Username cannot have periods.';
}

// check if username is already registered
$query = 'SELECT username FROM login WHERE username = "' . $username_reg . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) > 0) {
$header_registererrors[] = 'Username ' . $username_reg . ' is already registered.';
$username_reg = '';
}
mysql_free_result($result);

if (empty($password) && !empty($password_ver)) {
$header_registererrors[] = 'Password cannot be blank.';
}

if (empty($password) && empty($password_ver)) {
$header_registererrors[] = 'Passwords cannot be blank.';
}

if (!empty($password)) {
if (empty($password_ver)) {
$header_registererrors[] = 'Please confirm your password.';
}

if (!empty($password_ver)) {
if ($password != $password_ver) {
$header_registererrors[] = 'Both of your passwords need to match.';
}
}

if ($username == $password) {
$header_registererrors[] = 'Username & Password Cannot Be The Same.';
}
}

if (empty($first_name)) {
$header_registererrors[] = 'First Name cannot be blank.';
}

if (empty($last_name)) {
$header_registererrors[] = 'Last Name cannot be blank.';
}

if (empty($email)) {
$header_registererrors[] = 'Email Address cannot be blank.';
} else {
if (preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}?$/i", $email)) {
} else {
$header_registererrors[] = 'Email Address should be in correct form.';
}
}

if (empty($gender)) {
$header_registererrors[] = 'Gender cannot be blank.';
}

if ($birth_month == 0 && $birth_day == 0 && $birth_year == 0) {
$header_registererrors[] = 'Birth Date cannot be blank.';
} elseif ($birth_month == 0) {
$header_registererrors[] = 'Birth Month cannot be blank.';
} elseif ($birth_day == 0) {
$header_registererrors[] = 'Birth Day cannot be blank.';
} elseif ($birth_year == 0) {
$header_registererrors[] = 'Birth Year cannot be blank.';
}

if (empty($hometown)) {
$header_registererrors[] = 'Hometown cannot be blank.';
}

if (empty($hobbies)) {
$header_registererrors[] = 'Hobbies cannot be blank.';
}

if ($security_question1 == $security_question2) {
$header_registererrors[] = 'Security Questions cannot be the same.';
}

if (empty($security_question1) || ($security_question1 == 0)) {
$header_registererrors[] = 'Security Question 1 cannot be blank.';
}

if (empty($security_answer1)) {
$header_registererrors[] = 'Security Answer 1 cannot be blank.';
}

if (empty($security_question2) || ($security_question2 == 0)) {
$header_registererrors[] = 'Security Question 2 cannot be blank.';
}

if (empty($security_answer2)) {
$header_registererrors[] = 'Security Answer 2 cannot be blank.';
}

// check to see if security codes match
if ($_POST['txtsecuritycode'] == $_SESSION['SECURITY_CODE']) {
} else {
$header_registererrors[] = 'Security Code cannot be incorrect.';
$footer_error = '<p><strong style="color : #ff3333; weight : bold; ">Security Code cannot be incorrect.</strong></p>';
}

if (count($header_registererrors) > 0) {
} else { // no errors so enter the data into the database
if (empty($community)) {
$community = $hometown;
}

$last_login = date('Y-m-d');
$date_joined = date('Y-m-d');
$access_level = 1;

$query = 'INSERT INTO login (user_id, username, password, access_level, last_login, date_joined)
VALUES
(NULL, "' . mysql_real_escape_string($username_reg, $db)  . '", ' .
'PASSWORD("' . mysql_real_escape_string($password, $db)  . '"), "' . $access_level . '", "' . $last_login . '", "' . $date_joined . '") ';
mysql_query($query, $db) or die(mysql_error());

$user_id = mysql_insert_id($db);

$query = 'INSERT INTO info (user_id, first_name, last_name, email, gender, birth_month, birth_day, birth_year, hometown, community, hobbies, security_question1, security_answer1, security_question2, security_answer2)
VALUES
(' . $user_id . ', ' .
'"' . mysql_real_escape_string($first_name, $db)  . '", ' .
'"' . mysql_real_escape_string($last_name, $db)  . '", ' .
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

$query = 'SELECT * FROM
login u
JOIN
info i
ON
u.user_id = i.user_id
WHERE ' .
'username = "' . mysql_real_escape_string($username_reg, $db) .
'" AND ' .
'password = PASSWORD("' . mysql_real_escape_string($password, $db) . '")';
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

// clear misc session variables if registering user was logged in
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

// set new variables over existing if user was logged in
$_SESSION['logged'] = 1;
$_SESSION['username'] = $row['username'];
$_SESSION['admin_level'] = 1;
$_SESSION['first_name'] = $row['first_name'];
$_SESSION['last_name'] = $row['last_name'];
$_SESSION['email'] = $row['email'];
$_SESSION['user_id'] = $row['user_id'];
$user_id = null;
$username = null;

$logins = 1;

$query = 'UPDATE info SET
logins = ' . $logins . '
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

header('refresh: 8; url=user_personal.php?login=1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces we offer you a free profile with many cool and interesting things! This is the place to be creative!" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
</head>

<body>
<?php
$query = 'UPDATE login SET
last_login_ip = "' . $ip . '"
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
?>
<!-- Begin page content -->
<div class="pagecontent">
<p><strong>Thank you <?php echo $_SESSION['username']; ?> for registering!</strong></p>
<p><strong style="color : #ff3333; font-weight : bold; ">Your registration is complete! You are being sent to your personal page.</strong></p>
<form name="counter" style="margin : 0px; "><p>If your browser doesn't redirect properly after
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; font-weight : bold; width : 12px; ">
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
<!-- End page content -->
</body>

</html>
<?php
die();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces we offer you a free profile with many cool and interesting things! This is the place to be creative!" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<script type="text/javascript">
<!--
function updatecaptchaimg() {
document.captchaimg.src = document.captchaimg.src + '?';
}
-->
</script>
<style type="text/css">
td { 
	vertical-align : top; 
	}

div.pagecontent table td.label { 
	padding : 6px; 
	text-align : right; 
	}

div.pagecontent table td.input { 
	padding : 6px; 
	text-align : left; 
	}

div.pagecontent input[type="text"] {
	font-size : 14pt; 
	height : 25px; 
	letter-spacing : 2px; 
	line-height : 25px; 
	}

div.pagecontent input[type="password"] {
	font-size : 14pt; 
	height : 25px; 
	letter-spacing : 2px; 
	line-height : 25px; 
	}

div.pagecontent input[type="radio"] {
	font-size : 14pt; 
	height : 25px; 
	letter-spacing : 2px; 
	line-height : 25px; 
	}

div.pagecontent input[type="submit"] {
	font-size : 13pt; 
	height : 36px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}

div.pagecontent table td.input span.radio { 
	left : 2px; 
	position : relative; 
	top : -6.5px; 
	}
</style>
</head>

<body>
<!-- Begin page content -->
<div class="pagecontent">
<h1>Register</h1>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="register">
<fieldset style="margin : 0 auto; width : 75%; ">
<legend>Login Credentials&nbsp;</legend>
<table style="margin-bottom : 10px; margin-top : 10px; ">
<tr>
<td class="label"><label for="username_reg">Username:</label></td>
<td class="input"><input type="text" name="username_reg" id="username_reg" size="26" maxlength="20" value="<?php echo $username_reg; ?>" />
<small class="formreminder">( You can't change your username after you signup )</small></td>
</tr>
<tr>
<td class="label"><label for="password">Password:</label></td>
<td class="input"><input type="password" name="password" id="password" size="26" maxlength="20" value="" /></td>
</tr>
<tr>
<td class="label"><label for="password_ver">Confirm Password:</label></td>
<td class="input"><input type="password" name="password_ver" id="password_ver" size="26" maxlength="20" value="" />
</td>
</tr>
</table>
</fieldset>
<br /><br />
<fieldset style="margin : 0 auto; width : 75%; ">
<legend>Personal Information&nbsp;</legend>
<table style="margin-bottom : 10px; margin-top : 10px; ">
<tr>
<td class="label"><label for="first_name">First Name:</label></td>
<td class="input"><input type="text" name="first_name" id="first_name" size="26" maxlength="20" value="<?php echo $first_name ?>" /></td>
</tr>
<tr>
<td class="label"><label for="last_name">Last Name:</label></td>
<td class="input"><input type="text" name="last_name" id="last_name" size="26" maxlength="20" value="<?php echo $last_name ?>" /></td>
</tr>
<tr>
<td class="label"><label for="email">Email:</label></td>
<td class="input"><input type="text" name="email" id="email" size="26" maxlength="50" value="<?php echo $email ?>" /></td>
</tr>
<tr>
<td class="label"><label for="gender">Gender:</label></td>
<td class="input">
<input type="radio" name="gender" id="gender" value="Male" <?php if ($gender == "Male") { echo 'checked="checked"'; } ?> /><span class="radio">Male</span>
<input type="radio" name="gender" id="gender" value="Female" <?php if ($gender == "Female") { echo 'checked="checked"'; } ?> /><span class="radio">Female</span>
</td>
</tr>
<tr>
<td class="label">Birth Date:</td>
<td class="input">
<select name="birth_month" id="birth_month">
<option value="0" <?php if ($birth_month == 0 || null) { echo 'selected="selected"'; } ?>></option>
<option value="1" <?php if ($birth_month == 1) { echo 'selected="selected"'; } ?>>&nbsp;January</option>
<option value="2" <?php if ($birth_month == 2) { echo 'selected="selected"'; } ?>>&nbsp;February</option>
<option value="3" <?php if ($birth_month == 3) { echo 'selected="selected"'; } ?>>&nbsp;March</option>
<option value="4" <?php if ($birth_month == 4) { echo 'selected="selected"'; } ?>>&nbsp;April</option>
<option value="5" <?php if ($birth_month == 5) { echo 'selected="selected"'; } ?>>&nbsp;May</option>
<option value="6" <?php if ($birth_month == 6) { echo 'selected="selected"'; } ?>>&nbsp;June</option>
<option value="7" <?php if ($birth_month == 7) { echo 'selected="selected"'; } ?>>&nbsp;July</option>
<option value="8" <?php if ($birth_month == 8) { echo 'selected="selected"'; } ?>>&nbsp;August</option>
<option value="9" <?php if ($birth_month == 9) { echo 'selected="selected"'; } ?>>&nbsp;September</option>
<option value="10" <?php if ($birth_month == 10) { echo 'selected="selected"'; } ?>>&nbsp;October</option>
<option value="11" <?php if ($birth_month == 11) { echo 'selected="selected"'; } ?>>&nbsp;November</option>
<option value="12" <?php if ($birth_month == 12) { echo 'selected="selected"'; } ?>>&nbsp;December</option>
</select>
<select name="birth_day" id="birth_day">
<option value="0" <?php if ($birth_day == 0 || null) { echo 'selected="selected"'; } ?>></option>
<option value="1" <?php if ($birth_day == 1) { echo 'selected="selected"'; } ?>>&nbsp;1</option>
<option value="2" <?php if ($birth_day == 2) { echo 'selected="selected"'; } ?>>&nbsp;2</option>
<option value="3" <?php if ($birth_day == 3) { echo 'selected="selected"'; } ?>>&nbsp;3</option>
<option value="4" <?php if ($birth_day == 4) { echo 'selected="selected"'; } ?>>&nbsp;4</option>
<option value="5" <?php if ($birth_day == 5) { echo 'selected="selected"'; } ?>>&nbsp;5</option>
<option value="6" <?php if ($birth_day == 6) { echo 'selected="selected"'; } ?>>&nbsp;6</option>
<option value="7" <?php if ($birth_day == 7) { echo 'selected="selected"'; } ?>>&nbsp;7</option>
<option value="8" <?php if ($birth_day == 8) { echo 'selected="selected"'; } ?>>&nbsp;8</option>
<option value="9" <?php if ($birth_day == 9) { echo 'selected="selected"'; } ?>>&nbsp;9</option>
<option value="10" <?php if ($birth_day == 10) { echo 'selected="selected"'; } ?>>&nbsp;10</option>
<option value="11" <?php if ($birth_day == 11) { echo 'selected="selected"'; } ?>>&nbsp;11</option>
<option value="12" <?php if ($birth_day == 12) { echo 'selected="selected"'; } ?>>&nbsp;12</option>
<option value="13" <?php if ($birth_day == 13) { echo 'selected="selected"'; } ?>>&nbsp;13</option>
<option value="14" <?php if ($birth_day == 14) { echo 'selected="selected"'; } ?>>&nbsp;14</option>
<option value="15" <?php if ($birth_day == 15) { echo 'selected="selected"'; } ?>>&nbsp;15</option>
<option value="16" <?php if ($birth_day == 16) { echo 'selected="selected"'; } ?>>&nbsp;16</option>
<option value="17" <?php if ($birth_day == 17) { echo 'selected="selected"'; } ?>>&nbsp;17</option>
<option value="18" <?php if ($birth_day == 18) { echo 'selected="selected"'; } ?>>&nbsp;18</option>
<option value="19" <?php if ($birth_day == 19) { echo 'selected="selected"'; } ?>>&nbsp;19</option>
<option value="20" <?php if ($birth_day == 20) { echo 'selected="selected"'; } ?>>&nbsp;20</option>
<option value="21" <?php if ($birth_day == 21) { echo 'selected="selected"'; } ?>>&nbsp;21</option>
<option value="22" <?php if ($birth_day == 22) { echo 'selected="selected"'; } ?>>&nbsp;22</option>
<option value="23" <?php if ($birth_day == 23) { echo 'selected="selected"'; } ?>>&nbsp;23</option>
<option value="24" <?php if ($birth_day == 24) { echo 'selected="selected"'; } ?>>&nbsp;24</option>
<option value="25" <?php if ($birth_day == 25) { echo 'selected="selected"'; } ?>>&nbsp;25</option>
<option value="26" <?php if ($birth_day == 26) { echo 'selected="selected"'; } ?>>&nbsp;26</option>
<option value="27" <?php if ($birth_day == 27) { echo 'selected="selected"'; } ?>>&nbsp;27</option>
<option value="28" <?php if ($birth_day == 28) { echo 'selected="selected"'; } ?>>&nbsp;28</option>
<option value="29" <?php if ($birth_day == 29) { echo 'selected="selected"'; } ?>>&nbsp;29</option>
<option value="30" <?php if ($birth_day == 30) { echo 'selected="selected"'; } ?>>&nbsp;30</option>
<option value="31" <?php if ($birth_day == 31) { echo 'selected="selected"'; } ?>>&nbsp;31</option>
</select>
<select name="birth_year" id="birth_year">
<option value="0" <?php if ($birth_year == 0 || null) { echo 'selected="selected"'; } ?>></option>
<option value="2010" <?php if ($birth_year == 2010) { echo 'selected="selected"'; } ?>>&nbsp;2010</option>
<option value="2009" <?php if ($birth_year == 2009) { echo 'selected="selected"'; } ?>>&nbsp;2009</option>
<option value="2008" <?php if ($birth_year == 2008) { echo 'selected="selected"'; } ?>>&nbsp;2008</option>
<option value="2007" <?php if ($birth_year == 2007) { echo 'selected="selected"'; } ?>>&nbsp;2007</option>
<option value="2006" <?php if ($birth_year == 2006) { echo 'selected="selected"'; } ?>>&nbsp;2006</option>
<option value="2005" <?php if ($birth_year == 2005) { echo 'selected="selected"'; } ?>>&nbsp;2005</option>
<option value="2004" <?php if ($birth_year == 2004) { echo 'selected="selected"'; } ?>>&nbsp;2004</option>
<option value="2003" <?php if ($birth_year == 2003) { echo 'selected="selected"'; } ?>>&nbsp;2003</option>
<option value="2002" <?php if ($birth_year == 2002) { echo 'selected="selected"'; } ?>>&nbsp;2002</option>
<option value="2001" <?php if ($birth_year == 2001) { echo 'selected="selected"'; } ?>>&nbsp;2001</option>
<option value="2000" <?php if ($birth_year == 2000) { echo 'selected="selected"'; } ?>>&nbsp;2000</option>
<option value="1999" <?php if ($birth_year == 1999) { echo 'selected="selected"'; } ?>>&nbsp;1999</option>
<option value="1998" <?php if ($birth_year == 1998) { echo 'selected="selected"'; } ?>>&nbsp;1998</option>
<option value="1997" <?php if ($birth_year == 1997) { echo 'selected="selected"'; } ?>>&nbsp;1997</option>
<option value="1996" <?php if ($birth_year == 1996) { echo 'selected="selected"'; } ?>>&nbsp;1996</option>
<option value="1995" <?php if ($birth_year == 1995) { echo 'selected="selected"'; } ?>>&nbsp;1995</option>
<option value="1994" <?php if ($birth_year == 1994) { echo 'selected="selected"'; } ?>>&nbsp;1994</option>
<option value="1993" <?php if ($birth_year == 1993) { echo 'selected="selected"'; } ?>>&nbsp;1993</option>
<option value="1992" <?php if ($birth_year == 1992) { echo 'selected="selected"'; } ?>>&nbsp;1992</option>
<option value="1991" <?php if ($birth_year == 1991) { echo 'selected="selected"'; } ?>>&nbsp;1991</option>
<option value="1990" <?php if ($birth_year == 1990) { echo 'selected="selected"'; } ?>>&nbsp;1990</option>
<option value="1989" <?php if ($birth_year == 1989) { echo 'selected="selected"'; } ?>>&nbsp;1989</option>
<option value="1988" <?php if ($birth_year == 1988) { echo 'selected="selected"'; } ?>>&nbsp;1988</option>
<option value="1987" <?php if ($birth_year == 1987) { echo 'selected="selected"'; } ?>>&nbsp;1987</option>
<option value="1986" <?php if ($birth_year == 1986) { echo 'selected="selected"'; } ?>>&nbsp;1986</option>
<option value="1985" <?php if ($birth_year == 1985) { echo 'selected="selected"'; } ?>>&nbsp;1985</option>
<option value="1984" <?php if ($birth_year == 1984) { echo 'selected="selected"'; } ?>>&nbsp;1984</option>
<option value="1983" <?php if ($birth_year == 1983) { echo 'selected="selected"'; } ?>>&nbsp;1983</option>
<option value="1982" <?php if ($birth_year == 1982) { echo 'selected="selected"'; } ?>>&nbsp;1982</option>
<option value="1981" <?php if ($birth_year == 1981) { echo 'selected="selected"'; } ?>>&nbsp;1981</option>
<option value="1980" <?php if ($birth_year == 1980) { echo 'selected="selected"'; } ?>>&nbsp;1980</option>
<option value="1979" <?php if ($birth_year == 1979) { echo 'selected="selected"'; } ?>>&nbsp;1979</option>
<option value="1978" <?php if ($birth_year == 1978) { echo 'selected="selected"'; } ?>>&nbsp;1978</option>
<option value="1977" <?php if ($birth_year == 1977) { echo 'selected="selected"'; } ?>>&nbsp;1977</option>
<option value="1976" <?php if ($birth_year == 1976) { echo 'selected="selected"'; } ?>>&nbsp;1976</option>
<option value="1975" <?php if ($birth_year == 1975) { echo 'selected="selected"'; } ?>>&nbsp;1975</option>
<option value="1974" <?php if ($birth_year == 1974) { echo 'selected="selected"'; } ?>>&nbsp;1974</option>
<option value="1973" <?php if ($birth_year == 1973) { echo 'selected="selected"'; } ?>>&nbsp;1973</option>
<option value="1972" <?php if ($birth_year == 1972) { echo 'selected="selected"'; } ?>>&nbsp;1972</option>
<option value="1971" <?php if ($birth_year == 1971) { echo 'selected="selected"'; } ?>>&nbsp;1971</option>
<option value="1970" <?php if ($birth_year == 1970) { echo 'selected="selected"'; } ?>>&nbsp;1970</option>
<option value="1969" <?php if ($birth_year == 1969) { echo 'selected="selected"'; } ?>>&nbsp;1969</option>
<option value="1968" <?php if ($birth_year == 1968) { echo 'selected="selected"'; } ?>>&nbsp;1968</option>
<option value="1967" <?php if ($birth_year == 1967) { echo 'selected="selected"'; } ?>>&nbsp;1967</option>
<option value="1966" <?php if ($birth_year == 1966) { echo 'selected="selected"'; } ?>>&nbsp;1966</option>
<option value="1965" <?php if ($birth_year == 1965) { echo 'selected="selected"'; } ?>>&nbsp;1965</option>
<option value="1964" <?php if ($birth_year == 1964) { echo 'selected="selected"'; } ?>>&nbsp;1964</option>
<option value="1963" <?php if ($birth_year == 1963) { echo 'selected="selected"'; } ?>>&nbsp;1963</option>
<option value="1962" <?php if ($birth_year == 1962) { echo 'selected="selected"'; } ?>>&nbsp;1962</option>
<option value="1961" <?php if ($birth_year == 1961) { echo 'selected="selected"'; } ?>>&nbsp;1961</option>
<option value="1960" <?php if ($birth_year == 1960) { echo 'selected="selected"'; } ?>>&nbsp;1960</option>
<option value="1959" <?php if ($birth_year == 1959) { echo 'selected="selected"'; } ?>>&nbsp;1959</option>
<option value="1958" <?php if ($birth_year == 1958) { echo 'selected="selected"'; } ?>>&nbsp;1958</option>
<option value="1957" <?php if ($birth_year == 1957) { echo 'selected="selected"'; } ?>>&nbsp;1957</option>
<option value="1956" <?php if ($birth_year == 1956) { echo 'selected="selected"'; } ?>>&nbsp;1956</option>
<option value="1955" <?php if ($birth_year == 1955) { echo 'selected="selected"'; } ?>>&nbsp;1955</option>
<option value="1954" <?php if ($birth_year == 1954) { echo 'selected="selected"'; } ?>>&nbsp;1954</option>
<option value="1953" <?php if ($birth_year == 1953) { echo 'selected="selected"'; } ?>>&nbsp;1953</option>
<option value="1952" <?php if ($birth_year == 1952) { echo 'selected="selected"'; } ?>>&nbsp;1952</option>
<option value="1951" <?php if ($birth_year == 1951) { echo 'selected="selected"'; } ?>>&nbsp;1951</option>
<option value="1950" <?php if ($birth_year == 1950) { echo 'selected="selected"'; } ?>>&nbsp;1950</option>
<option value="1949" <?php if ($birth_year == 1949) { echo 'selected="selected"'; } ?>>&nbsp;1949</option>
<option value="1948" <?php if ($birth_year == 1948) { echo 'selected="selected"'; } ?>>&nbsp;1948</option>
<option value="1947" <?php if ($birth_year == 1947) { echo 'selected="selected"'; } ?>>&nbsp;1947</option>
<option value="1946" <?php if ($birth_year == 1946) { echo 'selected="selected"'; } ?>>&nbsp;1946</option>
<option value="1945" <?php if ($birth_year == 1945) { echo 'selected="selected"'; } ?>>&nbsp;1945</option>
<option value="1944" <?php if ($birth_year == 1944) { echo 'selected="selected"'; } ?>>&nbsp;1944</option>
<option value="1943" <?php if ($birth_year == 1943) { echo 'selected="selected"'; } ?>>&nbsp;1943</option>
<option value="1942" <?php if ($birth_year == 1942) { echo 'selected="selected"'; } ?>>&nbsp;1942</option>
<option value="1941" <?php if ($birth_year == 1941) { echo 'selected="selected"'; } ?>>&nbsp;1941</option>
<option value="1940" <?php if ($birth_year == 1940) { echo 'selected="selected"'; } ?>>&nbsp;1940</option>
<option value="1939" <?php if ($birth_year == 1939) { echo 'selected="selected"'; } ?>>&nbsp;1939</option>
<option value="1938" <?php if ($birth_year == 1938) { echo 'selected="selected"'; } ?>>&nbsp;1938</option>
<option value="1937" <?php if ($birth_year == 1937) { echo 'selected="selected"'; } ?>>&nbsp;1937</option>
<option value="1936" <?php if ($birth_year == 1936) { echo 'selected="selected"'; } ?>>&nbsp;1936</option>
<option value="1935" <?php if ($birth_year == 1935) { echo 'selected="selected"'; } ?>>&nbsp;1935</option>
<option value="1934" <?php if ($birth_year == 1934) { echo 'selected="selected"'; } ?>>&nbsp;1934</option>
<option value="1933" <?php if ($birth_year == 1933) { echo 'selected="selected"'; } ?>>&nbsp;1933</option>
<option value="1932" <?php if ($birth_year == 1932) { echo 'selected="selected"'; } ?>>&nbsp;1932</option>
<option value="1931" <?php if ($birth_year == 1931) { echo 'selected="selected"'; } ?>>&nbsp;1931</option>
<option value="1930" <?php if ($birth_year == 1930) { echo 'selected="selected"'; } ?>>&nbsp;1930</option>
<option value="1929" <?php if ($birth_year == 1929) { echo 'selected="selected"'; } ?>>&nbsp;1929</option>
<option value="1928" <?php if ($birth_year == 1928) { echo 'selected="selected"'; } ?>>&nbsp;1928</option>
<option value="1927" <?php if ($birth_year == 1927) { echo 'selected="selected"'; } ?>>&nbsp;1927</option>
<option value="1926" <?php if ($birth_year == 1926) { echo 'selected="selected"'; } ?>>&nbsp;1926</option>
<option value="1925" <?php if ($birth_year == 1925) { echo 'selected="selected"'; } ?>>&nbsp;1925</option>
<option value="1924" <?php if ($birth_year == 1924) { echo 'selected="selected"'; } ?>>&nbsp;1924</option>
<option value="1923" <?php if ($birth_year == 1923) { echo 'selected="selected"'; } ?>>&nbsp;1923</option>
<option value="1922" <?php if ($birth_year == 1922) { echo 'selected="selected"'; } ?>>&nbsp;1922</option>
<option value="1921" <?php if ($birth_year == 1921) { echo 'selected="selected"'; } ?>>&nbsp;1921</option>
<option value="1920" <?php if ($birth_year == 1920) { echo 'selected="selected"'; } ?>>&nbsp;1920</option>
<option value="1919" <?php if ($birth_year == 1919) { echo 'selected="selected"'; } ?>>&nbsp;1919</option>
<option value="1918" <?php if ($birth_year == 1918) { echo 'selected="selected"'; } ?>>&nbsp;1918</option>
<option value="1917" <?php if ($birth_year == 1917) { echo 'selected="selected"'; } ?>>&nbsp;1917</option>
<option value="1916" <?php if ($birth_year == 1916) { echo 'selected="selected"'; } ?>>&nbsp;1916</option>
<option value="1915" <?php if ($birth_year == 1915) { echo 'selected="selected"'; } ?>>&nbsp;1915</option>
<option value="1914" <?php if ($birth_year == 1914) { echo 'selected="selected"'; } ?>>&nbsp;1914</option>
<option value="1913" <?php if ($birth_year == 1913) { echo 'selected="selected"'; } ?>>&nbsp;1913</option>
<option value="1912" <?php if ($birth_year == 1912) { echo 'selected="selected"'; } ?>>&nbsp;1912</option>
<option value="1911" <?php if ($birth_year == 1911) { echo 'selected="selected"'; } ?>>&nbsp;1911</option>
<option value="1910" <?php if ($birth_year == 1910) { echo 'selected="selected"'; } ?>>&nbsp;1910</option>
<option value="1909" <?php if ($birth_year == 1909) { echo 'selected="selected"'; } ?>>&nbsp;1909</option>
<option value="1908" <?php if ($birth_year == 1908) { echo 'selected="selected"'; } ?>>&nbsp;1908</option>
<option value="1907" <?php if ($birth_year == 1907) { echo 'selected="selected"'; } ?>>&nbsp;1907</option>
<option value="1906" <?php if ($birth_year == 1906) { echo 'selected="selected"'; } ?>>&nbsp;1906</option>
<option value="1905" <?php if ($birth_year == 1905) { echo 'selected="selected"'; } ?>>&nbsp;1905</option>
<option value="1904" <?php if ($birth_year == 1904) { echo 'selected="selected"'; } ?>>&nbsp;1904</option>
<option value="1903" <?php if ($birth_year == 1903) { echo 'selected="selected"'; } ?>>&nbsp;1903</option>
<option value="1902" <?php if ($birth_year == 1902) { echo 'selected="selected"'; } ?>>&nbsp;1902</option>
</select>
</td>
</tr>
<tr>
<td class="label"><label for="hometown">Hometown:</label></td>
<td class="input"><input type="text" name="hometown" id="hometown" size="26" maxlength="50" value="<?php echo $hometown ?>" /></td>
</tr>
<tr>
<td class="label"><label for="community">Community:</label></td>
<td class="input"><input type="text" name="community" id="community" size="26" maxlength="50" value="<?php echo $community ?>" />
<small class="formreminder">( Current Location, School, Business, or Group )</small></td>
</tr>
<tr>
<td class="label"><label for="hobbies">Hobbies / Interests:</label></td>
<td class="input"><select name="hobbies[]" id="hobbies" size="10" multiple="multiple">
<?php
foreach ($hobbies_list as $hobby) {
if (in_array($hobby, $hobbies)) {
echo '<option value="' . $hobby . '" selected="selected">' . $hobby . '</option>';
} else {
echo '<option value="' . $hobby . '">' . $hobby . '</option>';
}
}
?>
</select>
<small class="formreminder">( Hold Ctrl to select more than one )</small></td>
</tr>
</table>
<br /><br />
</fieldset>
<br /><br />
<fieldset style="margin : 0 auto; width : 75%; ">
<legend>Security Questions&nbsp;</legend>
<div style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">
<fieldset style="margin : 0 auto; width : 90%; ">
<legend>Question 1&nbsp;</legend>
<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">
<tr>
<td class="label"><label for="security_question1">Question:</label></td>
<td class="input">
<select name="security_question1" id="security_question1">
<option value="0" <?php if ($security_question1 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>
<option value="1" <?php if ($security_question1 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>
<option value="2" <?php if ($security_question1 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>
<option value="3" <?php if ($security_question1 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>
<option value="4" <?php if ($security_question1 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>
<option value="5" <?php if ($security_question1 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>
<option value="6" <?php if ($security_question1 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>
<option value="7" <?php if ($security_question1 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>
<option value="8" <?php if ($security_question1 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>
<option value="9" <?php if ($security_question1 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>
<option value="10" <?php if ($security_question1 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>
<option value="11" <?php if ($security_question1 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>
<option value="12" <?php if ($security_question1 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>
</select>
</td>
</tr>
<tr>
<td class="label"><label for="security_answer1">Answer:</label></td>
<td class="input"><input type="text" name="security_answer1" id="security_answer1" size="35" maxlength="50" value="<?php echo $security_answer1; ?>" /></td>
</tr>
</table>
</fieldset>
<br />
<fieldset style="margin : 0 auto; width : 90%; ">
<legend>Question 2&nbsp;</legend>
<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">
<tr>
<td class="label"><label for="security_question2">Question:</label></td>
<td class="input">
<select name="security_question2" id="security_question2">
<option value="0" <?php if ($security_question2 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>
<option value="1" <?php if ($security_question2 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>
<option value="2" <?php if ($security_question2 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>
<option value="3" <?php if ($security_question2 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>
<option value="4" <?php if ($security_question2 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>
<option value="5" <?php if ($security_question2 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>
<option value="6" <?php if ($security_question2 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>
<option value="7" <?php if ($security_question2 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>
<option value="8" <?php if ($security_question2 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>
<option value="9" <?php if ($security_question2 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>
<option value="10" <?php if ($security_question2 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>
<option value="11" <?php if ($security_question2 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>
<option value="12" <?php if ($security_question2 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>
</select>
</td>
</tr>
<tr>
<td class="label"><label for="security_answer2">Answer:</label></td>
<td class="input"><input type="text" name="security_answer2" id="security_answer2" size="35" maxlength="50" value="<?php echo $security_answer2; ?>" /></td>
</tr>
</table>
</fieldset>
</div>
<div style="margin-bottom : 10px; ">
<small class="formreminder">( If you ever forget your password you will need to answer these questions to get it reset )</small>
</div>
</fieldset>
<br /><br />
<fieldset style="margin : 0 auto; width : 75%; ">
<legend>Security Code&nbsp;</legend>
<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">
<tr>
<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size : 18pt; height : 30px; letter-spacing : 2px; line-height : 30px; margin-right : 5px; text-align : center; " /></td>
<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>
<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width : 0px; margin-left : 5px; margin-top : 7px; " /></a></td>
</tr>
</table>
<br />
<div>
<input type="submit" name="register" value="Register" />
</div>
<br />
</fieldset>
</form>
<script type="text/javascript">
document.register.username.focus();
</script>
</div>
<!-- End page content -->
</body>

</html>