<?php 

namespace Omnipay\Tap\Message;

class RetrieveChargeResponse extends AbstractResponse{
    /**
     * @return boolean
    */
    public function isSuccessful()
    {
        return isset($this->getRawResponse()['status']) && ($this->getRawResponse()['status']  == 'CAPTURED');
    }

    /**
     * @return boolean
    */
    public function isRedirect()
    {
        return false;        
    }

    /**
     * @return boolean
    */
    public function getRedirectUrl()
    {
        return false;
    }

    /**
     * @return string
    */
    public function getTransactionReference(){
        if (isset($this->getRawResponse()['reference']['payment'])) {
            return $this->getRawResponse()['reference']['payment'];
        }
        
        return '';
    }
}