<?php

namespace CoreProc\PayMaya\Tests;

use CoreProc\PayMaya\PayMayaClient;
use Exception;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class PayMayaClientTest extends TestCase
{
    /**
     * @param $environment
     * @param $baseUri
     * @dataProvider environmentProvider
     */
    public function testCreateClient($environment, $baseUri)
    {
        $factory = new PayMayaClient('secret-key', 'public-key', $environment);

        $secretClient = $factory->getClientWithSecretKey();
        $publicClient = $factory->getClientWithPublicKey();

        $this->assertInstanceOf(Client::class, $secretClient);
        $this->assertEquals($baseUri, $secretClient->getConfig('base_uri'));
        $this->assertEquals(['secret-key', ''], $secretClient->getConfig('auth'));
        $this->assertInstanceOf(Client::class, $publicClient);
        $this->assertEquals($baseUri, $publicClient->getConfig('base_uri'));
        $this->assertEquals(['public-key', ''], $publicClient->getConfig('auth'));
    }

    public static function environmentProvider()
    {
        return [
            'production' => ['production', 'https://pg.paymaya.com'],
            'sandbox' => ['sandbox', 'https://pg-sandbox.paymaya.com'],
        ];
    }

    public function testThrowExceptionOnInvalidEnvironment()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage(
            'The defined PayMaya environment is invalid. Please choose between production and sandbox.'
        );

        new PayMayaClient('secret-key', 'public-key', 'testing');
    }
}
