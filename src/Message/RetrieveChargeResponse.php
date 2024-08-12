<?php 

namespace Omnipay\Tap\Message;

class RetrieveChargeResponse extends AbstractResponse{
    /**
     * @return boolean
    */
    public function isSuccessful()
    {
        return $this->getRawResponse()['status'] == 'CAPTURED';
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
        return $this->getRawResponse()['reference']['payment'];
    }
}