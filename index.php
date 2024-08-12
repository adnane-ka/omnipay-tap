<?php 

include 'vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('Tap');

$gateway->setApiToken('sk_test_XKokBfNWv6FIYuTMg5sLPjhJ');

$response = $gateway->purchase([
    'amount' => 1,
    'currency' => 'KWD', 
    'customerName' => 'Test',
    'customerEmail' => 'test@test.com',
    'sourceId' => 'src_card',
    'threeDSecure' => false,
    'returnUrl' => 'http://localhost:8000/complete.php'
])->send();

if ($response->isRedirect()) {
    $response->redirect(); 
} else {
    echo $response->getMessage();
}