<?php
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC2b32d2f8c88485b27fd61cff7507ca47';
$token = 'cd5104b5beb456610e02020fe4689de4';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+917278088825',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+12542371301',
        // the body of the text message you'd like to send
        'body' => "Hey Jenny! Good luck on the exam!"
    )
);