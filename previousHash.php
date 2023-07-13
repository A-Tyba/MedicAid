<?php


function previousHash(){
    require 'db_config.php';
    $sql3 = "SELECT * FROM blockchain";
    $result3 = $conn->query($sql3);
    $result3->fetch_all(MYSQLI_ASSOC);
    $max_rows = $result3->num_rows;
    $last_index = $max_rows-1;
    $i = 0;
    foreach($result3 as $row3){
        
        if($i==$last_index){
            return $row3['currentHash'];
        }
        $i++;
    }
    

}


?>