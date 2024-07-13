<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Parse\Admin\Concerns\HasUUID;

class Campaign extends Model
{
    use HasUUID;

    protected $guarded = [];

    public function getCampaignAttribute()
    {
        return app($this->type, [$this]);
    }
}
