<?php
require 'db_config.php';

$sql = "SELECT * FROM payment";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $TrxID = hash('sha256', $row['patient'] . $row['doctor'] . $row['status'] . $row['doctor_name'] . $row['patient_name']. $row['amount']. $row['TrxID']);
    // $stmt = $conn->prepare("insert into payment(TrxID) values(?)");
    // $stmt->bind_param("s", $TrxID);
    // $execval = $stmt->execute();
    $stmt1 = $conn->prepare("UPDATE payment SET TrxID = ? WHERE id = ?");
    $stmt1->bind_param("ss", $TrxID, $row['id']);
    $execval = $stmt1->execute();
}



?>