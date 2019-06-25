# Client Examples

## Getting started

After getting to the examples folder. First install dependencies using,

```console
composer install
```

## Send normal message

Normal messages are used when you want to send the same exact message to a number of recipients.

### Normal message example

```php
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
  ['number'=> '+2547960000002'],
];

$response   = $client->send($sender_id, $message, $recipients);
$res_recipients = $response['recipients'];
$res_status = $response['status'];

print_r($response);
print_r($res_recipients);
print_r($res_status);
```

To test on terminal or any other command line interface with php installed. Replace the api credentials and sender id with your api credentials and sender id. Then run.

```console
php NormalMessage.php
```

## Send custom message

Custom messages are used when you want to keep the content of the message but customize certain variables differently depending on the recipient.

With the api we assume that you can generate these customized messages so each recipient should be sent their customized message. The message in this case should be the original message with the variables place in curly braces.

### Custom message example

```php
<?php

require 'vendor/autoload.php';

use SMSLeopard\Client;

$account_id = 'YOUR ACCOUNT ID';
$account_key   = 'YOUR ACCOUNT KEY';
$client      = new Client($account_id, $account_key);

$message = 'Test message {name}';
$sender_id = 'YOUR SENDER ID';
$recipients = [
  ['number'=> '+2547960000001', 'message'=> 'Test message Brian'],
  ['number'=> '+2547960000002', 'message'=> 'Test message Emma'],
];

$response   = $client->send($sender_id, $message, $recipients, true);
$res_recipients = $response['recipients'];
$res_status = $response['status'];

print_r($response);
print_r($res_recipients);
print_r($res_status);
```

To test on terminal or any other command line interface with php installed. Replace the api credentials and sender id with your api credentials and sender id. Then run.

```console
php CustomMessage.php
```
