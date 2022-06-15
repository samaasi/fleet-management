<?php

namespace App\Policies\Automobile;

use App\Models\Account\User;
use App\Models\Automobile\VehicleLicense;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehicleLicensePolicy
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

    public function view(User $user, VehicleLicense $vehicleLicense): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, VehicleLicense $vehicleLicense): bool
    {
        return true;
    }

    public function delete(User $user, VehicleLicense $vehicleLicense): bool
    {
        return true;
    }

    public function restore(User $user, VehicleLicense $vehicleLicense): bool
    {
        return true;
    }

    public function forceDelete(User $user, VehicleLicense $vehicleLicense): bool
    {
        return true;
    }
}
