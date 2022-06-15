<?php

namespace App\Policies\Automobile;

use App\Models\Account\User;
use App\Models\Automobile\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiclePolicy
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

    public function view(User $user, Vehicle $vehicle): bool
    {
        return $user->can('view:vehicle');
    }

    public function create(User $user): bool
    {
        return $user->can('create:vehicle');
    }

    public function update(User $user, Vehicle $vehicle): bool
    {
        return $user->can('update:vehicle');
    }

    public function delete(User $user, Vehicle $vehicle): bool
    {
        return $user->can('delete:vehicle');
    }

    public function restore(User $user, Vehicle $vehicle): bool
    {
        return $user->can('restore:vehicle');
    }

    public function forceDelete(User $user, Vehicle $vehicle): bool
    {
        return $user->can('delete:vehicle');
    }
}
