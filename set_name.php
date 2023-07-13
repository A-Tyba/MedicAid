<?php


session_start();

if($_POST['name']==""){
    echo "FAILED: Don't leave any field empty!";
    die();
  }



$email=$_SESSION['email'];


$name=$_POST['name'];





$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE listings SET name = ? WHERE email = ?");


    $stmt->bind_param("ss", $name, $email);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();





    echo $name;


    


}








?>


