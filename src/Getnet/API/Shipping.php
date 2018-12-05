<?php

namespace Getnet\API;

/**
 * Class Shipping
 *
 * @package Getnet\API
 */
class Shipping implements \JsonSerializable
{
    /** @var */
    private $first_name;

    /** @var */
    private $name;

    /** @var */
    private $email;

    /** @var */
    private $phone_number;

    /** @var int */
    private $shipping_amount = 0;

    /** @var */
    private $address;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param $first_name
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->first_name = (string)$first_name;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        
        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = (string)$email;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param $phone_number
     * @return $this
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = (string)$phone_number;
        
        return $this;
    }

    /**
     * @return int
     */
    public function getShippingAmount()
    {
        return $this->shipping_amount;
    }

    /**
     * @param $shipping_amount
     * @return $this
     */
    public function setShippingAmount($shipping_amount)
    {
        $this->shipping_amount = (int)($shipping_amount * 100);
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return $this
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        
        return $this;
    }

    /**
     * @return Address
     */
    public function address()
    {
        $address = new Address();
        
        $this->setAddress($address);
        
        return $address;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function populateByCustomer(Customer $customer)
    {
        $this->setFirstName($customer->getFirstName());
        $this->setName($customer->getName());
        $this->setEmail($customer->getEmail());
        $this->setPhoneNumber($customer->getPhoneNumber());
        $this->setAddress($customer->getBillingAddress());
        
        return $this;
    }
}
