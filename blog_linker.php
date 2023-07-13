<?php
session_start();
require 'db_config.php';

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    $stmt = $conn->prepare("insert into blogs(email) values(?)");


    $stmt->bind_param("s", $email);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();
    
    
    
    
    header("Location: https://medicaidbd.xyz/blog_poster.php");}
    else{header("Location: https://medicaidbd.xyz/login.php");}







?>