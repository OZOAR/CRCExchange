<?php

namespace App\Services\ExternalValidators\Contracts;

interface ExternalValidatorContract
{
    public function setConfiguration($endpoint, $options);

    public function validate();
}