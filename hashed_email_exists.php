<?php

function hashed_email_exists($hashed_email){
    require 'db_config.php';
    $sql = "SELECT * FROM blockchain";
    $result = $conn->query($sql);
    foreach ($result as $row){
        if($hashed_email==$row['Email_Hash']){
            return "EXISTS";
        }
    }
}




?>