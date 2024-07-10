<?php

namespace App\Models;

use App\Models\Traits\BelongsToCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Parse\Admin\Concerns\HasUUID;

class CustomerCoupon extends Model
{
    use BelongsToCustomer, HasUUID;

    protected $guarded = [];

    protected $casts = [
        'payload'    => 'array',
        'expires_at' => 'datetime',
        'used_at'    => 'datetime',
    ];

    public $searches = ['coupon.name', 'code'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = $model->generateCode();
        });
    }

    public function scopeValid($query)
    {
        return $query->where('status', 'active')->where('expires_at', '>', now());
    }

    public function generateCode()
    {
        return Str::upper(Str::random(8));
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
