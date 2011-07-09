<?php
session_start();

class securityimage {
var $bg,
$image,
$font, // located in fonts folder
$fontsize,
$color, // color of text
$color2, // color of noise / dots
$fc1, // get font colors
$fc2, // get font colors
$fc3, // get font colors
$nc1, // get font colors
$nc2, // get font colors
$nc3, // get font colors
$strLength, // length of random text
$text = "",
$num_dots, // num of noise dots to add (same color as text)
$num_dots2, // num of noise dots to add (diff color then text)
$chars = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
"k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
"u","U","v","V","w","W","x","X","y","Y","z","Z","1","2","3","4","5","6","7","8","9");

/*
constructor, setup initial values
@return security image
*/
function securityimage() {
$this -> num_dots = 150; // how much noise to add
$this -> num_dots2 = 150; // how much noise to add
$this -> strLength = 5;
$this -> fontsize = 18;
$this -> fc1 = mt_rand(0, 255); // get font colors
$this -> fc2 = mt_rand(0, 255); // get font colors
$this -> fc3 = mt_rand(0, 255); // get font colors
$this -> nc1 = mt_rand(0, 255); // get font colors
$this -> nc2 = mt_rand(0, 255); // get font colors
$this -> nc3 = mt_rand(0, 255); // get font colors
$this -> selectfont(); // decide which font to use
$bg = "i/captcha/" . mt_rand(1, 7) . ".png"; // get bg to use
$this -> image = imagecreatefrompng($bg);
$this -> color = imagecolorallocate($this -> image, $this -> fc1 , $this -> fc2 , $this -> fc3);
$this -> color2 = imagecolorallocate($this -> image, $this -> nc1 , $this -> nc2 , $this -> nc3);

$this -> show(); // automatically show when object created.

// set session variable so our form can compare the text of users input
$_SESSION['SECURITY_CODE'] = $this -> text;
}

function show() { // display our captcha image
header ("content-type: image/png");

$this -> text = $this -> genString();

for ($i = 0; $i < $this -> strLength; $i++) { // write each letter to image
$this -> writeLetter($this -> text[$i], (20 + $i * 25));
}

$this -> addnoise();

imagepng($this -> image);
imagedestroy($this -> image);
}

function genstring() { // generate a random string for our image using the characters in our array.
for ($i = 0; $i < $this -> strLength; $i++) {
$this -> text .= $this -> chars[mt_rand(0, count($this -> chars) - 1)];
}

return $this -> text;
}

function writeletter($letter, $xvalue) { // writes a single letter to the image, using random angles/colors
$yvalue = 30 - mt_rand(0, 10); // randomly adjust y position.
$angle = mt_rand(-30, 30); // give text a slight random angle.

imagettftext($this -> image, $this -> fontsize, $angle, $xvalue, $yvalue, $this -> color, $this -> font, $letter);
}

/*
compares the given text to the one in the security image
@return true if the text matches.
*/
function ismatch($t) {
if ($t == $this -> text) {
return true;
} else {
return false;
}
}

function addnoise() { // function to add extra "noise" or random dots to the image
$width = imagesx($this -> image);
$height = imagesy($this -> image);

for ($i = 0; $i < $this -> num_dots; $i++) { // random dots
imagefilledellipse($this -> image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $this -> color1);
}

for ($i = 0; $i < $this -> num_dots2; $i++) { // random dots
imagefilledellipse($this -> image, mt_rand(0, $width), mt_rand(0, $height), 1, 1, $this -> color2);
}
}

function selectfont() { // choose a random ttf font to use for our captcha text
switch (mt_rand(1, 5)) {
case 1: $this -> font = "i/captcha/fonts/acidic.ttf"; break;
case 2: $this -> font = "i/captcha/fonts/arial.ttf"; break;
case 3: $this -> font = "i/captcha/fonts/frizzed.ttf"; break;
case 4: $this -> font = "i/captcha/fonts/layne_moonflower.ttf"; break;
case 5: $this -> font = "i/captcha/fonts/layne_thornpatch.ttf"; break;
}
}
}

// create a new object when we include this file.
$secim = new securityimage();
?>