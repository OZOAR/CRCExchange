<?php

namespace App\Builders;

use App\Exceptions\ExchangerConfigurationNotFoundException;

class ExchangerEndpointBuilder extends AbstractEndpointBuilder
{
    private function __construct()
    {
        $this->root();
    }

    public function root()
    {
        try {
            $this->endpoint = $this->getExchangerUrl() . $this->getExchangerPrefix() . $this->getExchangerVersion();
        } catch (ExchangerConfigurationNotFoundException $e) {
            \Log::error($e->getTraceAsString());
        }
    }

    public static function point()
    {
        return new ExchangerEndpointBuilder();
    }

    /**
     * Get exchanger URL endpoint.
     *
     * @return \Illuminate\Config\Repository|mixed
     * @throws ExchangerConfigurationNotFoundException
     */
    private function getExchangerUrl()
    {
        $exchangerUrl = config('api.exchanger.url');

        if (empty($exchangerUrl)) {
            \Log::error('Exchanger url is not set.');
            throw new ExchangerConfigurationNotFoundException('Exchanger url is not set.');
        }

        return $exchangerUrl;
    }

    private function getExchangerPrefix()
    {
        $exchangerPrefix = config('api.exchanger.prefix');
        return empty($exchangerPrefix) ? '' : '/' . $exchangerPrefix;
    }

    private function getExchangerVersion()
    {
        $exchangerVersion = config('api.exchanger.version');
        return empty($exchangerVersion) ? '' : '/' . $exchangerVersion;
    }
}