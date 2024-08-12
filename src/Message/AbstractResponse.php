<?php 

namespace Omnipay\Tap\Message;

abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse{
    /**
     * @return array
    */
    public function getRawResponse(){
        return json_decode($this->data, true);
    }
    
    /**
     * @return string
    */
    public function getMessage(){
        return "Error: ".$this->getRawResponse()['errors'][0]['code'].': '.$this->getRawResponse()['errors'][0]['description'];
    }

    /**
     * @return array
    */
    public function getData(){
        return $this->getRawResponse();
    }
}