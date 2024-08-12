
# Omnipay: Tap

**Tap payments gateway for Omnipay payment processing library**

[![Build Status](https://travis-ci.org/thephpleague/omnipay-manual.png?branch=master)](https://travis-ci.org/thephpleague/omnipay-manual)
[![Latest Stable Version](https://poser.pugx.org/omnipay/manual/version.png)](https://packagist.org/packages/omnipay/manual)
[![Total Downloads](https://poser.pugx.org/omnipay/manual/d/total.png)](https://packagist.org/packages/omnipay/manual)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements Tap support for Omnipay.

## Installation
```shell
composer require adnane-ka/omnipay-tap
```
## Basic Usage

The following gateways are provided by this package:

* Tap

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.


## Example usage
### Configuration

```php
use Omnipay\Omnipay;

$gateway = Omnipay::create('Tap');

/**
 * You can use the testing API key provided by Tap.
 * No worries on switching test & live mode since Tap provides 
 * Keys for both, and can distinguish between them
 * 
 * @see https://developers.tap.company/reference/api-endpoint
 * @see https://developers.tap.company/reference/testing-keys
*/
$gateway->setApiToken('sk_test_XKokBfNWv6FIYuTMg5sLPjhJ'); 
```
### Create a charge
```php
$response = $gateway->purchase([
    'amount' => 1,
    'currency' => 'KWD', 
    'customerName' => 'Test',
    'customerEmail' => 'test@test.com',
    'sourceId' => 'src_all', // src_card, src_all, src_kw.knet
    'threeDSecure' => false, // 3D Secure Enrolled
    'returnUrl' => 'http://your_website.com/redirect_url' // the URL to redirect to after proccessing payment
])
->send();

if ($response->isRedirect()) {
    // Data is valid and you're ready to be redirected offsite
    $response->redirect(); 
} else {
    // An error occured
    // @see https://developers.tap.company/reference/charge-response-codes
    echo $response->getMessage();
}
```
### Create a charge

```php
$response = $gateway->completePurchase(['charge_id' => $chargeID])->send();

if($response->isSuccessful()){
    // Payment was successful and charge was capture
    // $response->getData()
    // $response->getTransactionReference() // payment reference
}else{
    // Charge was not captured and payment failed
    // $response->getData()
}
```
## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/adnane-ka/omnipay-tap/issues),
or better yet, fork the library and submit a pull request.