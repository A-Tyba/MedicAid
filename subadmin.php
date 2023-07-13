<?php
$sub=$_GET['q'];

$select="";
$insert="";
$delete="";
$update="";

$conn = new mysqli('192.168.10.5','focusbdx_demo1','XHQsAJV#7zZT','focusbdx_medicaid');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $sql = "SELECT * FROM admin_privileges";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // echo $row['email']." ".$row['pass'];
        if($row['admin_type']==$sub){
        $select=$row['select_table'];
        $insert=$row['insert_table'];
        $delete=$row['delete_table'];
        $update=$row['update_table'];
        $authorized=$row['authorized'];
        break;
        }
        }
      }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubAdmin</title>
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
    <h1 style="text-align: center;">Showing Privilege Table for <?php echo $sub; ?> </h1>  
    <hr>
    <br><br><br><br><br>
    <div><h2 style="  text-align: center;">Authorize admin for approval?</h2>
  <div class="d-flex justify-content-center" ><a href="sub_authorize.php?q=<?php echo $sub; ?>&decision=YES"><button class="btn btn-primary btn-lg">YES</button></a> &nbsp;<a href="sub_authorize.php?q=<?php echo $sub; ?>&decision=NO"><button class="btn btn-danger btn-lg">NO</button></a></div>
  </div>

    <br><br><br>
    <table>
    <tr>
    <th>FUNCTIONS</th>
    <th>PRIVILEGES</th>
  </tr>
  <tr>
    <th>SELECT</th>
    <td><?php echo $select; ?></td>
  </tr>
  <tr>
    <th>INSERT</th>
    <td><?php echo $insert; ?></td>

  </tr>
  <tr>
    <th>DELETE</th>
    <td><?php echo $delete; ?></td>

  </tr>
  <tr>
    <th>UPDATE</th>
    <td><?php echo $update; ?></td>
  </tr>
  <tr>
    <th>AUTHORIZED?</th>
    <td><?php echo $authorized; ?></td>
  </tr>
  


  
</table>
</body>
</html>