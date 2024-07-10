<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('central.dashboard');
    }
}

