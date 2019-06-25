# Smsl-php-lib

This is the SMS Leopard API client for PHP. Its meant to help simplify intergration on php based applications.

## Getting started

To use the api you need an account with SMSLeopard, its free to make one. Just head over to the [SMSLeopard homepage](https://www.smsleopard.com/).

## API Keys

To generate the api keys, you will need to upgrade to an Enterprise account. This is also a free upgrade, we just need you to send an email request to [info@smsleopard.com](mailto:info@smsleopard.com).

After that, just log in to your dashboard and click the settings link, then the api keys link.

Once at the api keys page, click add new key. Enter the key name and follow the instructions to get and save you api keys.

## Installing

The api client is hosted on packagist. You will need to install composer in your project to install it. Once you have installed composer you can use composer require to download the api client.

```console
composer require smsleopard/smsleopard
```

## Send a message

### Send a normal message

To send a normal message

```php
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
```

### Send a custom message

To send a custom message

```php
$account_id = 'YOUR ACCOUNT ID';
$account_key   = 'YOUR ACCOUNT KEY';
$client      = new Client($account_id, $account_key);

$message = 'Test message {name}';
$sender_id = 'SMS_TEST';
$recipients = [
  ['number'=> '+2547960000001', 'message'=> 'Test message Brian'],
  ['number'=> '+2547960000002', 'message'=> 'Test message Emma']
];

$response   = $client->send($sender_id, $message, $recipients, true);
$res_recipients = $response['recipients'];
$res_status = $response['status'];

print_r($response);
print_r($res_recipients);
print_r($res_status);
```

## Example

After installing the package, you can copy paste this example to a php file to test out your credentials and the api functions.

```php
<?php
require 'vendor/autoload.php';

use SMSLeopard\Client;

$account_id = 'YOUR ACCOUNT ID';
$account_key   = 'YOUR ACCOUNT KEY';
$client      = new Client($account_id, $account_key);

$message = 'Test message';
$sender_id = 'SMS_TEST';
$recipients = [['number'=> '+254796316496']];

$response   = $client->send($sender_id, $message, $recipients);
$res_recipients = $response['recipients'];
$res_status = $response['status'];

print_r($response);
print_r($res_recipients);
print_r($res_status);
```
