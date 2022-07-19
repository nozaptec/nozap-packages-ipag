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
        $this->endpoint = config('ipag.endpoint');
        $this->username = config('ipag.username');
        $this->password = config('ipag.password');
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
