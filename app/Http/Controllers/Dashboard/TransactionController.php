<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Transaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    const TRANSACTIONS_PER_PAGE = 15;

    /**
     * Show page with transactions list.
     *
     * @return $this
     */
    public function showTransactionsListPage()
    {
        $transactions = Transaction::with(['owner', 'referer'])->paginate(self::TRANSACTIONS_PER_PAGE);

        return view('dashboard.transactions.index')
            ->with('transactions', $transactions);
    }
}
