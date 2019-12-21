<?php

namespace CoreProc\PayMaya\Clients;

use CoreProc\PayMaya\PayMayaClient;

abstract class Client
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
