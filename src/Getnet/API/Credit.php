<?php

/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 01:47
 */

namespace Getnet\API;

/**
 * Class Credit
 * @package Getnet\API
 */
class Credit implements \JsonSerializable
{
    /**
     * @var
     */
    private $authenticated;

    /**
     * @var
     */
    private $delayed;

    /**
     * @var
     */
    private $dynamic_mcc;

    /**
     * @var
     */
    private $number_installments;

    /**
     * @var
     */
    private $pre_authorization;

    /**
     * @var
     */
    private $save_card_data;

    /**
     * @var
     */
    private $soft_descriptor;

    /**
     * @var
     */
    private $transaction_type;

    /**
     * @var
     */
    private $card;

    /**
     * Credit constructor.
     * @param $pre_authorization
     */
    public function __construct($pre_authorization)
    {
        $this->pre_authorization = $pre_authorization;
    }

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
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param mixed $card
     */
    public function setCard($card)
    {
        $this->card = $card;
    }

    /**
     * @param $card
     * @return Card
     */
    public function Card($card)
    {
        $card = new Card($card);
        $this->card = $card;

        return $card;
    }

    /**
     * @return mixed
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * @param mixed $transaction_type
     * @return Credit
     */
    public function setTransactionType($transaction_type)
    {
        $this->transaction_type = $transaction_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthenticated()
    {
        return $this->authenticated;
    }

    /**
     * @param mixed $authenticated
     * @return Credit
     */
    public function setAuthenticated($authenticated)
    {
        $this->authenticated = $authenticated;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelayed()
    {
        return $this->delayed;
    }

    /**
     * @param mixed $delayed
     * @return Credit
     */
    public function setDelayed($delayed)
    {
        $this->delayed = $delayed;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDynamicMcc()
    {
        return $this->dynamic_mcc;
    }

    /**
     * @param mixed $dynamic_mcc
     * @return Credit
     */
    public function setDynamicMcc($dynamic_mcc)
    {
        $this->dynamic_mcc = $dynamic_mcc;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberInstallments()
    {
        return $this->number_installments;
    }

    /**
     * @param mixed $number_installments
     * @return Credit
     */
    public function setNumberInstallments($number_installments)
    {
        $this->number_installments = $number_installments;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPreAuthorization()
    {
        return $this->pre_authorization;
    }

    /**
     * @param mixed $pre_authorization
     * @return Credit
     */
    public function setPreAuthorization($pre_authorization)
    {
        $this->pre_authorization = $pre_authorization;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaveCardData()
    {
        return $this->save_card_data;
    }

    /**
     * @param mixed $save_card_data
     * @return Credit
     */
    public function setSaveCardData($save_card_data)
    {
        $this->save_card_data = $save_card_data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoftDescriptor()
    {
        return $this->soft_descriptor;
    }

    /**
     * @param mixed $soft_descriptor
     * @return Credit
     */
    public function setSoftDescriptor($soft_descriptor)
    {
        $this->soft_descriptor = $soft_descriptor;

        return $this;
    }
}
