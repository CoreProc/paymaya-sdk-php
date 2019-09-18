<?php

namespace CoreProc\PayMaya;

use CoreProc\PayMaya\Requests\Checkout;
use CoreProc\PayMaya\Responses\Checkout as CheckoutResponse;
use Exception;
use GuzzleHttp\Client;

class PayMayaApi
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $publicApiKey;

    /**
     * @var string
     */
    protected $secretApiKey;

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var string
     */
    protected $baseUrl;

    const ENVIRONMENT_SANDBOX = 'sandbox';

    const ENVIRONMENT_PRODUCTION = 'production';

    const BASE_URL_PRODUCTION = 'https://pg.paymaya.com';

    const BASE_URL_SANDBOX = 'https://pg-sandbox.paymaya.com';

    /**
     * PayMayaApi constructor.
     *
     * @param $publicApiKey
     * @param $secretApiKey
     * @param $environment string Choose between 'production' or 'sandbox'.
     * @throws Exception
     */
    public function __construct($secretApiKey, $publicApiKey, $environment)
    {
        $this->secretApiKey = $secretApiKey;
        $this->publicApiKey = $publicApiKey;
        $this->setEnvironment($environment);

        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->publicApiKey . ':'),
            ],
        ]);
    }

    /**
     * @param $environment
     * @throws Exception
     */
    protected function setEnvironment($environment)
    {
        switch ($environment) {
            case self::ENVIRONMENT_PRODUCTION:
                $this->baseUrl = self::BASE_URL_PRODUCTION;
                break;
            case self::ENVIRONMENT_SANDBOX:
                $this->baseUrl = self::BASE_URL_SANDBOX;
                break;
            default:
                throw new Exception('The defined PayMaya environment is invalid. Please choose between production and sandbox.');
        }

        $this->environment = $environment;
    }

    /**
     * @param Checkout $checkout
     * @return CheckoutResponse
     */
    public function checkout(Checkout $checkout)
    {
        $response = $this->client->post('/checkout/v1/checkouts', [
            'json' => $checkout,
        ]);

        return CheckoutResponse::createFromResponse($response);
    }
}
