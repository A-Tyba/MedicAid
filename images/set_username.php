<?php


session_start();


$email=$_SESSION['email'];
$uname=$_POST['uname'];
$full_name=$_POST['full_name'];
$phone_number=$_POST['phone_number'];
$BMDC_number=$_POST['BMDC_number'];



$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE profiles SET uname = ? WHERE email = ?");


    $stmt->bind_param("ss", $uname, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE profiles SET full_name = ? WHERE email = ?");


    $stmt->bind_param("ss", $full_name, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE profiles SET phone_number = ? WHERE email = ?");


    $stmt->bind_param("ss", $phone_number, $email);


    $execval = $stmt->execute();

    $stmt = $conn->prepare("UPDATE profiles SET BMDC_number = ? WHERE email = ?");


    $stmt->bind_param("ss", $BMDC_number, $email);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();





    echo $uname.$full_name.$phone_number.$BMDC_number;


    


}








?>


