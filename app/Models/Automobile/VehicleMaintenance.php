<?php

namespace App\Models\Automobile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleMaintenance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'cost' => 'integer',
        'date_of_service' => 'datetime',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(VehicleMaintenanceService::class, 'vehicle_maintenance_id')
            ->orderBy('created_at');
    }
}
