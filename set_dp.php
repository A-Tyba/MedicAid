<?php


session_start();
require 'db_config.php';

mkdir("uploads/".$_SESSION['email']);


$target_dir = "uploads/".$_SESSION['email']."/";


$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


$profile_pic=$target_file;
$email=$_SESSION['email'];
$uname="[placeholder]";
$full_name="[placeholder]";
$phone_number="[placeholder]";
$BMDC_number="[placeholder]";

$uploadOk = 1;


$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));











// Check if image file is a actual image or fake image


if(isset($_POST["submit"])) {


  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);


  if($check !== false) {





    $uploadOk = 1;


  } else {





    $uploadOk = 0;


  }


}





// Check if file already exists


if (file_exists($target_file)) {





  $uploadOk = 0;


}





// Check file size


if ($_FILES["fileToUpload"]["size"] > 500000000000000) {





  $uploadOk = 0;


}





// Allow certain file formats


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"


&& $imageFileType != "gif" && $imageFileType != "webp" ) {





  $uploadOk = 0;


}





// Check if $uploadOk is set to 0 by an error


if ($uploadOk == 0) {





// if everything is ok, try to upload file


} else {


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";


  } else {


    // echo "Sorry, there was an error uploading your file.";


  }


}











    $stmt = $conn->prepare("insert into profiles(profile_pic, email, uname, full_name, phone_number, BMDC_number) values(?, ?, ?, ?, ?, ?)");


    $stmt->bind_param("ssssss", $profile_pic, $email, $uname, $full_name, $phone_number, $BMDC_number);


    $execval = $stmt->execute();

    if($execval){
      echo "Profile picture uploaded successfully!";
        }else{
          echo "Profile picture uploaded failed!";
        }


    $stmt->close();


    $conn->close();








?>