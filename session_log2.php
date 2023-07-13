<?php
session_start();
date_default_timezone_set('Asia/Dhaka'); 
$t=time();
$timestamp=date("Y-m-d H:i:s",$t);
$patient_email=$_POST['email0'];
$doctor_email=$_POST['email1'];
$_SESSION['patient_email']=$patient_email;
$_SESSION['doctor_email']=$doctor_email;

$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');



if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}



else{



    $stmt = $conn->prepare("insert into session_log(patient_email, doctor_email, timestamp) values(?, ?, ?)");



    $stmt->bind_param("sss", $patient_email, $doctor_email, $timestamp);



    $execval = $stmt->execute();




    echo "Videochat session now initiating... please wait for being redirected";



    $stmt->close();



    $conn->close();



}








?>