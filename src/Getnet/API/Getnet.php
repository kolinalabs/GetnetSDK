<?php

namespace Getnet\API;

/**
 * Class Getnet
 *
 * @package Getnet\API
 */
class Getnet
{
    /** @var */
    private $client_id;

    /** @var */
    private $client_secret;

    /** @var */
    private $environment;

    /** @var */
    private $authorizationToken;

    /** @var */
    private $keySession;

    /**
     * Getnet constructor.
     * @param $client_id
     * @param $client_secret
     * @param Environment|null $environment
     * @param null $keySession
     * @throws \Exception
     */
    public function __construct(
        $client_id,
        $client_secret,
        Environment $environment = null,
        $keySession = null
    ) {
        if (!$environment) {
            $environment = Environment::production();
        }

        $this->setClientId($client_id);
        $this->setClientSecret($client_secret);
        $this->setEnvironment($environment);
        $this->setKeySession($keySession);

        $request = new Request($this);

        return $request->auth($this);
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param $client_id
     * @return $this
     */
    public function setClientId($client_id)
    {
        $this->client_id = (string)$client_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * @param $client_secret
     * @return $this
     */
    public function setClientSecret($client_secret)
    {
        $this->client_secret = (string)$client_secret;

        return $this;
    }

    /**
     * @return Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param Environment $environment
     * @return $this
     */
    public function setEnvironment(Environment $environment)
    {
        $this->environment = $environment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationToken()
    {
        return $this->authorizationToken;
    }

    /**
     * @param $authorizationToken
     * @return $this
     */
    public function setAuthorizationToken($authorizationToken)
    {
        $this->authorizationToken = (string)$authorizationToken;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKeySession()
    {
        return $this->keySession;
    }

    /**
     * @param $keySession
     */
    public function setKeySession($keySession)
    {
        $this->keySession = (string)$keySession;
    }

    /**
     * @param Transaction $transaction
     * @return AuthorizeResponse|BaseResponse
     */
    public function authorize(Transaction $transaction)
    {
        try {
            $request = new Request($this);

            if ($transaction->getCredit()) {
                $response = $request->post($this, "/v1/payments/credit", $transaction->toJSON());
            } elseif ($transaction->getDebit()) {
                $response = $request->post($this, "/v1/payments/debit", $transaction->toJSON());
            } else {
                throw new \Exception("Error select credit or debit");
            }
        } catch (\Exception $e) {
            $error = new BaseResponse();
            $error->mapperJson(json_decode($e->getMessage(), true));

            return $error;
        }

        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson($response);

        return $authresponse;
    }

    /**
     * @param $payment_id
     * @return AuthorizeResponse|BaseResponse
     */
    public function authorizeConfirm($payment_id)
    {
        try {
            $request = new Request($this);
            $response = $request->post($this, "/v1/payments/credit/".$payment_id."/confirm", "");
        } catch (\Exception $e) {
            $error = new BaseResponse();
            $error->mapperJson(json_decode($e->getMessage(), true));

            return $error;
        }

        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson($response);

        return $authresponse;
    }

    /**
     * @param $payment_id
     * @param $payer_authentication_response
     * @return AuthorizeResponse|BaseResponse
     */
    public function authorizeConfirmDebit($payment_id, $payer_authentication_response)
    {
        try {
            $payer_authentication_response = array("payer_authentication_response" => $payer_authentication_response);
            $request = new Request($this);
            $response = $request->post($this, "/v1/payments/debit/".$payment_id."/authenticated/finalize", json_encode($payer_authentication_response));
        } catch (\Exception $e) {
            $error = new BaseResponse();
            $error->mapperJson(json_decode($e->getMessage(), true));

            return $error;
        }

        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson($response);

        return $authresponse;
    }

    /**
     * @param $payment_id
     * @param $amount_val
     * @return AuthorizeResponse|BaseResponse
     */
    public function authorizeCancel($payment_id, $amount_val)
    {
        $amount = array("amount" => $amount_val);

        try {
            $request = new Request($this);
            $response = $request->post($this, "/v1/payments/credit/".$payment_id."/cancel", json_encode($amount));
        } catch (\Exception $e) {
            $error = new BaseResponse();
            $error->mapperJson(json_decode($e->getMessage(), true));

            return $error;
        }

        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson($response);

        return $authresponse;
    }

    /**
     * @param Transaction $transaction
     * @return BaseResponse|BoletoResponse
     */
    public function boleto(Transaction $transaction)
    {
        try {
            $request = new Request($this);
            $response = $request->post($this, "/v1/payments/boleto", $transaction->toJSON());
        } catch (\Exception $e) {
            $error = new BaseResponse();
            $error->mapperJson(json_decode($e->getMessage(), true));

            return $error;
        }

        $boletoresponse = new BoletoResponse();
        $boletoresponse->mapperJson($response);
        $boletoresponse->setBaseUrl($request->getBaseUrl());
        $boletoresponse->generateLinks();

        return $boletoresponse;
    }
}
