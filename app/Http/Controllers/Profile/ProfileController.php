<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendReceiveMoneyRequest;
use App\Http\Requests\UpdateProfileBtcAddressRequest;
use App\Models\ReceiveMoneyRequest;

class ProfileController extends Controller
{
    /**
     * Show profile page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfile()
    {
        return view('profile.index');
    }

    /**
     * Update user BTC address using validation of external service.
     *
     * @param UpdateProfileBtcAddressRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateBtcAddress(UpdateProfileBtcAddressRequest $request)
    {
        // TODO refactor
        $user = \Auth::user();
        $newBTC = $request->input('btc-address');
        $currentBTC = $user->getBtc();

        if ($currentBTC === $newBTC) {
            return redirect()
                ->route('profile.index')
                ->with('error', trans('validation.messages.btcField.duplicated'));
        }

        $user->setBtc($request->input('btc-address'));
        $user->save();

        return redirect()
            ->route('profile.index')
            ->with('success', trans('validation.messages.btcField.success'));
    }

    /**
     * Send request to receive money.
     *
     * @param SendReceiveMoneyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendReceiveMoneyRequest(SendReceiveMoneyRequest $request)
    {
        $receiveMoneyRequest = new ReceiveMoneyRequest(['total' => $request->input('request-total')]);

        $sent = \Auth::user()->requests()->save($receiveMoneyRequest);

        if($sent) {
            return redirect()
                ->back()
                ->with('success', trans('profile.messages.receive_money_request.success'));
        }

        return redirect()
            ->back()
            ->with('error', trans('profile.messages.receive_money_request.error'));
    }
}
