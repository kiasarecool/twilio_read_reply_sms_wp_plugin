<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$sid = 'your_account_sid'; // Replace with your Twilio Account SID
$token = 'your_auth_token'; // Replace with your Twilio Auth Token
$twilio = new Client($sid, $token);

$to = '+18181234567'; // Replace with your actual cell phone number
$from = $_POST['From'];
$body = $_POST['Body'];

$twilio->messages->create($to, [
    'from' => '+18162590252',
    'body' => "From: $from\nMessage: $body"
]);
?>
