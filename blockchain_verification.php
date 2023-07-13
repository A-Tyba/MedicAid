<?php

function blockchain_verification($email)
{
    require 'db_config.php';
    require 'integrity_status.php';
    require 'hashed_email_exists.php';

    $status = getBlockchainStatus();
    $hashed_email = hash('sha256', $email);
    $exists = hashed_email_exists($hashed_email);

    if($status=="SUCCESS" && $exists=="EXISTS"){
        return "VERIFIED!";
    } else {
        return "FAILED!";
    }

}





?>