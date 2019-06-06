<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Auth;

class TransactionController extends Controller
{
    const TRANSACTIONS_PER_PAGE = 15;

    /**
     * Show page with transactions list.
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function showTransactionsListPage()
    {

        $transactions = Auth::user()->transactions()
            ->with(['owner', 'referer'])->get();

        foreach ($transactions as $trans){
            if($trans->status == 1){
                $trans->verifyTrans();
            }
        }



        $transactions = Auth::user()->transactions()
            ->with(['owner', 'referer'])
            ->paginate(self::TRANSACTIONS_PER_PAGE);

        return view('profile.transactions.index')
            ->with('transactions', $transactions);
    }
}
