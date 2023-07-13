<?php
require 'admin_secure.php';
require 'db_config.php';
$permission_mode=$_GET['q'];
$no_of_hits=0;
$no_of_users=0;

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
            // echo $row['email']." ".$row['pass'];
            $no_of_users++;
            }
          }
 
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
    <link rel="stylesheet" href="admin_style.css">
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    

</head>
<body>
 

<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars" ></div>

    <a href="index.php" class="logo"><span>MEDIC</span>AID</a>

    <nav class="navbar" data-aos="fade-down">
        <!-- <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=medicaid" <?php if($permission_mode!="superadmin"){echo "hidden";}  ?>>ADD REMOVE UPDATE</a> -->
        <a href="admin_logout.php" >LOGOUT</a>
    </nav>    
    
    <div class="icons" data-aos="fade-left">
        <a href="adminlogin.html"><i class="fas fa-user" id="login-btn"></i></a>
        
        
    </div>

</header>
<!-- header section ends  -->

<!-- LOGIN  -->




<!-- home section starts  -->

<section class="home" id="home">
<div class="content" data-aos="fade-up">
    &nbsp;&nbsp;
    <h5 ><a href="testing_center.php?q=<?php echo $permission_mode; ?>" style="color: white; text-decoration: none; width: 100px;">--TESTING CENTERS--</a></h5>
    &nbsp;&nbsp;
</div>

<div class="content" data-aos="fade-up">
    &nbsp;&nbsp;
    <h5 ><a href="blockchain_integrity_checker.php?q=<?php echo $permission_mode; ?>" style="color: white; text-decoration: none; width: 100px;">--CHECK BLOCKCHAIN INTEGRITY--</a></h5>
    &nbsp;&nbsp;
</div>

<div class="content" data-aos="fade-up">
    &nbsp;&nbsp;
    <h5 ><a href="https://medicaidbd.xyz/ecommerce/admin_area/login.php?q=<?php echo $permission_mode; ?>" style="color: white; text-decoration: none; width: 100px;">-- E-COMMERCE --</a></h5>
    &nbsp;&nbsp;
</div>

<div class="content" data-aos="fade-up">
    &nbsp;&nbsp;
    <h5 ><a href="view_queries.php?q=<?php echo $permission_mode; ?>" style="color: white; text-decoration: none; width: 100px;">--VIEW QUERIES--</a></h5>
    &nbsp;&nbsp;
</div>


    <div class="content" data-aos="fade-up">
    &nbsp;&nbsp;
    <h5 ><a href="authorize.php?q=<?php echo $permission_mode; ?>" style="color: white; text-decoration: none; width: 100px;">--APPROVAL REQUESTS--</a></h5>
    &nbsp;&nbsp;
</div>
<br><br><br><br>
    <div class="content" data-aos="fade-up" <?php if($permission_mode!="superadmin"){echo "hidden";}  ?>>
        <h5 ><a href="subadmins.php" style="color: white; text-decoration: none;">--EDIT SUBADMINS--</a></h5>  
    </div>

   
    <div class="controls">
        <span class="vid-btn active" data-src="images/vid-1.mp4"></span>
    </div>

    <div class="video-container">
        <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
    </div>
</section>

<!-- home section ends -->





<!-- footer section  -->

<section class="footer">
    <h4 style="color:antiquewhite">Follow Us</h4>
    

    <div class="icons">
        <a href="https://www.instagram.com/amatullah__tyba/" target="_blank">
            <i class="fa fa-instagram fa-2xl"></i>
        </a>
        <a href="https://www.facebook.com/isaidaaaiman" target="_blank">
            <i class="fa fa-facebook fa-2xl"></i>
        </a>
        <a href="https://www.youtube.com/channel/UCyx88dh-P7hgFraOsNfZohA" target="_blank">
            <i class="fa fa-youtube fa-2xl"></i>
        </a>
        <a href="https://www.linkedin.com/in/amatullah-tyba/" target="_blank">
            <i class="fa fa-linkedin fa-2xl"></i>
        </a>
        <a href="https://twitter.com/tyba08" target="_blank">
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