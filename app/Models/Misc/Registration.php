<?php

namespace App\Models\Misc;

use App\Models\Account\User;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Misc\RegistrationType;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'duration' => 'datetime',
        'type' => RegistrationType::class,
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
