<?php

namespace App\Policies\Automobile;

use App\Models\Account\User;
use App\Models\Automobile\VehicleHistory;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehicleHistoryPolicy
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

    public function view(User $user, VehicleHistory $vehicleHistory): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, VehicleHistory $vehicleHistory): bool
    {
        return true;
    }

    public function delete(User $user, VehicleHistory $vehicleHistory): bool
    {
        return true;
    }

    public function restore(User $user, VehicleHistory $vehicleHistory): bool
    {
        return true;
    }

    public function forceDelete(User $user, VehicleHistory $vehicleHistory): bool
    {
        return true;
    }
}
