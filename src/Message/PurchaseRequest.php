<?php

namespace Omnipay\IPay88\Message;


class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->guardParameters();

        return [
            'MerchantCode' => $this->getMerchantCode(),
            'PaymentId' => '',
            'RefNo' => $this->getTransactionId(),
            'Amount' => number_format($this->getAmount(), 2),
            'Currency' => $this->getCurrency(),
            'ProdDesc' => $this->getDescription(),
            'UserName' => $this->getCard()->getBillingLastName(),
            'UserEmail' => $this->getCard()->getEmail(),
            'UserContact' => $this->getCard()->getNumber(),
            'Remark' => '',
            'Lang' => '',
            'SignatureType' => 'SHA256',
            'Signature' => $this->signature(
                $this->getMerchantKey(),
                $this->getMerchantCode(),
                $this->getTransactionId(),
                $this->getAmount(),
                $this->getCurrency()
            ),
            'ResponseURL' => $this->getReturnUrl(),
            'BackendURL' => $this->getBackendUrl(),
        ];
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    private function signature($merchantKey, $merchantCode, $refNo, $amount, $currency)
    {
        $amount = str_replace([',', '.'], '', $amount);

        $paramsInArray = [$merchantKey, $merchantCode, $refNo, $amount, $currency];

        $stringToHash = implode('', $paramsInArray);

        return  hash('sha256', $stringToHash);
    }

}