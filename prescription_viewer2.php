<?php



session_start();

$doctor=$_GET['q'];





$ses_id=md5($_SESSION['email']);



if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];

    $conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');



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
            $patient_name=$row['full_name'];

        }





      } 



}






$sql2 = "SELECT * FROM doctor_prescriptions";



$result = $conn->query($sql2);



if ($result->num_rows > 0) {



  // output data of each row



  while($row = $result->fetch_assoc()) {




    if($row['doctor_email']==$doctor  && $row['patient_email']==$_SESSION['email']){



        $patient_age=$row['patient_age'];
        $patient_sex=$row['patient_gender'];
        $patient_date=$row['date'];
        $patient_text1=$row['text1'];
        $patient_text2=$row['text2'];
        $doctor_name=$row['doctor_name'];
        $doctor_email=$row['doctor_email'];
        $doctor_bmdc=$row['doctor_bmdc'];
        $doctor_phone=$row['doctor_phone'];


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


.bg {
  background-color: #c0e2ec;
  margin: auto;
  height: 1175px;
  width: 800px;
}

.bg-color {
  background-color: #c0e2ec;
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



<body id="eprescription">



  <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">



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



        <h2>Prescription Viewer</h2>



        <p class="lead">Here you can view your prescription, prescribed by your MedicAid doctor</p><br>



        <hr>



        <p class="lead">Get to know about your MedicAid doctor's instructions</p>

<!-- e-Prescription starts here -->
        <?php if (!(isset($patient_age))) {
          echo '<script>alert("e-Prescription has not been set by the doctor yet! Redirecting...");
          window.location.replace("https://medicaidbd.xyz/search.php");
          </script>' ;} ?>
        <div class="bg border border-dark" style="border-width: 10px;">
          <br>
          <div class="d-flex justify-content-center"><a href="index.php"><img class="mb-4" src="images/fotoboo_logo.webp" alt="logo" width="175" height="150"></a></div>
          <br>
          <hr>
        
          <div class="text-center"><h1>Medical e-Prescription</h1></div>
          <hr>
            <form action="" method="post">
            <div class="d-flex justify-content-around">Name: <select class="btn btn-primary dropdown-toggle" name="patient_name" id="patient_name" readonly>
            
                <option value="'.$patient['patient'].'"><?php echo $patient_name; ?></option>
              
              </select>  Age: <input class="bg-color" type="text" id="patient_age" value="<?php echo $patient_age; ?>" required readonly></div><br>
            <div class="d-flex justify-content-around">Sex: 
              <select class="btn btn-primary dropdown-toggle" name="patient_gender" id="patient_gender" readonly>
                <option value="Male"><?php echo $patient_sex; ?></option>
              </select> 
              Date: <input class="bg-color" type="date" id="date" value="<?php echo $patient_date; ?>">
            </div>
          
          <hr>
          
          <div class="d-flex justify-content-around"><img class="mb-4" src="images/RX.webp" alt="logo" width="175" height="150">
          <div class="vr"></div>
          <textarea class="bg-color" name="text1" id="text1" cols="50" rows="10"><?php echo $patient_text1; ?></textarea>
          </div>
<br>
          <div class="d-flex justify-content-around">
          <textarea class="bg-color" name="text2" id="text2" cols="100" rows="10"><?php echo $patient_text2; ?></textarea>
          </div>


          <hr>
          
            
              
        <div class="d-flex justify-content-around">
          Doctor Name: <input class="bg-color" type="text" id="doctor_name" value="<?php echo $doctor_name; ?>" readonly> 
          Doctor Email: <input class="bg-color" type="text" id="doctor_email" value="<?php echo $doctor_email; ?>" readonly>
          </div>
          <br><br>
          <div class="d-flex justify-content-around">
          Doctor BMDC No.: <input class="bg-color" type="text" id="doctor_bmdc" value="<?php echo $doctor_bmdc; ?>" readonly> 
          Doctor Phone No.: <input class="bg-color" type="text" id="doctor_phone" value="<?php echo $doctor_phone; ?>" readonly>
          </div>

        
        </div>





<hr>

</form>




      </div>


</div>
<form action="generate-pdf.php" method="post">
  <input type="text" name="patient_name" value="<?php echo $patient_name;?>" hidden>
  <input type="text" name="patient_age" value="<?php echo $patient_age;?>" hidden>
  <input type="text" name="patient_sex" value="<?php echo $patient_sex;?>" hidden>
  <input type="text" name="patient_date" value="<?php echo $patient_date;?>" hidden>
  <input type="text" name="patient_text1" value="<?php echo $patient_text1;?>" hidden>
  <input type="text" name="patient_text2" value="<?php echo $patient_text2;?>" hidden>
  <input type="text" name="doctor_name" value="<?php echo $doctor_name;?>" hidden>
  <input type="text" name="doctor_email" value="<?php echo $doctor_email;?>" hidden>
  <input type="text" name="doctor_bmdc" value="<?php echo $doctor_bmdc;?>" hidden>
  <input type="text" name="doctor_phone" value="<?php echo $doctor_phone;?>" hidden>

  
<div class="d-flex justify-content-center"><button id="download" type="submit" class="btn btn-primary btn-lg">Generate PDF</button></div></form>

<br>
<hr>






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



  url: 'prescription_upload.php', 



  type: 'POST',



  data: new FormData($('#uploadform')[0]), // The form with the file inputs.



  processData: false,



  contentType: false                    // Using FormData, no need to process data.



}).done(function(data){

    alert(data);

  var filename = $('input[type=file]').val().split('\\').pop();



//   var dir = "uploads/"+email;



  $("#img").attr("src","uploads/prescriptions/"+email+"/"+filename); // updating prescription preview image on page





  







  // $("#imageBox").html('<img src="' + this.href + '" />');



}).fail(function(){



  alert("An error occurred, the file couldn't be sent!");



});







 });







 $("#set").click(function() {



    var uname = $("#uname").val();
    var full_name = $("#full_name").val();
    var phone_number = $("#phone_number").val();
    var BMDC_number = $("#BMDC_number").val();



    event.preventDefault();



    $.post("set_username.php",



    {



      uname: uname,
      full_name: full_name,
      phone_number: phone_number,
      BMDC_number: BMDC_number,



    },



    function received(data){



      alert(data+" set successfully!");



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



    <a class="text-white" href="">Team MedicAid</a>



  </div>



  <!-- Copyright -->



</footer>



</body>




</html>