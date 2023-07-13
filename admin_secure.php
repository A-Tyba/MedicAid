<?php

session_start();
echo $_SESSION['admin'];
if(!isset($_SESSION['admin'])){
    echo "<meta http-equiv='refresh' content='0;url=https://medicaidbd.xyz/adminlogin.html'>";
}

?>