<?php

namespace App\Services\ExternalValidators;

use App\Services\ExternalValidators\Contracts\BtcValidatorContract;

class BtcValidator extends ExternalValidatorService implements BtcValidatorContract
{
    const ENDPOINT_WEBSITE = 'https://blockchain.info';
    const ENDPOINT_URI = '/rawaddr';

    /**
     * @var string
     */
    private $btcAddress;

    public function validate()
    {
        $this->setConfiguration($this->makeEndpoint());
        return parent::validate();
    }

    private function makeEndpoint()
    {
        return self::ENDPOINT_WEBSITE . self::ENDPOINT_URI . parent::DELIMITER . $this->btcAddress;
    }

    public function validateBtcAddress($btcAddress)
    {
        $this->btcAddress = $btcAddress;
        $this->setConfiguration($this->makeEndpoint());
        return parent::validate();
    }
}