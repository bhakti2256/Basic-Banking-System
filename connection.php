<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "bank_system";

    //to establish connection
    $con = mysqli_connect($server, $username, $password,$db);

    //to check
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // else{
    //     echo "Coonnection successful";
    // }
                
?>