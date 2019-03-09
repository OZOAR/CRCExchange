<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Torann\GeoIP\Location;

class Localization
{
    const LOCALE = 'locale';
    const SUPPORTED_LANGUAGES = ['ru', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has(self::LOCALE)) {
            $location = geoip()->getLocation(geoip()->getClientIP());
            Session::put(self::LOCALE, $this->getLanguageByGeoIP($location));
        }

        app()->setLocale(Session::get(self::LOCALE));

        return $next($request);
    }

    private function getLanguageByGeoIP(Location $location)
    {
        $supportedLanguages = collect(self::SUPPORTED_LANGUAGES);
        $languages = collect(explode(',', $location->getAttribute('languages')));

        $intersectedLanguages = $supportedLanguages->intersect($languages);

        return $intersectedLanguages->first(null, config('app.locale'));
    }
}
