<?php

namespace App\Http\Controllers;

use App\Helpers\TemporaryIntegrationHelper;
use App\Http\Requests\PayRequest;

class PaymentController extends Controller
{
    use TemporaryIntegrationHelper;

    /**
     * Pay from index page.
     *
     * @param PayRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function pay(PayRequest $request)
    {
        $eurAmount = $request->input('eur-amount');
        $btcAddress = $request->input('btc-address');
        $rates = $this->getRates();

        if ($rates === null) {
            redirect()->back()->with('success', 'Rates service unavailable.');
        }

        // $btcRate = $rates->EUR->BTC;
        // $btcAmount = round($eurAmount / $btcRate, 5);

        $paymentResponse = $this->executePayment($eurAmount, $btcAddress);

        if ($paymentResponse === null) {
            return redirect()->back()->with('success', 'Something went wrong during payment processing.');
        }

        dd($paymentResponse);

        return redirect($paymentResponse->payment_url);
    }
}
