<?php

namespace Getnet\API;

/**
 * Class Customer
 *
 * @package Getnet\API
 */
class Customer implements \JsonSerializable
{
    const DOCUMENT_TYPE_CPF  = "CPF";
    const DOCUMENT_TYPE_CNPJ = "CNPJ";

    /** @var */
    private $customer_id;

    /** @var */
    private $first_name;

    /** @var */
    private $last_name;

    /** @var */
    private $name;

    /** @var */
    private $email;

    /** @var */
    private $document_type;

    /** @var */
    private $document_number;

    /** @var */
    private $phone_number;

    /** @var */
    private $billing_address;

    /**
     * Customer constructor.
     * @param $customer_id
     */
    public function __construct($customer_id)
    {
        $this->setCustomerId($customer_id);
    }

    /**
     * @return array|mixed
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
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param $customer_id
     * @return $this
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = (string)$customer_id;

        return $this;
    }

    /**
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
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = (string)$last_name;

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
    public function getDocumentType()
    {
        return $this->document_type;
    }

    /**
     * @param $document_type
     * @return $this
     */
    public function setDocumentType($document_type)
    {
        $this->document_type = (string)$document_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->document_number;
    }

    /**
     * @param $document_number
     * @return $this
     */
    public function setDocumentNumber($document_number)
    {
        $this->document_number = (string)$document_number;

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
     * @return Address
     */
    public function billingAddress()
    {
        $address = new Address();

        $this->setBillingAddress($address);

        return $address;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * @param $billing_address
     * @return $this
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = $billing_address;

        return $this;
    }
}
