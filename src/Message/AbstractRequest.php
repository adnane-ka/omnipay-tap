<?php 

namespace Omnipay\Tap\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest{
    /**
     * @return self
    */
    public function setApiToken($value)
    {
        return $this->setParameter('apiToken', $value);
    }

    /**
     * @return string
    */
    public function getApiToken()
    {
        return $this->getParameter('apiToken');
    }

    /**
     * @return Client
    */
    public function createHttpRequest($httpVerb, $endPoint, $data = []){
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getApiToken()
        ];

        return $this->httpClient->request(
            $httpVerb,
            $endPoint,
            $headers,
            json_encode($data)
        );
    }
}