<?php

namespace App\Policies\Misc;

use App\Models\Account\User;
use App\Models\Misc\Registration;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistrationPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Registration $registration): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Registration $registration): bool
    {
        return true;
    }

    public function delete(User $user, Registration $registration): bool
    {
        return true;
    }

    public function restore(User $user, Registration $registration): bool
    {
        return true;
    }

    public function forceDelete(User $user, Registration $registration): bool
    {
        return true;
    }
}
