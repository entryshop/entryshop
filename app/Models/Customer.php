<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Parse\Admin\Concerns\HasUUID;

class Customer extends Authenticatable
{
    use HasUUID;
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [];
    protected $hidden = ['password'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            if (empty($customer->referrer_token)) {
                $customer->referrer_token = Str::random(6);
            }
        });
    }
}
