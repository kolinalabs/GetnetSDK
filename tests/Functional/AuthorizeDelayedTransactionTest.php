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
        $transaction = $this->createCardTransaction('Credit', true);

        $response = $this->getnet->Authorize($transaction);

        $this->assertEquals('AUTHORIZED', $response->getStatus());
        $this->assertNotNull($response);

        $paymentId = $response->getPaymentId();

        $this->assertNotNull($paymentId);
        $this->assertNotEmpty($paymentId);

        $capture = $this->getnet->AuthorizeConfirm($paymentId);

        $this->assertEquals('CONFIRMED', $capture->getStatus());
        $this->assertNotNull($capture);
    }
}
