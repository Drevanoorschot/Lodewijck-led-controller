<?php
error_reporting(~E_WARNING);

$server = '130.89.160.202';
$port = 80;

$sock = socket_create(AF_INET, SOCK_DGRAM, 0);
$input = "0:1:1";

echo $input;

socket_sendto($sock, $input , strlen($input) , 0 , $server , $port);

socket_close();

?>
