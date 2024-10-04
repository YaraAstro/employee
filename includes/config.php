<?php

    // create credentials
    $hostname = 'localhost';
    $username = 'emsadmin';
    $password = 'ems2024';
    $database = 'emsdb';

    // create connection
    $conn =  new mysqli($hostname, $username, $password, $database);

    // check the connection
    if ( $conn -> connect_error) {
        echo $connect_error ;
    }

?>