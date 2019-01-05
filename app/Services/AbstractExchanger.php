<?php

namespace App\Services;

use \GuzzleHttp\RequestOptions;

abstract class AbstractExchanger
{
    use ExchangerTrait;

    const DELIMITER = '/';

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $options;

    /**
     * Set configuration for the request.
     *
     * @param $endpoint
     * @param $options
     */
    protected function setConfiguration($endpoint, $options = [])
    {
        $this->endpoint = $endpoint;
        $this->options = $options;

        $this->defineHeaders();
    }

    protected function defineHeaders()
    {
        $this->options[RequestOptions::HEADERS]['Authorization'] = 'Token ' . $this->getToken();
    }
}