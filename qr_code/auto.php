<?php
$json_url = 'http://localhost/new.xml';
$ch = curl_init( $json_url );
$options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/xml'),
        CURLOPT_TIMEOUT=> 13
);
curl_setopt_array( $ch, $options );
$result =  curl_exec($ch);
$xml = new SimpleXMLElement($result);
echo "Name:".$xml->Address;
echo "</br>";
echo "Type:".$xml['type'];
?>
