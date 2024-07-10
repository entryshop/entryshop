<?php

use App\Http\Controllers\Tenant\Api\ConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/', ConfigController::class)->name('home');
