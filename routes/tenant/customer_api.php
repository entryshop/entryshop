<?php

use App\Http\Controllers\Tenant\CustomerApi\ConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/', ConfigController::class)->name('home');
