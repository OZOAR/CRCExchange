<?php

namespace App\Services\ExternalValidators\Contracts;


interface BtcValidatorContract
{
    public function validateBtcAddress($btcAddress);
}