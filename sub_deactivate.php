<?php
require 'admin_secure.php';
require 'db_config.php';
$username=$_GET['q'];
$pass="?????";
$stmt = $conn->prepare("UPDATE admin_log SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $pass, $username);
$execval = $stmt->execute();
echo '<meta http-equiv="refresh" content="0;url=https://medicaidbd.xyz/subadmins.php?q=superadmin">';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>alert("Subadmin deactivated successfully!");</script>
</body>
</html>