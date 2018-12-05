<?php
namespace Getnet\API;

/**
 * Class BaseResponse
 *
 * @package Getnet\API
 */
class BaseResponse implements \JsonSerializable
{
    public $payment_id;

    public $seller_id;

    public $amount;

    public $currency;

    public $order_id;

    public $status;

    public $received_at;

    public $error_message;

    public $description;

    public $description_detail;

    public $status_code;

    public $responseJSON;

    public $status_label;

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
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * @param $error_message
     * @return $this
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
     * @param $status_code
     * @return $this
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
     * @param $description_detail
     * @return $this
     */
    public function setDescriptionDetail($description_detail)
    {
        $this->description_detail = $description_detail;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorDescription()
    {
        return $this->description."\n";
    }

    /**
     * @param $description
     * @return $this
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
     * @param $payment_id
     * @return $this
     */
    public function setPaymentId($payment_id)
    {
        $this->payment_id = $payment_id;

        return $this;
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
        $this->seller_id = $seller_id;

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
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return mixed
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
        $this->currency = $currency;

        return $this;
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
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        if ($this->status_code == 201) {
            $this->status = Transaction::STATUS_AUTHORIZED;
        } elseif ($this->status_code == 202) {
            $this->status = Transaction::STATUS_AUTHORIZED;
        } elseif ($this->status_code == 402) {
            $this->status = Transaction::STATUS_DENIED;
        } elseif ($this->status_code == 400) {
            $this->status = Transaction::STATUS_ERROR;
        } elseif ($this->status_code == 402) {
            $this->status = Transaction::STATUS_ERROR;
        } elseif ($this->status_code == 500) {
            $this->status = Transaction::STATUS_ERROR;
        } elseif (isset($this->redirect_url)) {
            $this->status = Transaction::STATUS_PENDING;
        } elseif (isset($this->status_label)) {
            $this->status = $this->status_label;
        }

        return $this->status;
    }

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceivedAt()
    {
        return $this->received_at;
    }

    /**
     * @param $received_at
     * @return $this
     */
    public function setReceivedAt($received_at)
    {
        $this->received_at = $received_at;

        return $this;
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
     * @param $array
     * @return $this
     */
    public function setResponseJSON($array)
    {
        $this->responseJSON = json_encode($array, JSON_PRETTY_PRINT);

        return $this;
    }
}
