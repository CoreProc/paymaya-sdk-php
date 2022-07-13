<?php

namespace CoreProc\PayMaya\Tests\Vault;

use CoreProc\PayMaya\Clients\Vault\PaymentTokenClient;
use CoreProc\PayMaya\Requests\Vault\Card;
use CoreProc\PayMaya\PayMayaClient;
use CoreProc\PayMaya\Tests\PayMayaDataProvider;
use Exception;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class PaymentTokenApiTest extends TestCase
{
    use PayMayaDataProvider;

    /**
     * @test
     * @dataProvider cardData
     * @param $card
     * @throws Exception
     */
    public function testPaymentToken($card)
    {
        $paymentTokenApi = new PaymentTokenClient($this->generatePaymayaClient());

        $card = (new Card)
            ->setNumber($card['number'])
            ->setExpMonth($card['expMonth'])
            ->setExpYear($card['expYear'])
            ->setCvc($card['cvc']);

        $response = null;

        try {
            $response = $paymentTokenApi->post($card);
        } catch (ClientException $exception) {
            $this->fail('Payment Token API post call failed: ' . $exception->getResponse()->getBody());
        }

        $data = PayMayaClient::getDataFromResponse($response);

        $this->assertNotEmpty($data->paymentTokenId);
        $this->assertEquals($data->state, 'AVAILABLE');
    }
}
