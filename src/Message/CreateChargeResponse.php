<?php 

namespace Omnipay\Tap\Message;
use Omnipay\Common\Message\RedirectResponseInterface;

class CreateChargeResponse extends AbstractResponse implements RedirectResponseInterface{
    /**
     * @return boolean
    */
    public function isSuccessful()
    {
        return false; // offsite payments are always false :)
    }

    /**
     * @return boolean
    */
    public function isRedirect()
    {
        return isset($this->getRawResponse()['transaction']['url']);        
    }
    
    /**
     * @return string
    */
    public function getRedirectUrl()
    {
        return $this->getRawResponse()['transaction']['url'];
    }
}