<?php

namespace Getnet\API;

/**
 * Class Credit
 *
 * @package Getnet\API
 */
class Credit implements \JsonSerializable
{
    //Pagamento completo à vista
    const TRANSACTION_TYPE_FULL = "FULL";
    //Pagamento parcelado sem juros
    const TRANSACTION_TYPE_INSTALL_NO_INTEREST = "INSTALL_NO_INTEREST";
    //Pagamento parcelado com juros
    const TRANSACTION_TYPE_INSTALL_WITH_INTEREST = "INSTALL_WITH_INTEREST";

    /** @var */
    private $authenticated;

    /** @var */
    private $delayed;

    /** @var */
    private $dynamic_mcc;

    /** @var */
    private $number_installments;

    /** @var */
    private $pre_authorization;

    /** @var */
    private $save_card_data;

    /** @var */
    private $soft_descriptor;

    /** @var */
    private $transaction_type;

    /** @var */
    private $card;

    /** @var */
    private $cardholder_mobile;

    /**
     * Credit constructor.
     * @param $pre_authorization
     */
    public function __construct($pre_authorization)
    {
        $this->pre_authorization = $pre_authorization;
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
    public function getAuthenticated()
    {
        return $this->authenticated;
    }

    /**
     * @param $authenticated
     * @return $this
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
     * @param $delayed
     * @return $this
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
     * @param $dynamic_mcc
     * @return $this
     */
    public function setDynamicMcc($dynamic_mcc)
    {
        $this->dynamic_mcc = (int)$dynamic_mcc;

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
     * @param $number_installments
     * @return $this
     */
    public function setNumberInstallments($number_installments)
    {
        $this->number_installments = (int)$number_installments;

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
     * @param $pre_authorization
     * @return $this
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
     * @param $save_card_data
     * @return $this
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
     * @param $soft_descriptor
     * @return $this
     */
    public function setSoftDescriptor($soft_descriptor)
    {
        $this->soft_descriptor = (string)$soft_descriptor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * @param $transaction_type
     * @return $this
     */
    public function setTransactionType($transaction_type)
    {
        $this->transaction_type = (string)$transaction_type;

        return $this;
    }

    /**
     * @param $token
     * @return Card
     */
    public function card($token)
    {
        $card = new Card($token);

        $this->setCard($card);

        return $card;
    }

    /**
     * @return Card
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param Card $card
     * @return $this
     */
    public function setCard(Card $card)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardholderMobile()
    {
        return $this->cardholder_mobile;
    }

    /**
     * @param $cardholder_mobile
     * @return $this
     */
    public function setCardholderMobile($cardholder_mobile)
    {
        $this->cardholder_mobile = (string)$cardholder_mobile;

        return $this;
    }
}
