<?php

namespace App\Helpers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

trait TemporaryIntegrationHelper
{
    public function getRatesNew($currs, $crypts)
    {
        $partner = 'exrate';
        $userId = 'support@exrate.cc';

        $data = [];

        if (Cache::has('crypto_curses')) {
            $data = Cache::get('crypto_curses');
        } else {

            foreach ($currs as $currency) {
                foreach ($crypts as $crypt) {
                    $url = 'https://indacoin.com/api/GetCoinConvertAmountOut/' . $currency . '/' . $crypt . '/1/' . $partner . '/' . $userId;
                    $val = (float)file_get_contents($url);

                    if ($val > 0) {
                        $data[$currency][$crypt] = $val;
                    } else {
                        $data[$currency][$crypt] = 0;
                    }
                }
            }

            Cache::put('crypto_curses', $data);
        }
        return $data;
    }

    public function getRates()
    {
        $endpointURL = '/rates/acquiring?gateway=crypto_card';
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
            \Log::debug('request: amount=' . $amount . ', btcAddress=' . $btcAddress);
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

            \Log::debug((string)$response->getBody());

            return \GuzzleHttp\json_decode($response->getBody())->data;
        } catch (RequestException $e) {
            \Log::error($e->getMessage());
        }

        return null;
    }
}