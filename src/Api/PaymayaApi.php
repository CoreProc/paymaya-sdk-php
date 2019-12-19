<?php

namespace CoreProc\PayMaya\Api;

use CoreProc\PayMaya\PayMayaClient;

abstract class PaymayaApi
{
    /**
     * @var PayMayaClient
     */
    protected $payMayaClient;

    public function __construct(PayMayaClient $payMayaClient)
    {
        $this->payMayaClient = $payMayaClient;
    }
}
