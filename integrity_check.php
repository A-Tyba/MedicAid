<?php
require 'db_config.php';
$sql = "SELECT * FROM blockchain";
$result = $conn->query($sql);
$check = 0;
if ($result->num_rows > 0) {

    // Counter for total no of blocks and untampered blocks
    $i = 0;
    $i2 = 0;
    while ($row = $result->fetch_assoc()) {
        $blockHash=hash('sha256', $row['Total_transactions'].$row['TrxID'].$row['Email_Hash'].$row['Pass_Hash'].$row['Timestamp']);
        $i++;
        if($blockHash==$row['currentHash']){
            $i2++;
            $check = 1;
        } else {
            $check = 0;
            break;
        }
    }
}
if($check==1){
    echo "SUCCESS! $i2 out of $i blocks passed the integrity test. Blockchain is untampered.";
}else{
    echo "FAILED! $i2 out of $i blocks passed the integrity test. Blockchain has been tampered.";
}



?>