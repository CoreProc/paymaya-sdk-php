<?php

namespace CoreProc\PayMaya\Tests\Vault;

use CoreProc\PayMaya\Clients\Vault\CustomerClient;
use CoreProc\PayMaya\Requests\Address;
use CoreProc\PayMaya\Requests\Contact;
use CoreProc\PayMaya\Requests\Vault\Buyer;
use CoreProc\PayMaya\PayMayaClient;
use CoreProc\PayMaya\Tests\PayMayaDataProvider;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class CustomerApiTest extends TestCase
{
    use PayMayaDataProvider,
        ArraySubsetAsserts;

    /**
     * @test
     * @dataProvider buyerData
     */
    public function testRegisterACustomer($buyerData)
    {
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

        $data = PayMayaClient::getDataFromResponse($response, true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($data['id']);
        $this->assertArraySubset($buyerData, $data);
    }
}
