<?php

namespace App\Policies\Account;

use App\Models\Account\DriverGuarantorMeta;
use App\Models\Account\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DriverGuarantorMetaPolicy
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

    public function view(User $user, DriverGuarantorMeta $driverGuarantorMeta): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, DriverGuarantorMeta $driverGuarantorMeta): bool
    {
        //
    }

    public function delete(User $user, DriverGuarantorMeta $driverGuarantorMeta): bool
    {
        //
    }

    public function restore(User $user, DriverGuarantorMeta $driverGuarantorMeta): bool
    {
        //
    }

    public function forceDelete(User $user, DriverGuarantorMeta $driverGuarantorMeta): bool
    {
        //
    }
}
