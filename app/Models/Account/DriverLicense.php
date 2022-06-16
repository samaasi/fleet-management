<?php

namespace App\Models\Account;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Enums\Account\DriverLicenseType;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Account\DriverLicenseGeneric;
use App\Models\Builders\DriverLicenseQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverLicense extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected const DRIVER_LICENSE_MEDIA_COLLECTION = "driver-licenses";

    protected $casts = [
        'verified'          => 'boolean',
        'issued_date'       => 'datetime',
        'expiration_date'   => 'datetime',
        'first_issued_date' => 'datetime',
        'type'              => DriverLicenseType::class,
        'generic'           => DriverLicenseGeneric::class,
    ];

    public function newEloquentBuilder($query): DriverLicenseQueryBuilder
    {
        return new DriverLicenseQueryBuilder($query);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    /** Calculate the expiration date left on the resource driver license */
    public function licenseExpirationDateLeft(): string
    {
        return $this->getAttribute('expiration_date')
            ->diffForHumans();
    }
}
