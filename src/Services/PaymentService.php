<?php

namespace Nozap\IPag\Services;

use Illuminate\Support\Facades\Http;

class PaymentService extends IPagBaseClient
{
    /**
     * Cria um novo pagamento
     * @param array $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function create(array $params): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/payment'), $params);
    }

    /**
     * Consulta um pagamento
     * @param string $paymentId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function find(string $paymentId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/consult?id=' . $paymentId));
    }

    /**
     * Captura um pagamento
     * @param string $paymentId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function capture(string $paymentId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/capture?id=' . $paymentId));
    }

    /**
     * Cancela um pagamento
     * @param string $paymentId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function cancel(string $paymentId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/cancel?id=' . $paymentId));
    }

    /**
     * Simula a captura de um pagamento em ambiente sandbox
     * @param string $paymentId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function captureInSandbox(string $paymentId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/transaction/simulate_capture'), [
                'id' => $paymentId,
            ]);
    }
}
