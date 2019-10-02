<?php

namespace CoreProc\PayMaya\Api;

use CoreProc\PayMaya\Models\Webhook;
use CoreProc\PayMaya\PayMayaClient;

class WebhookApi
{
    /**
     * @var PayMayaClient
     */
    protected $payMayaClient;

    public function __construct(PayMayaClient $payMayaClient)
    {
        $this->payMayaClient = $payMayaClient;
    }

    public function store(Webhook $webhook)
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->post('/checkout/v1/webhooks', [
            'json' => $webhook,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function show()
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->get('/checkout/v1/webhooks');

        return json_decode($response->getBody()->getContents());
    }

    public function update(Webhook $webhook)
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->put('/checkout/v1/webhooks/' . $webhook->getId(), [
            'json' => $webhook,
        ]);

        return json_decode($response->getBody()->getContents());
    }
}
