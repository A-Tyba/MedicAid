<?php
$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');

$profile_pic="[PLACEHOLDER]";
$email="[PLACEHOLDER]";
$uname="[PLACEHOLDER]";
$full_name="[PLACEHOLDER]";
$phone_number="[PLACEHOLDER]";


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("insert into profiles(profile_pic, email, uname, full_name, phone_number) values(?, ?, ?, ?, ?)");


    $stmt->bind_param("sssss", $profile_pic, $email, $uname, $full_name, $phone_number);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();


}



?>