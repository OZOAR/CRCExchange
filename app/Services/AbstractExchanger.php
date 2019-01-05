<?php

namespace App\Services\CryptoProcessing;

use App\Services\ExchangerTrait;

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
    public function setConfiguration($endpoint, $options = null)
    {
        $this->endpoint = $endpoint;
        $this->options = $options;
    }
}