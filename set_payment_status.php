<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedicAid</title>
</head>
<body>
    <script>alert("Payment Succeeded!");</script>
</body>
</html>
<?php


session_start();


$email=$_SESSION['email'];


$status="YES";





$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_fotoboo');


if($conn->connect_error){


    echo "$conn->connect_error";


    die("Connection Failed : ". $conn->connect_error);


}


else{


    $stmt = $conn->prepare("UPDATE paid SET status = ? WHERE email = ?");


    $stmt->bind_param("ss", $status, $email);


    $execval = $stmt->execute();


    $stmt->close();


    $conn->close();


    echo "<meta http-equiv='refresh' content='0;url=search.php'>";


}








?>