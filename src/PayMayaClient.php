<?php

namespace CoreProc\PayMaya;

use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class PayMayaClient
{
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

    const BASE_URL_PRODUCTION = 'https://pg.maya.ph';

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
                throw new Exception('The defined PayMaya environment is invalid. Please choose between production ' .
                    'and sandbox.');
        }

        $this->environment = $environment;
    }

    /**
     * @return Client
     */
    public function getClientWithSecretKey(): Client
    {
        return new Client([
            'base_uri' => $this->baseUrl,
            'auth' => [$this->secretApiKey, ''],
        ]);
    }

    /**
     * @return Client
     */
    public function getClientWithPublicKey(): Client
    {
        return new Client([
            'base_uri' => $this->baseUrl,
            'auth' => [$this->publicApiKey, ''],
        ]);
    }

    /**
     * @param ResponseInterface $response
     * @param bool $assoc [optional] When TRUE, returned objects will be converted into associative arrays.
     * @return object|array
     */
    public static function getDataFromResponse(ResponseInterface $response, $assoc = false)
    {
        return json_decode((string)$response->getBody(), $assoc);
    }
}
