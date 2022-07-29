<?php

namespace Nozap\IPag\Services;

use Illuminate\Support\Facades\Http;

class SubscriptionService extends IPagBaseClient
{
    /**
     * Cria uma nova assinatura
     * @param array $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function create(array $params): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/resources/subscriptions'), $params);
    }

    /**
     * Altera uma assinatura
     * @param string $subscriptionId
     * @param array $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function update(string $subscriptionId, array $params): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->put($this->getEndpoint('/service/resources/subscriptions?id=' . $subscriptionId), $params);
    }

    /**
     * Consulta uma assinatura
     * @param string $subscriptionId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function find(string $subscriptionId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/resources/subscriptions?id=' . $subscriptionId));
    }

    /**
     * Lista todas as assinaturas
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function all(): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/resources/subscriptions'));
    }

    /**
     * Desvincula o token da assinatura
     * @param string $subscriptionId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function unlinkToken(string $subscriptionId): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->delete($this->getEndpoint('/service/subscriptions/' . $subscriptionId . '/card_token'));
    }

    /**
     * Serviço responsável por gerenciar as parcelas da assinatura
     * @return InstallmentsService
     */
    public function installments(): InstallmentsService
    {
        return new InstallmentsService($this->endpoint, $this->username, $this->password);
    }
}
