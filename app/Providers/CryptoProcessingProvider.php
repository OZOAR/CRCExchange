<?php

namespace App\Providers;

use App\Services\CryptoProcessing\Contracts\CPExchangerContract;
use App\Services\CryptoProcessing\Contracts\CPRatesContract;
use App\Services\CryptoProcessing\CPExchangerService;
use App\Services\CryptoProcessing\CPRatesService;
use App\Services\ExternalValidators\BtcValidator;
use App\Services\ExternalValidators\Contracts\BtcValidatorContract;
use Illuminate\Support\ServiceProvider;

class CryptoProcessingProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CPRatesContract::class, function () {
            return new CPRatesService();
        });

        $this->app->singleton(CPExchangerContract::class, function () {
            return new CPExchangerService();
        });

        $this->app->singleton(BtcValidatorContract::class, function () {
            return new BtcValidator();
        });
    }
}
