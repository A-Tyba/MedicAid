<?php
session_start();
require 'db_config.php';

$sql3 = "SELECT * FROM users";
$result = $conn->query($sql3);
$just_emails=array();
if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {

    if($_SESSION['email']==$row['email']){
        $hired_emails=$row['hired_emails']; 
    }
  } 
}

$sql4 = "SELECT * FROM users";
$result = $conn->query($sql4);
$email_n_id=array();
if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {
    $semail=$row['email'];
    $email_n_id += ['email' => $semail];
    $sid=$row['unique_id'];
    $email_n_id += ['unique_id' => $sid];
  } 
}


// echo '<br>';
// $hired_array=explode(",", $hired_emails);
// print_r($hired_array);
// echo '<br>';
print_r($email_n_id);


?>