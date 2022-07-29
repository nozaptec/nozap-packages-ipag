<?php

namespace Nozap\IPag\Services;

use Illuminate\Support\Facades\Http;

class TransactionService extends IPagBaseClient
{
    /**
     * Consulta uma transação
     * @param string $transactionId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function find(string $transactionId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/resources/transactions?id=' . $transactionId));
    }

    /**
     * Lista todas as transações
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function all(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/resources/transactions'));
    }
}
