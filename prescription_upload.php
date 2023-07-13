<?php
//FOR PATIENTS ONLY

session_start();
require 'db_config.php';

if (!is_dir("patient_pictures/" . $_SESSION['email'])) {
  mkdir("patient_pictures/" . $_SESSION['email']);
}




  $target_dir = "patient_pictures/" . $_SESSION['email'] . "/";


  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


  $pic = $target_file;
  $email = $_SESSION['email'];
  $doctor = $_SESSION['doctor_for_upload'];

  $uploadOk = 1;


  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));





  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "webp"
  ) {
    echo "Sorry, only JPG, JPEG, PNG, WEBP & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  if (!is_dir($pic)) {
    $stmt = $conn->prepare("insert into patient_prescriptions(pic, patient, doctor) values(?, ?, ?)");
    $stmt->bind_param("sss", $pic, $email, $doctor);
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();
  } else {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "already exists!";
  }


?>