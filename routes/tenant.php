<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\Admin\AdminUserController;
use App\Http\Controllers\Tenant\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Parse\Admin\Http\Controllers\Auth\AuthController;
use Stancl\Tenancy\Features\UserImpersonation;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->name('tenant.')->group(function () {
    Route::get('/', function () {
        return [
            'tenant_id' => tenant('id'),
            'brand'     => admin()->getBrandName(),
        ];
    })->name('home');

    Route::get('/impersonate/{token}', function ($token) {
        return UserImpersonation::makeResponse($token);
    })->name('impersonate');

    Route::group([
        'prefix' => 'admin',
        'as'     => 'admin.',
    ], function () {

        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'submitLogin'])->name('login.submit');

        Route::group(['middleware' => admin()->getAuthMiddleware()], function () {
            Route::get('/', DashboardController::class)->name('dashboard');
            Route::resource('admin-users', AdminUserController::class);
        });
    });
});
