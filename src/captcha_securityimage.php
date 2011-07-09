<?php
session_start();

class securityimage {
var $bg, $image, $font, $fontsize, $color, $color2, $fc1, $fc2, $fc3, $nc1, $nc2, $nc3, $strLength, $text = "", $num_dots, $num_dots2,
$chars = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J","k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T","u","U","v","V","w","W","x","X","y","Y","z","Z","1","2","3","4","5","6","7","8","9");

function securityimage() {
	$this -> num_dots = 150;
	$this -> num_dots2 = 150;
	$this -> strLength = 5;
	$this -> fontsize = 18;
	$this -> fc1 = mt_rand(0, 255);
	$this -> fc2 = mt_rand(0, 255);
	$this -> fc3 = mt_rand(0, 255);
	$this -> nc1 = mt_rand(0, 255);
	$this -> nc2 = mt_rand(0, 255);
	$this -> nc3 = mt_rand(0, 255);
	$this -> selectfont();
	$bg = "i/captcha/" . mt_rand(1, 7) . ".png";
	$this -> image = imagecreatefrompng($bg);
	$this -> color = imagecolorallocate($this -> image, $this -> fc1 , $this -> fc2 , $this -> fc3);
	$this -> color2 = imagecolorallocate($this -> image, $this -> nc1 , $this -> nc2 , $this -> nc3);
	$this -> show();
	$_SESSION['SECURITY_CODE'] = $this -> text;
}

function show() {
	header ("content-type: image/png");
	$this -> text = $this -> genString();
	for ($i = 0; $i < $this -> strLength; $i++) $this -> writeLetter($this -> text[$i], (20 + ($i * 25)));
	$this -> addnoise();
	imagepng($this -> image);
	imagedestroy($this -> image);
}

function genstring() {
	for ($i = 0; $i < $this -> strLength; $i++) $this -> text .= $this -> chars[mt_rand(0, (count($this -> chars) - 1))];
	return $this -> text;
}

function writeletter($letter, $xvalue) {
	$yvalue = (30 - mt_rand(0, 10));
	$angle = mt_rand(-30, 30);
	imagettftext($this -> image, $this -> fontsize, $angle, $xvalue, $yvalue, $this -> color, $this -> font, $letter);
}

function ismatch($t) {
	if ($t == $this -> text) return true;
	else return false;
}

function addnoise() {
	$width = imagesx($this -> image);
	$height = imagesy($this -> image);
	for ($i = 0; $i < $this -> num_dots; $i++) imagefilledellipse($this -> image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $this -> color1);
	for ($i = 0; $i < $this -> num_dots2; $i++) imagefilledellipse($this -> image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $this -> color2);
}

function selectfont() {
	switch (mt_rand(1, 5)) {
	case 1: $this -> font = "i/captcha/fonts/acidic.ttf"; break;
	case 2: $this -> font = "i/captcha/fonts/arial.ttf"; break;
	case 3: $this -> font = "i/captcha/fonts/frizzed.ttf"; break;
	case 4: $this -> font = "i/captcha/fonts/layne_moonflower.ttf"; break;
	case 5: $this -> font = "i/captcha/fonts/layne_thornpatch.ttf"; break;
	}
}
}

$secim = new securityimage();
?>