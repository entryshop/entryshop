<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Parse\Admin\Concerns\HasUUID;

class Customer extends Authenticatable
{
    use HasUUID;
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [];
    protected $hidden = ['password'];
}
