<?php

namespace Getnet\API;

/**
 * Class Card
 *
 * @package Getnet\API
 */
class Card implements \JsonSerializable
{
    const BRAND_MASTERCARD  = "Mastercard";
    const BRAND_VISA        = "Visa";
    const BRAND_AMEX        = "Amex";
    const BRAND_ELO         = "Elo";
    const BRAND_HIPERCARD   = "Hipercard";

    /** @var */
    private $brand;

    /** @var */
    private $cardholder_name;

    /** @var */
    private $expiration_month;

    /** @var */
    private $expiration_year;

    /** @var */
    private $number_token;

    /** @var */
    private $security_code;

    /**
     * Card constructor.
     * @param Token $token
     */
    public function __construct(Token $token)
    {
        $this->setNumberToken($token);
    }

    /**
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        $vars_clear = array_filter($vars, function ($value) {
            return null !== $value;
        });

        return $vars_clear;
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
        $this->brand = (string)$brand;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardholderName()
    {
        return $this->cardholder_name;
    }

    /**
     * @param $cardholder_name
     * @return $this
     */
    public function setCardholderName($cardholder_name)
    {
        $this->cardholder_name = (string)$cardholder_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth()
    {
        return $this->expiration_month;
    }

    /**
     * @param $expiration_month
     * @return $this
     */
    public function setExpirationMonth($expiration_month)
    {
        $this->expiration_month = (string)$expiration_month;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear()
    {
        return $this->expiration_year;
    }

    /**
     * @param $expiration_year
     * @return $this
     */
    public function setExpirationYear($expiration_year)
    {
        $this->expiration_year = (string)$expiration_year;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberToken()
    {
        return $this->number_token;
    }

    /**
     * @param $token
     * @return $this
     */
    public function setNumberToken($token)
    {
        $this->number_token = (string)$token->getNumberToken();

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->security_code;
    }

    /**
     * @param $security_code
     * @return $this
     */
    public function setSecurityCode($security_code)
    {
        $this->security_code = (string)$security_code;

        return $this;
    }
}
