<?php
require 'db_config.php';

$email = $_GET['q'];

$sql = "SELECT * FROM blogs WHERE email=?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$row = $result->fetch_assoc()


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

    <img src="<?php echo $row['picture'] ;?>"  align="left" width="500" height="350">
    <h1><?php echo $row['title']; ?></h1><br>
    <h2><?php echo $row['subtitle']; ?></h2><br>
    <h3>Posted on <?php echo $row['date']; ?></h3>
    <h3>Posted by <?php echo $row['name']; ?></h3>
    <br><br><br><br><br>
    <textarea style="color:black;font-size:20px;" name="" id="" cols="75" rows="20" readonly><?php echo $row['text']; ?></textarea>

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

</body>
</html>