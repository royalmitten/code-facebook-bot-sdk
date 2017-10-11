<?php

namespace Tests\CodeBot\Message;

use PHPUnit\Framework\TestCase;
use CodeBot\Message\Text;

class TextTest extends TestCase
{
    public function testMessage()
    {
        $id = mt_rand(1, 1000);
        $message = bin2hex(openssl_random_pseudo_bytes(10));

        $actual = (new Text($id))->message($message);
        $expected = [
            'recipient' => [
                'id' => $id,
            ],
            'message' => [
                'text' => $message,
                'metadata' => 'DEVELOPER_DEFINED_METADATA',
            ],
        ];

        $this->assertEquals($actual, $expected);
    }

}
