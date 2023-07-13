<?php 

session_start();

if(!($_SESSION['admin']=="superadmin")){

  header("Location: https://medicaidbd.xyz/adminlogin.html");

}

require 'db_config.php';


    $sql = "SELECT * FROM admin_log";



    $result = $conn->query($sql);



    if ($result->num_rows > 0) {



      // output data of each row



      $row = $result->fetch_assoc();

     
      } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
     
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
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
<header>
<nav class="navbar" data-aos="fade-down">
        <a href="adminpanel.php?q=superadmin" ><<<<<<<-----ADMIN PANEL</a>
    </nav>   
</header>
<body>
<h1 style="text-align: center;">Showing SubAdmin Table</h1>  
    <hr>
    <br><br><br><br><br>
    <div><h2 style="  text-align: center;">Find the list of subadmin accounts you can activate or deactivate here:</h2>
  <div class="d-flex justify-content-center" >
  </div>

    <br><br><br>
    <table>
    <tr>
    <th>SUBADMINS</th>
    <th>FUNCTIONS</th>
  </tr>


  
    <?php foreach($result as $admin){
        if(!($admin['username']=="superadmin")){
        echo'
        <tr>
    <th>'.$admin['username'].'</th>
    <td><a href="sub_activate.php?q='.$admin['username'].'"><button class="btn btn-primary btn-lg" id="ACTIVATE">ACTIVATE</button></a><a href="sub_deactivate.php?q='.$admin['username'].'"><button class="btn btn-danger btn-lg" id="DEACTIVATE">DEACTIVATE</button></a></td>

  </tr>
      
      
      ';
      
      
    }
} ?>
    

  


  
</table>

</body>
</html>