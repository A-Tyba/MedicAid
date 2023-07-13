<?php 
session_start();



if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];



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



}
?>
<?php

if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];



    $conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');



if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}



else{

  $sql = "SELECT * FROM reg";

  $result = $conn->query($sql);

  

    if ($result->num_rows > 0) {

        // output data of each row

        while($row = $result->fetch_assoc()) {

        if($row['email']==$email && $row['otp_verified']=="YES"){
          header("Location: https://www.medicaidbd.xyz/search.php");
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



          <a href="contact.php" class="nav-link">Contact</a>



        </li>



      </ul>



      <ul class="navbar-nav">


   



        <li class="nav-item">



        <a href="profile_creator.php" class="navbar-brand"><img class="img-fluid img-thumbnail" src="<?php if(isset($_SESSION['email'])){echo $profile_pic;} ?>" alt="profile pic" width="130px" height="92px"></a>



        </li>



        <li class="nav-item">



          <a href="destroy_session.php" class="nav-link">Logout</a>



        </li>



    </ul>



    </div>



    



  </nav>







  <div class="container fixed-center">



      <div class="py-5 text-center">



        <a href="index.php"><img class="d-block mx-auto mb-4" src="images/fotoboo_logo.webp" alt="" width="200" height="150"></a>



        <h2>SMS & Email OTP Verification</h2>


        <p class="lead">Verify yourself</p><br>



        <hr>



        <p class="lead">First, generate an OTP that is going to be sent to your phone number and email</p>



        <img  src="images/verification.png" alt="">

        <br>

        <form  id="uploadform" method="POST">



  <input type="text" name="email" id="email" value="<?php echo $email; ?>" hidden>
  <input type="tel" name="phone" id="phone" placeholder="Enter your phone number here">

  <button type='submit' id='generate' name='generate' class="btn btn-outline-success btn-lg">GENERATE OTP</button>



</form>



<hr>






<form id="setform3" method="POST">



  <p class="lead">Now, check your email and enter your OTP</p>



  <input type="text" id="otp" name="otp" placeholder="Enter your OTP" required>



  <button type='submit' id='set3' name='set3' class="btn btn-outline-primary btn-lg">VERIFY</button>



  <hr>



  



</form>



      </div>











      <script>



      //JQuery starts here, loads a php script to upload file



 $(document).ready(function() {



 



    $("#generate").click(function() {



var email = $("#email").val();
var phone = $("#phone").val();



event.preventDefault();



$.post("generate_otp.php",



{



  email: email,
  phone: phone



},



function received(data){



  alert(data);



  return false;



});



});









 $("#set3").click(function() {



    var otp = $("#otp").val();



    event.preventDefault();



    $.post("verify_otp.php",



    {



      otp: otp,



    },



    function received(data){



      alert(data);

      if(data=="OTP verified successfully!"){
        window.location.href = 'https://medicaidbd.xyz/search.php';
      }



      return false;



    });



 });


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