<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileBtcAddressRequest;

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

        if($currentBTC === $newBTC) {
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
}
