<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\Account\UserAccountType;
use App\Actions\Auth\RegisterUserAction;
use App\DataTransferObjects\Auth\RegisteringUserData;

class DefaultSingleSeeder extends Seeder
{
    public function run(): void
    {
        $user = RegisterUserAction::execute(
            RegisteringUserData::fromArray(
                $this->data()
            )
        );

        if ($user->exists) {
            $user->markEmailAsVerified();
            $user->assignRole(RoleSeeder::$DEFAULT_ROLE);
        }
    }

    protected function data(): array
    {
        return [
            'first_name'    => 'Fleet',
            'last_name'     => 'Administrator',
            'email'         => 'admin@mailinator.com',
            'password'      => '$$password$$',
            'type'          => UserAccountType::ADMIN
        ];
    }
}
