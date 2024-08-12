<?php 

namespace Omnipay\Tap;

use Omnipay\Common\AbstractGateway;
use Omnipay\Tap\Message\CreateChargeRequest;
use Omnipay\Tap\Message\RetrieveChargeRequest;

class Gateway extends AbstractGateway{
    /**
     * @return string
    */
    public function getName(){
        return 'Tap';
    }

    /**
     * @return array
    */
    public function getDefaultParameters(){
        return [
            "apiToken" => ""
        ];
    }

    /**
     * Get Test Api Token 
     * @return string
    */
    public function getApiToken(){
        return $this->getParameter("apiToken");
    }

    /**
     * @return self
    */
    public function setApiToken($value){
        return $this->setParameter("apiToken", $value);
    }    

    /**
     * Create a purchase request
    */
    public function purchase(array $parameters = array()){
        return $this->createRequest(CreateChargeRequest::class, $parameters);
    }

    /**
     * Complete a purchase request
    */
    public function completePurchase(array $parameters = array()){
        return $this->createRequest(RetrieveChargeRequest::class, $parameters);
    }
}