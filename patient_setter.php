<?php


session_start();


$email=$_SESSION['email'];


$patient_email=$_POST['patient_email'];


$prescription=$_SESSION['doctor_prescription'];


$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE doctor_prescriptions SET patient_email = ? WHERE prescription = ?");


    $stmt->bind_param("ss", $patient_email, $prescription);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();



    echo "Patient set successfully!";
    


    


}








?>


