<?php
    $server = "localhost:3307";
    $user = "root";
    $password = "";
    $dbname = "final_web_project";

    $conn = mysqli_connect($server,$user,$password,$dbname);

    if(!$conn){
        echo "Connection falied.";
    }
?>