<?php
$f = new SWFBrowserFont("Impact");
$m = new SWFMovie();
$m -> setRate(24.0);
$m -> setDimension(520, 320);
$m -> setBackground(251, 121, 34); 

function text($r, $g, $b, $a, $rot, $x, $y, $scale, $string) {
global $f, $m;

$t = new SWFText();
$t -> setFont($f);
$t -> setColor($r, $g, $b, $a);
$t -> setHeight(96);
$t -> moveTo(-($t -> getWidth($string)) / 2, 32);
$t -> addString($string);

$i = $m -> add($t);
$i -> rotateTo($rot);
$i -> moveTo($x, $y);
$i -> scale($scale, $scale);

return $i;
}

$colorr[1] = 255 * 0.85;
$colorg[1] = 255 * 0.85;
$colorb[1] = 255 * 0.85;

$colorr[2] = 255 * 0.9;
$colorg[2] = 255 * 0.9;
$colorb[2] = 255 * 0.9;

$colorr[3] = 255 * 0.95;
$colorg[3] = 255 * 0.95;
$colorb[3] = 255 * 0.95;

$colorr[4] = 255;
$colorg[4] = 255;
$colorb[4] = 255;

$c = 1;
$anz = 4;
$step = 4 / $anz;

for ($i = 0; $i < $anz; $i += 1) {
$x = 1040;
$y = 50 + $i * 30;
$size = ($i / 5 + 0.2);
$t[$i] = text($colorr[$c], $colorg[$c], $colorb[$c], 0xff, 0, $x, $y, $size, $_GET['text']);
$c += $step;
}

$frames = 300;

for ($j = 0; $j < $frames; $j++) {
for ($i = 0; $i < $anz; $i++) {
$t[$i] -> moveTo(260 + round(sin($j / $frames * 2 * pi() + $i) * (50 + 50 * ($i + 1))), 160 + round(sin($j / $frames * 4 * pi() + $i) * (20 + 20 * ($i + 1))));
$t[$i] -> rotateTo(round(sin($j / $frames * 2 * pi() + $i / 10) * 360));
}
$m -> nextFrame();
}

header('Content-Type: application/x-shockwave-flash');
$m -> output(0);
exit;
?>