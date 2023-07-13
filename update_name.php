<?php
require 'db_config.php';
$email = $_POST['email'];
$name = $_POST['name'];

$stmt = $conn->prepare("UPDATE profiles SET full_name = ? WHERE email = ?");


$stmt->bind_param("ss", $name, $email);


$execval = $stmt->execute();

if($execval){
    echo 'Name updated successfully!';
} else {
    echo 'Name updated FAILED!';}
?>