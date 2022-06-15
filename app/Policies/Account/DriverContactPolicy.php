<?php

namespace App\Policies\Account;

use App\Models\Account\User;
use App\Models\Account\DriverContact;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverContactPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, DriverContact $driverContact): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, DriverContact $driverContact): bool
    {
        //
    }

    public function delete(User $user, DriverContact $driverContact): bool
    {
        //
    }

    public function restore(User $user, DriverContact $driverContact): bool
    {
        //
    }

    public function forceDelete(User $user, DriverContact $driverContact): bool
    {
        //
    }
}
