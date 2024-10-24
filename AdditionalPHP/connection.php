<?php
//<!--========== PHP CONNECTION TO DATABASE ==========-->
    $host = "localhost";
    $username = "u412656477_admin";
    // $pass = "@Mikeequintos18";
    $pass = "@Mikeequintos18";

    $dbname = "u412656477_tmcp";
    //create connection
    $conn = mysqli_connect($host, $username, $pass, $dbname);
    //check connection
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>