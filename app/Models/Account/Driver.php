<?php

namespace App\Models\Account;

use App\Enums\Account\Gender;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Account\MaritalStatus;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    public const DRIVER_PASSPORT_MEDIA_COLLECTION = "driver-passport";
    public const DRIVER_PHOTOGRAPH_MEDIA_COLLECTION = "driver-photographs";

    protected $casts = [
        'gender' => Gender::class,
        'marital_status' => MaritalStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(DriverContact::class);
    }

    public function defaultContact(): HasOne
    {
        return $this->hasOne(DriverContact::class, 'driver_id')
            ->where('default', true);
    }

    public function guarantors(): HasMany
    {
        return $this->hasMany(DriverGuarantor::class, 'driver_id')
            ->orderBy('created_at');
    }

    public function licenses(): HasMany
    {
        return $this->hasMany(DriverLicense::class, 'driver_id')
            ->orderBy('created_at');
    }

    /** Evaluate if the resource has a valid driver license */
    public function hasValidDriverLicense(): bool
    {
        return true;
    }
}
