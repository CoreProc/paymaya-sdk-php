<?php

namespace CoreProc\PayMaya\Clients\Vault;

use CoreProc\PayMaya\Clients\Client;
use CoreProc\PayMaya\Requests\Vault\Buyer;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class CustomerClient extends Client
{
    /**
     * @param Buyer $buyer
     * @return ResponseInterface
     * @throws ClientException
     */
    public function post(Buyer $buyer)
    {
        return $this->payMayaClient->getClientWithSecretKey()->post('/payments/v1/customers', [
            'json' => $buyer,
        ]);
    }

    /**
     * @param string $customerId
     * @return ResponseInterface
     * @throws ClientException
     */
    public function get(string $customerId)
    {
        return $this->payMayaClient->getClientWithSecretKey()->get("/payments/v1/customers/{$customerId}");
    }

    /**
     * @param string $customerId
     * @param Buyer $buyer
     * @return ResponseInterface
     * @throws ClientException
     */
    public function put(string $customerId, Buyer $buyer)
    {
        return $this->payMayaClient->getClientWithSecretKey()->put("/payments/v1/customers/{$customerId}", [
            'json' => $buyer,
        ]);
    }

    /**
     * @param string $customerId
     * @return ResponseInterface
     * @throws ClientException
     */
    public function delete(string $customerId)
    {
        return $this->payMayaClient->getClientWithSecretKey()->delete("/payments/v1/customers/{$customerId}");
    }
}
