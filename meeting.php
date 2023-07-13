<?php
session_start();
require 'db_config.php';

$email=$_SESSION['email'];

$sql = "SELECT * FROM profiles";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row

  while($row = $result->fetch_assoc()) {

    if($row['email']==$email){

        $name=$row['full_name'];

    }

  }
 
}

?>
<script>alert("Please wait while the videocall interface loads...");</script>
<script>
  var script = document.createElement("script");
  script.type = "text/javascript";

  script.addEventListener("load", function (event) {

    //Get URL query parameters
    const url = new URLSearchParams(window.location.search);

    const config = {
      name: "<?php echo $name; ?>",
      meetingId: url.get("meetingId"), // Get meeting id from params.
      apiKey: "87d93bcb-6f33-4c4a-bf9a-d1339a8074b7",

      containerId: null,

      micEnabled: true,
      webcamEnabled: true,
      participantCanToggleSelfWebcam: true,
      participantCanToggleSelfMic: true,

      chatEnabled: true,
      screenShareEnabled: true,
      participantCanLeave: true,
      redirectOnLeave: "https://www.medicaidbd.xyz/search.php",
      

      /*

     Other Feature Properties
      
      */
    };

    const meeting = new VideoSDKMeeting();
    meeting.init(config);
  });

  script.src =
    "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.23/rtc-js-prebuilt.js";
  document.getElementsByTagName("head")[0].appendChild(script);
</script>

<!-- SENDING EMAILS -->
<?php
$join_url="https://medicaidbd.xyz/meeting.php?meetingId=".$_GET['meetingId'];
$email="ahnaf.abid22@gmail.com";
// $email=$_SESSION['patient_email'];
$to = $email;
$subject = "MedicAid VideoCall Invitation";
$otp=random_int(100000, 999999);
$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains sensitive information! Don't share with anyone!</p>
<table>
<tr>
<th>Your VideoCall Meeting Link is:</th>
</tr>
<tr>
<td><h1><a href=".$join_url.">Click Here to Join Meeting</a></h1></td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <medicaid@medicaidbd.xyz>' . "\r\n";
// $headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
// echo $email;

$email="ahf.abid22@gmail.com";
// $email=$_SESSION['doctor_email'];
$to = $email;
$subject = "MedicAid VideoCall Invitation";
$otp=random_int(100000, 999999);
$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains sensitive information! Don't share with anyone!</p>
<table>
<tr>
<th>Your VideoCall Meeting Link is:</th>
</tr>
<tr>
<td><h1><a href=".$join_url.">Click Here to Join Meeting</a></h1></td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <medicaid@medicaidbd.xyz>' . "\r\n";
// $headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
// echo $email;


?>



