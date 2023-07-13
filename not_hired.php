<?php
session_start();
require 'db_config.php';
require 'is_doctor.php';
$email=$_SESSION['email'];

if(is_doc()=="YES"){
    $hired="NO";
    $sql4 = "SELECT * FROM payment";
    $result = $conn->query($sql4);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row['doctor']==$email){
        $patient=$row['patient'];
        $stmt2 = $conn->prepare("UPDATE users SET hired_d = ? WHERE email = ?");
        $stmt2->bind_param("ss", $hired, $patient);
        $execval = $stmt2->execute();
      }
    }
  }
}else{
    $hired="NO";
    $sql4 = "SELECT * FROM payment";
    $result = $conn->query($sql4);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    if($row['patient']==$email){
        $doctor=$row['doctor'];
        $stmt2 = $conn->prepare("UPDATE users SET hired_p = ? WHERE email = ?");
        $stmt2->bind_param("ss", $hired, $doctor);
        $execval = $stmt2->execute();
    }
    }
    }

}





header("location: ../search.php");


?>