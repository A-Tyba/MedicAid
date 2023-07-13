<?php
session_start();
// mkdir("listings/".$_SESSION['email']);
// $target_dir = "listings/".$_SESSION['email']."/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$pic="[placeholder]";
$email=$_SESSION['email'];
$category="[placeholder]";
$symptoms="[placeholder]";
$name="[placeholder]";
$full_name="[placeholder]";
$uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $sql = "SELECT * FROM profiles";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row['email']==$email){
            $profile_pic=$row['profile_pic'];
        }
      } 
}
}



if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into listings(pic, category, email, symptoms, profile_pic, name, full_name) values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $pic, $category, $email, $symptoms, $profile_pic, $name, $full_name);
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();
}

echo("Listing started successfully!");

?>