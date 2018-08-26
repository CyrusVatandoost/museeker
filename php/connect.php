<?php

    // Values for connecting
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "museeker";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);

?>