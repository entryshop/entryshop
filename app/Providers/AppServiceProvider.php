<?php

namespace App\Providers;

use App\Actions\Central\CentralAdminBootstrap;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->registerPolicies();
    }

    public function registerPolicies(): void
    {

    }
}
