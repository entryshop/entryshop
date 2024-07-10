<?php


use App\Http\Controllers\Tenant\Admin\AdminUserController;
use App\Http\Controllers\Tenant\Admin\DashboardController;
use App\Http\Controllers\Tenant\Admin\WalletController;
use Illuminate\Support\Facades\Route;
use Parse\Admin\Http\Controllers\Auth\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => admin()->getAuthMiddleware()], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('admin-users', AdminUserController::class);
    Route::resource('wallets', WalletController::class);
});
