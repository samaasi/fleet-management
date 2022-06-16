<?php

namespace App\Actions\Auth;

use App\Models\Account\User;
use Illuminate\Auth\Events\Registered;
use App\DataTransferObjects\Auth\RegisteringUserData;

class RegisterUserAction
{
    public static function execute(RegisteringUserData $request): User
    {
        $user = User::query()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => $request->hashPassword()
        ]);

        if ($user->exists) {
            //event(new Registered($user));
        }

        return $user;
    }
}
