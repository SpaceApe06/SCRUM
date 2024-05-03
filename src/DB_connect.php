<?php

    $server = "localhost";
    $user = "root";
    $pw = "";
    $db = "scrumdb";

    $conn = mysqli_connect($server, $user, $pw, $db);

    if(!$conn) {
        echo "Connection failed!";        
    }