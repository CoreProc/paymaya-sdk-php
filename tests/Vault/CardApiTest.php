<?php

namespace CoreProc\PayMaya\Tests\Vault;

use CoreProc\PayMaya\Clients\Vault\CardClient;
use CoreProc\PayMaya\Requests\RedirectUrl;
use CoreProc\PayMaya\PayMayaClient;
use CoreProc\PayMaya\Tests\PayMayaDataProvider;
use Exception;
use PHPUnit\Framework\TestCase;

class CardApiTest extends TestCase
{
    use PayMayaDataProvider;

    /**
     * @test
     * @dataProvider cardData
     * @param $card
     * @throws Exception
     */
    public function testVaultCard($card)
    {
        $paymentTokenData = $this->generatePaymentToken($card);
        $customerData = $this->generateCustomer();
        $redirectUrls = (new RedirectUrl())
            ->setCancel('https://example.com/cancel')
            ->setFailure('https://example.com/failure')
            ->setSuccess('https://example.com/cancel');

        $cardApi = new CardClient($this->generatePaymayaClient());

        $cardPostResponse = $cardApi->post($customerData->id, $paymentTokenData->paymentTokenId, $redirectUrls);
        $cardPostData = PayMayaClient::getDataFromResponse($cardPostResponse, true);

        $this->assertEquals(200, $cardPostResponse->getStatusCode());
        $this->assertArrayHasKey('cardTokenId', $cardPostData);
        $this->assertArrayHasKey('verificationUrl', $cardPostData);

        $cardsGetResponse = $cardApi->get($customerData->id);
        $cardsGetData = PayMayaClient::getDataFromResponse($cardsGetResponse, true);

        $this->assertEquals(200, $cardsGetResponse->getStatusCode());
        $this->assertIsArray($cardsGetData);
        $this->assertEquals($cardsGetData[0]['cardTokenId'], $cardPostData['cardTokenId']);
    }
}
