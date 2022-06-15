<?php

namespace App\Policies\Automobile;

use App\Models\Account\User;
use App\Models\Automobile\VehicleMaintenance;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehicleMaintenancePolicy
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

    public function view(User $user, VehicleMaintenance $vehicleMaintenance): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, VehicleMaintenance $vehicleMaintenance): bool
    {
        return true;
    }

    public function delete(User $user, VehicleMaintenance $vehicleMaintenance): bool
    {
        return true;
    }

    public function restore(User $user, VehicleMaintenance $vehicleMaintenance): bool
    {
        return true;
    }

    public function forceDelete(User $user, VehicleMaintenance $vehicleMaintenance): bool
    {
        return true;
    }
}
