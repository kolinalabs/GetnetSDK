<?php

namespace Getnet\API\Tests;

use Getnet\API\Exception\InvalidCredentialsException;
use Getnet\API\Exception\InvalidEnvironmentException;
use Getnet\API\Getnet;
use PHPUnit\Framework\TestCase;

/**
 * EnvironmentTest
 *
 * @author Gianluca Bine <gian_bine@hotmail.com>
 */
class EnvironmentTest extends TestCase
{
    public function testValidEnvironemnts()
    {
        $this->expectException(InvalidCredentialsException::class);

        $availableEnvironments = [
            'SANDBOX',
            'PRODUCTION',
            'HOMOLOG'
        ];

        foreach ($availableEnvironments as $availableEnvironment) {
            $getnet = new Getnet(
                '',
                '',
                $availableEnvironment
            );

            $this->assertNotNull($getnet);
        }
    }

    public function testInvalidEnvironemnt()
    {
        $this->expectException(InvalidEnvironmentException::class);

        $getnet = new Getnet(
            '',
            '',
            'InvalidEnvironment'
        );

        $this->assertNotNull($getnet);
    }
}