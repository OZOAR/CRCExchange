<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ReceiveMoneyRequest;
use App\Http\Controllers\Controller;

class RMRequestController extends Controller
{
    const REQUESTS_PER_PAGE = 15;

    /**
     * Show page with RM requests of the users.
     *
     * @return $this
     */
    public function showRequestsListPage()
    {
        $requests = ReceiveMoneyRequest::with(['user'])->paginate(self::REQUESTS_PER_PAGE);
        return view('dashboard.requests.index')->with('requests', $requests);
    }
}
