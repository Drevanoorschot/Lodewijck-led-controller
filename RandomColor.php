<?php
error_reporting(~E_WARNING);

$server = '130.89.160.202';
$port = 80;

$red = rand(0, 1023);
$green = rand(0, 1023);
$blue = rand(0, 1023);

$sock = socket_create(AF_INET, SOCK_DGRAM, 0);
$input = $red . ":" . $green . ":" . $blue;

echo $input;

socket_sendto($sock, $input , strlen($input) , 0 , $server , $port);

socket_close();

?>
