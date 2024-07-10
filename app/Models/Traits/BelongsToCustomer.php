<?php

namespace App\Models\Traits;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */
trait BelongsToCustomer
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
