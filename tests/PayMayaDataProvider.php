<?php

namespace CoreProc\PayMaya\Tests;

use CoreProc\PayMaya\Clients\Vault\CustomerClient;
use CoreProc\PayMaya\Clients\Vault\PaymentTokenClient;
use CoreProc\PayMaya\Requests\Address;
use CoreProc\PayMaya\Requests\Contact;
use CoreProc\PayMaya\Requests\Vault\Buyer;
use CoreProc\PayMaya\Requests\Vault\Card;
use CoreProc\PayMaya\PayMayaClient;
use Exception;
use GuzzleHttp\Exception\ClientException;

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

    public function cardData()
    {
        return [
            [
                [
                    'number' => '5123456789012346',
                    'expMonth' => 12,
                    'expYear' => 2025,
                    'cvc' => 111,
                ],
            ],
        ];
    }

    public function buyerData()
    {
        return [
            [
                [
                    'firstName' => 'John',
                    'middleName' => 'Paul',
                    'lastName' => 'Doe',
                    'birthday' => '1986-01-15',
                    'sex' => 'M',
                    'contact' => [
                        'phone' => '+63(2)1234567890',
                        'email' => 'john.paul.doe@payer.com',
                    ],
                    'billingAddress' => [
                        'line1' => '6F Launchpad',
                        'line2' => 'Sheridan Street',
                        'city' => 'Mandaluyong City',
                        'state' => 'Metro Manila',
                        'zipCode' => '1552',
                        'countryCode' => 'PH',
                    ],
                ],
            ],
        ];
    }

    private function generatePaymentToken($card)
    {
        $paymentTokenApi = new PaymentTokenClient($this->generatePaymayaClient());

        $card = (new Card)
            ->setNumber($card['number'])
            ->setExpMonth($card['expMonth'])
            ->setExpYear($card['expYear'])
            ->setCvc($card['cvc']);

        $response = null;

        try {
            $response = $paymentTokenApi->post($card);
        } catch (ClientException $exception) {
            $this->fail('Payment Token API post call failed: ' . $exception->getResponse()->getBody());
        }

        return PayMayaClient::getDataFromResponse($response);
    }

    private function generateCustomer()
    {
        $buyerData = $this->buyerData()[0][0];

        $customerApi = new CustomerClient($this->generatePaymayaClient());

        $buyer = (new Buyer())
            ->setFirstName($buyerData['firstName'])
            ->setMiddleName($buyerData['middleName'])
            ->setLastName($buyerData['lastName'])
            ->setBirthday($buyerData['birthday'])
            ->setSex($buyerData['sex'])
            ->setContact((new Contact())
                ->setPhone($buyerData['contact']['phone'])
                ->setEmail($buyerData['contact']['email']))
            ->setBillingAddress((new Address())
                ->setLine1($buyerData['billingAddress']['line1'])
                ->setLine2($buyerData['billingAddress']['line2'])
                ->setCity($buyerData['billingAddress']['city'])
                ->setState($buyerData['billingAddress']['state'])
                ->setZipCode($buyerData['billingAddress']['zipCode'])
                ->setCountryCode($buyerData['billingAddress']['countryCode']));

        $response = null;

        try {
            $response = $customerApi->post($buyer);
        } catch (ClientException $exception) {
            $this->fail('Payment Token API post call failed: ' . $exception->getResponse()->getBody());
        }

        return PayMayaClient::getDataFromResponse($response);
    }
}
