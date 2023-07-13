<?php
session_start();
$email=$_SESSION['email'];
$otp=$_POST['otp'];

$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{

    if($otp==$_SESSION['otp']){

    $otp_verified="YES";

    $stmt = $conn->prepare("UPDATE reg SET otp_verified = ? WHERE email = ?");


    $stmt->bind_param("ss", $otp_verified, $email);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();
    echo "OTP verified successfully!";
    
    }
    else{
        echo "OTP verification failed! Please try again.";
    }

    


}



?>