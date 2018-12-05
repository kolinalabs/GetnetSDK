<?php
namespace Getnet\API;

/**
 * Class Boleto
 *
 * @package Getnet\API
 */
class Boleto implements \JsonSerializable
{
    const PROVIDER_SANTANDER = "santander";

    /** @var */
    private $our_number;

    /** @var */
    private $document_number;

    /** @var */
    private $expiration_date;

    /** @var */
    private $instructions;

    /** @var */
    private $provider;

    /**
     * Boleto constructor.
     * @param $our_number
     */
    public function __construct($our_number)
    {
        $this->our_number = $our_number;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     *
     * @return mixed
     */
    public function getOurNumber()
    {
        return $this->our_number;
    }

    /**
     * @param $our_number
     * @return $this
     */
    public function setOurNumber($our_number)
    {
        $this->our_number = (string)$our_number;

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
     *
     * @param mixed $document_number
     * @return Boleto
     */
    public function setDocumentNumber($document_number)
    {
        $this->document_number = (string)$document_number;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * @param $expiration_date
     * @return $this
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = (string)$expiration_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @param $instructions
     * @return $this
     */
    public function setInstructions($instructions)
    {
        $this->instructions = (string)$instructions;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     * @return Boleto
     */
    public function setProvider($provider)
    {
        $this->provider = (string)$provider;

        return $this;
    }
}
