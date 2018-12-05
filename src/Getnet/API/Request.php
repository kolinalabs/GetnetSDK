<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 05:52
 */

namespace Getnet\API;

use \Exception;
use Getnet\API\Exception\InvalidCredentialsException;
use Getnet\API\Exception\InvalidEnvironmentException;

/**
 * Class Request
 * @package Getnet\API
 */
class Request
{
    /**
     * Base url from api
     *
     * @var string
     */
    private $baseUrl = '';

    /** @var array */
    private $environmentUrls = [
        'PRODUCTION' => 'https://api.getnet.com.br',
        'HOMOLOG' => 'https://api-homologacao.getnet.com.br',
        'SANDBOX' => 'https://api-sandbox.getnet.com.br'
    ];

    /**
     * Request constructor.
     * @param Getnet $credentials
     * @throws Exception
     */
    public function __construct(Getnet $credentials)
    {
        if (!isset($this->environmentUrls[$credentials->getEnv()])) {
            throw new InvalidEnvironmentException('Ambiente inexistente!');
        }

        $this->baseUrl = $this->environmentUrls[$credentials->getEnv()];

        if ($credentials->debug == true) {
            print_r($this->baseUrl);
        }

        if (empty($credentials->getEnv())) {
            return $this->auth($credentials);
        }
    }

    /**
     * @param Getnet $credentials
     * @return Getnet
     * @throws Exception
     */
    public function auth(Getnet $credentials)
    {
        $url_path = "/auth/oauth/v2/token";

        $params = [
            "scope"      => "oob",
            "grant_type" => "client_credentials"
        ];

        $querystring = http_build_query($params);

        try {
            $response = $this->send($credentials, $url_path, 'AUTH', $querystring);
        } catch (Exception $e) {
            throw new InvalidCredentialsException($e->getMessage());
        }

        $credentials->setAuthorizationToken($response["access_token"]);

        return $credentials;
    }

    /**
     * @param Getnet $credentials
     * @param $url_path
     * @param $method
     * @param null $json
     * @return mixed
     * @throws \Exception
     */
    private function send(Getnet $credentials, $url_path, $method, $json = null)
    {
        $curl = curl_init($this->getFullUrl($url_path));

        $defaultCurlOptions = array(
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_HTTPHEADER     => array('Content-Type: application/json; charset=utf-8'),
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 0
        );

        if ($method == 'POST') {
            $defaultCurlOptions[ CURLOPT_HTTPHEADER ][] = 'Authorization: Bearer ' . $credentials->getAuthorizationToken();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        } elseif ($method == 'PUT') {
            $defaultCurlOptions[ CURLOPT_HTTPHEADER ][] = 'Authorization: Bearer ' . $credentials->getAuthorizationToken();
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        } elseif ($method == 'AUTH') {
            $defaultCurlOptions[ CURLOPT_HTTPHEADER ][0] = 'application/x-www-form-urlencoded';
            curl_setopt($curl, CURLOPT_USERPWD, $credentials->getClientId() . ":" . $credentials->getClientSecret());
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        }
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt_array($curl, $defaultCurlOptions);

        if ($credentials->debug === true) {
            print "\n\nJSON REQUEST\n";
            print_r($json);

            $info = curl_getinfo($curl);
            print_r($info);
            curl_setopt($curl, CURLOPT_VERBOSE, 1);
        }

        try {
            $response = curl_exec($curl);
        } catch (Exception $e) {
            print "ERROR";
        }
        if ($credentials->debug === true) {
            $info = curl_getinfo($curl);
            print_r($info);
            print_r(json_encode(json_decode($response), JSON_PRETTY_PRINT));
        }

        if (isset(json_decode($response)->error)) {
            throw new Exception(json_decode($response)->error_description, 100);
        }

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) >= 400) {
            throw new Exception($response, 100);
        }
        if (!$response) {
            print "ERROR";
            exit;
        }
        curl_close($curl);

        return json_decode($response, true);
    }

    /**
     * Get request full url
     *
     * @param string $url_path
     * @return string $url(config) + $url_path
     */
    private function getFullUrl($url_path)
    {
        if (stripos($url_path, $this->baseUrl, 0) === 0) {
            return $url_path;
        }

        return $this->baseUrl . $url_path;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }


    /**
     * @param Getnet $credentials
     * @param $url_path
     * @return mixed
     * @throws Exception
     */
    public function get(Getnet $credentials, $url_path)
    {
        return $this->send($credentials, $url_path, 'GET');
    }

    /**
     * @param Getnet $credentials
     * @param $url_path
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function post(Getnet $credentials, $url_path, $params)
    {
        return $this->send($credentials, $url_path, 'POST', $params);
    }

    /**
     * @param Getnet $credentials
     * @param $url_path
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function put(Getnet $credentials, $url_path, $params)
    {
        return $this->send($credentials, $url_path, 'PUT', $params);
    }
}
