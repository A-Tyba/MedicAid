<?php
require 'db_config.php';
$email=$_POST['email'];
$authorized = "NO";


$stmt = $conn->prepare("DELETE FROM listings WHERE email=?");
$stmt->bind_param("s", $email);
$execval = $stmt->execute();

$stmt = $conn->prepare("UPDATE profiles SET authorized = ? WHERE email = ?");
$stmt->bind_param("ss", $authorized, $email);
$execval = $stmt->execute();

if($execval){
    echo "Request has been denied!";
}else{ echo "Request denial FAILED!";};

?>


