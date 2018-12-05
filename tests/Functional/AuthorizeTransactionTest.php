<?php

namespace Tests\Functional;

use Getnet\API\Transaction;

class AuthorizeTransactionTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    public function testAuthorizeTransaction()
    {
        /** @var Transaction $transaction */
        $transaction = $this->createCardTransaction('credit');

        $response = $this->getnet->authorize($transaction);

        $this->assertEquals('APPROVED', $response->getStatus());
        $this->assertNotNull($response);
    }
}
