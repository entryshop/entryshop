<?php

use App\Http\Controllers\Central\RegisterTenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterTenantController::class, 'show']);
Route::post('register', [RegisterTenantController::class, 'submit'])->name('central.tenants.register.submit');
