<?php

namespace Getnet\API;

/**
 * Class AuthorizeResponse
 *
 * @package Getnet\API
 */
class AuthorizeResponse extends BaseResponse
{
    /** @var */
    protected $delayed;

    /** @var */
    protected $authorization_code;

    /** @var */
    protected $authorized_at;

    /** @var */
    protected $reason_code;

    /** @var */
    protected $reason_message;

    /** @var */
    protected $acquirer;

    /** @var */
    protected $soft_descriptor;

    /** @var */
    protected $brand;

    /** @var */
    protected $terminal_nsu;

    /** @var */
    protected $acquirer_transaction_id;

    /** @var */
    protected $redirect_url;

    /** @var */
    protected $issuer_payment_id;

    /** @var */
    protected $payer_authentication_request;

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * @param $redirect_url
     * @return $this
     */
    public function setRedirectUrl($redirect_url)
    {
        $this->redirect_url = $redirect_url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssuerPaymentId()
    {
        return $this->issuer_payment_id;
    }

    /**
     * @param $issuer_payment_id
     * @return $this
     */
    public function setIssuerPaymentId($issuer_payment_id)
    {
        $this->issuer_payment_id = $issuer_payment_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayerAuthenticationRequest()
    {
        return $this->payer_authentication_request;
    }

    /**
     * @param $payer_authentication_request
     * @return $this
     */
    public function setPayerAuthenticationRequest($payer_authentication_request)
    {
        $this->payer_authentication_request = $payer_authentication_request;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelayed()
    {
        return $this->delayed;
    }

    /**
     * @param $delayed
     * @return $this
     */
    public function setDelayed($delayed)
    {
        $this->delayed = $delayed;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorization_code;
    }

    /**
     * @param $authorization_code
     * @return $this
     */
    public function setAuthorizationCode($authorization_code)
    {
        $this->authorization_code = $authorization_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizedAt()
    {
        return $this->authorized_at;
    }

    /**
     * @param $authorized_at
     * @return $this
     */
    public function setAuthorizedAt($authorized_at)
    {
        $this->authorized_at = $authorized_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }

    /**
     * @param $reason_code
     * @return $this
     */
    public function setReasonCode($reason_code)
    {
        $this->reason_code = $reason_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReasonMessage()
    {
        return $this->reason_message;
    }

    /**
     * @param $reason_message
     * @return $this
     */
    public function setReasonMessage($reason_message)
    {
        $this->reason_message = $reason_message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcquirer()
    {
        return $this->acquirer;
    }

    /**
     * @param $acquirer
     * @return $this
     */
    public function setAcquirer($acquirer)
    {
        $this->acquirer = $acquirer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoftDescriptor()
    {
        return $this->soft_descriptor;
    }

    /**
     * @param $soft_descriptor
     * @return $this
     */
    public function setSoftDescriptor($soft_descriptor)
    {
        $this->soft_descriptor = $soft_descriptor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param $brand
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTerminalNsu()
    {
        return $this->terminal_nsu;
    }

    /**
     * @param $terminal_nsu
     * @return $this
     */
    public function setTerminalNsu($terminal_nsu)
    {
        $this->terminal_nsu = $terminal_nsu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcquirerTransactionId()
    {
        return $this->acquirer_transaction_id;
    }

    /**
     * @param $acquirer_transaction_id
     * @return $this
     */
    public function setAcquirerTransactionId($acquirer_transaction_id)
    {
        $this->acquirer_transaction_id = $acquirer_transaction_id;

        return $this;
    }
}
