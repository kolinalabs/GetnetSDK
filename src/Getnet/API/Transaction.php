<?php

namespace Getnet\API;

/**
 * Class Transaction
 *
 * @package Getnet\API
 */
class Transaction
{
    const STATUS_AUTHORIZED = "AUTHORIZED";
    const STATUS_CONFIRMED  = "CONFIRMED";
    const STATUS_PENDING    = "PENDING";
    const STATUS_APPROVED   = "APPROVED";
    const STATUS_CANCELED   = "CANCELED";
    const STATUS_DENIED     = "DENIED";
    const STATUS_ERROR      = "ERROR";

    /** @var */
    private $seller_id;

    /** @var */
    private $amount;

    /** @var string */
    private $currency = "BRL";

    /** @var */
    private $order;

    /** @var */
    private $customer;

    /** @var */
    private $device;

    /** @var */
    private $shippings;

    /** @var */
    private $credit;

    /** @var */
    private $debit;

    /** @var */
    private $boleto;

    /**
     * @return false|string
     */
    public function toJSON()
    {
        $vars = get_object_vars($this);
        $vars_clear = array_filter($vars, function ($value) {
            return null !== $value;
        });

        return json_encode($vars_clear, JSON_PRETTY_PRINT);
    }

    /**
     * @return mixed
     */
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * @param $seller_id
     * @return $this
     */
    public function setSellerId($seller_id)
    {
        $this->seller_id = (string)$seller_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = (int)($amount * 100);

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = (string)$currency;

        return $this;
    }

    /**
     * @param $order_id
     * @return Order
     */
    public function order($order_id)
    {
        $order = new Order($order_id);
        $this->setOrder($order);

        return $order;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return $this
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @param null $id
     * @return Customer
     */
    public function customer($id = null)
    {
        $customer = new Customer($id);

        $this->setCustomer($customer);

        return $customer;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @param $device_id
     * @return Device
     */
    public function device($device_id)
    {
        $device = new Device($device_id);

        $this->device = $device;

        return $device;
    }

    /**
     * @return Device
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param Device $device
     * @return $this
     */
    public function setDevice(Device $device)
    {
        $this->device = $device;

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
     * @param $shippings
     * @return $this
     */
    public function setShippings($shippings)
    {
        $this->shippings = $shippings;

        return $this;
    }

    /**
     * @return Shipping
     */
    public function shipping()
    {
        $shipping = new Shipping();

        $this->addShipping($shipping);

        return $shipping;
    }

    /**
     * @param Shipping $shipping
     */
    public function addShipping(Shipping $shipping)
    {
        if (!is_array($this->shippings)) {
            $this->shippings = array();
        }

        $this->shippings[] = $shipping;
    }

    /**
     * @param Customer $customer
     * @return Shipping
     */
    public function addShippingByCustomer(Customer $customer)
    {
        $shipping = new Shipping();

        $this->addShipping($shipping->populateByCustomer($customer));

        return $shipping;
    }

    /**
     * @param null $brand
     * @return Credit
     */
    public function credit($brand = null)
    {
        $credit = new Credit($brand);
        $this->setCredit($credit);

        return $credit;
    }

    /**
     * @return Credit
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @param Credit $credit
     * @return $this
     */
    public function setCredit(Credit $credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * @param $brand
     * @return Credit
     */
    public function debit($brand)
    {
        $debit = new Credit($brand);

        $this->setDebit($debit);

        return $debit;
    }

    /**
     * @return mixed
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * @param Credit $debit
     * @return $this
     */
    public function setDebit(Credit $debit)
    {
        $this->debit = $debit;

        return $this;
    }

    /**
     * @param $our_number
     * @return Boleto
     */
    public function boleto($our_number)
    {
        $boleto = new Boleto($our_number);
        $this->boleto = $boleto;

        return $boleto;
    }

    /**
     * @return mixed
     */
    public function getBoleto()
    {
        return $this->boleto;
    }

    /**
     * @param Boleto $boleto
     * @return $this
     */
    public function setBoleto(Boleto $boleto)
    {
        $this->boleto = $boleto;

        return $this;
    }
}
