<?php

namespace CoreProc\PayMaya\Tests\DataProviders;

use CoreProc\PayMaya\PayMayaClient;
use Exception;

trait PayMayaDataProvider
{
    protected $secretKey = 'sk-X8qolYjy62kIzEbr0QRK1h4b4KDVHaNcwMYk39jInSl';

    protected $publicKey = 'pk-Z0OSzLvIcOI2UIvDhdTGVVfRSSeiGStnceqwUE7n0Ah';

    /**
     * @param string $environment
     * @return PayMayaClient
     * @throws Exception
     */
    protected function generatePaymayaClient($environment = PayMayaClient::ENVIRONMENT_SANDBOX)
    {
        return new PayMayaClient(
            $this->secretKey,
            $this->publicKey,
            $environment
        );
    }

    public function dataCards()
    {
        return [
            [
                'number' => '5123456789012346',
                'expMonth' => 12,
                'expYear' => 2025,
                'cvc' => 111,
            ],
            [
                'number' => '5453010000064154',
                'expMonth' => 12,
                'expYear' => 2025,
                'cvc' => 111,
            ],
            [
                'number' => '4123450131001381',
                'expMonth' => 12,
                'expYear' => 2025,
                'cvc' => 123,
            ],
            [
                'number' => '4123450131001522',
                'expMonth' => 12,
                'expYear' => 2025,
                'cvc' => 123,
            ],
        ];
    }
}
