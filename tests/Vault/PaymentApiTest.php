<?php

namespace CoreProc\PayMaya\Tests\Vault;

use CoreProc\PayMaya\Clients\Vault\PaymentClient;
use CoreProc\PayMaya\PayMayaClient;
use CoreProc\PayMaya\Requests\Vault\Payment;
use CoreProc\PayMaya\Tests\PayMayaDataProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PaymentApiTest extends TestCase
{
    use PayMayaDataProvider;

    /** @var HandlerStack */
    private $handler;

    /** @var MockHandler */
    private $responses;

    /** @var array */
    private $history = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = HandlerStack::create(
            $this->responses = new MockHandler()
        );

        $this->handler->push(Middleware::history($this->history));
    }

    public function testExecutePayment()
    {
        $this->responses->append($this->successfulPayment());

        $payment = (new Payment())
            ->setCustomerId('customer-id')
            ->setCardTokenId('card-token-id')
            ->setCurrency('PHP')
            ->setAmount(100);

        $paymentClient = new PaymentClient($this->mockBaseClient());
        $response = $paymentClient->store($payment);

        $this->assertPaymentRequest(
            $payment->getCustomerId(),
            $payment->getCardTokenId(),
            [
                'totalAmount' => [
                    'amount' => 100,
                    'currency' => 'PHP',
                ],
            ],
            $this->history[0]['request']
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    private function assertPaymentRequest(
        $customerId,
        $cardTokenId,
        array $body,
        RequestInterface $request
    ) {
        $this->assertEquals(
            "/payments/v1/{$customerId}/cards/{$cardTokenId}/payments",
            $request->getUri()->getPath()
        );
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals($body, json_decode($request->getBody()->getContents(), true));
    }

    /**
     * @return PayMayaClient|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    private function mockBaseClient()
    {
        $httpClient = new Client([
            'base_uri' => $baseUri = 'https://pg-sandbox.paymaya.com/',
            'handler' => $this->handler,
        ]);

        $baseClient = \Mockery::mock(PayMayaClient::class);
        $baseClient->shouldReceive('getClientWithSecretKey')
            ->andReturn($httpClient)
            ->once();

        return $baseClient;
    }

    private function successfulPayment(): ResponseInterface
    {
        return new Response(200, [], json_encode([
            // Response is shortened for conciseness.
            'id' => 'payment-id',
            'isPaid' => false,
            'status' => 'FOR_AUTHENTICATION',
            'verificationUrl' => 'https://payments-web-sandbox.paymaya.com/' .
                'authenticate?id=08eabe02-9035-4601-9c70-b317db1a0d16',
        ]));
    }
}
