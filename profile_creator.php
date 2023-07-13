<?php

require 'db_config.php';

session_start();



if(!isset($_SESSION['email'])){
  header("Location: login.php");
}


$ses_id=md5($_SESSION['email']);



if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];





if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}



else{

  

  $email=$_SESSION['email'];



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

$sql2 = "SELECT * FROM reg";



$result = $conn->query($sql2);



if ($result->num_rows > 0) {



  // output data of each row



  while($row = $result->fetch_assoc()) {




    if($row['email']==$_SESSION['email']){



        $designation=$row['designation'];



    }


  } 


}






}}



?>




<!DOCTYPE html>



<html lang="en">



<head>



    <meta charset="UTF-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <meta name="description" content="FotoBoo : A website for finding and hiring photographers for your events such as birthdays, weddings and programmes.">



    <title>MedicAid</title>



    <link rel="icon" type="image" href="images/favicon.webp">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer />



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">



<style>











.messagepop {



  background-color:#FFFFFF;



  border:1px solid #999999;



  cursor:default;



  display:none;



  margin-top: 15px;



  position: absolute;



  left: 900px;



  text-align:left;



  width:394px;



  z-index:50;



  padding: 25px 25px 20px;



}







label {



  display: block;



  margin-bottom: 3px;



  padding-left: 15px;



  text-indent: -15px;



}







.messagepop p, .messagepop.div {



  border-bottom: 1px solid #EFEFEF;



  margin: 2px 0;



  padding-bottom: 8px;



}



</style>







  </head>



<body>


<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">



    <a href="index.php" class="navbar-brand"><img src="images/logo.webp" alt="logo" width="130px" height="92px"></a>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">



      <span class="navbar-toggler-icon"></span>



    </button>



    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">



      <ul class="navbar-nav">





        <li class="nav-item">



          <a href="register.php" class="nav-link">Register</a>



        </li>



        <li class="nav-item">



          <a href="login.php" class="nav-link">Login</a>



        </li>

        <li class="nav-item">



          <a href="search.php" class="nav-link">Search</a>



        </li>




        <li class="nav-item">



          <a href="contact.php" class="nav-link">Contact</a>



        </li>



        <li class="nav-item">



          <a href="listing_creator.php" class="nav-link" <?php if(isset($_SESSION['email'])){echo "";}else{echo "hidden";} ?>>Create listing</a>



        </li>

        


        <li class="nav-item">



          <a href="patient_prescription.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "hidden";}else{echo "";} ?>>Upload Prescription</a>



        </li>

          <li class="nav-item">



          <a href="view_hired_doctors.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "hidden";}else{echo "";} ?>>View Hired Doctors</a>



        </li>

        <li class="nav-item">



          <a href="textchat_linker.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "";}else{echo "hidden";} ?>>Text Chat</a>



        </li>





      </ul>



      <ul class="navbar-nav">

              <li class="nav-item">



          <a href="view_patients.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "";}else{echo "hidden";} ?>>View Patients</a>



        </li>

        <li class="nav-item">



          <a href="doctor_prescription.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "";}else{echo "hidden";} ?>>Prescribe</a>



        </li>



      <li class="nav-item">



          <a href="profile_creator.php" class="nav-link">  <?php if(isset($_SESSION['email'])&&isset($_COOKIE[$ses_id])){echo $_COOKIE[$ses_id];}else{echo "";}  ?></a>



        </li>       



        <li class="nav-item">



        <a href="<?php if(isset($_SESSION['email'])){echo "profile_creator.php";}else{echo "login.php";} ?>" class="navbar-brand"><img class="img-fluid img-thumbnail" src="<?php if(isset($_SESSION['email'])&&isset($profile_pic)){echo $profile_pic;}else{echo "images/default_pic.webp";} ?>" alt="profile pic" width="130px" height="92px"></a>



        </li>



        <li class="nav-item">



          <a href="destroy_session.php" class="nav-link">Logout</a>



        </li>



      </ul>



    </div>



  </nav>







  <div class="container fixed-center">



      <div class="py-5 text-center">



        <a href="index.php"><img class="d-block mx-auto mb-4" src="images/fotoboo_logo.webp" alt="" width="175" height="150"></a>



        <h2>Profile Creator</h2>



        <p class="lead">Here you can create your user profile</p><br>



        <hr>



        <p class="lead">First, upload a profile picture</p>



        <img id="img" class="d-block mx-auto mb-4 img-fluid" src="<?php if (isset($profile_pic)) {
          echo $profile_pic;
        } else {echo 'images/default_pic.webp';} ?>" alt="" width="250" height="270">



        <form  id="uploadform" method="POST" enctype="multipart/form-data">



  <label for="fileToUpload" style="color:white">Select image to upload:</label>



  <input type="text" name="email" id="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" hidden>



  <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-outline-success" required>
  <br><br><br>
  <button type='submit' id='upload' name='upload' class="btn btn-outline-success">UPLOAD</button>



</form>



 



  <form id="setform" method="POST">



  <input type="text" id="uname" name="uname" value="[PLACEHOLDER]"  required hidden>



  <!-- <div class="messagepop pop"> -->



  <!-- <form method="post" id="new_message" action="/messages">



    <p><label for="email">Can we save your username in cookies?</label></p>



    <p><label for="body">Make it easier for us to remember you.</label></p>



    <p><button name="commit" class="btn btn-outline-success selected yes" id="yes">Yes</button> or <button name="commit" class="btn btn-outline-danger selected close" id="no">No</button> </p>



  </form> -->



<!-- </div> -->
<hr>
<div>
<p class="lead">Now, set your full name</p>



<input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required><button id='update_name' name='update_name' class="btn btn-outline-primary btn-lg">UPDATE</button>
</div>

<hr>

<div>
<p class="lead">If you are a doctor, enter your accreditations(info about degrees you hold)</p>

<textarea type="text" id="accreditations" name="accreditations" placeholder="Enter information about degrees you hold..." rows="10" cols="75" required></textarea>


</div>

<hr>

<div>
<p class="lead">Now, set your phone number</p>



<input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>
</div>

<hr>





  <p class="lead">Are you a doctor?</p>



  <select class="btn btn-primary dropdown-toggle" name="status" id="status" required>


    <option value="YES">YES</option>


    <option value="NO">NO</option>


  </select>

  <hr>

<div>
<p class="lead">If you are a doctor, please enter your BMDC number for verification</p>



<input type="text" id="BMDC_number" name="BMDC_number" placeholder="Enter your BMDC number" required>
<br><br>
<div lass="alert alert-warning" role="alert">
  <p><strong>Note:</strong> *For Medical please enter between 1 - 109500 & for Dental please enter between 1 - 11350</p>
</div>
</div>



<hr><br><button type='submit' id='set' name='set' class="btn btn-outline-primary btn-lg">SET</button>


<hr>


</form>



      </div>



      <div id="contents" class="alert alert-info" role="alert" hidden><button id="hide">Hide</button>



</div>



















<script>



//JavaScript starts here



function deselect(e) {



  $('.pop').slideFadeToggle(function() {



    e.removeClass('selected');



  });    



}







$(function() {



  $('#set').on('click', function() {



    if($('#set')) {



      deselect($(this));               



    } else {



      $('.pop').slideFadeToggle();



    }



    return false;



  });







  


});















$.fn.slideFadeToggle = function(easing, callback) {



  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);



};







      //JQuery starts here, loads a php script to upload file



 $(document).ready(function() {



  $("#hide").click(function(){$("#contents").hide();});



 



 $("#upload").click(function() {



  var email = $("#email").val();



  event.preventDefault();



  $.ajax({



  url: 'set_dp.php', 



  type: 'POST',



  data: new FormData($('#uploadform')[0]), // The form with the file inputs.



  processData: false,



  contentType: false                    // Using FormData, no need to process data.



}).done(function(result){



  var filename = $('input[type=file]').val().split('\\').pop();



//   var dir = "uploads/"+email;



  $("#img").attr("src","uploads/"+email+"/"+filename); // updating profile image on page



  $("#pfp").attr("src","uploads/"+email+"/"+filename);



  $("#pfp2").attr("src","uploads/"+email+"/"+filename);



  alert(result);







  // $("#imageBox").html('<img src="' + this.href + '" />');



}).fail(function(){



  alert("An error occurred, the file couldn't be sent!");



});







 });







 $("#set").click(function() {



    var uname = $("#uname").val();
    var full_name = $("#full_name").val();
    var accreditations = $("#accreditations").val();
    var phone_number = $("#phone_number").val();
    var BMDC_number = $("#BMDC_number").val();
    var status = $("#status").val();



    event.preventDefault();



    $.post("set_username.php",



    {



      uname: uname,
      full_name: full_name,
      accreditations: accreditations,
      phone_number: phone_number,
      BMDC_number: BMDC_number,
      status: status


    },



    function received(data){



      alert(data);



      return false;



      







    });



 });

 $("#update_name").click(function() {



var name = $("#full_name").val();
var email = $("#email").val();



event.preventDefault();



$.post("update_name.php",



{

  name: name,
  email: email,

},



function received(data){



  alert(data);



  return false;



});



});



 });















 </script>







      



        







  <footer class="bg-dark text-center text-white fixed-relative">



  <!-- Grid container -->



  <div class="container p-4 pb-0">



    <!-- Section: Social media -->



    <section class="mb-4">



      <!-- Facebook -->



      <a class="btn btn-outline-light btn-floating m-1" href="facebook.com" role="button"



        ><i class="fab fa-facebook-f"></i



      ></a>







      <!-- Twitter -->



      <a class="btn btn-outline-light btn-floating m-1" href="twitter.com" role="button"



        ><i class="fab fa-twitter"></i



      ></a>







      <!-- Google -->



      <a class="btn btn-outline-light btn-floating m-1" href="google.com" role="button"



        ><i class="fab fa-google"></i



      ></a>







      <!-- Instagram -->



      <a class="btn btn-outline-light btn-floating m-1" href="instagram.com" role="button"



        ><i class="fab fa-instagram"></i



      ></a>







      <!-- Linkedin -->



      <a class="btn btn-outline-light btn-floating m-1" href="linkedin.com" role="button"



        ><i class="fab fa-linkedin-in"></i



      ></a>







      <!-- Github -->



      <a class="btn btn-outline-light btn-floating m-1" href="github.com" role="button"



        ><i class="fab fa-github"></i



      ></a>



    </section>



    <!-- Section: Social media -->



  </div>



  <!-- Grid container -->







  <!-- Copyright -->



  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">



    © 2022 Copyright:



    <a class="text-white" href="">Group 3</a>



  </div>



  <!-- Copyright -->



</footer>







</body>























</html>