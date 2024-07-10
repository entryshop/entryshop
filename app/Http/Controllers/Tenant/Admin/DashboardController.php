<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('tenancy.admin.dashboard');
    }
}

