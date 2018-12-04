<?php

/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 05:23
 */

namespace Getnet\API;

class Order implements \JsonSerializable
{
    private $order_id;
    private $product_type;
    private $sales_tax;

    /**
     * Order constructor.
     * @param $order_id
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }


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
     * @param mixed $order_id
     * @return Order
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

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
     * @param mixed $product_type
     * @return Order
     */
    public function setProductType($product_type)
    {
        $this->product_type = $product_type;

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
     * @param mixed $sales_tax
     * @return Order
     */
    public function setSalesTax($sales_tax)
    {
        $this->sales_tax = $sales_tax;

        return $this;
    }
}
