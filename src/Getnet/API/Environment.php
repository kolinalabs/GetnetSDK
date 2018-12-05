<?php

namespace Getnet\API;

/**
 * Class Environment
 *
 * @package Getnet\API
 */
class Environment
{

    /** @var */
    private $api;

    /**
     * Environment constructor.
     * @param $api
     */
    private function __construct($api)
    {
        $this->api = $api;
    }

    /**
     * @return Environment
     */
    public static function sandbox()
    {
        return new Environment('https://api-sandbox.getnet.com.br');
    }

    /**
     * @return Environment
     */
    public static function homolog()
    {
        return new Environment('https://api-homologacao.getnet.com.br');
    }

    /**
     * @return Environment
     */
    public static function production()
    {
        return new Environment('https://api.getnet.com.br');
    }

    /**
     * @return mixed
     */
    public function getApiUrl()
    {
        return $this->api;
    }
}
