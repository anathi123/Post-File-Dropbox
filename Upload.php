<?php


// get the file temporary path
$filename = $_FILES['img']['tmp_name'];
$fp = fopen($filename, 'rb');

$cheaders = array('Authorization: Bearer <ACCESS TOKEN>',
                  'Content-Type: application/octet-stream',
                  'Dropbox-API-Arg: {"path":"/images/'.basename($_FILES['img']['name']).'","mode":"add"}');

$ch = curl_init('https://content.dropboxapi.com/2/files/upload');
curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_INFILE, $fp);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

//get api response
echo $response;
curl_close($ch);
fclose($fp);

?>

