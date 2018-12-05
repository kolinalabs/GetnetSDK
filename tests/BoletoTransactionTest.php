<?php

namespace Getnet\API\Tests;

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

        $response = $this->getnet->Boleto($transaction);

        $this->assertEquals('EM ABERTO', $response->getStatus());
        $this->assertNotNull($response);
    }
}
