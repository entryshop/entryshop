<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class Customer extends Model
{
    use HasUUID;
    use HasFactory;

    protected $guarded = [];
}
