<?php

namespace Nozap\IPag\Contracts;

interface IPagInterface
{
    /** @var string default base URL for IPag's API */
    const DEFAULT_API_BASE = 'https://api.ipag.com.br';

    /** @var string default sandbox URL for IPag's API */
    const DEFAULT_API_SANDBOX = 'https://sandbox.ipag.com.br';
}
