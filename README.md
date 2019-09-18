# PayMaya SDK for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/coreproc/paymaya-sdk.svg?style=flat-square)](https://packagist.org/packages/coreproc/paymaya-sdk)
[![Quality Score](https://img.shields.io/scrutinizer/g/coreproc/paymaya-sdk.svg?style=flat-square)](https://scrutinizer-ci.com/g/coreproc/paymaya-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/coreproc/paymaya-sdk.svg?style=flat-square)](https://packagist.org/packages/coreproc/paymaya-sdk)

This is an unofficial SDK for PayMaya using PHP but offers improvements over the official PayMaya codebase. 

## Installation

You can install the package via composer:

```bash
composer require coreproc/paymaya-sdk
```

## Usage

Read the documentation here:
https://s3-ap-southeast-1.amazonaws.com/developers.paymaya.com.checkout/checkout.html

To get development API keys and credit cards, check the link here:
https://developers.paymaya.com/blog/entry/api-test-merchants-and-test-cards

### Initiate checkout of items

Here is an example of how to use this SDK with checkout. The example is based off the payload found in the documentation.

``` php
$payMayaApi = new \CoreProc\PayMaya\PayMayaApi('<SECRET_API_KEY>',
    '<PUBLIC_API_KEY>', \CoreProc\PayMaya\PayMayaApi::ENVIRONMENT_SANDBOX);

$checkout = new \CoreProc\PayMaya\Requests\Checkout();

$checkout->setTotalAmount(
    (new \CoreProc\PayMaya\Requests\TotalAmount())
        ->setCurrency('PHP')
        ->setValue(6304.90)
        ->setDetails(
            (new \CoreProc\PayMaya\Requests\AmountDetail())
                ->setDiscount(300.00)
                ->setServiceCharge(50.00)
                ->setShippingFee(200.00)
                ->setTax(691.60)
                ->setSubtotal(5763.30))
)->setBuyer(
    (new \CoreProc\PayMaya\Requests\Buyer())
        ->setFirstName('Juan')
        ->setMiddleName('dela')
        ->setLastName('Cruz')
        ->setContact(
            (new \CoreProc\PayMaya\Requests\Contact())
                ->setEmail('paymayabuyer1@gmail.com')
                ->setPhone('+63(2)1234567890')
        )->setShippingAddress(
            (new \CoreProc\PayMaya\Requests\Address())
                ->setLine1('9F Robinsons Cybergate 3')
                ->setLine2('Pioneer Street')
                ->setCity('Mandaluyong City')
                ->setState('Metro Manila')
                ->setZipCode('12345')
                ->setCountryCode('PH')
        )->setBillingAddress(
            (new \CoreProc\PayMaya\Requests\Address())
                ->setLine1('9F Robinsons Cybergate 3')
                ->setLine2('Pioneer Street')
                ->setCity('Mandaluyong City')
                ->setState('Metro Manila')
                ->setZipCode('12345')
                ->setCountryCode('PH')
        )
        ->setIpAddress('125.60.148.241')
)->setItems([
    (new \CoreProc\PayMaya\Requests\Item())
        ->setName('Canvas Slip Ons')
        ->setCode('CVG-096732')
        ->setDescription('Shoes')
        ->setQuantity(3)
        ->setAmount(
            (new \CoreProc\PayMaya\Requests\ItemAmount())
                ->setValue(1621.10)
                ->setDetails(
                    (new \CoreProc\PayMaya\Requests\AmountDetail())
                        ->setDiscount(100.00)
                        ->setSubtotal(1721.10)
                )
        )->setTotalAmount(
            (new \CoreProc\PayMaya\Requests\TotalAmount())
                ->setValue(4863.30)
                ->setDetails(
                    (new \CoreProc\PayMaya\Requests\AmountDetail())
                        ->setDiscount(300)
                        ->setSubtotal(5163.30)
                )
        ),
    (new \CoreProc\PayMaya\Requests\Item())
        ->setName('PU Ballerina Flats')
        ->setCode('CVG-096733')
        ->setDescription('Shoes')
        ->setQuantity(1)
        ->setAmount(
            (new \CoreProc\PayMaya\Requests\ItemAmount())
                ->setValue(600)
        )->setTotalAmount(
            (new \CoreProc\PayMaya\Requests\TotalAmount())
                ->setValue(600)
        ),
])->setRedirectUrl(
    (new \CoreProc\PayMaya\Requests\RedirectUrl())
        ->setSuccess('http://shop.test/success')
        ->setFailure('http://shop.test/failure')
        ->setCancel('http://shop.test/cancel')
)->setRequestReferenceNumber('0001');

$checkoutResponse = $payMayaApi->checkout($checkout);

echo $checkoutResponse->getRedirectUrl();
```

### Testing

No tests yet.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email chris.bautista@coreproc.ph instead of using the issue tracker.

## Credits

- [Chris Bautista](https://github.com/chrisbjr)
- [All Contributors](../../contributors)

## Support us

CoreProc is a software development company that provides software development services to startups, digital/ad agencies, and enterprises.

Learn more about us on our [website](https://coreproc.com).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
