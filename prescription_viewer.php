<?php



session_start();

$patient=$_GET['q'];





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



        }





      } 



}






$sql2 = "SELECT * FROM patient_prescriptions";



$result = $conn->query($sql2);



if ($result->num_rows > 0) {



  // output data of each row



  while($row = $result->fetch_assoc()) {




    if($row['email']==$patient){



        $prescription=$row['prescription'];



    }





  }
} 

  $sql3 = "SELECT * FROM profiles";



  $result = $conn->query($sql3);
  
  
  
  if ($result->num_rows > 0) {
  
  
  
    // output data of each row
  
  
  
    while($row = $result->fetch_assoc()) {
  
  
  
  
      if($row['email']==$patient){
  
  
  
          $phone_number=$row['phone_number'];
  
  
  
      }
  
  
  
  
  
    } 



}
}






}



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



        <p class="lead">Here you can view your patient's prescription</p><br>



        <hr>
        <h3>Medi-Alarm Notification System</h3>
        <hr>

        <br><a href="medialarm_setter.php?q=<?php echo $patient; ?>"><button id="medialarm" name="medialarm" class="btn btn-primary btn-lg">Click To Go To Page To Set Medi-Alarm</button></a>
        
        

        <hr>



        <p class="lead">Get to know about your patient's past medical history</p>



        <img id="img" class="d-block mx-auto mb-4 img-fluid" src="<?php if(isset($prescription)){echo $prescription;}else{echo "images/default_pic.webp";} ?>" alt="" width="100%" height="100%">




      </div>



      <!-- <div id="contents" class="alert alert-info" role="alert" hidden><button id="hide">Hide</button> -->



</div>



















<script>



//JavaScript starts here



function deselect(e) {



  $('.pop').slideFadeToggle(function() {



    e.removeClass('selected');



  });    



}







$(function() {









  


});















$.fn.slideFadeToggle = function(easing, callback) {



  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);



};







      //JQuery starts here, loads a php script to upload file



 $(document).ready(function() {



//   $("#hide").click(function(){$("#contents").hide();});


//  $("#upload").click(function() {



//   var email = $("#email").val();



//   event.preventDefault();



//   $.ajax({



//   url: 'prescription_upload.php', 



//   type: 'POST',



//   data: new FormData($('#uploadform')[0]), // The form with the file inputs.



//   processData: false,



//   contentType: false                    // Using FormData, no need to process data.



// }).done(function(data){

//     alert(data);

//   var filename = $('input[type=file]').val().split('\\').pop();



// //   var dir = "uploads/"+email;



//   $("#img").attr("src","uploads/prescriptions/"+email+"/"+filename); // updating prescription preview image on page


//   // $("#imageBox").html('<img src="' + this.href + '" />');



// }).fail(function(){



//   alert("An error occurred, the file couldn't be sent!");



// });


//  });










 });















 </script>







      



        







<footer class="bg-dark text-center text-white" style="    position: fixed;

height: 75px;

bottom: 0px;

left: 0px;

right: 0px;

margin-bottom: 0px;">



<!-- Grid container -->







<!-- Section: Social media -->



<section class="mb-4">


<!-- Instagram -->



<a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/yourmedicaid/" role="button"



  ><i class="fab fa-instagram"></i



></a>



<!-- Facebook -->



<a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/profile.php?id=100088545151295" role="button"



  ><i class="fa-brands fa-square-facebook"></i></a>









<!-- Youtube -->



<a class="btn btn-outline-light btn-floating m-1" href="https://www.youtube.com/channel/UCC0GiEs2nNB3n7LWARO-N_Q" role="button"



><i class="fab fa-youtube"></i



></a>





















<!-- Linkedin -->



<a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/medic-aid-a2113b259/" role="button"



  ><i class="fab fa-linkedin-in"></i



></a>









<!-- Twitter -->



<a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/MedicAid10" role="button"



  ><i class="fab fa-twitter"></i



></a>



<br><a href="#" style="color:white;">Designed by MedicAid Team</a>



</section>



<!-- Section: Social media -->



<!-- Grid container -->



</footer>




</body>




</html>