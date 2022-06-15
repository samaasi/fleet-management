<?php

namespace App\Policies\Account;

use App\Models\Account\User;
use App\Models\Account\Owner;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerPolicy
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

    public function view(User $user, Owner $owner): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Owner $owner): bool
    {
        return true;
    }

    public function delete(User $user, Owner $owner): bool
    {
        return true;
    }

    public function restore(User $user, Owner $owner): bool
    {
        return true;
    }

    public function forceDelete(User $user, Owner $owner): bool
    {
        return true;
    }
}
