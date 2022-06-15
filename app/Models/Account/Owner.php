<?php

namespace App\Models\Account;

use App\Models\Automobile\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const OWNER_PASSPORT_MEDIA_COLLECTION = "owner_passport";

    protected $casts = [

    ];

    public function address(): HasMany
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
