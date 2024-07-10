<?php

namespace App\Models;

use App\Models\Traits\BelongsToCustomer;
use Illuminate\Database\Eloquent\Model;
use Parse\Admin\Concerns\HasUUID;

class CustomerEvent extends Model
{
    use HasUUID;
    use BelongsToCustomer;

    protected $guarded;

    protected $casts = [
        'payload'    => 'array',
        'attributes' => 'array',
    ];

    public function event()
    {
        return $this->belongsTo(CustomEvent::class, 'event_id');
    }
}
