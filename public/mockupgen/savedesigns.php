<?php

$data = $_POST['design'];

$selectedimage = $_POST['selectedimage'];

$baseimage = $_POST['baseimage'];

$pieces =  explode(",",$data);

file_put_contents('designs/user_designed_product.png', base64_decode($pieces[1]));

$ch = curl_init($selectedimage);
$fp = fopen('designs/design_template.png', 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);


$ch = curl_init($baseimage);
$fp = fopen('designs/product.png', 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);

?>