<?php
$service_url = 'http://129.170.212.42/api/newdeveloper/groups/0/action';
$ch = curl_init($service_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_VERBOSE, 1);
// $data = array("on" => false);
curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"on\": true}");
$response = curl_exec($ch);
if ($response === false) {
		
    $info = curl_getinfo($ch);
    curl_close($ch);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}
curl_close($ch);
$decoded = json_decode($response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo "$ch";
echo 'response ok!';
var_export($decoded->response);?>
