<?php
session_start();
$patient=$_SESSION['patient'];
$doctor=$_SESSION['doctor'];
$status="HIRED";



$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');



if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}

else{

    $stmt = $conn->prepare("UPDATE payments SET status = ? WHERE patient = ?");


    $stmt->bind_param("ss", $status, $patient);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();


    header("Location:portfolio.php?q=".$doctor);



    $stmt->close();



    $conn->close();
}







?>