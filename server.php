<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    //Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Check connection
    if (!$conn){
        die("Conection failed" . mysqli_connect_error());
    }
?>