<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$sid = 'your_account_sid'; // Replace with your Twilio Account SID
$token = 'your_auth_token'; // Replace with your Twilio Auth Token
$twilio = new Client($sid, $token);

$to = $_POST['To'];
$body = $_POST['Body'];

$twilio->messages->create($to, [
    'from' => '+18181234567',
    'body' => $body
]);
?>
