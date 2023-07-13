<?php
    require "db_config.php";

    $sql5 = "SELECT * FROM profiles";
    $result = $conn->query($sql5);
    $row2 = $result->fetch_assoc();
    foreach($row2 as $row){echo $row['email'] . $row['designation'];}




?>