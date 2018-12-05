<?php

namespace Getnet\API;

/**
 * Class Order
 *
 * @package Getnet\API
 */
class Order implements \JsonSerializable
{
    const PRODUCT_TYPE_CASH_CARRY       = "cash_carry";
    const PRODUCT_TYPE_DIGITAL_CONTENT  = "digital_content";
    const PRODUCT_TYPE_DIGITAL_GOODS    = "digital_goods";
    const PRODUCT_TYPE_DIGITAL_PHYSICAL = "digital_physical";
    const PRODUCT_TYPE_GIFT_CARD        = "gift_card";
    const PRODUCT_TYPE_PHISICAL_GOODS   = "phisical_goods";
    const PRODUCT_TYPE_RENEW_SUBS       = "renew_subs";
    const PRODUCT_TYPE_SHAREWARE        = "shareware";
    const PRODUCT_TYPE_SERVICE          = "service";

    /** @var */
    private $order_id;

    /** @var */
    private $product_type;

    /** @var int */
    private $sales_tax = 0;

    /**
     * Order constructor.
     * @param $order_id
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param $order_id
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->order_id = (string)$order_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * @param $product_type
     * @return $this
     */
    public function setProductType($product_type)
    {
        $this->product_type = (string)$product_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalesTax()
    {
        return $this->sales_tax;
    }

    /**
     * @param $sales_tax
     * @return $this
     */
    public function setSalesTax($sales_tax)
    {
        $this->sales_tax = (int)($sales_tax * 100);

        return $this;
    }
}
