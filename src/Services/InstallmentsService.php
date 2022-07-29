<?php

namespace Nozap\IPag\Services;

use Illuminate\Support\Facades\Http;

class InstallmentsService extends SubscriptionService
{
    /**
     * Quita a parcela da assinatura
     * @param string $subscriptionId
     * @param string $invoiceNumber
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function pay(string $subscriptionId, string $invoiceNumber): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/resources/invoice_installments?subscription_id=' . $subscriptionId . '&invoice_number=' . $invoiceNumber . '&action=pay'));
    }

    /**
     * Agenda o pagamento da parcela da assinatura
     * @param string $subscriptionId
     * @param string $invoiceNumber
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     * @throws \Exception
     */
    public function schedule(string $subscriptionId, string $invoiceNumber): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return Http::withBasicAuth($this->username, $this->password)
            ->post($this->getEndpoint('/service/resources/invoice_installments?subscription_id=' . $subscriptionId . '&invoice_number=' . $invoiceNumber . '&action=schedule'));
    }
}
