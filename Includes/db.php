<?php
//<!--========== PHP CONNECTION TO DATABASE ==========-->
    $host = "localhost";
    $username = "root";
    // $pass = "";
    $pass = "";

    $dbname = "tmcp";
    //create connection
    $conn = mysqli_connect($host, $username, $pass, $dbname);
    //check connection
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>