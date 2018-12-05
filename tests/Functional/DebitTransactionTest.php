<?php

namespace Tests\Functional;

class DebitTransactionTest extends BaseTestCase
{
    protected function setUp()
    {
        $this->markTestSkipped();
    }

    /**
     * @throws \Exception
     */
    public function testAuthorizeDebitTransaction()
    {
        $transaction = $this->createCardTransaction('debit', true);

        $response = $this->getnet->authorize($transaction);

        $this->assertEquals('PENDING', $response->getStatus());
        $this->assertNotNull($response);

        $paymentId = $response->getPaymentId();

        $this->assertNotNull($paymentId);
        $this->assertNotEmpty($paymentId);

        $URL_NOTIFY = urlencode("https://azpay.com.br/receiver");

        // EMULA POST
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $response->getRedirectUrl(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "MD=" . $response->getIssuerPaymentId() . "&PaReq=" . $response->getPayerAuthenticationRequest() . "&TermUrl=" . $URL_NOTIFY,
            CURLOPT_HTTPHEADER     => array(
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));
        $response_curl = curl_exec($curl);

        curl_close($curl);
        $word = explode("VALUE=", $response_curl);

        $payerAuthenticationResponse = trim(str_replace(' escapeXml="false"/>', "", strip_tags($word[1])));

        $capture = $this->getnet->authorizeConfirmDebit($paymentId, $payerAuthenticationResponse);

        $this->assertEquals('CONFIRMED', $capture->getStatus());
        $this->assertNotNull($capture);
    }
}
