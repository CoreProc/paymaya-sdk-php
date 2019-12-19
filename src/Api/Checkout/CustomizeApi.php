<?php

namespace CoreProc\PayMaya\Api\Checkout;

use CoreProc\PayMaya\Api\PaymayaApi;
use CoreProc\PayMaya\Models\Checkout\Customization;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class CustomizeApi extends PaymayaApi
{
    /**
     * @param Customization $customization
     * @return ResponseInterface
     * @throws ClientException
     */
    public function post(Customization $customization)
    {
        return $this->payMayaClient->getClientWithSecretKey()->post('/checkout/v1/customizations', [
            'json' => $customization,
        ]);
    }

    /**
     * @return ResponseInterface
     * @throws ClientException
     */
    public function get()
    {
        return $this->payMayaClient->getClientWithSecretKey()->get('/checkout/v1/customizations');
    }

    /**
     * @return ResponseInterface
     * @throws ClientException
     */
    public function delete()
    {
        return $this->payMayaClient->getClientWithSecretKey()->delete('/checkout/v1/customizations');
    }
}
