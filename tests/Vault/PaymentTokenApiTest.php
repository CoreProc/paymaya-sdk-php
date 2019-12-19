<?php

namespace CoreProc\PayMaya\Tests\Vault;

use CoreProc\PayMaya\Api\Vault\PaymentTokenApi;
use CoreProc\PayMaya\Models\Vault\Card;
use CoreProc\PayMaya\PayMayaClient;
use CoreProc\PayMaya\Tests\DataProviders\PayMayaDataProvider;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class PaymentTokenApiTest extends TestCase
{
    use PayMayaDataProvider;

    /**
     * @test
     * @dataProvider dataCards
     * @param $number
     * @param $expMonth
     * @param $expYear
     * @param $cvc
     */
    public function testPaymentToken($number, $expMonth, $expYear, $cvc)
    {
        $paymentTokenApi = new PaymentTokenApi($this->generatePaymayaClient());

        $card = (new Card)
            ->setNumber($number)
            ->setExpMonth($expMonth)
            ->setExpYear($expYear)
            ->setCvc($cvc);

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
