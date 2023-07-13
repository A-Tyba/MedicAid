<?php
session_start();
require 'db_config.php';
require 'Pass_Hash.php';
require 'previousHash.php';
require 'total_transactions.php';
$patient=$_POST['email0'];
$doctor=$_POST['email1'];
$doctor_name=$_POST['doctor_name'];
$patient_name=$_POST['patient_name'];
$_SESSION['doctor']=$doctor;
$_SESSION['patient']=$patient;
$status="HIRED";
$amount = 500;
$TrxID=hash('sha256', $patient . $doctor . $status . $doctor_name. $patient_name . $amount);


$stmt = $conn->prepare("insert into payment(patient, doctor, status, doctor_name, patient_name,  amount, TrxID) values(?, ?, ?, ?, ?, ?, ?)");



$stmt->bind_param("sssssss", $patient, $doctor, $status, $doctor_name, $patient_name, $amount, $TrxID);



$execval = $stmt->execute();

echo "Please wait, you are now being redirected to our payment gateway";


$stmt->close();


$previousHash = previousHash();
$Email_Hash = hash('sha256', $patient);
$Pass_Hash = Pass_Hash($patient);
$Total_transactions = total_transactions();
$Total_transactions++;
$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$date_now = $dt->format("d-m-Y h:i:s");
$Timestamp = $date_now;
$currentHash = hash('sha256', $Total_transactions . $TrxID . $Email_Hash . $Pass_Hash . $Timestamp);
$stmt = $conn->prepare("insert into blockchain(Total_transactions, TrxID, Email_Hash, Pass_Hash, Timestamp, currentHash, previousHash) values(?,?,?,?,?,?,?)");
$stmt->bind_param("sssssss", $Total_transactions, $TrxID, $Email_Hash, $Pass_Hash, $Timestamp, $currentHash, $previousHash);
$execval = $stmt->execute();









?>