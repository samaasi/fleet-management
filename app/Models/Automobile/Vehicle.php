<?php

namespace App\Models\Automobile;

use App\Models\Account\Owner;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vehicle extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    public const VEHICLES_MEDIA_COLLECTION = "vehicles";

    protected $casts = [

    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(VehicleHistory::class, 'vehicle_id')
            ->orderBy('created_at');
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(VehicleMaintenance::class, 'vehicle_id')
            ->orderBy('created_at');
    }

    public function drivers(): HasManyThrough
    {
        return $this->hasManyThrough('driver', 'histories');
    }

    public function licenses(): HasMany
    {
        return $this->hasMany(VehicleLicense::class, 'vehicle_id')
            ->orderBy('created_at');
    }
}
