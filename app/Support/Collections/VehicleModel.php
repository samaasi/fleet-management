<?php

namespace App\Support\Collections;

use Squire\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleModel extends Model
{
    public static array $schema = [
        'id' => 'string',
        'make_id' => 'string',
        'name' => 'string',
    ];

    public function make(): BelongsTo
    {
        return $this->belongsTo(VehicleMake::class, 'make_id');
    }
}
