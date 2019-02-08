<?php

namespace Tests\Functional;

use Getnet\API\Transaction;

class VerifyCardTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    public function testVerifyCard()
    {
        /** @var Transaction $transaction */
        $transaction = $this->createCardTransaction('credit');

        $card = $transaction->getCredit()->getCard();

        $response = $this->getnet->verifyCard($card);

        $this->assertEquals('VERIFIED', $response->getStatus());
        $this->assertNotNull($response);
    }
}
