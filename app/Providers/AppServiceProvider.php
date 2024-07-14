<?php

namespace App\Providers;

use App\Campaigns\Campaign;
use App\Events\Tenant\CustomerRegisteredEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Stancl\JobPipeline\JobPipeline;

class AppServiceProvider extends ServiceProvider
{

}
