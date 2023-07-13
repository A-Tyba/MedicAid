<?php

session_start();

if(!isset($_SESSION['email'])){

  header("Location: https://medicaidbd.xyz/login.php");

}


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



        <h2>VideoChat Interface</h2>


        <p class="lead">Chat with your doctor</p><br>



        <hr>



        <p class="lead">VIDEOCALL API</p>

<hr>
<p class="lead">First of all, click the button below to create a meeting</p><br>
<button class="btn btn-primary btn-lg" onclick="createMeeting()">Create Meeting</button>
<br><br>
<label for="copyInput">Meeting Link [OPTIONAL, COPY IF NEEDED]:</label>
<input type="text" id="copyInput">
    <br><br>
<a id="abc" href=""><button class="btn btn-danger btn-lg" id="join">Click This Button To Join Meeting</button></a>
      </div>
      

<script>
  document.getElementById('join').style.visibility = 'hidden';
  // Function to create meeting ID
  function createMeeting() {
        let meetingId =  'xxxxyxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
        console.log("http://"+ window.location.host + "?meetingId="+ meetingId)
        document.getElementById("copyInput").value = "https://"+ window.location.host + "/meeting.php?meetingId="+ meetingId;
        document.getElementById("abc").href="https://"+ window.location.host + "/meeting.php?meetingId="+ meetingId;
        document.getElementById('join').style.visibility = 'visible';
  }
  

  // Function to copy the link
  function copyFunction() {
    /* Get the text field */
    var copyText = document.getElementById("copyInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
  }

//   $(document).ready(function(){
//     $("#join").hide();
//   $("#create").click(function(){
//     function createMeeting() {
//           let meetingId =  'xxxxyxxx'.replace(/[xy]/g, function(c) {
//               var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
//               return v.toString(16);
//           });
//           // document.getElementById("copyInput").value = "https://"+ window.location.host + "/meeting.php?meetingId="+ meetingId;
          
//     }
//     createMeeting();
//     $("a").attr("href", meetingId);
//     $("#join").show();
//   });
// });
</script>








  <footer class="bg-dark text-center text-white fixed-relative">



  <!-- Grid container -->



  <div class="container p-4 pb-0">



    <!-- Section: Social media -->



    <section class="mb-4">



      <!-- Facebook -->



      <a class="btn btn-outline-light btn-floating m-1" href="facebook.com" role="button"



        ><i class="fab fa-facebook-f"></i



      ></a>







      <!-- Twitter -->



      <a class="btn btn-outline-light btn-floating m-1" href="twitter.com" role="button"



        ><i class="fab fa-twitter"></i



      ></a>







      <!-- Google -->



      <a class="btn btn-outline-light btn-floating m-1" href="google.com" role="button"



        ><i class="fab fa-google"></i



      ></a>







      <!-- Instagram -->



      <a class="btn btn-outline-light btn-floating m-1" href="instagram.com" role="button"



        ><i class="fab fa-instagram"></i



      ></a>







      <!-- Linkedin -->



      <a class="btn btn-outline-light btn-floating m-1" href="linkedin.com" role="button"



        ><i class="fab fa-linkedin-in"></i



      ></a>







      <!-- Github -->



      <a class="btn btn-outline-light btn-floating m-1" href="github.com" role="button"



        ><i class="fab fa-github"></i



      ></a>



    </section>



    <!-- Section: Social media -->



  </div>



  <!-- Grid container -->







  <!-- Copyright -->



  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">



    © 2022 Copyright:



    <a class="text-white" href="">Team MedicAid</a>



  </div>



  <!-- Copyright -->



</footer>







</body>























</html>
<!-- SENDING EMAILS -->
<?php
// $join_url="https://medicaidbd.xyz/video.php";
// $email=$_SESSION['patient_email'];
// $to = $email;
// $subject = "MedicAid VideoCall Invitation";
// $otp=random_int(100000, 999999);
// $message = "
// <html>
// <head>
// <title>HTML email</title>
// </head>
// <body>
// <p>This email contains sensitive information! Don't share with anyone!</p>
// <table>
// <tr>
// <th>Your VideoCall Meeting Link is:</th>
// </tr>
// <tr>
// <td><h1><a href=".$join_url.">Click Here to Join Meeting</a></h1></td>
// </tr>
// </table>
// </body>
// </html>
// ";

// // Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// // More headers
// $headers .= 'From: <medicaid@medicaidbd.xyz>' . "\r\n";
// // $headers .= 'Cc: myboss@example.com' . "\r\n";

// mail($to,$subject,$message,$headers);
// // echo $email;
?>
<?php

// $email=$_SESSION['doctor_email'];
// $to = $email;
// $subject = "MedicAid VideoCall Invitation";
// $otp=random_int(100000, 999999);
// $message = "
// <html>
// <head>
// <title>HTML email</title>
// </head>
// <body>
// <p>This email contains sensitive information! Don't share with anyone!</p>
// <table>
// <tr>
// <th>Your VideoCall Meeting Link is:</th>
// </tr>
// <tr>
// <td><h1><a href=".$join_url.">Click Here to Join Meeting</a></h1></td>
// </tr>
// </table>
// </body>
// </html>
// ";

// // Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// // More headers
// $headers .= 'From: <medicaid@medicaidbd.xyz>' . "\r\n";
// // $headers .= 'Cc: myboss@example.com' . "\r\n";

// mail($to,$subject,$message,$headers);
// // echo $email;


?>