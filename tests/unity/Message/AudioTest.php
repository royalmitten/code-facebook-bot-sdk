<?php

namespace Tests\CodeBot\Message;

use PHPUnit\Framework\TestCase;
use CodeBot\Message\Audio;

class AudioTest extends TestCase
{
    public function testMessage()
    {
        $id = mt_rand(1, 1000);
        $message = $string = bin2hex(openssl_random_pseudo_bytes(10));

        $actual = (new Audio($id))->message($message);
        $expected = [
            'recipient' => [
                'id' => $id,
            ],
            'message' => [
                'attachment' => [
                    'type' => 'audio',
                    'payload' => [
                        'url' => $message,
                    ],
                ],
            ],
        ];

        $this->assertEquals($actual, $expected);
    }
}
