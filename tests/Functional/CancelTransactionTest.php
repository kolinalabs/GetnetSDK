<?php

namespace Tests\Functional;

use Getnet\API\Transaction;

class CancelTransactionTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    public function testCancelDelayedTransaction()
    {
        /** @var Transaction $transaction */
        $transaction = $this->createCardTransaction('credit', true);

        $response = $this->getnet->authorize($transaction);

        $this->assertEquals('AUTHORIZED', $response->getStatus());
        $this->assertNotNull($response);

        $paymentId = $response->getPaymentId();
        $amount = $response->getAmount();

        $this->assertNotNull($paymentId);
        $this->assertNotEmpty($paymentId);

        $capture = $this->getnet->authorizeCancel($paymentId, $amount);

        $this->assertEquals('CANCELED', $capture->getStatus());
        $this->assertNotNull($capture);
    }

    /**
     * @throws \Exception
     */
    public function testCancelTransaction()
    {
        $transaction = $this->createCardTransaction('credit');

        $response = $this->getnet->authorize($transaction);

        $this->assertEquals('APPROVED', $response->getStatus());
        $this->assertNotNull($response);

        $paymentId = $response->getPaymentId();
        $amount = $response->getAmount();

        $this->assertNotNull($paymentId);
        $this->assertNotEmpty($paymentId);

        $capture = $this->getnet->authorizeCancel($paymentId, $amount);

        $this->assertEquals('CANCELED', $capture->getStatus());
        $this->assertNotNull($capture);
    }
}
