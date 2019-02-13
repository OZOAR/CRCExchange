<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function showPolicyPage()
    {
        return view('pages.policy');
    }
}
