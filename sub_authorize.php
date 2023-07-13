<?php

$q=$_GET['q'];
$decision=$_GET['decision'];



// Create connection
$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_medicaid');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE admin_privileges SET authorized=? WHERE admin_type=?");
$stmt->bind_param("ss", $decision, $q);
$execval = $stmt->execute();
$conn->close();

echo "Authorization level has been set!";


?>