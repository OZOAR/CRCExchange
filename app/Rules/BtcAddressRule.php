<?php

namespace App\Rules;

use App\Services\ExternalValidators\BtcValidator;
use Illuminate\Contracts\Validation\Rule;

class BtcAddressRule implements Rule
{
    /**
     * @var ....
     */
    private $btcValidator;

    private $result;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->btcValidator = app()->make(BtcValidator::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->result = $this->btcValidator->validateBtcAddress($value);
        return $this->result['success'];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->result['message'];
    }
}
