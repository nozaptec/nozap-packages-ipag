<?php

namespace Nozap\IPag\Services;

use Illuminate\Support\Facades\Http;

class PlanService extends IPagBaseClient
{
    /**
     * Cria um novo plano de assinatura
     * @param array $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function create(array $params): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/resources/plans'), $params);
    }

    /**
     * Altera um plano de assinatura
     * @param string $planId
     * @param array $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function update(string $planId, array $params): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->put($this->getEndpoint('/service/resources/plans?id=' . $planId), $params);
    }

    /**
     * Consulta um plano de assinatura
     * @param string $planId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function find(string $planId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/resources/plans?id=' . $planId));
    }

    /**
     * Lista todos os planos de assinatura
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function all(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/resources/plans'));
    }

    /**
     * Deleta um plano de assinatura
     * @param string $planId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function delete(string $planId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->delete($this->getEndpoint('/service/resources/plans?id=' . $planId));
    }
}
