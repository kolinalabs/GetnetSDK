<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 20:16
 */

namespace Getnet\API;

/**
 * Class BaseResponse
 * @package Getnet\API
 */
class BaseResponse implements \JsonSerializable
{
    /**
     * @var
     */
    public $payment_id;
    /**
     * @var
     */
    public $seller_id;
    /**
     * @var
     */
    public $amount;
    /**
     * @var
     */
    public $currency;
    /**
     * @var
     */
    public $order_id;
    /**
     * @var
     */
    public $status;
    /**
     * @var
     */
    public $received_at;
    /**
     * @var
     */
    public $error_message;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $description_detail;
    /**
     * @var
     */
    public $status_code;
    /**
     * @var
     */
    public $responseJSON;

    public $status_label;
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */

    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * @param mixed $error_message
     * @return BaseResponse
     */
    public function setErrorMessage($error_message)
    {
        $this->error_message = $error_message;

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
     * @return BaseResponse
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionDetail()
    {
        return $this->description_detail;
    }

    /**
     * @param mixed $description_detail
     * @return BaseResponse
     */
    public function setDescriptionDetail($description_detail)
    {
        $this->description_detail = $description_detail;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorDescription()
    {
        return $this->description . "\n";
    }

    /**
     * @param mixed $description
     * @return BaseResponse
     */
    public function setErrorDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->payment_id;
    }

    /**
     * @param mixed $payment_id
     */
    public function setPaymentId($payment_id)
    {
        $this->payment_id = $payment_id;
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
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {

        if ($this->status_code == 201) {
            $this->status = "AUTHORIZED";
        } elseif ($this->status_code == 202) {
            $this->status = "AUTHORIZED";
        } elseif ($this->status_code == 402) {
            $this->status = "DENIED";
        } elseif ($this->status_code == 400) {
            $this->status = "ERROR";
        } elseif ($this->status_code == 402) {
            $this->status = "ERROR";
        } elseif ($this->status_code == 500) {
            $this->status = "ERROR";
        } elseif (isset($this->redirect_url)) {
            $this->status = "PENDING";
        } elseif (isset($this->status_label)) {
            $this->status = $this->status_label;
        }
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getReceivedAt()
    {
        return $this->received_at;
    }

    /**
     * @param mixed $received_at
     */
    public function setReceivedAt($received_at)
    {
        $this->received_at = $received_at;
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

        $this->setResponseJSON($json);

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
     * @param mixed $array
     */
    public function setResponseJSON($array)
    {
        $this->responseJSON = json_encode($array, JSON_PRETTY_PRINT);
    }
}
