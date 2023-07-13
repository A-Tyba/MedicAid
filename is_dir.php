<?php
session_start();
$check_dir=$_SESSION['email'];
$dir='chat/uploads/'.$check_dir;
// echo $dir;
if(is_dir($dir)){
    die();
}


?>