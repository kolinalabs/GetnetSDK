<?php

namespace Tests\Functional;

use Getnet\API\Transaction;

class BoletoTransactionTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    public function testBoletoTransaction()
    {
        /** @var Transaction $transaction */
        $transaction = $this->createBoletoTranscation();

        $response = $this->getnet->boleto($transaction);

        $this->assertEquals('EM ABERTO', $response->getStatus());
        $this->assertNotNull($response);
    }
}
