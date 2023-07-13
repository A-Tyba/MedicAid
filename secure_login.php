<?php
$email=$_SESSION['email'];
$hash==hash('sha256', $email);
if($hash==$_SESSION['login_token']){
    header("Location: https://medicaidbd.xyz/otp_verification.php");
}
else{
    header("Location: https://medicaidbd.xyz/login.php");
}

?>