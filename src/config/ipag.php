<?php

return [
    // 'base' = ambiente de produção / 'sandbox' = ambiente de teste
    'endpoint' => env('IPAG_ENDPOINT', 'sandbox'),

    // usuário de ambiente
    'username' => env('IPAG_USERNAME'),

    // senha do usuário de ambiente
    'password' => env('IPAG_PASSWORD'),

    // definição de recursos
    'resources' => [

        // cartão padrão usado em ambiente sandbox
        'card' => [
            // cartão aprovado
            'holder' => 'NOZAP CARD',
            'number' => '4111 1111 1111 1111',
            'expiry_month' => '01',
            'expiry_year'  => '2025',
            'cvv' => '123',

            // cartão recusado
            'invalid_holder' => 'NOZAP INVALID CARD',
            'invalid_number' => '4916 5733 8093 7962',
            'invalid_expiry_month' => '12',
            'invalid_expiry_year'  => '2028',
            'invalid_cvv' => '123'
        ],

        'customer' => [
            'name' => 'Jack Jins',
            'cpf_cnpj' => '248.379.080-12',
        ],

        'customer_cnpj' => [
            'name' => 'NOZAP TECNOLOGIA',
            'cpf_cnpj' => '34.269.536/0001-29',
        ],

    ],
];
