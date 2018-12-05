<?php
namespace Getnet\API;

/**
 * Class Device
 *
 * @package Getnet\API
 */
class Device implements \JsonSerializable
{
    /** @var */
    private $device_id;

    /** @var */
    private $ip_address;

    /**
     * Device constructor.
     * @param $device_id
     */
    public function __construct($device_id)
    {
        $this->device_id = $device_id;
    }

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
    public function getDeviceId()
    {
        return $this->device_id;
    }

    /**
     * @param $device_id
     * @return $this
     */
    public function setDeviceId($device_id)
    {
        $this->device_id = (string)$device_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param $ip_address
     * @return $this
     */
    public function setIpAddress($ip_address)
    {
        $this->ip_address = (string)$ip_address;

        return $this;
    }
}
