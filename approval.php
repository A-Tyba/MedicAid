<?php
$email=$_GET['email'];
$name=$_GET['name'];
$status=$_GET['status'];

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_medicaid');
$stmt = $conn->prepare("insert into requests(email, name, status) values(?, ?, ?)");
$stmt->bind_param("sss", $email, $name, $status);
$execval = $stmt->execute();
$stmt->close();
$conn->close();

if($status=="approved"){
echo "The request has been approved!";
}
else{
    echo "The request has been denied!";
}
?>