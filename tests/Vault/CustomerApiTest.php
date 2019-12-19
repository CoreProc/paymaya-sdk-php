<?php

namespace CoreProc\PayMaya\Tests\Vault;

use CoreProc\PayMaya\Api\Vault\CustomerApi;
use CoreProc\PayMaya\Models\Address;
use CoreProc\PayMaya\Models\Contact;
use CoreProc\PayMaya\Models\Vault\Buyer;
use CoreProc\PayMaya\PayMayaClient;
use CoreProc\PayMaya\Tests\DataProviders\PayMayaDataProvider;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class CustomerApiTest extends TestCase
{
    use PayMayaDataProvider;

    /**
     * @test
     */
    public function testRegisterACustomer()
    {
        $customerApi = new CustomerApi($this->generatePaymayaClient());

        $buyer = (new Buyer())
            ->setFirstName('John')
            ->setMiddleName('Paul')
            ->setLastName('Doe')
            ->setBirthday('1987-07-28')
            ->setSex('M')
            ->setContact((new Contact())
                ->setPhone('+63(2)1234567890')
                ->setEmail('john.paul.doe@payer.com'))
            ->setBillingAddress((new Address())
                ->setLine1('6F Launchpad')
                ->setLine2('Sheridan Street')
                ->setCity('Mandaluyong City')
                ->setState('Metro Manila')
                ->setZipCode('1552')
                ->setCountryCode('PH'));

        $response = null;

        try {
            $response = $customerApi->post($buyer);
        } catch (ClientException $exception) {
            $this->fail('Payment Token API post call failed: ' . $exception->getResponse()->getBody());
        }

        $this->assertEquals(200, $response->getStatusCode());

        $data = PayMayaClient::getDataFromResponse($response);

        $this->assertEquals('John', $data->firstName);

        $this->assertNotEmpty($data->id);

        $this->assertEquals($data->state, 'AVAILABLE');
    }
}
