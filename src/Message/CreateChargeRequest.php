<?php 

namespace Omnipay\Tap\Message;

class CreateChargeRequest extends AbstractRequest{
    /**
     * @see https://developers.tap.company/reference/create-a-charge
    */
    protected $endPoint = 'https://api.tap.company/v2/charges/';

    /**
     * @return self
    */
    public function setCustomerName($value){
        return $this->setParameter("customerName", $value);
    }

    /**
     * @return self
    */
    public function setCustomerEmail($value){
        return $this->setParameter("customerEmail", $value);
    }

    /**
     * @return self
    */
    public function setSourceId($value){
        return $this->setParameter("sourceId", $value);
    }

    /**
     * @return self
    */
    public function setThreeDSecure($value){
        return $this->setParameter("threeDSecure", $value);
    }

    /**
     * @return array
    */
    public function getData()
    {
        $this->validate('amount', 'returnUrl');
        
        return [
            'amount' => $this->getParameter('amount'),
            'currency' => $this->getParameter('currency') ?? 'USD',
            'threeDSecure' => $this->getParameter('threeDSecure') ?? true, 
            'customer' => [
                'email' => $this->getParameter('customerEmail') ?? 'test@tes.co',
                'first_name' => $this->getParameter('customerName') ?? 'Test'
            ],
            'source' => [
                'id' => $this->getParameter('sourceId') ?? 'src_all'
            ],
            'redirect' => [
                'url' => $this->getParameter('returnUrl')
            ]
        ];
    }

    /**
     * @return CreateChargeResponse
    */
    public function sendData($data)
    {
        $httpResponse = $this->createHttpRequest('POST', $this->endPoint, $data);

        return new CreateChargeResponse($this, $httpResponse->getBody()->getContents());
    }
}