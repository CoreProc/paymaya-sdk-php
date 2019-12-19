<?php

namespace CoreProc\PayMaya\Api\Vault;

use CoreProc\PayMaya\Api\PaymayaApi;
use CoreProc\PayMaya\Models\Vault\Card;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class PaymentTokenApi extends PaymayaApi
{
    /**
     * @param Card $card
     * @return ResponseInterface
     * @throws ClientException
     */
    public function post(Card $card)
    {
        return $this->payMayaClient->getClientWithPublicKey()->post('/payments/v1/payment-tokens', [
            'json' => ['card' => $card],
        ]);
    }
}
