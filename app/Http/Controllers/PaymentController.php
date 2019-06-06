<?php

namespace App\Http\Controllers;

use App\Helpers\TemporaryIntegrationHelper;
use App\Http\Requests\PayRequest;
use App\Models\Transaction;
use App\Models\User;

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

        $method = 'POST';
        $target_url = 'https://indacoin.com/api/exgw_createTransaction';
        $user_id = $request->input('email-address');

        $cur_in = $request->input('currency');
        $cur_out = $request->input('crypt');
        $target_address = $request->input('btc-address');
        $amount_in = $request->input('eur-amount');

        $nonce = 1000000;
        $partnername='exrate';//ask for it
        $string=$partnername."_".$nonce;
        $secret= '4caa0510ac50dd5'; //ask for it
        $sig = base64_encode(hash_hmac('sha256', $string, $secret,true));

        $arr = array(
            'user_id' => $user_id,
            'cur_in' => $cur_in,
            'cur_out' => $cur_out,
            'target_address' => $target_address,
            'amount_in' => $amount_in
        );


        $data = json_encode($arr);

        $options = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n"
                    ."gw-partner: $partnername\r\n"
                    ."gw-nonce: ".$nonce."\r\n"
                    ."gw-sign: ".$sig."\r\n",
                'method' => $method,
                'content' => $data
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($target_url, false, $context);


            $attributes = [
                'btc_address' => $target_address,
                'total_eur'   => $amount_in,
                'status'      => 1,
                'transaction_id' => $result
            ];

            if($request->has('referral-id')) {
                $referralId = $request->input('referral-id');
                $attributes['referral_id'] = $referralId;
            }




        if (!\Auth::guest()) {
            \Auth::user()->transactions()->save(new Transaction($attributes));
        } else {
            $trans = new Transaction($attributes);
            $trans->save();
        }
        $partnername = "exrate";
        $transaction_id = $result; //get it from previous method
        $string=$partnername."_".$transaction_id;
        $secret="4caa0510ac50dd5";
        $sig = base64_encode(base64_encode(hash_hmac('sha256', $string, $secret,true)));

        return redirect('https://indacoin.com/gw/payment_form?transaction_id='.$result.'&partner=exrate&cnfhash='.$sig);


        return;

        $eurAmount = $request->input('eur-amount');
        $btcAddress = $request->input('btc-address');
        $rates = $this->getRates();

        if ($rates === null) {
            redirect()->back()->with('success', 'Rates service unavailable.');
        }

        // $btcRate = $rates->EUR->BTC;
        // $btcAmount = round($eurAmount / $btcRate, 5);

        $paymentResponse = $this->executePayment($eurAmount, $btcAddress);

        if ($paymentResponse === null) { /*TODO refactor*/
            return redirect()->back()->with('error', 'Something went wrong during payment processing.');
        }

        if (!\Auth::guest()) {
            $attributes = [
                'btc_address' => $btcAddress,
                'total_eur'   => $eurAmount,
                'status'      => $paymentResponse->status,
            ];

            if($request->has('referral-id')) {
                $referralId = $request->input('referral-id');
                $attributes['referral_id'] = $referralId;
            }

            \Auth::user()->transactions()->save(new Transaction($attributes));
        }

        return redirect($paymentResponse->payment_url);
    }
}
