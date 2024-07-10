<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class Wallet extends Model
{
    use HasFactory;
    use HasUUID;

    protected $guarded = [];

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }
}
