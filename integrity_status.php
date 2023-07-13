<?php
function getBlockchainStatus()
{
    require 'db_config.php';
    $sql = "SELECT * FROM blockchain";
    $result = $conn->query($sql);
    $check = 0;
    if ($result->num_rows > 0) {

        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $blockHash = hash('sha256', $row['Total_transactions'] . $row['TrxID'] . $row['Email_Hash'] . $row['Pass_Hash'] . $row['Timestamp']);
            if ($blockHash == $row['currentHash']) {
                $check = 1;
            } else {
                $check = 0;
                break;
            }
        }
    }
    if ($check == 1) {
        return "SUCCESS";
    } else {
        return "FAILED";
    }
}


?>