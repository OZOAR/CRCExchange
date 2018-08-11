<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Localization;
use App\Http\Requests\ChangeLocaleRequest;
use Session;

class LocalizationController extends Controller
{
    /**
     * Change locale on the website for current session.
     *
     * @param ChangeLocaleRequest $request Validates input lang before changing locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(ChangeLocaleRequest $request)
    {
        Session::put(Localization::LOCALE, $request->input('lang'));

        return redirect()->back();
    }
}
