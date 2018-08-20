<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class TokenBroker
{
    /**
     * Make hash.
     *
     * @return string
     */
    public static function make()
    {
        return hash_hmac('sha256', Str::random(40), config('app.key'));
    }
}