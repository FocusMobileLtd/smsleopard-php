<?php

namespace SMSLeopard;

use GuzzleHttp\Client AS fetch;

class Client
{
  function __construct($account_id, $account_secret)
  {
    $this->api = 'https://api.smsleopard.com/v1/sms/send';
    $this->auth = base64_encode($account_id.':'.$account_secret);
  }

  private function doSend($data)
  {
    $client = new fetch();
    $res = $client->post($this->api,$data);
    return json_decode($res->getBody(), true);
  }

  private function getData($payload)
  {
    return array(
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic '.$this->auth
      ],
      'json' => $payload
    );
  }

  public function send($sender_id, $message, $recipients, $send_multi = false, $status_url = '', $status_secret='')
  {
    $payload = array(
      'source' => $sender_id,
      'message' => $message,
      'multi' => $send_multi,
      'destination' => $recipients,
      'status_url' => $status_url,
      'status_secret' => $status_secret
    );

    $data = $this->getData($payload);
    return $this->doSend($data);
  }
}
