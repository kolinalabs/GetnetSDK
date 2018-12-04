<?php

/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 01:39
 */

namespace Getnet\API;

/**
 * Class Transaction
 * @package Getnet\API
 */
class Transaction
{
    /**
     * @var
     */
    private $amount;

    /**
     * @var
     */
    private $currency;

    /**
     * @var
     */
    private $customer;

    /**
     * @var
     */
    private $order;

    /**
     * @var
     */
    private $seller_id;

    /**
     * @param $brand
     * @return Credit
     */
    public function Credit($brand)
    {
        $credit = new Credit($brand);
        $this->setCredit($credit);

        return $credit;
    }

    /**
     * @param mixed $credit
     */
    public function setCredit(Credit $credit)
    {
        $this->credit = $credit;
    }

    /**
     * @param $brand
     * @return Credit
     */
    public function Debit($brand)
    {
        $debit = new Credit($brand);
        $this->setDebit($debit);

        return $debit;
    }

    /**
     * @param mixed $debit
     */
    public function setDebit($debit)
    {
        $this->debit = $debit;
    }

    /**
     * @param $id
     * @return Customer
     */
    public function Customer($id = null)
    {
        $customer = new Customer($id);
        $this->setCustomer($customer);

        return $customer;
    }

    /**
     * @param $id
     * @return Customer
     */
    public function Shippings($id)
    {
        $customer = new Customer($id);
        $customer->setCustomerId(null);
        $this->shippings[] = $customer;

        return $customer;
    }

    /**
     * @param $fingerprint
     * @return Device
     */
    public function Device($fingerprint)
    {
        $device = new Device($fingerprint);
        $this->device = $device;

        return $device;
    }

    /**
     * @param $our_number
     * @return Boleto
     */
    public function Boleto($our_number)
    {
        $boleto = new Boleto($our_number);
        $this->boleto = $boleto;

        return $boleto;
    }

    /**
     * @param $value
     */
    public function setShippingAmount($value)
    {
        $this->shipping_amount = $value;
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode(get_object_vars($this), JSON_PRETTY_PRINT);
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function __set($name, $value)
    {
        $this->$name = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShippings()
    {
        return $this->shippings;
    }

    /**
     * @param mixed $shippings
     */
    public function setShippings($shippings)
    {
        $this->shippings = $shippings;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @return mixed
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * @return mixed
     */
    public function getBoleto()
    {
        return $this->boleto;
    }

    /**
     * @param mixed $boleto
     */
    public function setBoleto($boleto)
    {
        $this->boleto = $boleto;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
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
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     */
    public function setDevice($device)
    {
        $this->device = $device;
    }

    /**
     * @param $order_id
     * @return Order
     */
    public function Order($order_id)
    {
        $order = new Order($order_id);
        $this->setOrder($order);

        return $order;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * @param mixed $seller_id
     */
    public function setSellerId($seller_id)
    {
        $this->seller_id = $seller_id;
    }
}
