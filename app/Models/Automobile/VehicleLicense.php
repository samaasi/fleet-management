<?php

namespace App\Models\Automobile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Builders\VehicleLicenseQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleLicense extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected const VEHICLE_LICENSE_MEDIA_COLLECTION = "vehicle-licenses";

    protected $casts = [
        'verified' => 'boolean'
    ];

    public function newEloquentBuilder($query): VehicleLicenseQueryBuilder
    {
        return new VehicleLicenseQueryBuilder($query);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /** Calculate the expiration date left on the resource driver license */
    public function licenseExpirationDateLeft(): string
    {
        return $this->getAttribute('expiration_date')
            ->diffForHumans();
    }
}
