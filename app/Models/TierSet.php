<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class TierSet extends Model
{
    use HasUUID;

    protected $guarded = [];

    public function tiers()
    {
        return $this->hasMany(Tier::class);
    }
}
