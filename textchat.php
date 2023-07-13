<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = getenv("AC6a7f47a7ab73abc07ace847d68c18880");
$token = getenv("707336578d0b5684154fc1066ca162e9");
$twilio = new Client($sid, $token);

$conversation = $twilio->conversations->v1->conversations
                                          ->create([
                                                       "friendlyName" => "Friendly Conversation"
                                                   ]
                                          );

print($conversation->sid);



?>