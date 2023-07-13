<?php

function Pass_Hash($email){
    require 'db_config.php';
    $sql = "SELECT * FROM reg";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if ($email == $row['email']) {
            return $row['pass'];
        }
    }

}



?>