<?php 

namespace Omnipay\Tap\Message;

class RetrieveChargeRequest extends AbstractRequest{
    /**
     * @see https://developers.tap.company/reference/retrieve-a-charges
    */
    protected $endPoint = 'https://api.tap.company/v2/charges/';

    /**
     * @return self
    */
    public function setChargeId($value)
    {
        return $this->setParameter('charge_id', $value);
    }

    /**
     * @return array
    */
    public function getData(){
        $this->validate('charge_id');
    }

    /**
     * @return RetrieveChargeResponse
    */
    public function sendData($data)
    {
        $httpResponse = $this->createHttpRequest('GET', $this->endPoint.'/'.$this->getParameter('charge_id'), $data);

        return new RetrieveChargeResponse($this, $httpResponse->getBody()->getContents());
    }
}