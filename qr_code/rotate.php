<?php
/**
 * Rotate the Image
 */

$value = filter_input(INPUT_GET, "text");
$color = filter_input(INPUT_GET, "color");
$angle = filter_input(INPUT_GET, "angle");

$filename = "http://localhost/qr_pass.php?text='".$value."'&color='".$color."'";

//$filename = 'http://localhost/qr_pass.php?text=scscscscscscscscscsc&color=ebeb1a';
//$filename = "temp/qr_code123.png";


$rot =Array(45, 90, -180, 0);

$i = rand(0,3);


header('Content-type: image/png');

$source = imagecreatefrompng($filename);
/*$rgb = imagecolorat($im, 10, 15);
$colors = imagecolorsforindex($im, $rgb);*/


$rotate = imagerotate($source, $rot[$i],0);

/*imagesavealpha($rotate, TRUE);
imagealphablending($rotate, false);*/

imagepng($rotate);

?>