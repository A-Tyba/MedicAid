<?php

require 'db_config.php';

session_start();

if($_POST['title']==""||$_POST['subtitle']==""||$_POST['date']==""||$_POST['name']==""||$_POST['text']==""){
    echo "FAILED: Don't leave any field empty!";
    die();
}



if(isset($_POST['title'])&&isset($_POST['subtitle'])&&isset($_POST['date'])&&isset($_POST['name'])&&isset($_POST['text'])){
    $email=$_SESSION['email'];
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
    $date=$_POST['date'];
    $name=$_POST['name'];
    $text=$_POST['text'];




if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE blogs SET title = ? WHERE email = ?");


    $stmt->bind_param("ss", $title, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE blogs SET subtitle = ? WHERE email = ?");


    $stmt->bind_param("ss", $subtitle, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE blogs SET date = ? WHERE email = ?");


    $stmt->bind_param("ss", $date, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE blogs SET name = ? WHERE email = ?");


    $stmt->bind_param("ss", $name, $email);


    $execval = $stmt->execute();


    $stmt = $conn->prepare("UPDATE blogs SET text = ? WHERE email = ?");


    $stmt->bind_param("ss", $text, $email);


    $execval = $stmt->execute();

    echo "Blog posted SUCCESSFULLY!";
}
}
else{
    echo "Blog posting FAILED!";
}


?>


