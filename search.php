<?php 

session_start(); 
require 'is_doctor.php';

if(!isset($_SESSION['email'])){

  header("Location: https://medicaidbd.xyz/login.php");

}



if(isset($_SESSION['email'])){



    $email=$_SESSION['email'];



    $ses_id=md5($_SESSION['email']);



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


$sql2 = "SELECT * FROM reg";



$result = $conn->query($sql2);



if ($result->num_rows > 0) {



  // output data of each row



  while($row = $result->fetch_assoc()) {




    if($row['email']==$_SESSION['email']){



        $designation=$row['designation'];



    }


  } 


}



}



}



$email=$_SESSION['email'];



$conn = new mysqli('103.125.253.9','medicaid_medicaid','Roblox123456','medicaid_medicaid');



if($conn->connect_error){



    echo "$conn->connect_error";



    die("Connection Failed : ". $conn->connect_error);



}



else{






        }










?>







<!DOCTYPE html>



<html lang="en">



<head>
  <style>
    #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}
  </style>



    <meta charset="UTF-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <meta name="description" content="MedicAid : A website for finding and hiring doctors for your needs.">



    <title>MedicAid</title>



    <link rel="icon" type="image" href="images/favicon.webp">



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous" defer></script>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>







    <style>



.box1 {

    display: block;

    padding: 10px;

    margin-bottom: 100px; /* SIMPLY SET THIS PROPERTY AS MUCH AS YOU WANT. This changes the space below box1 */

    text-align: justify;

}



      .bd-placeholder-img {



        font-size: 1.125rem;



        text-anchor: middle;



        -webkit-user-select: none;



        -moz-user-select: none;



        user-select: none;



      }







      @media (min-width: 768px) {



        .bd-placeholder-img-lg {



          font-size: 3.5rem;



        }



      }



    </style>



</head>



<body>
<video autoplay muted loop id="myVideo">
  <source src="images/search_bg.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>


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



        <li class="nav-item">



          <a href="listing_creator.php" class="nav-link" <?php if(isset($_SESSION['email'])){echo "";}else{echo "hidden";} ?>>Create listing</a>



        </li>

        


        <li class="nav-item">



          <a href="<?php if($designation=="DOCTOR"){echo "portfolio.php?q=$email";}else{echo "patient_profile.php";} ?>" class="nav-link"   >Profile</a>

          

        </li>

        <li class="nav-item">



        <a href="medialarm_setter.php?q=<?php echo $_SESSION['email']; ?>" class="nav-link" <?php if($designation=="DOCTOR"){echo "hidden";}else{echo "";} ?>>Set Medi-Alarm</a>



        </li>

        <li class="nav-item">



          <a href="view_hired_doctors.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "hidden";}else{echo "";} ?>>View Hired Doctors</a>



        </li>

        <li class="nav-item">



        <a href="view_testing_centers.php" class="nav-link" <?php if($designation=="DOCTOR"){echo "hidden";}else{echo "";} ?>>View Testing Centers</a>



        </li>


        <li class="nav-item">



          <a href="<?php if(is_doc()=="YES"){echo 'textchat_linker2.php';}else{echo 'textchat_linker.php';} ?>" class="nav-link" >Text Chat</a>



        </li>




      </ul>



      <ul class="navbar-nav">

        <li class="nav-item">



        <a href="ecommerce_linker.php" style="border-style: solid; margin-right: 40px;margin-top: 30px;" class="nav-link">Buy Medical Products</a>



        </li>

        <li class="nav-item">



          <a href="view_patients.php" style="margin-right: 40px;margin-top: 30px;" class="nav-link" <?php if($designation=="DOCTOR"){echo "";}else{echo "hidden";} ?>>View Patients</a>



        </li>

        <li class="nav-item">



          <a href="doctor_prescription.php" style="margin-right: 40px;margin-top: 30px;" class="nav-link" <?php if($designation=="DOCTOR"){echo "";}else{echo "hidden";} ?>>Prescribe</a>



        </li>
   



        <li class="nav-item">



        <a href="<?php if(isset($_SESSION['email'])){echo "profile_creator.php";}else{echo "login.php";} ?>" class="navbar-brand"><img class="img-fluid img-thumbnail" src="<?php if(isset($_SESSION['email'])&&isset($profile_pic)){echo $profile_pic;}else{echo "images/default_pic.webp";} ?>" alt="profile pic" width="130px" height="92px"></a>



        </li>



        <li class="nav-item">



          <a href="destroy_session.php" style="margin-right: 40px;margin-top: 30px;" class="nav-link">Logout</a>



        </li>



      </ul>



    </div>



  </nav>



  <!-- Navbar ends here -->



  







  <div class="container py-4" >



    <header class="pb-3 mb-4 border-bottom">



      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">

        <span class="fs-4">Search your symptoms or by doctor's specialty </span>

      </a>



    </header>







    <div class="p-5 mb-4 rounded-3 text-white bg-dark">
      <div class="container-fluid py-5">



        <p class="col-md-8 fs-4">Use our awesome search engine</p>

        <h1 class="display-4 text-white" style="position:relative;">Search by symptoms or by doctor's specialty</h1>
        <br><br><br>

        <div class="input-group rounded">
         
  <input oninput="showResult(this.value)" type="text" id="livesearch" class="form-control rounded" <?php if (isset($_GET['q'])) {echo 'value="'.$_GET['q'].'"';}else{echo 'placeholder="Search by symptoms or category..."';} ?>  aria-label="Search" aria-describedby="search-addon"  />



</div>



      </div>



    </div>











    <div class="album py-5 bg-light">



    <div class="container">



      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



        <div id="obj">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted"></small>



              </div>



            </div>



          </div>



          </a>



        </div>


      </div>
        



      



        <div id="obj2">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted"></small>



              </div>



            </div>



          </div>



          </a>



        </div>



        



        </div>



        <div id="obj3">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted"></small>



              </div>



            </div>



          </div>



          </a>



        </div>



      </div>

      

      


    </div>
  </div>

<!-- SECOND ROW OF RESULTS STARTS HERE -->

  <div class="album py-5 bg-light">



    <div class="container">



      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



        <div id="obj4">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted"></small>



              </div>



            </div>



          </div>



          </a>



        </div>


      </div>
        



      



        <div id="obj5">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted"></small>



              </div>



            </div>



          </div>



          </a>



        </div>



        



        </div>



        <div id="obj6">



          <a id="port" href="">



          <div id="column" class="col">



          <div id="card" class="card shadow-sm">



            <img id="thumb" src="images/default_pic.webp" class="bd-placeholder-img card-img-top img-fluid" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>



            <div id="card" class="card-body">



              <p class="card-text">Name</p>



              <div class="d-flex justify-content-between align-items-center">



                <div class="btn-group">



                  <button id="cat" class="btn btn-sm btn-outline-primary" disabled>Category</button>



                </div>



                <small class="text-muted"></small>



              </div>



            </div>



          </div>



          </a>



        </div>



      </div>

      <!-- SECOND ROW OF RESULTS STARTS HERE -->

      


    </div>
  </div>





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




<script>



$(document).ready(function(){



  $("#obj").hide();

  $("#obj2").hide();

  $("#obj3").hide();

  $("#obj4").hide();

  $("#obj5").hide();

  $("#obj6").hide();



});











function showResult(str) {
  


  if (str.length==0) {



    $("#obj").hide();

    $("#obj2").hide();

    $("#obj3").hide();

    $("#obj4").hide();

    $("#obj5").hide();

    $("#obj6").hide();




    return;



  }



  var xmlhttp=new XMLHttpRequest();



  xmlhttp.open("GET","livesearch.php?q="+str,true);



  xmlhttp.send();



  xmlhttp.onreadystatechange=function() {



    if (this.readyState==4 && this.status==200) {



      const Obj = JSON.parse(this.responseText);



      $("#obj").show();
      


      $("#obj2").show();



      $("#obj3").show();


      $("#obj4").show();
      


      $("#obj5").show();



      $("#obj6").show();

      // HIDE IRRELEVANT RESULTS
      if(Obj.email[0]==undefined){$("#obj").hide();}
      if(Obj.email[1]==undefined){$("#obj2").hide();}
      if(Obj.email[2]==undefined){$("#obj3").hide();}
      if(Obj.email[3]==undefined){$("#obj4").hide();}
      if(Obj.email[4]==undefined){$("#obj5").hide();}
      if(Obj.email[5]==undefined){$("#obj6").hide();}




      $("#obj p").text(Obj.name[0]);



      $("#obj #cat").text(Obj.category[0]);



      $("#obj #thumb").attr("src", Obj.profile_pic[0]);



      $("#obj #port").attr("href", "portfolio.php?q="+Obj.email[0]);



      $("#obj2 p").text(Obj.name[1]);



      $("#obj2 #cat").text(Obj.category[1]);



      $("#obj2 #thumb").attr("src", Obj.profile_pic[1]);



      $("#obj2 #port").attr("href", "portfolio.php?q="+Obj.email[1]);



      $("#obj3 p").text(Obj.name[2]);



      $("#obj3 #cat").text(Obj.category[2]);



      $("#obj3 #thumb").attr("src", Obj.profile_pic[2]);



      $("#obj3 #port").attr("href", "portfolio.php?q="+Obj.email[2]);



      $("#obj4 p").text(Obj.name[3]);



      $("#obj4 #cat").text(Obj.category[3]);



      $("#obj4 #thumb").attr("src", Obj.profile_pic[3]);



      $("#obj4 #port").attr("href", "portfolio.php?q="+Obj.email[3]);



      $("#obj5 p").text(Obj.name[4]);



      $("#obj5 #cat").text(Obj.category[4]);



      $("#obj5 #thumb").attr("src", Obj.profile_pic[4]);



      $("#obj5 #port").attr("href", "portfolio.php?q="+Obj.email[4]);



      $("#obj6 p").text(Obj.name[5]);



      $("#obj6 #cat").text(Obj.category[5]);



      $("#obj6 #thumb").attr("src", Obj.profile_pic[5]);



      $("#obj6 #port").attr("href", "portfolio.php?q="+Obj.email[5]);










    }



}



}



</script>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer />



</body>



</html>