<?php

namespace App\Services\CryptoProcessing;

use App\Builders\CPEndpointBuilder;
use App\Services\CryptoProcessing\Contracts\CPRatesContract;

class CPRatesService extends AbstractExchanger implements CPRatesContract
{
    /**
     * Get actual rates.
     *
     * @return array|null
     */
    public function getRates()
    {
        $endpoint = CPEndpointBuilder::point()
            ->to('/rates/acquiring')
            ->to('?gateway=crypto_card')
            ->make();

        $this->setConfiguration($endpoint);
        return $this->executeGetRequest(); // TODO get 'data'
    }
}