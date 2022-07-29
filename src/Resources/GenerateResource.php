<?php

namespace Nozap\IPag\Resources;

use JetBrains\PhpStorm\ArrayShape;

class GenerateResource
{
    /**
     * Recurso responsável por gerar cartões para simulação
     * @param bool $type
     * @return array
     */
    #[ArrayShape(['holder' => "\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed", 'number' => "\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed", 'expiry_month' => "\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed", 'expiry_year' => "\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed", 'cvv' => "\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed"])] public function card(bool $type = true)
    {
        if ($type)
            return [
                'holder' => config('ipag.resources.card.holder', 'NOZAP CARD'),
                'number' => config('ipag.resources.card.number', '4111 1111 1111 1111'),
                'expiry_month' => config('ipag.resources.card.expiry_month', '01'),
                'expiry_year'  => config('ipag.resources.card.expiry_year', '25'),
                'cvv' => config('ipag.resources.card.cvv', '123')
            ];

        return [
            'holder' => config('ipag.resources.card.invalid_holder', 'NOZAP INVALID CARD'),
            'number' => config('ipag.resources.card.invalid_number', '4916 5733 8093 7962'),
            'expiry_month' => config('ipag.resources.card.invalid_expiry_month', '12'),
            'expiry_year'  => config('ipag.resources.card.invalid_expiry_year', '28'),
            'cvv' => config('ipag.resources.card.invalid_cvv', '123')
        ];
    }

    public function customer()
    {
        return [
            'name' => config('ipag.resources.customer.name', 'Jack Jins'),
            'cpf_cnpj' => config('ipag.resources.customer.cpf_cnpj', '248.379.080-12')
        ];
    }

    public function customerCnpj()
    {
        return [
            'name' => config('ipag.resources.customer_cnpj.name', 'NOZAP TECNOLOGIA'),
            'cpf_cnpj' => config('ipag.resources.customer_cnpj.cpf_cnpj', '34.269.536/0001-29')
        ];
    }
}
