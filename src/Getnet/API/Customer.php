<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 04:23
 */

namespace Getnet\API;

/**
 * Class Customer
 * @package Getnet\API
 */
class Customer implements \JsonSerializable
{


    /**
     * Customer constructor.
     * @param $email
     */
    public function __construct($id)
    {
        $this->setCustomerId($id);
    }

    /**
     * @param mixed $customer_id
     * @return Customer
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    /**
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
     * @param $name
     * @param $value
     * @return $this
     */
    function __set($name, $value)
    {
        $this->$name = $value;

        return $this;
    }

    /**
     * @param $id
     * @return Address
     */
    public function BillingAddress($id)
    {
        $this->billing_address = new Address($id);

        return $this->billing_address;
    }

    /**
     * @param $id
     * @return Address
     */
    public function ShippingAddress($id)
    {
        $this->address = new Address($id);

        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     * @return Customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * @param mixed $billing_address
     * @return Customer
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = (string)$billing_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @return mixed
     */
    public function getDocumentNumber()
    {
        return $this->document_number;
    }

    /**
     * @param mixed $document_number
     * @return Customer
     */
    public function setDocumentNumber($document_number)
    {
        $this->document_number = $document_number;

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
     * @param mixed $document_type
     * @return Customer
     */
    public function setDocumentType($document_type)
    {
        $this->document_type = (string)$document_type;

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
     * @param mixed $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = (string)$email;

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
     * @param mixed $first_name
     * @return Customer
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
     * @param mixed $last_name
     * @return Customer
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
        return $this->namep;
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
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     * @return Customer
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = (string)$phone_number;

        return $this;
    }
}
