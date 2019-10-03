<?php
$url = "http://www.google.com/search?q=define:zany";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$var= curl_exec($ch);
curl_close($ch);
$first= stripos($var,'<ul',0) ;
$second= stripos($var,'</ul>',0) ;
echo substr($var,$first,$second-$first);
?>