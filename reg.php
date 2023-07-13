<?php

session_start();
require 'db_config.php';
require 'previousHash.php';
require 'total_transactions.php';

if($_POST['email']==""||$_POST['pass']==""||$_POST['repass']==""){
  echo "FAILED: Don't leave any field empty!";
  die();
}



$email=$_POST['email'];

$pass=$_POST['pass'];

$repass=$_POST['repass'];

$otp_verified="NO";


$status="INACTIVE";



$checks=0;

if($pass!=$repass){
  echo "FAILED: Entered password and re-entered passwords don't match!";
  die();  
}


if($email==""||$pass==""){

  $checks++;

}



if(strlen($pass)<8||!strpos($email,"@")){

  $checks++;

}



if($checks>0){

  echo("Registration failed!");

  header("Location: https://medicaidbd.xyz/register.php");

} else {
  if ($checks == 0) {








    $sql = "SELECT email FROM reg";



    $result = $conn->query($sql);



    if ($result->num_rows > 0) {



      // output data of each row



      while ($row = $result->fetch_assoc()) {



        if ($row['email'] == $email) {



          echo ("ERROR: EMAIL ALREADY EXISTS!");



          die();




        }



      }



    }



    $encrypted_pass = hash('sha256', $pass);

    //hash('sha256', 'The quick brown fox jumped over the lazy dog.')



    $stmt = $conn->prepare("insert into reg(email, pass, otp_verified, status) values(?, ?, ?, ?)");



    $stmt->bind_param("ssss", $email, $encrypted_pass, $otp_verified, $status);



    $execval = $stmt->execute();




    echo ("REGISTRATION SUCCESSFUL!");

    $sql2 = "SELECT * FROM blockchain";
    $result2 = $conn->query($sql2);
    
      $Email_Hash = hash('sha256', $email);
      $Pass_Hash = hash('sha256', $pass);

      while ($row2 = $result2->fetch_assoc()) {
        if ($Email_Hash == $row2['Email_Hash']) {
          $exists = "YES";
        }
      }
      if (!isset($exists)) {
        $previousHash = previousHash();
        $Total_transactions = total_transactions();
        $TrxID = "NULL";
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $date_now = $dt->format("d-m-Y h:i:s");
        $Timestamp = $date_now;
        $currentHash = hash('sha256', $Total_transactions . $TrxID . $Email_Hash . $Pass_Hash . $Timestamp);
        $stmt = $conn->prepare("insert into blockchain(Total_transactions, TrxID, Email_Hash, Pass_Hash, Timestamp, currentHash, previousHash) values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $Total_transactions, $TrxID, $Email_Hash, $Pass_Hash, $Timestamp, $currentHash, $previousHash);
        $execval = $stmt->execute();



      }



    }
  }



?>