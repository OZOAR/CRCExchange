<?php

namespace App\Providers;

use App\Services\ExternalValidators\BtcValidator;
use App\Services\ExternalValidators\Contracts\BtcValidatorContract;
use Illuminate\Support\ServiceProvider;

class CryptoProcessingIntegrationProvider extends ServiceProvider
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
        $this->app->singleton(BtcValidatorContract::class, function () {
            return new BtcValidator();
        });
    }
}
