<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class Campaign extends Model
{
    use HasUUID;

    protected $guarded = [];

    protected $casts = [
        'triggers' => 'array',
        'rules'    => 'array',
        'meta'     => 'array',
    ];

    public function getCampaignAttribute()
    {
        return app($this->type, [$this]);
    }
}
