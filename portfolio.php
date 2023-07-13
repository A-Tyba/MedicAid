<?php 



session_start();



if(!isset($_SESSION['email'])){

  header("Location: https://medicaidbd.xyz/login.php");

}





$port_email=$_GET["q"];



$pic=[];



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



if(isset($_SESSION['email'])){



  $conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');



if($conn->connect_error){



  echo "$conn->connect_error";



  die("Connection Failed : ". $conn->connect_error);



}



else{



  $sql = "SELECT * FROM listings";



  $result = $conn->query($sql);



  if ($result->num_rows > 0) {



    // output data of each row



    while($row = $result->fetch_assoc()) {



      if($row['email']==$port_email){



          array_push($pic,$row['pic']);



          $category=$row['category'];



          $location=$row['symptoms'];



          $doctor_name=$row['name'];



          $port_pic=$row['profile_pic'];





      }



    } 



}
$accreditations="[PLACEHOLDER]";
$sql2 = "SELECT * FROM profiles";



  $result = $conn->query($sql2);



  if ($result->num_rows > 0) {



    // output data of each row



    while($row = $result->fetch_assoc()) {



      if($row['email']==$port_email){

        $phone_number=$row['phone_number'];

        $BMDC_number=$row['BMDC_number'];

        $accreditations=$row['accreditations'];

      }

      if($row['email']==$_SESSION['email']){

        $patient_name=$row['full_name'];

    }



    } 

}

$sql3 = "SELECT * FROM payment";



  $result = $conn->query($sql3);



  if ($result->num_rows > 0) {



    // output data of each row



    while($row = $result->fetch_assoc()) {
      if(isset($row['status'])){
        if($_SESSION['email']==$row['patient'] && $port_email==$row['doctor']){
          $status=$row['status'];
          $doctor=$row['doctor'];
        }
      }
    

          


      


    } 

}


$sql4 = "SELECT * FROM reg";



  $result = $conn->query($sql4);



  if ($result->num_rows > 0) {



    // output data of each row



    while($row = $result->fetch_assoc()) {

      if($row['email']==$port_email){
        $status1=$row['status'];  
      }
      if($row['email']==$_SESSION['email']){
        $designation=$row['designation'];
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



    <meta name="description" content="MedicAid : A website for finding and hiring photographers for your events such as birthdays, weddings and programmes.">



    <title>MedicAid</title>



    <link rel="icon" type="image" href="images/favicon.webp">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>



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



    <a href="search.php" class="nav-link">Search</a>



    </li>  



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



      <a href="listing_creator.php" class="nav-link" <?php if(isset($_SESSION['email'])){echo "";}else{echo "hidden";} ?>>Create listing</a>



    </li>

    


    <li class="nav-item">



      <a href="patient_prescription.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "hidden";}else{echo "";} ?>>Upload Prescription</a>



    </li>

      <li class="nav-item">



      <a href="view_hired_doctors.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "hidden";}else{echo "";} ?>>View Hired Doctors</a>



    </li>




  </ul>



  <ul class="navbar-nav">

          <li class="nav-item">



      <a href="view_patients.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "";}else{echo "hidden";} ?>>View Patients</a>



    </li>

    <li class="nav-item">



      <a href="doctor_prescription.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "";}else{echo "hidden";} ?>>Prescribe</a>



    </li>



  <li class="nav-item">



      <a href="profile_creator.php" class="nav-link">  <?php if(isset($_SESSION['email'])&&isset($_COOKIE[$ses_id])){echo $_COOKIE[$ses_id];}else{echo "";}  ?></a>



    </li>       



    <li class="nav-item">



    <a href="<?php if(isset($_SESSION['email'])){echo "profile_creator.php";}else{echo "login.php";} ?>" class="navbar-brand"><img class="img-fluid img-thumbnail" src="<?php if(isset($_SESSION['email'])&&isset($profile_pic)){echo $profile_pic;}else{echo "images/default_pic.webp";} ?>" alt="profile pic" width="130px" height="92px"></a>



    </li>



    <li class="nav-item">



      <a href="destroy_session.php" class="nav-link">Logout</a>



    </li>



  </ul>



</div>



</nav>



  <div class="b-example-divider"></div>







<div class="container px-4 py-5" id="custom-cards">



<h2 class="pb-2 border-bottom">Welcome to <?php echo $doctor_name."'s"." profile!"; ?></h2>
<i class="fa-solid fa-circle" style="<?php if($status1=="ACTIVE"){echo "color:#32CD32;";}else{ echo "";} ?>"><?php if($status1=="ACTIVE"){echo "Active Now";}else{ echo "Inactive";} ?></i>
<img id="img" class="d-block mx-auto mb-4 img-fluid" src="<?php echo $port_pic ?>" alt="" width="250" height="270">



    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">







    </div>











</div>



</div>



</div>



<div class="b-example-divider"></div>







<div class="container px-4 py-5" id="custom-cards">



<h2 class="pb-2 border-bottom">Accreditations</h2>



    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">



      <?php echo '<h3 class="pb-2 text-primary">'.nl2br($accreditations).'</h3>' ?>



    </div>











</div>



</div>



</div>







  <div class="b-example-divider"></div>







    <div class="container px-4 py-5" id="custom-cards">



    <h2 class="pb-2 border-bottom">Category</h2>



        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">



          <?php echo '<h3 class="pb-2 text-primary">'.$category.'</h3>' ?>



        </div>











    </div>



  </div>



</div>







<div class="b-example-divider"></div>







<div class="container px-4 py-5" id="custom-cards">



<h2 class="pb-2 border-bottom">Usually treats</h2>



    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">



      <?php echo '<h3 class="pb-2 text-success">'.nl2br($location).'<br>'.'</h3>' ?>
      



    </div>




</div>



</div>



</div>







<div class="b-example-divider"></div>







<div class="container px-4 py-5" id="custom-cards">



<h2 class="pb-2 border-bottom">Contact</h2>



    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">



      <?php echo '<h3 class="pb-2 text-info"> Email: <br> '.$port_email.'<br><br><br>'.'Phone number: '.$phone_number.'</h3>' ?>



    </div>
</div>

    <div class="container px-4 py-5" id="custom-cards">



<h2 class="pb-2 border-bottom">BMDC Number</h2>



    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">



      <?php echo '<h3 class="pb-2 text-danger">'.$BMDC_number.'</h3>' ?>



    </div>



<div class="d-flex justify-content-center">
    
<form id="setform0" method="POST">

<hr>

  <p class="lead">Click the button below</p>

  <!-- PATIENT -->
  <input type="text" id="email0" name="email0" value="<?php echo $_SESSION['email'];?>" hidden>
  <!-- DOCTOR -->
  <input type="text" id="email1" name="email1" value="<?php echo $port_email;?>" hidden> 
  <!-- STATUS -->
  <input type="text" id="status" name="status" value="<?php echo $status;?>" hidden> 

  <div class="d-flex justify-content-center"><button  type='submit' id='set0' name='set0' class="btn btn-outline-success btn-lg" <?php if(isset($status) && $status=="HIRED" && $port_email==$doctor || $designation=="DOCTOR"){echo 'hidden';} ?> >HIRE</button></div>
  <br>
  <form action="" method="POST">
  <input type="text" id="email0" name="email0" value="<?php echo $_SESSION['email'];?>" hidden>
  <input type="text" id="email1" name="email1" value="<?php echo $port_email;?>" hidden>
  <input type="text" id="doctor_name" name="doctor_name" value="<?php echo $doctor_name;?>" hidden>
  <input type="text" id="patient_name" name="patient_name" value="<?php echo $patient_name;?>" hidden>

  <!-- TEXT BUTTON  -->
  <div class="d-flex justify-content-center"><button  type='submit' id='set2' name='set2' class="btn btn-outline-warning btn-lg" <?php if(!(isset($status) && $status=="HIRED" && $port_email==$doctor || $designation=="DOCTOR")){echo 'hidden';} ?>>TEXT CHAT</button></div>
  <br>
  <!-- TEXT BUTTON  -->
  <div class="d-flex justify-content-center"><button  type='submit' id='set3' name='set3' class="btn btn-outline-danger btn-lg" <?php if(!(isset($status) && $status=="HIRED" && $port_email==$doctor || $designation=="DOCTOR")){echo 'hidden';} ?>>VIDEO CHAT</button></div>
  </form>
  
</form>

</div>
</div>
</div>
</div>

<script>




//JQuery starts here, loads a php script to upload file



$(document).ready(function() {

  // var status = $("#status").val();

  // alert(status);
  
  $("#set0").click(function() {

    event.preventDefault();

    var email0 = $("#email0").val();
    var email1 = $("#email1").val();
    var doctor_name = $("#doctor_name").val();
    var patient_name = $("#patient_name").val();


    $.post("pay_intermediate.php",



    {



    email0: email0,
    email1: email1,
    doctor_name: doctor_name,
    patient_name: patient_name,



    },



    function received(data){



    alert(data);

    if(data=="Please wait, you are now being redirected to our payment gateway"){window.location.href = "sslcommerz.php?q=500";}


    return false;



    });



    });

  // TEXTCHAT AJAX

  $("#set2").click(function() {

    event.preventDefault();

    var email0 = $("#email0").val();
    var email1 = $("#email1").val();
    var doctor_name = $("#doctor_name").val();
    var patient_name = $("#patient_name").val();


    $.post("session_log.php",



    {



    email0: email0,
    email1: email1,
    doctor_name: doctor_name,
    patient_name: patient_name



    },



    function received(data){



    alert(data);

    if(data=="Textchat session now initiating... please wait for being redirected"){window.location.href = "textchat_linker.php";}


    return false;



    });



    });


  //VIDEOCHAT AJAX

  $("#set3").click(function() {

    event.preventDefault();

    var email0 = $("#email0").val();
    var email1 = $("#email1").val();


    $.post("session_log2.php",



    {



    email0: email0,
    email1: email1,



    },



    function received(data){



    alert(data);

    if(data=="Videochat session now initiating... please wait for being redirected"){window.location.href = "videochat.php";}


    return false;



    });



    });



});




</script>




















  <div class="b-example-divider"></div>


  <div class="fixed-bottom"></div>
  <footer class="bg-dark text-center text-white" style="

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