<?php

namespace CoreProc\PayMaya\Clients\Checkout;

use CoreProc\PayMaya\Clients\Client;
use CoreProc\PayMaya\Requests\Checkout\Checkout;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class CheckoutClient extends Client
{
    /**
     * @param Checkout $checkout
     * @return ResponseInterface
     * @throws ClientException
     */
    public function post(Checkout $checkout)
    {
        return $this->payMayaClient->getClientWithPublicKey()->post('/checkout/v1/checkouts', [
            'json' => $checkout,
        ]);
    }

    /**
     * @param string $checkoutId
     * @return ResponseInterface
     * @throws ClientException
     */
    public function get(string $checkoutId)
    {
        return $this->payMayaClient->getClientWithSecretKey()->get('/checkout/v1/checkouts/' . $checkoutId);
    }
}
