<?php

namespace CoreProc\PayMaya\Clients\Checkout;

use CoreProc\PayMaya\Clients\Client;
use CoreProc\PayMaya\Requests\Checkout\Customization;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class CustomizeClient extends Client
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
