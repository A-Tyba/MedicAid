<?php
require 'db_config.php';

$sql2 = "SELECT * FROM listings";

$result = $conn->query($sql2);

$doctors_picture = array();
$doctors_name = array();
$doctors_category = array();

if ($result->num_rows > 0) {

    // output data of each row

    while ($row = $result->fetch_assoc()) {
        
            array_push($doctors_picture,$row['profile_pic']);
            array_push($doctors_name, $row['name']);
            array_push($doctors_category,$row['category']);
        
        
    }
}

$reversed_doctors_picture = array_reverse($doctors_picture);
$reversed_doctors_name = array_reverse($doctors_name);
$reversed_doctors_category = array_reverse($doctors_category);


?>