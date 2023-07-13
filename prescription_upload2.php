<?php
//FOR DOCTORS ONLY
require 'db_config.php';
session_start();

$patient_email = $_POST['patient_name'];
$patient_age= $_POST['patient_age'];
$patient_gender= $_POST['patient_gender'];
$date= $_POST['date'];
$text1= $_POST['text1'];
$text2= $_POST['text2'];
$doctor_name= $_POST['doctor_name'];
$doctor_email= $_POST['doctor_email'];
$doctor_bmdc= $_POST['doctor_bmdc'];
$doctor_phone= $_POST['doctor_phone'];

$stmt = $conn->prepare("insert into doctor_prescriptions(patient_email, patient_age, patient_gender, date, text1, text2, doctor_name, doctor_email, doctor_bmdc, doctor_phone) values(?,?,?,?,?,?,?,?,?,?)");


$stmt->bind_param("ssssssssss", $patient_email, $patient_age, $patient_gender, $date, $text1, $text2, $doctor_name, $doctor_email, $doctor_bmdc, $doctor_phone);


$execval = $stmt->execute();


$stmt->close();

if ($execval) {
  echo "e-Prescription uploaded successfully!";
}else{
  echo "e-Prescription upload failed!"; 
}








?>