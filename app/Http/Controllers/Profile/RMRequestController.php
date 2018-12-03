<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

/**
 * This class works with request to receive money.
 *
 * Class RMRequestController
 * @package App\Http\Controllers\Profile
 */
class RMRequestController extends Controller
{
    const REQUESTS_PER_PAGE = 15;

    /**
     * Show page with RM requests of the authenticated user.
     *
     * @return $this
     */
    public function showRequestsListPage()
    {
        $requests = \Auth::user()->requests()->paginate(self::REQUESTS_PER_PAGE);
        return view('profile.requests.index')->with('requests', $requests);
    }
}
