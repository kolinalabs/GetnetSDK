<?php

namespace Tests\Functional;

class DebitTransactionTest extends BaseTestCase
{
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
        curl_setopt_array($curl, [
            CURLOPT_URL            => $response->getRedirectUrl(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "MD=" . $response->getIssuerPaymentId() . "&PaReq=" . $response->getPayerAuthenticationRequest() . "&TermUrl=" . $URL_NOTIFY,
            CURLOPT_HTTPHEADER     => [
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded"
            ],
        ]);
        $response_curl = curl_exec($curl);
        curl_close($curl);

        // DEVERÁ SER COLETADO - demo abaixo
        $payerAuthenticationResponse = "im2qu4ap639nl9lof2pobdh8q8jm99nb3zbu1gc5kj8o2vftnp9488tjn2e2r3qlgqd8qevggbds7on81c9r496v1sobmnxip0zrecdgezm6omfd94sn11y6sv2rpicb9g75p7g51esccfxc13ng1jcglv4rr52000z5zt12o9r5nl6l36amnvdplb9an1a0d0tg2qxwdb0bpg6dqrsll8snj7k64wpkx1kpztktgzhogpi9qyryej3ib6uyaovdnu3c0jnoa6yd4ljnwhbjsle9a47e800k4ln269kw5puhucxnch0dfc8u9969o9nweukgvxfe393zuhlwnwmaamrm8xxfyoad95419wqe2ejtezpvseaky7vppm68x7yvf182oc0xh93stpbst73dh64klc54mzuke9n9u3qgisi1s8ps3c2royvup6d065nebc1fxzmqjjnyty2d6q5wbbmetgco8lm3rrjvi8jtc0nmsp4k9c9x";

        $response = $this->getnet->authorizeConfirmDebit($paymentId, $payerAuthenticationResponse);

        $this->assertEquals('APPROVED', $response->getStatus());
        $this->assertNotNull($response);
    }
}
