<?php

namespace Tests\Functional;

use Getnet\API\Transaction;

class AuthorizeDelayedTransactionTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    public function testAuthorizeDelayedTransaction()
    {
        /** @var Transaction $transaction */
        $transaction = $this->createCardTransaction('credit', true);

        $response = $this->getnet->authorize($transaction);

        $this->assertEquals('AUTHORIZED', $response->getStatus());
        $this->assertNotNull($response);

        $paymentId = $response->getPaymentId();

        $this->assertNotNull($paymentId);
        $this->assertNotEmpty($paymentId);

        $capture = $this->getnet->authorizeConfirm($paymentId);

        $this->assertEquals('CONFIRMED', $capture->getStatus());
        $this->assertNotNull($capture);
    }
}
