<?php

namespace App\Helpers;

use Session;

class Locale
{
    public static function isSelected($lang = null)
    {
        return Session::get('locale') === $lang;
    }
}