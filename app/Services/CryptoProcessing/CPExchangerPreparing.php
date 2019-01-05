<?php

namespace App\Services\CryptoProcessing;

trait CPExchangerPreparing
{
    /**
     * Prepare data for the creating order.
     *
     * @param $amount
     * @param $btcAddress
     *
     * @return mixed
     */
    public function prepareCreateOrderOptions($amount, $btcAddress)
    {
        return [
            \GuzzleHttp\RequestOptions::JSON => [
                'amount'                   => $amount,
                'currency'                 => 'EUR',
                'external_payout_currency' => 'BTC',
                'external_payout_address'  => $btcAddress,
            ],
        ];
    }
}