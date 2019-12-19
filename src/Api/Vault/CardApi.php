<?php

namespace CoreProc\PayMaya\Api\Vault;

use CoreProc\PayMaya\Api\PaymayaApi;
use CoreProc\PayMaya\Models\RedirectUrl;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class CardApi extends PaymayaApi
{
    /**
     * @param string $customerId
     * @param string $paymentTokenId
     * @param RedirectUrl $redirectUrl
     * @param bool $isDefault
     * @return ResponseInterface
     * @throws ClientException
     */
    public function post(string $customerId, string $paymentTokenId, RedirectUrl $redirectUrl, bool $isDefault = true)
    {
        return $this->payMayaClient->getClientWithSecretKey()->post("/payments/v1/customers/{$customerId}/cards", [
            'json' => [
                'paymentTokenId' => $paymentTokenId,
                'isDefault' => $isDefault,
                'redirectUrl' => $redirectUrl,
            ],
        ]);
    }

    /**
     * @param string $customerId
     * @return ResponseInterface
     * @throws ClientException
     */
    public function get(string $customerId)
    {
        return $this->payMayaClient->getClientWithSecretKey()->get("/payments/v1/customers/{$customerId}/cards");
    }

    /**
     * @param string $customerId
     * @param string $cardToken
     * @return ResponseInterface
     * @throws ClientException
     */
    public function show(string $customerId, string $cardToken)
    {
        return $this->payMayaClient
            ->getClientWithSecretKey()
            ->get("/payments/v1/customers/{$customerId}/cards/{$cardToken}");
    }
}
