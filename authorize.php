<?php
require 'admin_secure.php';
require 'db_config.php';

$permission_mode=$_GET['q'];
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}
else{
    $sql2 = "SELECT * FROM admin_privileges";
    $result2 = mysqli_query($conn, $sql2);
     // output data of each row
    $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    foreach ($rows2 as $row2){
        if($row2['admin_type']==$permission_mode&&$row2['authorized']=="NO"){
            echo '<meta http-equiv="refresh" content="0;url=https://medicaidbd.xyz/adminpanel.php?q='.$permission_mode.'">';
        }
    }
    

    $sql = "SELECT * FROM profiles";
    $result = mysqli_query($conn, $sql);
     // output data of each row
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

       

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
        <a href="adminpanel.php?q=<?php echo $_GET['q']; ?>" >ADMIN PANEL</a>
    </nav>    

    <nav class="navbar" data-aos="fade-down">
        <a href="admin_logout.php" >LOGOUT</a>
    </nav>    
    
    <div class="icons" data-aos="fade-left">
        <a href="adminlogin.html"><i class="fas fa-user" id="login-btn"></i></a>
        
        
    </div>

</header>
<!-- header section ends  -->

<!-- LOGIN  -->




<!-- home section starts  -->
<br><br><br>
<section class="home" id="home">


<br><br><br>
    <div class="content" data-aos="fade-up">
        <h5 ><a href="" style="color: white; text-decoration: none;">APPROVAL REQUESTS</a></h5>
        <div id="req">
        <br>
        <?php 
        $i=0;
        foreach ($rows as $row) {
            # code...
            if($row["designation"]=="DOCTOR" && isset($row['authorized'])){
         echo '
         &nbsp;&nbsp;
        <p style="color: white; background-color:black;">Name: '.$row["full_name"].'</p>
        <p style="color: white; background-color:black;">Tel: '.$row["phone_number"].'</p>
        <p style="color: white; background-color:black;">BMDC: '.$row["BMDC_number"].'</p>
        <br>
        <br>
        <form action="" method="POST">
            <input id="email" type="text" value="'.$row["email"].'" hidden>
            <button type="button" class="btn btn-primary"  id="APPROVE_0">APPROVE</button><button type="button" class="btn btn-danger"  id="DENY_0">DENY</button>
        </form>
        
                ';
            if($i==0){
                break;
            }
            $i++;
            }

            }
            ?>
        </div>
<div id="refresh"><a href="javascript:location.reload(true)"><button type="button" class="btn btn-info btn-lg">NEXT REQUEST</button></a></div>
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

<script>
$("#refresh").hide();
$("#APPROVE_0").click(function() {
var email = $("#email").val();
event.preventDefault();
$.post("doctor_approve.php",

{
    email: email,
},
function received(data){
  alert(data);
  $("#req").hide();
  $("#refresh").show();
  return false;
});
});

$("#DENY_0").click(function() {
var email = $("#email").val();
event.preventDefault();
$.post("doctor_deny.php",

{
    email: email,
},
function received(data){
  alert(data);
  $("#req").hide();
  $("#refresh").show();
  return false;
});



});

$("#APPROVE_1").click(function() {
var email1 = $("#email").val();
event.preventDefault();
$.post("doctor_approve.php",

{
    email: email1,
},
function received(data){
  alert(data);
  return false;
});
});

$("#DENY_1").click(function() {
var email1 = $("#email").val();
event.preventDefault();
$.post("doctor_deny.php",

{
    email: email1,
},
function received(data){
  alert(data);
  return false;
});



});

$("#APPROVE_2").click(function() {
var email2 = $("#email").val();
event.preventDefault();
$.post("doctor_approve.php",

{
    email: email2,
},
function received(data){
  alert(data);
  return false;
});
});

$("#DENY_2").click(function() {
var email2 = $("#email").val();
event.preventDefault();
$.post("doctor_deny.php",

{
    email: email2,
},
function received(data){
  alert(data);
  return false;
});



});

$("#APPROVE_3").click(function() {
var email3 = $("#email").val();
event.preventDefault();
$.post("doctor_approve.php",

{
    email: email3,
},
function received(data){
  alert(data);
  return false;
});
});

$("#DENY_3").click(function() {
var email3 = $("#email").val();
event.preventDefault();
$.post("doctor_deny.php",

{
    email: email3,
},
function received(data){
  alert(data);
  return false;
});



});

$("#APPROVE_4").click(function() {
var email4 = $("#email").val();
event.preventDefault();
$.post("doctor_approve.php",

{
    email: email4,
},
function received(data){
  alert(data);
  return false;
});
});

$("#DENY_4").click(function() {
var email4 = $("#email").val();
event.preventDefault();
$.post("doctor_deny.php",

{
    email: email4,
},
function received(data){
  alert(data);
  return false;
});



});

</script>


</body>
</html>