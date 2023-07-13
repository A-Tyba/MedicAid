<?php
session_start();
require 'db_config.php';
$doctor=$_GET['q'];
$patient_name=$_GET['n'];
$sql = "SELECT * FROM patient_prescriptions";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Uploads</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
<hr>
<h1 style="text-align: center;">Pictures Uploaded by <?php echo $patient_name; ?> </h1>  
<hr>
<div style="  margin-left: 46%;
  margin-right: auto;">
        <a href="search.php"><button type="button" id="ADD" name="ADD" class="btn btn-success btn-lg" style="margin-right:10px; height:75px;">Back to Search</button></a>
</div>
<hr>
<div class="d-flex justify-content-center">
  <div class="row">
    <div class="col-md-4">
    <?php foreach($result as $res){
        if($_SESSION['email']==$res['patient'] && $doctor==$res['doctor']){
            echo '
      <div class="thumbnail">
          <img src="'.$res['pic'].'" alt="Lights" style="width:640px; height:480px; ">
          <div class="caption">
          </div>
      </div>
    
      <br>
      ';
        }
    }
    ?>
      

      
    </div>
  <hr>
</div>
</div>
<hr>
</body>
</html>