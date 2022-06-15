<?php

namespace App\Policies\Automobile;

use App\Models\Account\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Automobile\VehicleMaintenanceService;

class VehicleMaintenanceServicePolicy
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

    public function view(User $user, VehicleMaintenanceService $vehicleMaintenanceService): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, VehicleMaintenanceService $vehicleMaintenanceService): bool
    {
        return true;
    }

    public function delete(User $user, VehicleMaintenanceService $vehicleMaintenanceService): bool
    {
        return true;
    }

    public function restore(User $user, VehicleMaintenanceService $vehicleMaintenanceService): bool
    {
        return true;
    }

    public function forceDelete(User $user, VehicleMaintenanceService $vehicleMaintenanceService): bool
    {
        return true;
    }
}
