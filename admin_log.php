<?php
session_start();
require 'db_config.php';

$username=$_POST['username'];
$password=$_POST['password'];
$failed="YES";


if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $sql = "SELECT * FROM admin_log";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        if($row['username']==$username && $row['password']==$password){
          if($username=="superadmin"){
            $_SESSION['admin']="superadmin";
            echo ("SUCCESSFULLY LOGGED IN!");
            echo "<meta http-equiv='refresh' content='0;url=https://medicaidbd.xyz/adminpanel.php?q=superadmin'>";
            $failed="NO";
          }
          if($username=="subadmin1"){
            $_SESSION['admin']="subadmin1";
            echo ("SUCCESSFULLY LOGGED IN!");
            echo "<meta http-equiv='refresh' content='0;url=https://medicaidbd.xyz/adminpanel.php?q=subadmin1'>";
            $failed="NO";
          }
          if($username=="subadmin2"){
            $_SESSION['admin']="subadmin2";
            echo ("SUCCESSFULLY LOGGED IN!");
            echo "<meta http-equiv='refresh' content='0;url=https://medicaidbd.xyz/adminpanel.php?q=subadmin2'>";
            $failed="NO";
          }
          if($username=="subadmin3"){
            $_SESSION['admin']="subadmin3";
            echo ("SUCCESSFULLY LOGGED IN!");
            echo "<meta http-equiv='refresh' content='0;url=https://medicaidbd.xyz/adminpanel.php?q=subadmin3'>";
            $failed="NO";
          }
        }
      } 
}
if($failed=="YES"){echo("LOGIN FAILED! TRY AGAIN");
  echo "<meta http-equiv='refresh' content='0;url=https://medicaidbd.xyz/adminlogin.php'>";
}

}





?>