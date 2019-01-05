<?php

namespace App\Http\Controllers;

use App\Services\CryptoProcessing\Contracts\CPRatesContract;

class HomeController extends Controller
{
    public function index(CPRatesContract $ratesService)
    {
        $currencies = $ratesService->getRates();
        return view('welcome_new')->with(compact('currencies'));
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
