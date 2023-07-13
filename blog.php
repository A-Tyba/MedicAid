



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="images/aboutus.jpg">
    <title>MedicAid, an online Telemedicine platform for patients and doctors in Bangladesh</title>
    
    <link rel="icon" type="image" href="images/favicon.webp">
    <!--aos css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.1/utilities/position/?fbclid=IwAR3ohW5F4o80t57PoFPbjNk98kHGXXkag46Tfhc5YVD4MpEC99tvE5vnDEw">
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
        
        <a href="index.php">Home</a>
        <a href="about-us.php">About us</a>
        
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

<section class="home" id="home">

    <div class="content" data-aos="fade-up">

        <h2 style="color:#098ebb; "> MedicAid Blog</h2>
        <a href="blog_linker.php" style="font-size: large;" class="hero-btn btn-lg">Post a Blog</a>
        
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="images/blog.mp4"></span>
    </div>

    <div class="video-container">
        <video src="images/blog.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- home section ends -->

<!-- about-us section ends -->

<?php include_once 'blog_getter.php'; ?>

<section class="blogs"> 
    
    <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
    <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
    <div class="blogs-container">
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[0]; ?>" class="blogs-thumb" alt="">
                
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[0];?>" style=" text-align: center"; class="card-btn">Read More</a> 
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[0];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[0]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[0]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[1]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[1];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[1];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[1]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[1]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[2]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[2];?>" style=" text-align: center"; class="card-btn">Read More</a> 
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[2];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[2]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[2]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[3]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[3];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[3];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[3]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[3]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[4]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[4];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[4];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[4]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[4]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[5]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[5];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[5];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[5]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[5]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[6]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[6];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[6];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[6]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[6]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[7]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[7];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[7];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[7]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[7]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[8]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[8];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[8];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[8]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[8]; ?></span></a>
            </div>
        </div>
        <div class="blogs-card">
            <div class="blogs-image">
                
                <img src="<?php echo $reversed_blog_picture[9]; ?>" class="blogs-thumb" alt="">
                <a href="blog_view.php?q=<?php echo $reversed_blog_email[9];?>" style=" text-align: center"; class="card-btn">Read More</a>
            </div>
            <div class="blogs-info">
            <a href="blog_view.php?q=<?php echo $reversed_blog_email[9];?>"><h2 class="blogs-brand"><?php echo $reversed_blog_title[9]; ?></h2>
                
                <span class="price"><?php echo $reversed_blog_subtitle[9]; ?></span></a>
            </div>
        </div>
    </div>
</section>




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

<script src="blog.js"></script>

</body>
</html>