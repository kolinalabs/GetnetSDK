<?php

namespace Getnet\API;

/**
 * Class CardVerificationResponse
 * @package Getnet\API
 */
class CardVerificationResponse
{
    /** @var */
    private $status;

    /** @var */
    private $verification_id;

    /** @var */
    private $authorization_code;

    /** @var */
    private $status_code;

    /** @var */
    private $responseJSON;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return CardVerificationResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerificationId()
    {
        return $this->verification_id;
    }

    /**
     * @param mixed $verification_id
     * @return CardVerificationResponse
     */
    public function setVerificationId($verification_id)
    {
        $this->verification_id = $verification_id;

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
     * @param mixed $authorization_code
     * @return CardVerificationResponse
     */
    public function setAuthorizationCode($authorization_code)
    {
        $this->authorization_code = $authorization_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @param mixed $status_code
     * @return CardVerificationResponse
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponseJSON()
    {
        return $this->responseJSON;
    }

    /**
     * @param mixed $responseJSON
     * @return CardVerificationResponse
     */
    public function setResponseJSON($responseJSON)
    {
        $this->responseJSON = $responseJSON;

        return $this;
    }

    /**
     * @param $json
     * @return $this
     */
    public function mapperJson($json)
    {
        array_walk_recursive($json, function ($value, $key) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        });

        $this->responseJSON = $json;

        return $this;
    }
}
