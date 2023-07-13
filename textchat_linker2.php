<?php
session_start();
include 'db_config.php';
include 'recurseCopy.php';
$ran_id = rand(time(), 100000000);
$unique_id = $ran_id;
$email=$_SESSION['email'];
$status="Offline now";
$_SESSION['chat_designation']="DOCTOR";
$sql = "SELECT * FROM profiles";



$result = $conn->query($sql);



if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {



    if($row['email']==$email){

        $profile_pic=$row['profile_pic'];
        $fname=$row['full_name'];
        $text_enabled=$row['text_enabled'];

    }

  } 

}


$sql2 = "SELECT * FROM reg";


$result = $conn->query($sql2);


if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {


    if($row['email']==$email){

        $password=$row['pass'];

    }

  } 

}


$hired="YES";
$type="DOCTOR";
if($text_enabled=="YES"){
  $sql4 = "SELECT * FROM payment";
  $result = $conn->query($sql4);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row['doctor']==$email){
      $patient=$row['patient'];
      $stmt2 = $conn->prepare("UPDATE users SET hired_d = ? WHERE email = ?");
      $stmt2->bind_param("ss", $hired, $patient);
      $execval = $stmt2->execute();
      $stmt3 = $conn->prepare("UPDATE users SET type = ? WHERE email = ?");
      $stmt3->bind_param("ss", $type, $email);
      $execval = $stmt3->execute();
    }
  }
}
  header("Location: /chat/login.php?email=$email&password=$password");
  die();
}



$stmt = $conn->prepare("insert into users(unique_id, fname, email, password, img, status) values(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $unique_id, $fname, $email, $password, $profile_pic, $status);
$execval = $stmt->execute();




$stmt2 = $conn->prepare("UPDATE profiles SET text_enabled = ? WHERE email = ?");
$text_enabled="YES";
$stmt2->bind_param("ss", $text_enabled, $email);
$execval = $stmt2->execute();

$check_dir=$_SESSION['email'];
$dir='chat/uploads/'.$check_dir;
// echo $dir;
if(is_dir($dir)){
  header("Location: /chat/login.php?email=$email&password=$password");
  die();
}


recurseCopy('uploads', 'chat', 'uploads');
echo "Please wait while textchat is being loaded up...";
header("Location: /chat/login.php?email=$email&password=$password");

?>





