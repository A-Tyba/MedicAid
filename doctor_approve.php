<?php
require 'db_config.php';
$email=$_POST['email'];
$authorized="YES";


$stmt = $conn->prepare("UPDATE profiles SET authorized = ? WHERE email = ?");
$stmt->bind_param("ss", $authorized, $email);
$execval = $stmt->execute();

$stmt = $conn->prepare("UPDATE listings SET authorized = ? WHERE email = ?");
$stmt->bind_param("ss", $authorized, $email);
$execval = $stmt->execute();

if($execval){
    echo "Request has been authorized!";
}else{ echo "Request authorization FAILED!";};

?>


