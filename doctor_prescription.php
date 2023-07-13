<?php



session_start();

require 'db_config.php';

if(!isset($_SESSION['email'])){
  header("Location: login.php");
}


$ses_id=md5($_SESSION['email']);



if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];











  

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






$sql2 = "SELECT * FROM payment";



$result = $conn->query($sql2);



if ($result->num_rows > 0) {



  // output data of each row



  $row = $result->fetch_assoc();

 




  } 

  $sql10 = "SELECT * FROM profiles";



  $result2 = $conn->query($sql10);
  
  
  
  if ($result2->num_rows > 0) {
  
  
    // output data of each row
  
  
  
    $row2 = $result2->fetch_assoc();
  
  
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

.bg {
  background-color: #c0e2ec;
  margin: auto;
  height: 1175px;
  width: 800px;
}



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



  <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top">



    <a href="index.php" class="navbar-brand"><img src="images/logo.webp" alt="logo" width="110px" height="92px"></a>



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



          <a href="contact.php" class="nav-link">Contact</a>



        </li>



        <li class="nav-item">



          <a href="search.php" class="nav-link">Search</a>



        </li>



      </ul>



      <ul class="navbar-nav">


      
        <li class="nav-item">



        <a href="profile_creator.php" class="navbar-brand"><object id="pfp2" class="img-fluid img-thumbnail" data="<?php if(isset($_SESSION['email'])&&isset($profile_pic)){echo $profile_pic;}else{echo "images/default_pic.webp";} ?>" type="image/png" width="130px" height="92px"><a> 



        <a href="profile_creator.php" class="navbar-brand"><img id="pfp" class="img-fluid img-thumbnail" src="images/default_pic.webp" alt="profile pic" width="130px" height="92px"></a>



        </object>



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



        <h2>Prescription Uploader</h2>



        <p class="lead">Here you can upload your prescription for your patients</p><br>



        <hr>



        <p class="lead">Let your patients know about your instructions</p>

        <hr>
        <br><br>


<!-- MEDICAL PRESCRIPTION -->
</div>



</div>
        <div class="bg border border-dark" style="border-width: 10px;">
          <br>
          <div class="d-flex justify-content-center"><a href="index.php"><img class="mb-4" src="images/fotoboo_logo.webp" alt="logo" width="175" height="150"></a></div>
          <br>
          <hr>
          <div class="text-center"><h1>Medical e-Prescription</h1></div>
          <hr>
<form action="" method="post">
            <div class="d-flex justify-content-around">Name: <select class="btn btn-primary dropdown-toggle" name="patient_name" id="patient_name">
            <?php foreach($result as $patient){
              if($patient['doctor']==$_SESSION['email']){
                
                echo'
                <option value="'.$patient['patient'].'">'.$patient['patient_name'].'</option>
              
              ';
              
              
              }} ?>
              </select>  Age: <input type="text" id="patient_age" value="23" required></div><br>
            <div class="d-flex justify-content-around">Sex: 
              <select class="btn btn-primary dropdown-toggle" name="patient_gender" id="patient_gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select> 
              Date: <input type="date" id="date">
            </div>
          
          <hr>
          
          <div class="d-flex justify-content-around"><img class="mb-4" src="images/RX.webp" alt="logo" width="175" height="150">
          <div class="vr"></div>
          <textarea name="text1" id="text1" cols="50" rows="10"  placeholder="Type something here..." value="Test" required></textarea>
          </div>
<br>
          <div class="d-flex justify-content-around">
          <textarea name="text2" id="text2" cols="100" rows="10"  placeholder="Type something here..." value="Test" required></textarea>
          </div>


          <hr>
          <?php foreach ($result2 as $doctor) {
            if ($doctor['email'] == $_SESSION['email']) {
              echo '
        <div class="d-flex justify-content-around">
          Doctor Name: <input type="text" id="doctor_name" value="'.$doctor['full_name'].'" readonly> 
          Doctor Email: <input type="text" id="doctor_email" value="'.$doctor['email'].'" readonly>
          </div>
          <br><br>
          <div class="d-flex justify-content-around">
          Doctor BMDC No.: <input type="text" id="doctor_bmdc" value="'.$doctor['BMDC_number'].'" readonly> 
          Doctor Phone No.: <input type="text" id="doctor_phone" value="'.$doctor['phone_number'].'" readonly>
          </div>
        ';
            }
          }?>
        </div>






<hr>
  <div class="text-center"><button type='submit' id='upload' name='upload' class="btn btn-lg btn-outline-success" >UPLOAD PRESCRIPTION</button></div>
<hr>
</form>


<script>



//JavaScript starts here



function deselect(e) {



  $('.pop').slideFadeToggle(function() {



    e.removeClass('selected');



  });    



}



$.fn.slideFadeToggle = function(easing, callback) {



  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);



};


  //JQuery starts here, loads a php script to upload file



 $(document).ready(function() {
  
  $("#upload").click(function() {



    var patient_name  = $("#patient_name").val();
    var patient_age = $("#patient_age").val();
    var patient_gender = $("#patient_gender").val();
    var date = $("#date").val();
    var text1 = $("#text1").val();
    var text2 = $("#text2").val();
    var doctor_name = $("#doctor_name").val();
    var doctor_email = $("#doctor_email").val();
    var doctor_bmdc = $("#doctor_bmdc").val();
    var doctor_phone = $("#doctor_phone").val();



    event.preventDefault();


    $.post("prescription_upload2.php",



    {
      patient_name: patient_name,
      patient_age: patient_age,
      patient_gender: patient_gender,
      date: date,
      text1: text1,
      text2: text2,
      doctor_name: doctor_name,
      doctor_email: doctor_email,
      doctor_bmdc: doctor_bmdc,
      doctor_phone: doctor_phone,
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