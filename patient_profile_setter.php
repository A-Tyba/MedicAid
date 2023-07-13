<?php
require 'db_config.php';
$email = $_POST['email'];
$medical_history = $_POST['medical_history'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$BMI = $_POST['BMI'];
$bp = $_POST['bp'];
$heart_rate = $_POST['heart_rate'];
$spo2 = $_POST['spo2'];
$cholesterol = $_POST['cholesterol'];
$haemoglobin = $_POST['haemoglobin'];

$stmt = $conn->prepare("insert into patient_profile(email, medical_history, age, sex, height, weight, BMI, bp, heart_rate, spo2, cholesterol, haemoglobin) values(?,?,?,?,?,?,?,?,?,?,?,?)");


$stmt->bind_param("ssssssssssss", $email, $medical_history, $age, $sex, $height, $weight, $BMI, $bp, $heart_rate, $spo2, $cholesterol, $haemoglobin);


$execval = $stmt->execute();

if($execval){
    echo "Success!";
} else {
    echo "Failed!";}


?>