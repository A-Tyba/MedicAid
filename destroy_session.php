<?php


session_start();

$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');

//Updating login status to ACTIVE

$status="INACTIVE";

$email=$_SESSION['email'];

$stmt = $conn->prepare("UPDATE reg SET status = ? WHERE email = ?");

$stmt->bind_param("ss", $status, $email);


$execval = $stmt->execute();


session_destroy();





echo '<meta http-equiv="refresh" content="0;url=index.php">';


?>