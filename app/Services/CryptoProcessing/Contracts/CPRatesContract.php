<?php

namespace App\Services\CryptoProcessing\Contracts;

interface CPRatesContract
{
    /**
     * Get actual rates.
     *
     * @return array|null
     */
    public function getRates();
}