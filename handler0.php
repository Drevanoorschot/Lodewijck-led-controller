<?php

/*
    Simple php udp socket client
*/

//Reduce errors
error_reporting(~E_WARNING);

$server = '130.89.160.202';
$port = 80;

if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";



    //Take some input to send
    echo 'Enter a message to send : ';
    $input = $_POST["rednumber"] . ":" . $_POST["greennumber"] . ":" . $_POST["bluenumber"];
    //Send the message to the server
    if( ! socket_sendto($sock, $input , strlen($input) , 0 , $server , $port))
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);

        die("Could not send data: [$errorcode] $errormsg \n");
    }

    //Now receive reply from server and print it
    if(socket_recv ( $sock , $reply , 2045 , MSG_WAITALL ) === FALSE)
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);

        die("Could not receive data: [$errorcode] $errormsg \n");
    }

    socket_close();
