<?php
    $host="localhost:3307";
    $username="root";
    $password="";
    $database="discuss";
    
    $conn=new mysqli($host,$username,$password,$database);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    // echo "database connected successfully";
?>