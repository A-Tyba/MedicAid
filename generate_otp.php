<?php
session_start();
$email=$_POST['email'];
$phone=$_POST['phone'];
$to = $email;
$subject = "OTP";
$otp=random_int(100000, 999999);
$_SESSION['otp']=$otp;
$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains sensitive information! Don't share with anyone!</p>
<table>
<tr>
<th>Your One-Time-Password (OTP) is:</th>
</tr>
<tr>
<td><h1>$otp</h1></td>
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

//SMS


require __DIR__ . '/vendor/autoload.php';

// // Use the REST API Client to make requests to the Twilio REST API
// use Twilio\Rest\Client;

// // Your Account SID and Auth Token from twilio.com/console
// $sid = 'AC6a7f47a7ab73abc07ace847d68c18880';
// $token = '707336578d0b5684154fc1066ca162e9';
// $client = new Client($sid, $token);


// // Use the client to do fun stuff like send text messages!
// $message = $client->messages->create(
//     // the number you'd like to send the message to
//     $phone,
//     [
//         // A Twilio phone number you purchased at twilio.com/console
//         'from' => '+19282365211',
//         // the body of the text message you'd like to send
//         'body' => 'Dear Medicaid User, your OTP is '.$otp
//     ]
// );


 
// // Update the path below to your autoload.php, 
// // see https://getcomposer.org/doc/01-basic-usage.md 
// require_once '/path/to/vendor/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "ACecb9516d2649a9de9b63db7d5de542a8"; 
$token = '5b798463824340329a2c7f84b7c10626';
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create($phone, // to 
                           array(  
                               "messagingServiceSid" => "MGf3e296f57a8ff189991e9d3cc8507cbd",      
                               "body" => "Dear Medicaid User, your OTP is ".$otp 
                           ) 
                  ); 
 

if($message){echo("OTP generated and sent successfully!");}else{echo "OTP generation failed!";}

?>