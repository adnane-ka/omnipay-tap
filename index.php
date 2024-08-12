<?php 

include 'vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('Tap');

$gateway->setApiToken('sk_test_XKokBfNWv6FIYuTMg5sLPjhJ');

$response = $gateway->purchase([
    'amount' => 100,
    'currency' => 'USD', 
    'customerName' => 'Test',
    'customerEmail' => 'test@test.com',
    'sourceId' => 'src_all', // src_card, src_all, src_kw.knet
    'threeDSecure' => false, // 3D Secure Enrolled
    'returnUrl' => 'http://localhost:8000/complete.php' 
])->send();

if ($response->isRedirect()) {
    $response->redirect(); 
} else {
    echo $response->getMessage();
}