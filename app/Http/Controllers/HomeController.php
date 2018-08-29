<?php

namespace App\Http\Controllers;

use App\Helpers\TemporaryIntegrationHelper;

class HomeController extends Controller
{
    use TemporaryIntegrationHelper;

    public function index()
    {
        $currencies = $this->getRates();

        return view('welcome')->with(compact('currencies'));
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
