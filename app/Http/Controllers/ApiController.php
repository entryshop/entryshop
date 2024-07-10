<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Parse\Admin\Http\Controllers\Crud\HasApiResponse;

abstract class ApiController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use HasApiResponse;
}
