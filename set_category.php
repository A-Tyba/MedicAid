<?php


session_start();


$email=$_SESSION['email'];


$category=$_POST['category'];





$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE listings SET category = ? WHERE email = ?");


    $stmt->bind_param("ss", $category, $email);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();


    echo "Category set successfully!";


}








?>


