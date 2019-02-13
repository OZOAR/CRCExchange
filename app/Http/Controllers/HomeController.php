<?php

namespace App\Http\Controllers;

use App\Services\CryptoProcessing\Contracts\CPRatesContract;

class HomeController extends Controller
{
    public function index(CPRatesContract $ratesService)
    {
        $currencies = $ratesService->getRates();
        $limits = [
            [
                'title' => __('homepage.limits.transaction.title'),
                'text'  => __('homepage.limits.transaction.text'),
            ],
            [
                'title' => __('homepage.limits.daily.title'),
                'text'  => __('homepage.limits.daily.text'),
            ],
            [
                'title' => __('homepage.limits.monthly.title'),
                'text'  => __('homepage.limits.monthly.text'),
            ],
        ];

        return view('welcome_new')->with(compact(['currencies', 'limits']));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('home');
    }
}
