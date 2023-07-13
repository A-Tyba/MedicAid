<?php
require __DIR__ . '/vendor/autoload.php';
require 'db_config.php';
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACecb9516d2649a9de9b63db7d5de542a8';
$token = '5b798463824340329a2c7f84b7c10626';
$client = new Client($sid, $token);




if(isset($_POST['patient_phone_number'])&&isset($_POST['text_to_be_sent'])&&isset($_POST['date'])&&isset($_POST['time'])){
    $stmt = $conn->prepare("insert into alarms(patient_phone_number, text_to_be_sent, date, time) values(?, ?, ?, ?)");


    $stmt->bind_param("ssss", $_POST['patient_phone_number'], $_POST['text_to_be_sent'], $_POST['date'], $_POST['time']);


    $execval = $stmt->execute();

    echo "Database entry completed! ";

    $date=$_POST['date'];
    $time=$_POST['time'];
    $text=$_POST['text_to_be_sent'];
    $phone_number=$_POST['patient_phone_number'];

    $d=strtotime($time.$date);
// echo "Alarm is set to be sent to patient at " . date("Y-m-d h:i:sa", $d);

$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
// echo "The date and time right now is ".$dt->format('Y-m-d h:i:sa');

$set_date=date("Y-m-d h:i", $d);
$date_now=$dt->format("Y-m-d h:i");

echo "Alarm set for: ".$set_date." Current time is: ".$date_now;

    
}else{

    $sql2 = "SELECT * FROM alarms";



    $result = $conn->query($sql2);



    if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_assoc()) {

        if($row['patient_phone_number']=="+8801626348497"){

            $date=$row['date'];
            $time=$row['time'];
            $text=$row['text_to_be_sent'];
            $phone_number=$row['patient_phone_number'];

        }

    } 

    }


$d=strtotime($time.$date);
// echo "Alarm is set to be sent to patient at " . date("Y-m-d h:i:sa", $d);

$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
// echo "The date and time right now is ".$dt->format('Y-m-d h:i:sa');

$set_date=date("Y-m-d h:i", $d);
$date_now=$dt->format("Y-m-d h:i");

echo "Alarm set for: ".$set_date." Current time is: ".$date_now;

if($set_date==$date_now){
    echo " Sending MediAlarm!";
    // Use the client to do fun stuff like send text messages!
    // $message = $client->messages->create(
    //     // the number you'd like to send the message to
    //     $phone_number,
    //     [
    //         // A Twilio phone number you purchased at twilio.com/console
    //         'from' => '+15189003896',
    //         // the body of the text message you'd like to send
    //         'body' => $text
    //     ]
    // );

    $message = $twilio->messages 
                  ->create($phone, // to 
                           array(  
                               "messagingServiceSid" => "MGf3e296f57a8ff189991e9d3cc8507cbd",      
                               "body" => $text
                           ) 
                  ); 

}
}




?>