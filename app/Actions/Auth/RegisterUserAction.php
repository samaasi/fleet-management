<?php

namespace App\Actions\Auth;

use App\Models\Account\User;
use App\DataTransferObjects\Auth\RegisteringUserData;

class RegisterUserAction
{
    public static function execute(RegisteringUserData $request)
    {
        return User::query()->create();
    }
}
