<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverContact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'default' => 'boolean'
    ];

    public function isDefault(): bool
    {
        return $this->getAttribute('default');
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
