<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 22:24
 */

namespace Getnet\API;

/**
 * Class Exception
 * @package Getnet\API
 */
class Exception extends \ErrorException
{
    // custom string representation of object
    /**
     * @return string
     */
    public function __toString()
    {
        return "[{$this->code}]: {$this->message}\n";
    }
}
