<?php

namespace App\Http\Controllers\Central\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('central.admin.dashboard');
    }
}

