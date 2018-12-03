<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    const PARTNERS_PER_PAGE = 15;

    public function __invoke()
    {
        $partners = User::partners()->paginate(self::PARTNERS_PER_PAGE);

        return view('dashboard.index')
            ->with('partners', $partners);
    }
}
