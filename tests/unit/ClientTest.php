<?php
namespace SMSLeopard\Tests;

use SMSLeopard\Client;
use \PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
  private $account_id, $account_secret;
  protected function setUp():void
  {
    $this->account_id = getenv('ACCOUNT_ID');
    $this->account_secret = getenv('ACCOUNT_SECRET');
    $this->client = new Client($this->account_id, $this->account_secret);
  }

  public function testSendNormalMessage(){
    $message = 'Test message';
    $sender_id = 'SMS_TEST';
    $recipients = [['number'=> '+254796316496']];
    $this->assertArraySubset(
      ['success' => true],
      $this->client->send($sender_id, $message, $recipients)
    );
  }

  public function testSendCustomizedMessage(){
    $message = 'Hello {name}';
    $sender_id = 'SMS_TEST';
    $recipients = [
      ['number' => '+254718876044', 'message' => 'Hello Brian'],
      ['number' => '+254787050584', 'message' => 'Hello Joan']
    ];
    $this->assertArraySubset(
      ['success' => true],
      $this->client->send($sender_id, $message, $recipients, true)
    );
  }
}
