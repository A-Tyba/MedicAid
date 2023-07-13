<?php
session_start();
require 'db_config.php';



$sql2 = "SELECT * FROM reg";

$result = $conn->query($sql2);

  while($row = $result->fetch_assoc()) {

    if($row['email']==$_SESSION['email']){
        $email = $row['email'];
        $pass = $row['pass'];
        
    }

  }

  $sql1 = "SELECT * FROM customers";

  $result = $conn->query($sql1);
  
    while($row = $result->fetch_assoc()) {
  
      if($row['customer_email']==$_SESSION['email']){
          header("Location: /ecommerce/checkout.php?email=$email&pass=$pass");
          die();
      }
  
    }

$sql3 = "SELECT * FROM profiles";

$result = $conn->query($sql3);

  while($row = $result->fetch_assoc()) {

    if($row['email']==$_SESSION['email']){
        $profile_pic = $row['profile_pic'];
        $full_name = $row['full_name'];
        $phone_number = $row['phone_number'];
        
    }

  }

$country = "Bangladesh";
$city = "Dhaka";
$customer_address = "null";
$stmt = $conn->prepare("insert into customers(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image) values(?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $full_name, $email, $pass, $country, $city, $phone_number, $customer_address, $profile_pic);
$execval = $stmt->execute();
header("Location: /ecommerce/checkout.php?email=$email&pass=$pass");




?>