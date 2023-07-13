<?php


session_start();

if($_POST['symptoms']==""){
    echo "FAILED: Don't leave any field empty!";
    die();
  }

$email=$_SESSION['email'];


$symptoms=$_POST['symptoms'];





$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE listings SET symptoms = ? WHERE email = ?");


    $stmt->bind_param("ss", $symptoms, $email);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();


    echo "Symptoms set successfully!";


}








?>


