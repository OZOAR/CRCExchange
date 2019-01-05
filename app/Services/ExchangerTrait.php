<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;

trait ExchangerTrait
{
    /**
     * Execute POST request.
     *
     * @return mixed
     */
    public function executePostRequest()
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post($this->endpoint, $this->options);

            return \GuzzleHttp\json_decode($response->getBody());
        } catch (RequestException $e) {
            \Log::error($e->getMessage(), $e->getTraceAsString());
            return null;
        }
    }

    /**
     * Execute GET request.
     *
     * @return mixed
     */
    public function executeGetRequest()
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->get($this->endpoint, $this->options);

            return \GuzzleHttp\json_decode($response->getBody());
        } catch (RequestException $e) {
            \Log::error($e->getMessage(), $e->getTraceAsString());
            return null;
        }
    }

    /**
     * Get integration token.
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getToken()
    {
        return config('exchanger.api.token');
    }
}