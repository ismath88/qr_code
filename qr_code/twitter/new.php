
<?php
$json_url = 'http://demo.tools.krds.com/dispatch_ws.php?action=get&id=18&format=xml';
$json_string = 'Getting the Name For Employee id 18';
$ch = curl_init( $json_url );
$options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array('Content-type: application/xml') ,
        CURLOPT_POSTFIELDS => $json_string,
        CURLOPT_TIMEOUT=> 13
    );
curl_setopt_array( $ch, $options );
$result =  curl_exec($ch);

echo $result;

$url = " http://demo.tools.krds.com/dispatch_ws.php?action=get&id=18&format=xml";

$ch = curl_init($url);
//init curl connection
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: text/xml'));


$resp = curl_exec($ch);
echo $resp;
$xml = new SimpleXMLElement($resp);


echo "Name:".$xml->name;
echo "</br>";
echo "Type:".$xml['type'];
?>




