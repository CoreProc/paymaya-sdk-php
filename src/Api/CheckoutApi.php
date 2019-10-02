<?php

namespace CoreProc\PayMaya\Api;

use CoreProc\PayMaya\Models\Checkout;
use CoreProc\PayMaya\Models\CheckoutResponse;
use CoreProc\PayMaya\PayMayaClient;

class CheckoutApi
{
    /**
     * @var PayMayaClient
     */
    protected $payMayaClient;

    public function __construct(PayMayaClient $payMayaClient)
    {
        $this->payMayaClient = $payMayaClient;
    }

    /**
     * @param Checkout $checkout
     * @return CheckoutResponse
     */
    public function store(Checkout $checkout)
    {
        $response = $this->payMayaClient->getClientWithPublicKey()->post('/checkout/v1/checkouts', [
            'json' => $checkout,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function show(string $checkoutId)
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->get('/checkout/v1/checkouts/' . $checkoutId);

        return json_decode($response->getBody()->getContents());
    }
}
