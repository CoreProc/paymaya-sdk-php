<?php

namespace CoreProc\PayMaya\Tests\Vault;

use CoreProc\PayMaya\Clients\Vault\CardClient;
use CoreProc\PayMaya\Requests\RedirectUrl;
use CoreProc\PayMaya\Tests\TestCase;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class CardApiTest extends TestCase
{
    public function testPostCard()
    {
        $this->responses->append($this->successfulPost());

        $data = [];

        $client = new CardClient($this->mockBaseClient('secret'));
        $response = $client->post(
            $data['customer_id'] = 'customer-id',
            $data['token'] = 'payment-token-id',
            $data['redirect'] = new RedirectUrl(),
            $data['is_default'] = true
        );

        $this->assertPostRequest($data, $this->history[0]['request']);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testGet()
    {
        $this->responses->append($this->successfulGet());

        $client = new CardClient($this->mockBaseClient('secret'));
        $response = $client->get($customerId = 'customer-id');

        $this->assertGetRequest($customerId, $this->history[0]['request']);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testShow()
    {
        $this->responses->append($this->successfulShow());

        $client = new CardClient($this->mockBaseClient('secret'));
        $response = $client->show($customerId = 'customer-id', $cardId = 'card-token-id');

        $this->assertShowRequest($customerId, $cardId, $this->history[0]['request']);
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    private function successfulPost(): ResponseInterface
    {
        return new Response(200, [], json_encode([
            'cardTokenId' => 'payment-token-id',
            'verificationUrl' => 'http://verification.url',
        ]));
    }

    private function successfulGet(): ResponseInterface
    {
        return new Response(200, [], json_encode([
            ['cardTokenId' => 'card-token-id-1'],
            ['cardTokenId' => 'card-token-id-2'],
        ]));
    }

    private function successfulShow(): ResponseInterface
    {
        return new Response(200, [], json_encode([
            'cardTokenId' => 'card-token-id-1',
        ]));
    }

    private function assertShowRequest($customerId, $cardId, RequestInterface $request)
    {
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals(
            "/payments/v1/customers/$customerId/cards/$cardId",
            $request->getUri()->getPath()
        );
    }

    private function assertGetRequest($customerId, RequestInterface $request)
    {
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals(
            "/payments/v1/customers/$customerId/cards",
            $request->getUri()->getPath()
        );
    }

    /**
     * Assert that the expected data matches the one in the request.
     *
     * @param array $expected
     * @param RequestInterface $request
     */
    private function assertPostRequest(array $expected, RequestInterface $request)
    {
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals(
            "/payments/v1/customers/{$expected['customer_id']}/cards",
            $request->getUri()->getPath()
        );
        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'paymentTokenId' => $expected['token'],
                'isDefault' => $expected['is_default'],
                'redirectUrl' => [
                    'success' => $expected['redirect']->getSuccess(),
                    'failure' => $expected['redirect']->getFailure(),
                    'cancel' => $expected['redirect']->getCancel(),
                ],
            ]),
            $request->getBody()
        );
    }
}
