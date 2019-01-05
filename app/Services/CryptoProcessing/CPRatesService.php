<?php

namespace App\Services\CryptoProcessing;

use App\Builders\CPEndpointBuilder;
use App\Services\AbstractExchanger;
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
        $response = $this->executeGetRequest();

        return $response === null ? null : $response->data;
    }
}