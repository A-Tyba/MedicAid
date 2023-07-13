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
<script>alert("Please wait while the videochat window is being loaded...");</script>

<script>

  var script = document.createElement("script");

  script.type = "text/javascript";

  script.addEventListener("load", function (event) {
    const meeting = new VideoSDKMeeting();

    const config = {
      name: "<?php echo $name;?>",
      apiKey: "87d93bcb-6f33-4c4a-bf9a-d1339a8074b7", 
      meetingId: "TELEHEALTH_DEMO", 
      redirectOnLeave: "https://medicaidbd.xyz/search.php",
      micEnabled: true,
      webcamEnabled: true,
      participantCanToggleSelfWebcam: true,
      participantCanToggleSelfMic: true,
      joinScreen: {
        visible: true, // Show the join screen ?
        title: "MedicAid VideoCall Meeting", // Meeting title
        meetingUrl: window.location.href, // Meeting joining url
      },
    };
    
    meeting.init(config);

  });
  script.src = "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.21/rtc-js-prebuilt.js";
  document.getElementsByTagName("head")[0].appendChild(script);

</script>