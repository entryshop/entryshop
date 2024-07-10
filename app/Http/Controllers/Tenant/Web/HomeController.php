<?php

namespace App\Http\Controllers\Tenant\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return 'Hello World!';
    }
}
