<?php

function is_doc(){
    $email=$_SESSION['email'];
    require 'db_config.php';
    $sql2 = "SELECT * FROM profiles";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['email']==$email){
                if($row['designation']=="DOCTOR"){
                    return "YES";
                }else{return "NO";}
            }
        } 
    }
}





?>