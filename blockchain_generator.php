<?php
require 'db_config.php';
require 'previousHash.php';
require 'total_transactions.php';
$mode = "reg";
if (isset($mode)) {
  if ($mode == "reg") {
    $sql1 = "SELECT * FROM reg";
    $result = $conn->query($sql1);
    $sql2 = "SELECT * FROM blockchain";
    $result2 = $conn->query($sql2);
    while ($row = $result->fetch_assoc()) {
      $Email_Hash = hash('sha256', $row['email']);
      $Pass_Hash = $row['pass'];

      while ($row2 = $result2->fetch_assoc()) {
        if ($Email_Hash == $row2['Email_Hash']) {
          $exists = "YES";
        }
      }
      if(!isset($exists)){
        $previousHash = previousHash();
        if(!isset($previousHash)){
          $previousHash = "0f5b8dd36f14ac1ff06e7e5cf8c66db03a72876c01f901a0f0aedf32d00c3c21";
        }
        $Total_transactions = total_transactions();
        $Total_transactions++;
        
        $TrxID = "NULL";
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $date_now = $dt->format("d-m-Y h:i:s");
        $Timestamp = $date_now;
        $currentHash = hash('sha256', $Total_transactions . $TrxID . $Email_Hash . $Pass_Hash . $Timestamp);
        $stmt = $conn->prepare("insert into blockchain(Total_transactions, TrxID, Email_Hash, Pass_Hash, Timestamp, currentHash, previousHash) values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $Total_transactions, $TrxID, $Email_Hash, $Pass_Hash, $Timestamp, $currentHash, $previousHash);
        $execval = $stmt->execute();
        if($execval){
          echo "SUCCESS! ";
        } else {
          echo "FAILED! ";}

      }

    }
  }
}

else {

    //defining Genesis block

    //Getting current timestamp
    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
    $date_now = $dt->format("d-m-Y h:i:s");
    $Timestamp = $date_now;
    $Total_transactions = 0;
    $TrxID = "N/A";
    $Email_Hash = "N/A";
    $Pass_Hash = "N/A";
    $currentHash = hash('sha256', $Total_transactions . $TrxID . $Email_Hash . $Pass_Hash . $Timestamp);
    $previousHash = "N/A";
    $stmt = $conn->prepare("insert into blockchain(Total_transactions, TrxID, Email_Hash, Pass_Hash, Timestamp, currentHash, previousHash) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $Total_transactions, $TrxID, $Email_Hash, $Pass_Hash, $Timestamp, $currentHash, $previousHash);
    $execval = $stmt->execute();
    if ($execval) {
      echo "Genesis block generated successfully!";
    } else {
      echo "Genesis block generation failed!";
    }


}



?>