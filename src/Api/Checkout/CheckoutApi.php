<?php

namespace CoreProc\PayMaya\Api\Checkout;

use CoreProc\PayMaya\Api\PaymayaApi;
use CoreProc\PayMaya\Models\Checkout\Checkout;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class CheckoutApi extends PaymayaApi
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
