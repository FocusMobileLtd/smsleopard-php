<?php

require 'vendor/autoload.php';

use SMSLeopard\Client;

$account_id = 'YOUR ACCOUNT ID';
$account_key   = 'YOUR ACCOUNT KEY';
$client      = new Client($account_id, $account_key);

$message = 'Test message';
$sender_id = 'SMS_TEST';
$recipients = [
  ['number'=> '+2547960000001'],
  ['number'=> '+2547960000002']
];

$response   = $client->send($sender_id, $message, $recipients);
$res_recipients = $response['recipients'];
$res_status = $response['status'];

print_r($response);
print_r($res_recipients);
print_r($res_status);
