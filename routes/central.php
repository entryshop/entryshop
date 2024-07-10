<?php

use App\Http\Controllers\Central\DashboardController;
use App\Http\Controllers\Central\RegisterTenantController;
use App\Http\Controllers\Central\TenantController;
use Illuminate\Support\Facades\Route;
use Parse\Admin\Http\Controllers\Auth\AuthController;

Route::get('/', [RegisterTenantController::class, 'show']);
Route::post('register', [RegisterTenantController::class, 'submit'])->name('central.tenants.register.submit');

Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.',
], function () {

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'submitLogin'])->name('login.submit');

    Route::group(['middleware' => admin()->getAuthMiddleware()], function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('tenants', TenantController::class);
    });
});
