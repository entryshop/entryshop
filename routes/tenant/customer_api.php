<?php

use App\Http\Controllers\Tenant\CustomerApi\AuthController;
use App\Http\Controllers\Tenant\CustomerApi\ConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/', ConfigController::class)->name('home');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('me', [AuthController::class, 'getProfile'])->name('me');
});
