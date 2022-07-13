<?php

namespace CoreProc\PayMaya\Tests;

use CoreProc\PayMaya\PayMayaClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var HandlerStack */
    protected $handler;

    /** @var MockHandler */
    protected $responses;

    /** @var array */
    protected $history = [];

    /** @var Client */
    protected $client;

    protected $keyType = [
        'public' => 'getClientWithPublicKey',
        'secret' => 'getClientWithSecretKey',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = HandlerStack::create(
            $this->responses = new MockHandler()
        );

        $this->handler->push(Middleware::history($this->history));

        $this->client = new Client(['handler' => $this->handler]);
    }

    /**
     * @param $keyType
     * @return PayMayaClient|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    protected function mockBaseClient($keyType)
    {
        $httpClient = new Client([
            'base_uri' => $baseUri = 'https://pg-sandbox.paymaya.com/',
            'handler' => $this->handler,
        ]);

        $baseClient = \Mockery::mock(PayMayaClient::class);
        $baseClient->shouldReceive($this->keyType[$keyType])
            ->andReturn($httpClient)
            ->once();

        return $baseClient;
    }
}
