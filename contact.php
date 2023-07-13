<?php 



session_start();







if(isset($_SESSION['email'])){



  $ses_id=md5($_SESSION['email']);



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





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="images/aboutus.jpg">
    <title>MedicAid, an online Telemedicine platform for patients and doctors in Bangladesh</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" type="image" href="images/favicon.webp">
    <!--aos css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!--font awesome link-->
    <script src="https://kit.fontawesome.com/27a76d5b14.js" crossorigin="anonymous"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style2.css">

    

</head>
<body>
 

<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars" ></div>

    <a href="index.php" class="logo"><span>MEDIC</span>AID</a>

    <nav class="navbar" data-aos="fade-down">
        
        <a href="index.php">Home</a>
        <a href="about-us.php">About us</a>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </nav>    
    
    <div class="icons" data-aos="fade-left">
        <a href="adminlogin.html"><i class="fas fa-user" id="login-btn"></i></a>
        
        
    </div>

</header>

<!-- -home--->

<section class="home" id="home">
  

  <div class="controls">
      <span class="vid-btn active" data-src="images/hospital.jpg"></span>
  </div>

  <div class="video-container">
      <img src="images/hospital.jpg">
      
  </div>
  <br>

  <div class="facilities" data-aos="fade-up">
    <h1 style="text-align: center ;">Here is our location  </h1>
    <br>
    <h8  style="text-align: center ; size: 25px; color: brown;"> Feel Free to drop by anytime for some coffee<h8>
      <p style="color: rgb(37, 104, 135); text-align: center;" > Don't worry it's on us</p>
</div>

</section>
<section class="advisor">
    <div class="location">
    <div class="d-flex justify-content-center">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.0980920526385!2d90.42298167440062!3d23.815110678626255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1669489506566!5m2!1sen!2sbd" width="900" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
   </section>

   <!-- Contact form-->

   
   <section class="contact">
    
    <h1 class="heading" data-aos="fade-down">
        <span>C</span>
        <span>O</span>
        <span>N</span>
        <span>T</span>
        <span>A</span>
        <span>C</span>
        <span>T</span>
    </h1>

    <div class="row">

        <div class="image" data-aos="fade-right">
            <img src="images/contact.jpg" alt="">
        </div>

        <form action="" method="post" data-aos="fade-left">
            <div class="inputBox">
                <input type="text" name="name" id="name" placeholder="NAME" required>
                <input type="email"  name="email" id="email" placeholder="EMAIL" required>
            </div>
            <div class="inputBox">
                <input type="phone"  name="phone" id="phone" placeholder="PHONE NO" required>
                <input type="text"  name="subject" id="subject" placeholder="SUBJECT" required>
            </div>
            <textarea placeholder="SHARE YOUR QUERIES" name="text" id="text" cols="30" rows="10" required></textarea>
            <div class="d-flex justify-content-center"><input type="button" name="submit" id="submit" class="btn" value="SUBMIT"></div>
        </form>

    </div>

<div class="row">
        <div class="contact-col">
    <div class="d-flex justify-content-around">
            <div>
                <i class="fa fa-home fa-3x" aria-hidden="true" style="color:aliceblue"></i>
                <br>
                <br>
                
                    <h5 style="color:rgb(74, 228, 243)  ; font-size: 20px;" >NSU MAIN CAMPUS ROAD, PLOT# 15 <br> BASHUNDHARA, DHAKA</h5>
                    
                
            </div>
            <br>
            <br>
            <div>
                <i class="fa fa-phone fa-3x" aria-hidden="true" style="color:aliceblue"></i>
                <br>
                <br>
             
                    <h5 style="color:rgb(74, 228, 243) ; font-size: 20px;">+88 02 9002738 <br>  AVAILABLE: <br> 24/7</h5>
                    
                
            </div>
            <br>
            <br>
            <div>
                <i class="fa fa-envelope fa-3x" aria-hidden="true" style="color:aliceblue"></i>
                <br>
                <br>
                
                    <h5 style="color: rgb(74, 228, 243)  ; font-size: 20px;">support@medicaid.com <br> SEND US AN EMAIL IF YOU HAVE ANY QUERIES</h5>
                    
               
            </div>
  </div>
        </div>
    
</section>

 
    
   
<!-- footer section  -->

<!-- footer section  -->

<section class="footer">
    <h4 style="color:antiquewhite">Follow Us</h4>
    

    <div class="icons">
        <a href="https://www.instagram.com/yourmedicaid/" target="_blank">
            <i class="fa fa-instagram fa-2xl"></i>
        </a>
        <a href="https://www.facebook.com/people/Medic-Aid/100088545151295/" target="_blank">
            <i class="fa fa-facebook fa-2xl"></i>
        </a>
        <a href="https://www.youtube.com/channel/UCC0GiEs2nNB3n7LWARO-N_Q" target="_blank">
            <i class="fa fa-youtube fa-2xl"></i>
        </a>
        <a href="https://www.linkedin.com/in/medic-aid-a2113b259/" target="_blank">
            <i class="fa fa-linkedin fa-2xl"></i>
        </a>
        <a href="https://twitter.com/MedicAid10" target="_blank">
            <i class="fa fa-twitter fa-2xl"></i>
        </a>
    </div>

    
</section>
    




<!--aos js link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

<!--initializing aos-->
<script>
  AOS.init({
      delay:350,
      duration:1000
  })
</script>
<script>
    


 $("#submit").click(function() {


var name = $("#name").val();
var email = $("#email").val();
var phone = $("#phone").val();
var subject = $("#subject").val();
var text = $("#text").val();




event.preventDefault();



$.post("contact_form.php",



{

    name: name,
    email: email,
    phone: phone,
    subject: subject,
    text: text,

},



function received(data){

  alert(data);

  return false;


});



});
</script>
</body>
</html>

