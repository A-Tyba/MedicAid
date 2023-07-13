<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="images/aboutus.jpg">
    <title>MedicAid, an online Telemedicine platform for patients and doctors in Bangladesh</title>
    <!--aos css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!--font awesome link-->
    <script src="https://kit.fontawesome.com/27a76d5b14.js" crossorigin="anonymous"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style2.css">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
 

<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars" ></div>

    <a href="index.php" class="logo"><span>MEDIC</span>AID</a>

    <nav class="navbar" data-aos="fade-down">
        
        <a href="index.php">Home</a>
        <a href="about-us.html">About us</a>
        
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </nav>    
    
    <div class="icons" data-aos="fade-left">
        <a href="adminlogin.html"><i class="fas fa-user" id="login-btn"></i></a>
        
        
    </div>

</header>


<!-- header section ends  -->

<!-- home section starts  -->
<!-- -home--->

<section class="home" id="home">
  <div class="facilities" data-aos="fade-up">
    <!-- blog section starts here -->
        <!-- <img src="images/blog1.jpg"  align="left" width="300" height="300"> -->
    <div id="PHOTO" style="float: left;">

        <img id="img" class="d-block mx-auto mb-4 img-fluid" src="images/default_pic.webp" alt="" width="300" height="300">

        <form  id="uploadform" method="POST" enctype="multipart/form-data">

        <label  for="fileToUpload" style="color:black; font-size:15px;">Select image to upload:</label>
        <input type="text" name="email" id="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" hidden>
        <input  type="file" name="fileToUpload" id="fileToUpload" class="btn btn-outline-success" required>
        <br><br><br>
        <button type='submit' id='upload' name='upload' class="btn btn-outline-success">UPLOAD</button><br><hr>
    </div>
    <form action="" method="post">
    <h1>Title: <input id="title"  style="color:black; border-style: inset; border-width: 2px;" type="text" required></h1><br>
    <h2>Subtitle: <input id="subtitle" style="color:black; border-style: inset; border-width: 2px;" type="text" required></h2><br>
    <h3>Date: <input id="date" style="color:black; border-style: inset; border-width: 2px;" type="text" required></h3><br>
    <h3>Name: <input id="name" style="color:black; border-style: inset; border-width: 2px;" type="text" required></h3>
    <br><br><br><br><br><br><br><br><br><br>
    <textarea style="color:black;font-size:25px; border-style: inset; border-width: 2px;" name="text" id="text" cols="75" rows="20">Enter content here...(Please make sure you have uploaded a blog-related picture first!)</textarea>
    <hr><br><button type='submit' id='set' name='set' class="btn btn-outline-primary btn-lg">POST BLOG</button>
    </form>
  </div>
  
  </section>
<!-- about-us section ends -->


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
$(document).ready(function() {



$("#hide").click(function(){$("#contents").hide();});







$("#upload").click(function() {



var email = $("#email").val();



event.preventDefault();



$.ajax({



url: 'blog_picture_setter.php', 



type: 'POST',



data: new FormData($('#uploadform')[0]), // The form with the file inputs.



processData: false,



contentType: false                    // Using FormData, no need to process data.



}).done(function(data){

alert(data);

var filename = $('input[type=file]').val().split('\\').pop();



//   var dir = "uploads/"+email;



$("#img").attr("src","blog/"+email+"/"+filename); // updating profile image on page



// $("#imageBox").html('<img src="' + this.href + '" />');

}).fail(function(){

alert("An error occurred, the file couldn't be sent!");

});

});
     
})

$("#set").click(function() {



var title = $("#title").val();
var subtitle = $("#subtitle").val();
var date = $("#date").val();
var name = $("#name").val();
var text = $("#text").val();




event.preventDefault();



$.post("blog_text_setter.php",



{

    title: title,
    subtitle: subtitle,
    date: date,
    name: name,
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