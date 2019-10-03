<?php
//$a .= "a";
//$a .= "b";
//$a .= "c";
//
//echo $a;
//$a = 4;
//for ($b = 0; $b <= $a; $b++) {
//$c++;
//}
//echo $c ;
//
//$a = "abc";
//$b = substr($a, 0,-1);
//echo $b;
//echo '</br>';
//$a = '1';
//$b = &$a;
//$b = "2$a";
//echo $a;
//echo '</br>';
//$a = true;
//$b = "true";
//$c[] = "true";
//var_dump($c);
//echo '</br>';
//$a = "b";
//$b = "a";
//echo $$b;
//echo '</br>';
//$a = array("a","b","c");
//foreach ($a as $b){
//$c++;
//}
//echo $c;
//echo '</br>';
//$a = "0";
//$b = "0";
//if ($a != "1" && $b == "1" || $a != "0" || $b != "1" ){
//echo $d = "0";
//}else{
//echo $d = "1";
//}
//echo'</br>';
//$a = "post_processed_string";
//$b = array("post_", "_");
//$c = array("", " ");
//$d = ucwords(str_replace($b,$c,$a));
//echo $d;
//$a = "<tt>some</tt><b>html</b>";
/*preg_match("/<\w?>(\w*?)<\/\w?>/",$a,$b);
echo $b[1];


for($i=1;$i<=5;$i++){
    for($j=1;$j<$i;$j++){
        echo $j;
    }
    echo "</br>";
   chmod('/home/Ismath/Desktop/ex.txt','755');
   $file = fopen('/home/Ismath/Desktop/ex.txt','w+');
   fwrite($file,"the erased text is happen uinthe");
   fclose($file);*/



//function process($c, $d = 25)
//
//{
//
//global $e;
//
//$retval = $c + $d - 25 - $e;
//
//return $retval;
//
//}
//
//$e = 10;
//
//echo process(5)."kk";


//for($m=0 ; $m<=3 ; $m++ ) {
//    echo $m;
//}
//
//
//ob_start();
//
//for ($i = 0; $i < 10; $i++) {
//
//    echo $i;
//
//}
//
//$output = ob_get_contents();
//
//ob_end_clean();
//
//echo $ouput;
//$array = array (true => 'a', 1 => 'b');
//
//$a = 'a'.file_exists(__FILE__);
//$a1 = 'wiki';
//$a2 = 'kiwi';
//echo ${$a};
//ob_start();
//
//for ($i = 0; $i < 10; $i++) {
//    echo $i;
//}
//
//$output = ob_get_contents();
//
//ob_end_clean();
//
//echo $ouput;
//$s = '12345';
//
//$s[$s[1]] = '2';
//
//echo $s;
//header('Content-Type: text/plain; charset=UTF-8');
//
//echo 'Hello Loréane !';
//echo "</br>";
//$homepage = file_get_contents('http://demo.tools.krds.com/dispatch_ws.php?action=get&id=18&format=json');
//$parsed = json_decode($homepage,true);
//echo $parsed[0];
////foreach ($parsed as $key => $values){
//echo $values[0]["name"];
////}

$dd = 'Damien is working';
$patterns = array();
$patterns[0] = '/working/';
$replacements = array();
$replacements[2] = 'happy to work';
echo preg_replace($pattern, $replacement, $dd)
?>