<?php

namespace App\Models\Account;

use App\Models\Automobile\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Owner extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    public const OWNER_PASSPORT_MEDIA_COLLECTION = "owner_passport";

    protected $casts = [

    ];

    public function getFullNameAttribute(): string
    {
        return "
            {$this->getAttribute('first_name')}
            {$this->getAttribute('last_name')}
        ";
    }

    public function getPassportAttribute()
    {
        return $this->getFirstMediaUrl(self::OWNER_PASSPORT_MEDIA_COLLECTION);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(OwnerAddress::class, 'owner_id')
            ->orderBy('created_at');
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class)
            ->orderBy('created_at');
    }
}
