<?php

namespace App\Support\Collections;

use Squire\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleMake extends Model
{
    public static array $schema = [
        'id' => 'string',
        'name' => 'string',
    ];

    public function models(): HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }
}
