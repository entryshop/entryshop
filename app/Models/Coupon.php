<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class Coupon extends Model
{
    use HasFactory;
    use HasUUID;

    protected $guarded = [];
}
