<?php

namespace App\Policies\Account;

use App\Models\Account\User;
use App\Models\Account\DriverLicense;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverLicensePolicy
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

    public function view(User $user, DriverLicense $driverLicense): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, DriverLicense $driverLicense): bool
    {
        return true;
    }

    public function delete(User $user, DriverLicense $driverLicense): bool
    {
        return true;
    }

    public function restore(User $user, DriverLicense $driverLicense): bool
    {
        return true;
    }

    public function forceDelete(User $user, DriverLicense $driverLicense): bool
    {
        return true;
    }
}
