<?php

session_start();
require 'db_config.php';
require 'blockchain_verification.php';
if($_POST['email']==""||$_POST['pass']==""){
  echo "FAILED: Don't leave any field empty!";
  die();
}

$email=$_POST['email'];

$pass=$_POST['pass'];

$status="NO";

$verified = blockchain_verification($email);






// $email="ahnaf.abid22@gmail.com";

// $pass="12345678";

$encrypted_pass=hash('sha256', $pass);



$checks=0;



if($email==""||$pass==""){

  $checks++;

}



if(strlen($pass)<8||!strpos($email,"@")){

  $checks++;

}



if($checks>0){

  echo("Login failed!");

  header("Location: https://medicaidbd.xyz/login.php");

}else{ if($checks==0){




if($conn->connect_error){

    echo "$conn->connect_error";

    die("Connection Failed : ". $conn->connect_error);

}

else{

    $sql = "SELECT * FROM reg";

    $result = $conn->query($sql);

    

    if ($result->num_rows > 0) {

      // output data of each row

      while($row = $result->fetch_assoc()) {

        if($row['email']==$email && $row['pass']==$encrypted_pass && $verified=="VERIFIED!"){

            $_SESSION['email']=$email;

            $_SESSION['login_token']=hash('sha256', $email);

            echo ("SUCCESSFULLY LOGGED IN!");
            
            

            //Updating login status to ACTIVE

            $status="ACTIVE";

            $stmt = $conn->prepare("UPDATE reg SET status = ? WHERE email = ?");

            $stmt->bind_param("ss", $status, $email);
        
        
            $execval = $stmt->execute();

            //SESSION VARIABLES NAME AND PHONE SET HERE

            $sql3 = "SELECT * FROM profiles";

            $result = $conn->query($sql3);

              if ($result->num_rows > 0) {

                  // output data of each row

                  while($row = $result->fetch_assoc()) {
                    //Checking whether payment entry exists or not
                  if($row['email']==$email){
                    $_SESSION['name']=$row['full_name'];
                    $_SESSION['phone']=$row['phone_number'];

                    }}}




            //NAME AND PHONE ENDS HERE

            $sql = "SELECT * FROM paid";

            $result = $conn->query($sql);

              if ($result->num_rows > 0) {

                  // output data of each row

                  while($row = $result->fetch_assoc()) {
                    //Checking whether payment entry exists or not
                  if($row['email']==$email){

                      die(); 

                  }

                  } 

              }


    //Setting new payment status
    

    $stmt = $conn->prepare("insert into paid(email, status) values(?, ?)");

    $stmt->bind_param("ss", $email, $status);

    $execval = $stmt->execute();






            die();   



        }

      } 

}

echo("LOGIN FAILED! TRY AGAIN");

}











}}

?>