<?php 

$chargeID = $_REQUEST['tap_id'];

include 'vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('Tap');

$gateway->setApiToken('sk_test_XKokBfNWv6FIYuTMg5sLPjhJ');

$response = $gateway->completePurchase(['charge_id' => $chargeID])->send();

if($response->isSuccessful()){
    // do certain action, renew subscription for example
    echo "success!\n";
    echo '<pre>';
    print_r($response->getData());
    echo '</pre>';

    echo $response->getTransactionReference();
}else{
    echo '<pre>';
    print_r($response->getData());
    echo '</pre>';
}