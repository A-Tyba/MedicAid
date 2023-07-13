<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
// require_once '/path/to/vendor/autoload.php'; 
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client; 
 
$sid    = "ACdd84eaf4feb2e8ce39140555ef74aedc"; 
$token  = "110e2447415f24a0738335d5388ef0bd"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+8801626348497", // to 
                           array(  
                               "messagingServiceSid" => "MG6022fde7da048b7f2ad8aedb9b4d853a",      
                               "body" => "MedicAid VideoCall Link: https://medicaidbd.xyz/video.php" 
                           ) 
                  ); 
 



?>