<?php

namespace App\Models\Account;

use App\Models\Misc\Registration;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use App\Enums\Account\UserAccountTypeEnum;
use Spatie\MediaLibrary\InteractsWithMedia;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAvatar, HasMedia, HasName, MustVerifyEmail
{
    use HasRoles;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    use InteractsWithMedia;

    protected const MEDIA_COLLECTION = "avatar";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'type' => UserAccountTypeEnum::class,
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->getAttribute('first_name')} {$this->getAttribute('last_name')}";
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->hasPermissionTo('manage:administration');
    }

    public function getAvatarUrlAttribute(): string
    {
        return '';
    }

    public function getFilamentName(): string
    {
        return $this->full_name;
    }

    public function canAccessFilament(): bool
    {
        return $this->isAdmin;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    public function links(): HasMany
    {
        return $this->hasMany(Registration::class, 'user_id')
            ->orderBy('created_at');
    }
}
