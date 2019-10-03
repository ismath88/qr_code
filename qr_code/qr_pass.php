<?php
class myParams {
    static public $red = 0;
    static public $green = 0;
    static public $blue = 0;

    public static function getRed() {
        return self::$red;
    }
    public static function getGreen() {
        return self::$green;
    }
    public static function getBlue() {
        return self::$blue;
    }
}

include "phpqrcode.php";
include "qrlib.php";
//

$value = filter_input(INPUT_GET, "text");
$color = filter_input(INPUT_GET, "color");
$angle = filter_input(INPUT_GET, "angle");

$ret = ARRAY(
        'r' => hexdec(substr($color, 0, 2)),
        'g' => hexdec(substr($color, 2, 2)),
        'b' => hexdec(substr($color, 4, 2))
);
$red =  $ret['r'];
$green =  $ret['g'];
$blue =  $ret['b'];


$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;


$PNG_WEB_DIR = 'temp/';

$filename = $PNG_TEMP_DIR.'qr_code.png';

chmod($PNG_TEMP_DIR,0755);

chmod($filename,0755);

myParams::$red= $red;
myParams::$green= $green;
myParams::$blue= $blue;


QRcode::png($value,$filename,QR_ECLEVEL_L,7,TRUE);
//QRcode::png($value,false,QR_ECLEVEL_L,7);

header('Content-type: image/png');

$source = imagecreatefrompng($filename);
/*$rgb = imagecolorat($im, 10, 15);
$colors = imagecolorsforindex($im, $rgb);*/


$rotate = imagerotate($source, $angle,0);

/*imagesavealpha($rotate, TRUE);
imagealphablending($rotate, false);*/
//imagepng($PNG_TEMP_DIR.'qr.png');

imagepng($rotate,$PNG_TEMP_DIR."new_qrcode.png");
imagepng($rotate);


//QRcode::png($value,$filename,QR_ECLEVEL_L,7,TRUE);





?>