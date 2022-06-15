<?php

namespace App\Policies\Account;

use App\Models\Account\User;
use App\Models\Account\Driver;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverPolicy
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

    public function view(User $user, Driver $driver): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Driver $driver): bool
    {
        return true;
    }

    public function delete(User $user, Driver $driver): bool
    {
        return true;
    }

    public function restore(User $user, Driver $driver): bool
    {
        return true;
    }

    public function forceDelete(User $user, Driver $driver): bool
    {
        return true;
    }
}
