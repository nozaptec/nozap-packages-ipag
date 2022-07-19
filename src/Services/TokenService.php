<?php

namespace Nozap\IPag\Services;

use Illuminate\Support\Facades\Http;

class TokenService extends IPagBaseClient
{
    /**
     * Cria um novo token
     * @param array $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function newToken(array $params): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/resources/card_tokens'), $params);
    }

    /**
     * Consulta um token
     * @param $token
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function getToken(string $token): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->get($this->getEndpoint('/service/resources/card_tokens?token=' . $token));
    }
}
