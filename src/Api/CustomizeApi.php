<?php

use CoreProc\PayMaya\Models\Customization;
use CoreProc\PayMaya\PayMayaClient;

class CustomizeApi
{
    /**
     * @var PayMayaClient
     */
    protected $payMayaClient;

    public function __construct(PayMayaClient $payMayaClient)
    {
        $this->payMayaClient = $payMayaClient;
    }

    public function store(Customization $customization)
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->post('/checkout/v1/customizations', [
            'json' => $customization,
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function show()
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->get('/checkout/v1/customizations');

        return json_decode($response->getBody()->getContents());
    }

    public function delete()
    {
        $response = $this->payMayaClient->getClientWithSecretKey()->delete('/checkout/v1/customizations');

        return json_decode($response->getBody()->getContents());
    }
}
