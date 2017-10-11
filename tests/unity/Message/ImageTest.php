<?php

namespace Tests\CodeBot\Message;

use PHPUnit\Framework\TestCase;
use CodeBot\Message\Image;

class ImageTest extends TestCase
{
    public function testMessage()
    {
        $id = mt_rand(1, 1000);
        $message = bin2hex(openssl_random_pseudo_bytes(10));

        $actual = (new Image($id))->message($message);
        $expected = [
            'recipient' => [
                'id' => $id,
            ],
            'message' => [
                'attachment' => [
                    'type' => 'image',
                    'payload' => [
                        'url' => $message,
                    ],
                ],
            ],
        ];

        $this->assertEquals($actual, $expected);
    }
}
