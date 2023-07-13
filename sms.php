<?php
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC6a7f47a7ab73abc07ace847d68c18880';
$token = '707336578d0b5684154fc1066ca162e9';
$client = new Client($sid, $token);


// Use the client to do fun stuff like send text messages!
$message = $client->messages->create(
    // the number you'd like to send the message to
    '+8801626348497',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+18158933977',
        // the body of the text message you'd like to send
        'body' => 'Hey Ahnaf! Good luck on the bar exam!'
    ]
);


if($message){
    echo "Working...";
}
else{
    echo "Something went wrong...";
}

?>