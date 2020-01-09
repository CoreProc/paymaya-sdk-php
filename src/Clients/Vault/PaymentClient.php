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
            ->post("/payments/v1/{$payment->getCustomerId()}/cards/{$payment->getCardTokenId()}/payments", [
                'json' => $payment,
            ]);
    }
}
