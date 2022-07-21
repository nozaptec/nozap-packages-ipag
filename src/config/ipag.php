<?php

return [
    // 'base' = ambiente de produção / 'sandbox' = ambiente de teste
    'endpoint' => env('IPAG_ENDPOINT', 'sandbox'),

    // usuário de ambiente
    'username' => env('IPAG_USERNAME'),

    // senha do usuário de ambiente
    'password' => env('IPAG_PASSWORD')
];
