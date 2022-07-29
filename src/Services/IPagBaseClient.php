<?php

namespace Nozap\IPag\Services;

use Nozap\IPag\Contracts\IPagInterface;
use Nozap\IPag\Resources\GenerateResource;

class IPagBaseClient implements IPagInterface
{
    public function __construct(protected string $endpoint, protected string $username, protected string $password) { }

    /**
     * Serviço responsável por gerenciar pagamentos
     * @return PaymentService
     */
    public function payment(): PaymentService
    {
        return new PaymentService($this->endpoint, $this->username, $this->password);
    }

    /**
     * Serviço responsável por gerenciar clientes
     * @return CustomerService
     */
    public function customer(): CustomerService
    {
        return new CustomerService($this->endpoint, $this->username, $this->password);
    }

    /**
     * Serviço responsável por gerenciar planos de assinatura
     * @return PlanService
     */
    public function plan(): PlanService
    {
        return new PlanService($this->endpoint, $this->username, $this->password);
    }

    /**
     * Serviço responsável por gerenciar assinaturas
     * @return SubscriptionService
     */
    public function subscription(): SubscriptionService
    {
        return new SubscriptionService($this->endpoint, $this->username, $this->password);
    }

    /**
     * Serviço responsável por gerenciar transações
     * @return TransactionService
     */
    public function transaction(): TransactionService
    {
        return new TransactionService($this->endpoint, $this->username, $this->password);
    }

    /**
     * Serviço responsável por tokenização de cartão de crédito
     * @return TokenService
     */
    public function token(): TokenService
    {
        return new TokenService($this->endpoint, $this->username, $this->password);
    }

    /**
     * Recurso responsável por gerar cartões de teste
     * @return GenerateResource
     */
    public static function generate(): GenerateResource
    {
        return new GenerateResource();
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
