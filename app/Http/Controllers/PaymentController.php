<?php

namespace App\Http\Controllers;

use App\Helpers\TemporaryIntegrationHelper;
use App\Http\Requests\PayRequest;
use App\Models\Transaction;

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
        return redirect()->back();

//        $eurAmount = $request->input('eur-amount');
//        $btcAddress = $request->input('btc-address');
//        $rates = $this->getRates();
//
//        if ($rates === null) {
//            redirect()->back()->with('success', 'Rates service unavailable.');
//        }
//
//        // $btcRate = $rates->EUR->BTC;
//        // $btcAmount = round($eurAmount / $btcRate, 5);
//
//        $paymentResponse = $this->executePayment($eurAmount, $btcAddress);
//
//        if ($paymentResponse === null) { /*TODO refactor*/
//            return redirect()->back()->with('error', 'Something went wrong during payment processing.');
//        }
//
//        if (!\Auth::guest()) {
//            $attributes = [
//                'btc_address' => $btcAddress,
//                'total_eur'   => $eurAmount,
//                'status'      => $paymentResponse->status,
//            ];
//
//            if($request->has('referral-id')) {
//                $referralId = $request->input('referral-id');
//                $attributes['referral_id'] = $referralId;
//            }
//
//            \Auth::user()->transactions()->save(new Transaction($attributes));
//        }
//
//        return redirect()->back();
    }
}
