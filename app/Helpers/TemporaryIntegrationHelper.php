<?php

namespace App\Helpers;

use GuzzleHttp\Exception\RequestException;

trait TemporaryIntegrationHelper
{
    public function getRates()
    {
        $endpointURL = '/rates/acquiring?gateway=cryptocard';
        $requestURL = env('CRYPTOPROCESSING_API_URL') . '/' . env('CRYPTOPROCESSING_API_PREFIX') . '/'
            . env('CRYPTOPROCESSING_API_VERSION') . $endpointURL;

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->get($requestURL, [
                'headers' => [
                    'Authorization' => 'Token ' . env('CRYPTOPROCESSING_API_KEY'),
                ],
            ]);

            return \GuzzleHttp\json_decode($response->getBody())->data;
        } catch (RequestException $e) {
            \Log::error($e->getMessage());
        }

        return null;
    }

    public function executePayment($amount, $btcAddress)
    {
        $endpointURL = '/orders';
        $requestURL = env('CRYPTOPROCESSING_API_URL') . '/' . env('CRYPTOPROCESSING_API_PREFIX') . '/'
            . env('CRYPTOPROCESSING_API_VERSION') . $endpointURL;

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post($requestURL, [
                \GuzzleHttp\RequestOptions::HEADERS => [
                    'Authorization' => 'Token ' . env('CRYPTOPROCESSING_API_KEY'),
                ],
                \GuzzleHttp\RequestOptions::JSON    => [
                    'amount'                   => $amount,
                    'currency'                 => 'EUR',
                    'external_payout_currency' => 'BTC',
                    'external_payout_address'  => $btcAddress,
                ],
            ]);

            return \GuzzleHttp\json_decode($response->getBody())->data;
        } catch (RequestException $e) {
            \Log::error($e->getMessage());
        }

        return null;
    }
}