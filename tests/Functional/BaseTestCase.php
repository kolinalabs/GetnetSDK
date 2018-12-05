<?php

namespace Tests\Functional;

use Getnet\API\Getnet;
use Getnet\API\Token;
use Getnet\API\Transaction;
use PHPUnit\Framework\TestCase;

/**
 * BaseTestCase
 *
 * @author Gianluca Bine <gian_bine@hotmail.com>
 */
class BaseTestCase extends TestCase
{
    /** @var Getnet */
    protected $getnet;

    /**
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->getnet = new Getnet(
            "c076e924-a3fe-492d-a41f-1f8de48fb4b1",
            "bc097a2f-28e0-43ce-be92-d846253ba748",
            "SANDBOX"
        );
    }

    /**
     * @return Transaction
     */
    protected function createBoletoTranscation()
    {
        /** @var Transaction $transaction */
        $transaction = $this->createTransaction(false);

        $transaction->Boleto("000001946598")
            ->setDocumentNumber("170500000019763")
            ->setExpirationDate("21/11/2018")
            ->setProvider("santander")
            ->setInstructions("Não receber após o vencimento");

        return $transaction;
    }

    /**
     * @param $type
     * @param bool $delayed
     * @param bool $preAuthorization
     * @param string $numberOfInstallments
     * @return Transaction
     * @throws \Exception
     */
    protected function createCardTransaction(
        $type,
        $delayed = false,
        $preAuthorization = false,
        $numberOfInstallments = '1'
    ) {
        /** @var Transaction $transaction */
        $transaction = $this->createTransaction();

        $card = new Token("5155901222280001", "customer_210818263", $this->getnet);
        $transaction->$type("")
            ->setAuthenticated(false)
            ->setDynamicMcc("1799")
            ->setSoftDescriptor("LOJA*TESTE*COMPRA-123")
            ->setDelayed($delayed)
            ->setPreAuthorization($preAuthorization)
            ->setNumberInstallments($numberOfInstallments)
            ->setSaveCardData(false)
            ->setTransactionType("FULL")
            ->Card($card)
            ->setBrand("MasterCard")
            ->setExpirationMonth("12")
            ->setExpirationYear("20")
            ->setCardholderName("Bruno Paz")
            ->setSecurityCode(123);

        $transaction->Device("hash-device-id")->setIpAddress("127.0.0.1");

        return $transaction;
    }

    /**
     * @param bool $shipping
     * @return Transaction
     */
    private function createTransaction($shipping = true)
    {
        $transaction = new Transaction();
        $transaction->setSellerId("1955a180-2fa5-4b65-8790-2ba4182a94cb");
        $transaction->setCurrency("BRL");
        $transaction->setAmount("1000");

        $transaction->Customer("customer_210818263")
            ->setDocumentType("CPF")
            ->setEmail("customer@email.com.br")
            ->setFirstName("Bruno")
            ->setLastName("Paz")
            ->setName("Bruno Paz")
            ->setPhoneNumber("5551999887766")
            ->setDocumentNumber("12345678912")
            ->BillingAddress("90230060")
            ->setCity("São Paulo")
            ->setComplement("Sala 1")
            ->setCountry("Brasil")
            ->setDistrict("Centro")
            ->setNumber("1000")
            ->setPostalCode("90230060")
            ->setState("SP")
            ->setStreet("Av. Brasil");

        if ($shipping) {
            $transaction->Shippings("")
                ->setEmail("customer@email.com.br")
                ->setFirstName("João")
                ->setName("João da Silva")
                ->setPhoneNumber("5551999887766")
                ->ShippingAddress("90230060")
                ->setCity("Porto Alegre")
                ->setComplement("Sala 1")
                ->setCountry("Brasil")
                ->setDistrict("São Geraldo")
                ->setNumber("1000")
                ->setPostalCode("90230060")
                ->setState("RS")
                ->setStreet("Av. Brasil");
        }

        $transaction->Order("123456")
            ->setProductType("service")
            ->setSalesTax("0");

        return $transaction;
    }
}
