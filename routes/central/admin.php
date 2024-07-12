<?php

use App\Http\Controllers\Central\DashboardController;
use App\Http\Controllers\Central\TenantController;
use Illuminate\Support\Facades\Route;
use Parse\Admin\Http\Controllers\Auth\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::group(['middleware' => admin()->getAuthMiddleware()], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('tenants', TenantController::class);

    Route::post('tenants/{id}/settings', [TenantController::class, 'settings'])->name('tenants.settings');
});
