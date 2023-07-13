<?php
if(isset($_SESSION['admin'])){

    header("Location: https://medicaidbd.xyz/adminpanel.php?q=".$_SESSION['admin']);
  
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedicAid, an online Telemedicine platform for patients and doctors in Bangladesh</title>
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
        <div class="con"></div>
        <form action="search.php" method="GET">
        <div class="search_box">
            <input name="q" id="q" type="search" placeholder="Search..." width="200">
            <span class="fa fa-search"></span>
        </div>
        </form>
        <a href="index.php">Home</a>
        <a href="about-us.php">About us</a>
        
        <a href="#blog">Blog</a>
        <a href="contact.php">Contact</a>
        
    </nav>    
    
    <div class="icons" data-aos="fade-left">
        <a href="adminlogin.html"><i class="fas fa-user" id="login-btn"></i></a>
        
        
    </div>

</header>

<!---Home--->

<section class="home" id="home">

    

    <div class="controls">
        <span class="vid-btn active" data-src="images/vid-1.mp4"></span>
    </div>

    <div class="video-container">
        <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
    </div>

    


    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
                <button type="button" class="bat" onclick="login()">ADMIN LOGIN</button>
                
            </div>

        <form  id="login" class="input-group" method="post" action="admin_log.php">
        <input type="text" class="input-field" id="username" name="username" placeholder="Enter Username" required>
        <input type="password" class="input-field" id="password" name="password" placeholder="Enter Password" required>
        <br>
       
        
        <br>
        <br>
        
        
        
        <button type="submit" class="submit-btn">Log in</button>
        
        
       
        
        
        <center><p style="color: rgb(41, 191, 211); font-size: 17px;"></p>

        </form>

        
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


</body>
</html>