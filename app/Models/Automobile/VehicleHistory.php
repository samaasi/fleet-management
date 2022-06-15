<?php

namespace App\Models\Automobile;

use App\Models\Account\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'assigned_date' => 'datetime',
        'revoke_date'   => 'datetime',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
