<?php

/**
 * @author codestips
 * @copyright 2009 codestips.com
 * @authorurl http://twitter.com/codestips
 * @articleurl http://codestips.com/php-save-image-from-url/
 
 */
 
 
/*
Copyright (C) 2009 codestips.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.


You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

This file is to demonstrate some PHP functionality. Use it at your own risks.
*/

//function to get image with fsockopen
function GetImg($host,$link)
{
$fp = fsockopen($host, 80, $errno, $errstr, 30);
if (!$fp) {
echo "$errstr (error number $errno)
\n";
} else {
$out = "GET $link HTTP/1.1\r\n";
$out .= "Host: $host\r\n";
$out .= "Connection: Close\r\n\r\n";
$out .= "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5\r\n";
$out .= "Accept-Language: en-us,en;q=0.5\r\n";
$out .= "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n";
$out .= "Keep-Alive: 300\r\n";   
$out .= "\r\n";
fwrite($fp, $out);
$contents='';
while (!feof($fp)) {
$contents.= fgets($fp, 1024);
}
fclose($fp);
return $contents;
}
}

//function to get image with CURL
function GetImageFromUrl($link)
 
{
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_POST, 0);
 
curl_setopt($ch,CURLOPT_URL,$link);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
$result=curl_exec($ch);
 
curl_close($ch);
 
return $result;
 
} 
//1. Method file_Get contents
//$contents= file_get_contents('http://www.google.com/intl/en_ALL/images/logo.gif');
//2.Method fsockopen
	//$contents=GetImg("www.google.com","/intl/en_ALL/images/logo.gif");
	//$contents=strchr($contents,"\r\n\r\n");//removes headers
	//$contents=ltrim($contents);//remove whitespaces from begin of the string
//3. Method CURL
	$contents = GetImageFromUrl("http://www.google.com/intl/en_ALL/images/logo.gif");
$savefile = fopen('image.jpg', 'w');
fwrite($savefile, $contents);
fclose($savefile);

?>