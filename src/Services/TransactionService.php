<?php

namespace Nozap\IPag\Services;

use Illuminate\Support\Facades\Http;

class TransactionService extends IPagBaseClient
{
    /**
     * Lista todas as transações
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function list(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/resources/transactions'));
    }

    /**
     * Consulta uma transação
     * @param $transactionId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function getTransaction($transactionId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/resources/transactions?id=' . $transactionId));
    }
}
