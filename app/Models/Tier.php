<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class Tier extends Model
{
    use HasFactory;
    use HasUUID;

    protected $guarded = [];

    public function set()
    {
        return $this->belongsTo(TierSet::class, 'tier_set_id');
    }
}
