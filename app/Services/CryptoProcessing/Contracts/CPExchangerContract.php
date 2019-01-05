<?php

namespace App\Services\CryptoProcessing\Contracts;

interface CPExchangerContract
{
    /**
     * Create order for the transaction.
     *
     * @param $amount
     * @param $btcAddress
     *
     * @return mixed
     */
    public function createOrder($amount, $btcAddress);

    /**
     * Prepare data for the creating order.
     *
     * @param $amount
     * @param $btcAddress
     *
     * @return mixed
     */
    public function prepareCreateOrderOptions($amount, $btcAddress);
}