<?php

namespace App\Http\Controllers;

use App\Helpers\TemporaryIntegrationHelper;

use App\Services\CryptoProcessing\Contracts\CPRatesContract;

class HomeController extends Controller
{
    use TemporaryIntegrationHelper;

    public function index()
    {
        $processes = collect($this->getProcesses());
        $howToBuySteps = collect($this->getHowToBuySteps());
        $limits = collect($this->getLimits());

        return view('welcome_new')->with(compact(['processes', 'limits', 'howToBuySteps']));
    }

    public function getCurrencies()
    {
        $currs = ['EUR', 'USD', 'RUB'];
        $crypts = ['BTC', 'ETH', 'BCH', 'LTC', 'EOS', 'DASH', 'XRP'];
        $currencies = $this->getRatesNew($currs, $crypts);

        return response()->json(['currencies' => $currencies]);
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

    private function getLimits()
    {
        return [
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
    }

    private function getProcesses()
    {
        return [
            [
                'title'      => __('homepage.processes.fees.title'),
                'icon-class' => __('homepage.processes.fees.icon'),
                'text'       => __('homepage.processes.fees.text'),
            ],
            [
                'title'      => __('homepage.processes.verification.title'),
                'icon-class' => __('homepage.processes.verification.icon'),
                'text'       => __('homepage.processes.verification.text'),
            ],
            [
                'title'      => __('homepage.processes.transactions.title'),
                'icon-class' => __('homepage.processes.transactions.icon'),
                'text'       => __('homepage.processes.transactions.text'),
            ],
            [
                'title'      => __('homepage.processes.support.title'),
                'icon-class' => __('homepage.processes.support.icon'),
                'text'       => __('homepage.processes.support.text'),
            ],
        ];
    }

    private function getHowToBuySteps()
    {
        return __('homepage.how_to_buy.steps');
    }
}
