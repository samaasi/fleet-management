<?php

namespace App\Policies\IAM;

use App\Models\IAM\Role;
use App\Models\Account\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        return $user->can('view:role');
    }

    public function view(User $user, Role $role): bool
    {
        return $user->can('view:role');
    }

    public function create(User $user): bool
    {
        return $user->can('create:role');
    }

    public function update(User $user, Role $role): bool
    {
        return $user->can('update:role');
    }

    public function delete(User $user, Role $role): bool
    {
        return $user->can('delete:role');
    }

    public function assign(User $user, Role $role): bool
    {
        return $user->can('assign:role');
    }

    public function revoke(User $user, Role $role): bool
    {
        return $user->can('revoke:role');
    }
}
