<?php

namespace App\Http\Controllers;

use App\Helpers\TemporaryIntegrationHelper;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use TemporaryIntegrationHelper;

    public function pay(Request $request)
    {
        $eurAmount = $request->input('eur-amount');
        $btcAddress = $request->input('btc-address');
        $rates = $this->getRates();

        if ($rates === null) {
            redirect()->back()->with('success', 'Rates service unavailable.');
        }

        $btcRate = $rates->EUR->BTC;
        $btcAmount = round($eurAmount / $btcRate, 5);

        $paymentResponse = $this->executePayment($eurAmount, $btcAddress);

        if($paymentResponse === null) {
            return redirect()->back()->with('success', 'Something went wrong during payment processing.');
        }

        return redirect($paymentResponse->payment_url);
    }
}
