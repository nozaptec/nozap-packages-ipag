<?php

namespace Nozap\IPag\Services;

use Nozap\IPag\Contracts\IPagInterface;

class IPagBaseClient implements IPagInterface
{
    protected string $endpoint;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->endpoint = 'sandbox';
        $this->username = 'joaovsvieira.me@gmail.com';
        $this->password = '3BE6-FCA05646-CE4A5AC8-613B62C4-E4A0';
    }

    /**
     * Tokenização de Cartão de Crédito
     * @return TokenService
     */
    public function token(): TokenService
    {
        $obj = new TokenService();
        return $obj;
    }

    /**
     * @param $path
     * @return string
     * @throws \Exception
     */
    protected function getEndpoint($path): string
    {
        return match ($this->endpoint) {
            'base'    => self::DEFAULT_API_BASE . $path,
            'sandbox' => self::DEFAULT_API_SANDBOX . $path,
            default => throw new \Exception('Essa url não existe!'),
        };
    }
}
