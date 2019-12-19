<?php

namespace CoreProc\PayMaya\Tests;

use CoreProc\PayMaya\Tests\DataProviders\PayMayaDataProvider;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class PayMayaClientTest extends TestCase
{
    use PayMayaDataProvider;

    /**
     * @test
     */
    public function testPayMayaClient()
    {
        $paymayaPublicClient = null;
        $paymayaSecretClient = null;

        try {
            $paymayaSecretClient = $this->generatePaymayaClient()->getClientWithSecretKey();

            $paymayaPublicClient = $this->generatePaymayaClient()->getClientWithPublicKey();

        } catch (\Exception $exception) {
            $this->fail('PayMayaClient threw an exception.');
        }

        $this->assertTrue($paymayaPublicClient instanceof Client);

        $this->assertTrue($paymayaSecretClient instanceof Client);

        $this->assertArrayHasKey('Authorization', $paymayaPublicClient->getConfig()['headers']);
    }

    /**
     * @test
     */
    public function testPayMayaClientExceptionOnUnkownEnvironment()
    {
        try {
            $paymayaSecretClient = $this->generatePaymayaClient('test')->getClientWithSecretKey();
        } catch (\Exception $exception) {
            $this->assertTrue($exception->getMessage() === 'The defined PayMaya environment is invalid. Please choose between production and sandbox.');

            return;
        }

        $this->fail('PayMaya client should not accept unknown environments.');
    }
}
