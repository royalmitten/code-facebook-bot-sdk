<?php

namespace Tests\CodeBot\Message;

use PHPUnit\Framework\TestCase;
use CodeBot\Message\Video;

class VideoTest extends TestCase
{
    public function testMessage()
    {
        $id = mt_rand(1, 1000);
        $message = $string = bin2hex(openssl_random_pseudo_bytes(10));

        $actual = (new Video($id))->message($message);
        $expected = [
            'recipient' => [
                'id' => $id,
            ],
            'message' => [
                'attachment' => [
                    'type' => 'video',
                    'payload' => [
                        'url' => $message,
                    ],
                ],
            ],
        ];

        $this->assertEquals($actual, $expected);
    }
}
