<?php

namespace App\Models;

use App\Models\Traits\BelongsToCustomer;
use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class Point extends Model
{
    use HasUUID;
    use BelongsToCustomer;

    protected $guarded = [];

    public function scopeValid($query)
    {
        return $query->where('unlock_until', '<=', now())
            ->where('balance', '>', 0)
            ->where('expired_at', '>=', now());
    }
}
