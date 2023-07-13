<?php
use Masterminds\HTML5;
require 'admin_secure.php';
require 'db_config.php';

$permission_mode=$_GET['q'];
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $sql2 = "SELECT * FROM admin_privileges";
    $result2 = mysqli_query($conn, $sql2);
    // output data of each row
    $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    foreach ($rows2 as $row2) {
        if ($row2['admin_type'] == $permission_mode && $row2['authorized'] == "NO") {
            echo '<meta http-equiv="refresh" content="0;url=https://medicaidbd.xyz/adminpanel.php?q=' . $permission_mode . '">';
        }
    }

    $sql3 = "SELECT * FROM contact";
    $result2 = mysqli_query($conn, $sql3);
    // output data of each row
    $rows3 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--bootstrap link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <title>Queries</title>
</head>
<body style="background-color:#D4F1F4;">
<div class="d-flex justify-content-center"><a href="adminpanel.php?q=<?php echo $_GET['q']; ?>"><button>GO BACK TO ADMIN PANEL</button></a></div><br>
    <?php

    $i = 1;
foreach ($rows3 as $row3) {
    echo '
    
    <div class="d-flex justify-content-center"><h4>Query Serial No. '.$i.' </h4></div><br><hr>
    <div class="d-flex justify-content-center">Name: <input type="text" value="'.$row3['name'].'" readonly size="20"></div><br>
    <div class="d-flex justify-content-center">Email: <input type="text" value="'.$row3['email'].'" readonly size="35"></div><br>
    <div class="d-flex justify-content-center">Phone: <input type="text" value="'.$row3['phone'].'" readonly size="35"></div><br>
    <div class="d-flex justify-content-center">Subject: <input type="text" value="'.$row3['subject'].'" readonly size="35"></div><br>
    <div class="d-flex justify-content-center">Text: <textarea name="" id="" cols="50" rows="7" readonly>'.$row3['text'].'</textarea></div><br><hr>
    
    
    
    
    
    ';
    $i++;
}



?>


    
</body>
</html>