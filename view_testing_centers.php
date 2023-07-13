<?php
require 'db_config.php';
$sql = "SELECT * FROM testing_centers";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>View Testing Centers - MedicAid</title>
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
    
<h1 style="text-align: center;">Showing Table for Testing Centers</h1>  
<hr>
<div style="  margin-left: 46%;
  margin-right: auto;">
        <a href="search.php"><button type="button" id="ADD" name="ADD" class="btn btn-success btn-lg" style="margin-right:10px; height:75px;">Back to Search</button></a>
</div>
        <hr>
    <hr>
    <br><br><br><br><br>
    <h2 style="  text-align: center;">Find the list of available testing centers here:</h2>
  <div class="d-flex justify-content-center">
 

    <br><br><br>
    <table>
    <tr>
    <th>Testing Center Name</th>
    <th>Testing Center Address</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Start Time</th>
    <th>End Time</th>
  </tr>


  
    <?php foreach($result as $testing_center){
        //Formatting dates
        $input = $testing_center['testing_center_start_date'];
        $date = strtotime($input);
        $start_date = date('d/m/Y', $date);
        $input = $testing_center['testing_center_end_date'];
        $date = strtotime($input);
        $end_date = date('d/m/Y', $date);
        //Formatting times
        $input = $testing_center['testing_center_start_time'];
        $date = strtotime($input);
        $start_time = date('h:i a', $date);
        $input = $testing_center['testing_center_end_time'];
        $date = strtotime($input);
        $end_time = date('h:i a', $date);

        
        echo'
        <tr>
    <th>'.$testing_center['testing_center_name'].'</th>
    <td>'.$testing_center['testing_center_address'].'</td>
    <td>'.$start_date.'</td>
    <td>'.$end_date.'</td>
    <td>'.$start_time.'</td>
    <td>'.$end_time.'</td>
  </tr>
      
      
      ';
      
      
      } ?>
    

  


  
</table>
</div>
</body>
</html>