<?php 
session_start();
require 'db_config.php';
if(!isset($_SESSION['email'])){

  header("Location: https://medicaidbd.xyz/login.php");

}






$pic=[];
$name="";


if(isset($_SESSION['email'])){



  $ses_id=md5($_SESSION['email']);



    $email=$_SESSION['email'];




    $sql = "SELECT * FROM payment";



    $result = $conn->query($sql);



    if ($result->num_rows > 0) {



      // output data of each row



      $row = $result->fetch_assoc();

     




      } 



}
















?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image" href="images/favicon.webp">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedicAid</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h1 style="text-align: center;">Showing Patient Table for <?php echo $name; ?></h1>  
    <hr>
    <br><br><br><br><br>
    <div><h2 style="  text-align: center;">Find the list of patients who have hired you here:</h2>
  <div class="d-flex justify-content-center" >
  </div>

    <br><br><br>
<table>
    <tr>
    <th>EMAILS</th>
    <th>NAMES</th>
    <th>FUNCTIONS</th>
  </tr>
  
    <?php foreach($result as $patient){
      if($patient['doctor']==$_SESSION['email']){
        
        echo'
        <tr>
    <th>'.$patient['patient'].'</th><td>'.$patient['patient_name'].'</td>
    <td><a href="patient_profile_by_doctor.php?q='.$patient['patient'].'"><button class="btn btn-success btn-lg" style="margin:5px;">VIEW PROFILE</button></a><a href="videochat.php"><button class="btn btn-danger btn-lg" style="margin:5px;">VIDEOCHAT</button></a><a href="textchat_linker2.php"><button class="btn btn-secondary btn-lg" style="margin:5px;">TEXTCHAT</button></a><a href="view_patient_pictures.php?q='.$patient['patient'].'&n='.$patient['patient_name'].'"><button class="btn btn-success btn-lg" style="margin:5px;">VIEW UPLOADED PICTURES</button></a></td>

  </tr>
      
      
      ';
      
      
      }} ?>
  
  
</table>
</body>
</html>