<?php


require 'db_config.php';

if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['subject'])&&isset($_POST['text'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $text=$_POST['text'];



    $stmt = $conn->prepare("insert into contact(name,email,phone,subject,text) values(?,?,?,?,?)");


    $stmt->bind_param("sssss", $name,$email,$phone,$subject,$text);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();

    if($execval){
        echo "Form submitted successfully!";
    }else{echo "Form submission failed!";}

}else{echo "Don't leave any field empty!";}

?>