<?php

namespace Tests\Functional;

use Getnet\API\Card;
use Getnet\API\Credit;
use Getnet\API\Customer;
use Getnet\API\Environment;
use Getnet\API\Getnet;
use Getnet\API\Order;
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
        $environment = Environment::sandbox();

        $this->getnet = new Getnet(
            "c076e924-a3fe-492d-a41f-1f8de48fb4b1",
            "bc097a2f-28e0-43ce-be92-d846253ba748",
            $environment,
            null
        );
    }

    /**
     * @return Transaction
     */
    protected function createBoletoTranscation()
    {
        /** @var Transaction $transaction */
        $transaction = $this->createTransaction(false);

        $transaction->boleto("000001946598")
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

        // Gera token do cartão - Obrigatório
        $tokenCard = new Token("5155901222280001", "customer_210818263", $this->getnet);
        $transaction->$type()
            ->setAuthenticated(false)
            ->setDynamicMcc("1799")
            ->setSoftDescriptor("LOJA*TESTE*COMPRA-123")
            ->setDelayed($delayed)
            ->setPreAuthorization($preAuthorization)
            ->setNumberInstallments($numberOfInstallments)
            ->setSaveCardData(false)
            ->setTransactionType(Credit::TRANSACTION_TYPE_FULL)
            ->card($tokenCard)
                ->setBrand(Card::BRAND_MASTERCARD)
                ->setExpirationMonth("12")
                ->setExpirationYear("20")
                ->setCardholderName("Jax Teller")
                ->setSecurityCode("123");

        $transaction->device("hash-device-id")->setIpAddress("127.0.0.1");

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
        $transaction->setAmount(1000);

        // Detalhes do Pedido
        $transaction->order("123456")
            ->setProductType(Order::PRODUCT_TYPE_SERVICE)
            ->setSalesTax(0);

        // Dados pessoais do comprador
        $transaction->customer("customer_210818263")
            ->setDocumentType(Customer::DOCUMENT_TYPE_CPF)
            ->setEmail("customer@email.com.br")
            ->setFirstName("Jax")
            ->setLastName("Teller")
            ->setName("Jax Teller")
            ->setPhoneNumber("5551999887766")
            ->setDocumentNumber("12345678912")
            ->billingAddress()
                ->setCity("São Paulo")
                ->setComplement("Sons of Anarchy")
                ->setCountry("Brasil")
                ->setDistrict("Centro")
                ->setNumber("1000")
                ->setPostalCode("90230060")
                ->setState("SP")
                ->setStreet("Av. Brasil");

        if ($shipping) {
            // Dados de entrega do pedido
            $transaction->shipping()
                ->setFirstName("Jax")
                ->setEmail("customer@email.com.br")
                ->setName("Jax Teller")
                ->setPhoneNumber("5551999887766")
                ->setShippingAmount(0)
                ->address()
                    ->setCity("Porto Alegre")
                    ->setComplement("Sons of Anarchy")
                    ->setCountry("Brasil")
                    ->setDistrict("São Geraldo")
                    ->setNumber("1000")
                    ->setPostalCode("90230060")
                    ->setState("RS")
                    ->setStreet("Av. Brasil");
        }

        $transaction->order("123456")
            ->setProductType(Order::PRODUCT_TYPE_SERVICE)
            ->setSalesTax("0");

        return $transaction;
    }
}
