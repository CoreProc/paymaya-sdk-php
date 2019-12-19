<?php

namespace CoreProc\PayMaya\Api\Checkout;

use CoreProc\PayMaya\Api\PaymayaApi;
use CoreProc\PayMaya\Models\Checkout\Webhook;

class WebhookApi extends PaymayaApi
{
    public function post(Webhook $webhook)
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->post('/checkout/v1/webhooks', [
            'json' => $webhook,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function get()
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->get('/checkout/v1/webhooks');

        return json_decode($response->getBody()->getContents());
    }

    public function put(Webhook $webhook)
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->put('/checkout/v1/webhooks/' . $webhook->getId(), [
            'json' => $webhook,
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
