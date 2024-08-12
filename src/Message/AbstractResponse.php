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
        $response = $this->getRawResponse();

        if (isset($response['error'])) {
            return sprintf(
                'Error: %s: %s',
                $response['error']['code'],
                $response['error']['description']
            );
        }
    
        if (isset($response['errors'][0])) {
            return sprintf(
                'Error: %s: %s',
                $response['errors'][0]['code'],
                $response['errors'][0]['description']
            );
        }
    
        return '';
    }

    /**
     * @return array
    */
    public function getData(){
        return $this->getRawResponse();
    }
}