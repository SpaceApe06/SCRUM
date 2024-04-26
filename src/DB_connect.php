<?php

    $server = "localhost";
    $user = "root";
    $pw = "ADMIN";
    $db = "scrumDB";

    $conn = mysqli_connect($server, $user, $pw, $db);

    if(!$conn) {
        echo "Connection failed!";        
    }