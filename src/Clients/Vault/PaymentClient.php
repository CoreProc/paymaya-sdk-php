<?php

namespace CoreProc\PayMaya\Clients\Vault;

use CoreProc\PayMaya\Clients\Client;
use CoreProc\PayMaya\Requests\Vault\Payment;

class PaymentClient extends Client
{
    public function store(Payment $payment)
    {
        return $this->payMayaClient
            ->getClientWithSecretKey()
            ->post(
                sprintf(
                    "/payments/v1/customers/%s/cards/%s/payments",
                    $payment->getCustomerId(),
                    $payment->getCardTokenId()
                ), [
                'json' => $payment,
            ]);
    }
}
