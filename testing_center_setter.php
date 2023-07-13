<?php
require 'db_config.php';
if (isset($_POST['testing_center_name']) && isset($_POST['testing_center_address']) && isset($_POST['testing_center_start_date']) && isset($_POST['testing_center_end_date']) && isset($_POST['testing_center_start_time']) && isset($_POST['testing_center_end_time'])) {
    $mode = $_POST['mode'];

    $testing_center_name = $_POST['testing_center_name'];

    $testing_center_address = $_POST['testing_center_address'];

    $testing_center_start_date = $_POST['testing_center_start_date'];

    $testing_center_end_date = $_POST['testing_center_end_date'];

    $testing_center_start_time = $_POST['testing_center_start_time'];

    $testing_center_end_time = $_POST['testing_center_end_time'];

    if($mode=="ADD"){
        $stmt = $conn->prepare("insert into testing_centers(testing_center_name, testing_center_address, testing_center_start_date, testing_center_end_date, testing_center_start_time, testing_center_end_time) values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $testing_center_name, $testing_center_address, $testing_center_start_date, $testing_center_end_date, $testing_center_start_time, $testing_center_end_time);
        $execval = $stmt->execute();
        echo "Test center added successfully!";
    }

    if($mode=="UPDATE"){
        $stmt2 = $conn->prepare("UPDATE testing_centers SET testing_center_name=?, testing_center_address=? , testing_center_start_date=? , testing_center_end_date=? , testing_center_start_time=? , testing_center_end_time=? WHERE testing_center_name = ?");
        $stmt2->bind_param("sssssss", $testing_center_name, $testing_center_address, $testing_center_start_date, $testing_center_end_date, $testing_center_start_time, $testing_center_end_time, $testing_center_name);
        $execval = $stmt2->execute();
        echo "Test center updated successfully!";
    }

    if($mode=="REMOVE"){
        $stmt3 = $conn->prepare("DELETE FROM testing_centers WHERE testing_center_name = ?");
        $stmt3->bind_param("s", $testing_center_name);
        $execval = $stmt3->execute();
        echo "Test center removed successfully!";
    }

    // echo "Test center added successfully!";
} else {
    echo "Don't leave any field empty!";}


?>