<?php

namespace Getnet\API;

/**
 * Class BoletoResponse
 *
 * @package Getnet\API
 */
class BoletoResponse extends BaseResponse
{
    /** @var */
    public $boleto_id;

    /** @var */
    public $bank;

    /** @var */
    public $status_label;

    /** @var */
    public $typeful_line;

    /** @var */
    public $bar_code;

    /** @var */
    public $issue_date;

    /** @var */
    public $expiration_date;

    /** @var */
    public $our_number;

    /** @var */
    public $document_number;

    /** @var */
    public $boleto_pdf;

    /** @var */
    public $boleto_html;

    /** @var */
    private $base_url;

    /**
     * @param $base_url
     * @return $this
     */
    public function setBaseUrl($base_url)
    {
        $this->base_url = $base_url;

        return $this;
    }

    /**
     * @return void
     */
    public function generateLinks()
    {
        if ($this->getPaymentId()) {
            $this->boleto_pdf  = $this->base_url."/v1/payments/boleto/".$this->getPaymentId()."/pdf";
            $this->boleto_html = $this->base_url."/v1/payments/boleto/".$this->getPaymentId()."/html";
        }
    }

    /**
     * @return mixed
     */
    public function getBoletoPdf()
    {
        return $this->boleto_pdf;
    }

    /**
     * @return mixed
     */
    public function getBoletoHtml()
    {
        return $this->boleto_html;
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
     * @return BoletoResponse
     */
    public function setDocumentNumber($document_number)
    {
        $this->document_number = $document_number;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return BaseResponse
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBoletoId()
    {
        return $this->boleto_id;
    }

    /**
     * @param mixed $boleto_id
     * @return BoletoResponse
     */
    public function setBoletoId($boleto_id)
    {
        $this->boleto_id = $boleto_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     * @return BoletoResponse
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getStatusLabel()
    {
        return $this->status_label;
    }

    /**
     * @param mixed $status_label
     * @return BoletoResponse
     */
    public function setStatusLabel($status_label)
    {
        $this->status_label = $status_label;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypefulLine()
    {
        return $this->typeful_line;
    }

    /**
     * @param $typeful_line
     * @return $this
     */
    public function setTypefulLine($typeful_line)
    {
        $this->typeful_line = $typeful_line;

        return $this;
    }

    /**
     *
     * @return mixed
     */
    public function getBarCode()
    {
        return $this->bar_code;
    }

    /**
     * @param $bar_code
     * @return $this
     */
    public function setBarCode($bar_code)
    {
        $this->bar_code = $bar_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssueDate()
    {
        return $this->issue_date;
    }

    /**
     * @param $issue_date
     * @return $this
     */
    public function setIssueDate($issue_date)
    {
        $this->issue_date = $issue_date;

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
        $this->expiration_date = $expiration_date;

        return $this;
    }

    /**
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
        $this->our_number = $our_number;

        return $this;
    }
}
