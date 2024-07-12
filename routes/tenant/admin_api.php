<?php

use App\Http\Controllers\Tenant\AdminApi\AuthController;
use App\Http\Controllers\Tenant\AdminApi\CustomerController;
use App\Http\Middleware\Tenant\TenantAdminApiAuthenticate;
use Illuminate\Support\Facades\Route;

Route::post('get-access-token', [AuthController::class, 'getAccessToken'])->name('get-access-token');

Route::group([
    'middleware' => ['auth:sanctum', TenantAdminApiAuthenticate::class],
], function () {
    Route::get('customers', [CustomerController::class, 'index']);
});
