<?php

namespace Omnipay\IPay88\Message;


use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class CompletePurchaseResponse extends AbstractResponse
{
    private $reQueryResponse = [
        '00' => 'Successful payment',
        'Invalid parameters' => 'Parameters pass in incorrect',
        'Record not found' => 'Cannot found the record',
        'Incorrect amount' => 'Amount different',
        'Payment fail' => 'Payment fail',
        'M88Admin' => 'Payment status updated by iPay88 Admin(Fail)',
        'Limited by per day maximum number of requery' => 'reached maximum requery'
    ];

    private $invalidSignatureMsg = 'Invalid signature returned from iPay88';

    protected $message;

    protected $status;

    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        if ($this->data['Status'] != 1) {
            $this->message = $this->data['ErrDesc'];
            $this->status = false;
            return;
        }

        if ($this->data['Signature'] != $this->data['ComputedSignature']) {
            $this->message = $this->invalidSignatureMsg;
            $this->status = false;
            return;
        }

        $this->message =
            isset($this->reQueryResponse[$this->data['ReQueryStatus']]) ? $this->reQueryResponse[$this->data['ReQueryStatus']] : '';

        if ('00' == $this->data['ReQueryStatus']) {
            $this->status = true;
            return;
        }

        $this->status = false;
        return;
    }

    public function isSuccessful()
    {
        return $this->status;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getTransactionReference()
    {
        return $this->data['TransId'];
    }

    public function getTransactionId()
    {
        return $this->data['RefNo'];
    }

}
