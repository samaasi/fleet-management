<?php

namespace App\Policies\Account;

use App\Models\Account\DriverGuarantor;
use App\Models\Account\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverGuarantorPolicy
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

    public function view(User $user, DriverGuarantor $driverGuarantor): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, DriverGuarantor $driverGuarantor): bool
    {
        //
    }

    public function delete(User $user, DriverGuarantor $driverGuarantor): bool
    {
        //
    }

    public function restore(User $user, DriverGuarantor $driverGuarantor): bool
    {
        //
    }

    public function forceDelete(User $user, DriverGuarantor $driverGuarantor): bool
    {
        //
    }
}
