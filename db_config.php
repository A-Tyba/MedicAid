<?php
  $hostname = "103.125.253.9";
  $username = "medicaid_medicaid";
  $password = "Roblox123456";
  $dbname = "medicaid_medicaid";

  //$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');


  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
