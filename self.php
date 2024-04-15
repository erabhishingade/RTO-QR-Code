<?php $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$urldata=$_GET;
foreach($urldata as $key => $value);
$newkey=$key."==";
$decode=base64_decode($newkey);
$udata= explode("-", $decode); 
print_r($udata);


?>