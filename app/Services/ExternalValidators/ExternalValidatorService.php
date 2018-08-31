<?php

namespace App\Services\ExternalValidators;

use App\Services\ExternalValidators\Contracts\ExternalValidatorContract;
use GuzzleHttp\Exception\RequestException;

class ExternalValidatorService implements ExternalValidatorContract
{
    const DELIMITER = '/';

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $options;

    public function validate()
    {
        $client = new \GuzzleHttp\Client();
        $result = ['success' => false];

        try {
            $response = $client->get($this->endpoint, $this->options);

            $result['success'] = true;
            $result['data'] = \GuzzleHttp\json_decode($response->getBody()->getContents());
        } catch (RequestException $e) {
            \Log::error(__CLASS__ . ': ' .$e->getMessage());

            $result['message'] = $e->hasResponse()
                ? $e->getResponse()->getBody()
                : trans('validation.messages.btcField.error');
        }

        return $result;
    }

    public function setConfiguration($endpoint, $options = null)
    {
        $this->endpoint = $endpoint;
        $this->options = $options;
    }
}