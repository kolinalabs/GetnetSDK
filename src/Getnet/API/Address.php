<?php

namespace Getnet\API;

/**
 * Class Address
 *
 * @package Getnet\API
 */
class Address implements \JsonSerializable
{
    /** @var */
    private $city;

    /** @var */
    private $complement;

    /** @var */
    private $country;

    /** @var */
    private $district;

    /** @var */
    private $number;

    /** @var */
    private $postal_code;

    /** @var */
    private $state;

    /** @var */
    private $street;

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = (string)$city;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param $complement
     * @return $this
     */
    public function setComplement($complement)
    {
        $this->complement = (string)$complement;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = (string)$country;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param $district
     * @return $this
     */
    public function setDistrict($district)
    {
        $this->district = (string)$district;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = (string)$number;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param $postal_code
     * @return $this
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = (string)$postal_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = (string)$state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = (string)$street;

        return $this;
    }
}
