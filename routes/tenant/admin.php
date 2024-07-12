<?php

use App\Http\Controllers\Tenant\Admin;
use Illuminate\Support\Facades\Route;
use Parse\Admin\Http\Controllers\Auth\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::group(['middleware' => admin()->getAuthMiddleware()], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', Admin\DashboardController::class)->name('dashboard');
    Route::resource('admin-users', Admin\AdminUserController::class);
    Route::resource('customers', Admin\Customer\CustomerController::class);
    Route::resource('tier-sets', Admin\Customer\TierSetController::class);
    Route::resource('tiers', Admin\Customer\TierController::class);
    Route::resource('wallets', Admin\WalletController::class);
    Route::resource('customer-events', Admin\Customer\CustomerEventController::class);
    Route::resource('custom-events', Admin\Customer\CustomEventController::class);

    // Basic Setting
    Route::get('settings/basic', [Admin\Setting\BasicSettingController::class, 'index'])->name('settings.basic');
    Route::post('settings/basic', [Admin\Setting\BasicSettingController::class, 'store'])->name('settings.basic.store');
});
