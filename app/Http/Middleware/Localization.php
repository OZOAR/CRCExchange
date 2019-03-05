<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Localization
{
    const LOCALE = 'locale';
    const LANGUAGES = ['ru', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has(self::LOCALE)) {
            Session::put(self::LOCALE, $request->getPreferredLanguage(self::LANGUAGES));
        }

        app()->setLocale(Session::get(self::LOCALE));

        return $next($request);
    }
}
