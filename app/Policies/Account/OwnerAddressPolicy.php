<?php

namespace App\Policies\Account;

use App\Models\Account\User;
use App\Models\Account\OwnerAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerAddressPolicy
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

    public function view(User $user, OwnerAddress $ownerAddress): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, OwnerAddress $ownerAddress): bool
    {
        return true;
    }

    public function delete(User $user, OwnerAddress $ownerAddress): bool
    {
        return true;
    }

    public function restore(User $user, OwnerAddress $ownerAddress): bool
    {
        return true;
    }

    public function forceDelete(User $user, OwnerAddress $ownerAddress): bool
    {
        return true;
    }
}
