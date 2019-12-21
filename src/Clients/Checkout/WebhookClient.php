<?php

namespace CoreProc\PayMaya\Clients\Checkout;

use CoreProc\PayMaya\Clients\Client;
use CoreProc\PayMaya\Requests\Checkout\Webhook;

class WebhookClient extends Client
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
