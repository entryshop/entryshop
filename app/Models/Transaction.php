<?php

namespace App\Models;

use App\Models\Traits\BelongsToCustomer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class Transaction extends Model
{
    use HasFactory;
    use HasUUID;
    use BelongsToCustomer;

    protected $guarded = [];
}
