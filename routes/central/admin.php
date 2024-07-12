<?php

use App\Http\Controllers\Central\Admin;
use Illuminate\Support\Facades\Route;
use Parse\Admin\Http\Controllers\Auth\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::group(['middleware' => admin()->getAuthMiddleware()], function () {
    Route::get('/', Admin\DashboardController::class)->name('dashboard');
    Route::resource('tenants', Admin\TenantController::class);

    Route::post('tenants/{id}/settings', [Admin\TenantController::class, 'settings'])->name('tenants.settings');
});
