<?php

namespace App\Services\CryptoProcessing;

use App\Builders\CPEndpointBuilder;
use App\Services\CryptoProcessing\Contracts\CPExchangerContract;

class CPExchangerService extends AbstractExchanger implements CPExchangerContract
{
    use CPExchangerPreparing;

    /**
     * Create order for the transaction.
     *
     * @param $amount
     * @param $btcAddress
     *
     * @return mixed
     */
    public function createOrder($amount, $btcAddress)
    {
        \Log::debug('Create Order Data: amount=' . $amount . ', btcAddress=' . $btcAddress);

        $endpoint = CPEndpointBuilder::point()->to('/orders')->make();
        $options = $this->prepareCreateOrderOptions($amount, $btcAddress);

        $this->setConfiguration($endpoint, $options);
        \Log::debug('Create Order Options:', $this->options);

        return $this->executePostRequest(); // TODO get 'data'
    }
}