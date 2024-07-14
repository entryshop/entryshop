<?php

namespace App\Events\Tenant;

use App\Events\Contracts\HasCustomer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerRegisteredEvent implements HasCustomer
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    use \App\Events\Concerns\HasCustomer;

}
