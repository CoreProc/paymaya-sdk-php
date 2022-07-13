<?php

namespace CoreProc\PayMaya\Clients\Vault;

use CoreProc\PayMaya\Clients\Client;
use CoreProc\PayMaya\Requests\Vault\Card;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class PaymentTokenClient extends Client
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
