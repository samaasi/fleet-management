<?php

namespace App\Models\Automobile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleMaintenanceService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'cost' => 'integer'
    ];

    public function maintenance(): BelongsTo
    {
        return $this->belongsTo(VehicleMaintenance::class, 'vehicle_maintenance_id');
    }
}
