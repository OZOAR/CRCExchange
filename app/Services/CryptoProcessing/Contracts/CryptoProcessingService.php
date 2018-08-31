<?php

namespace App\Services\CryptoProcessing\Contracts;

interface CryptoProcessingService
{
    public function beforeEveryRequest();

    /**
     * Execute request.
     *
     * @return mixed
     */
    public function execute();
}