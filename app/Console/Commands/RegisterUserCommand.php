<?php

namespace App\Console\Commands;

use App\Models\IAM\Role;
use Illuminate\Console\Command;
use Illuminate\Validation\Factory;
use App\Actions\Auth\RegisterUserAction;
use Illuminate\Validation\Rules\Password;
use App\Console\Commands\Concerns\RenderAsciiFace;
use App\DataTransferObjects\Auth\RegisteringUserData;
use App\Notifications\Auth\NotifyUserAccountWasCreatedForNotification;

class RegisterUserCommand extends Command
{
    use RenderAsciiFace;

    protected $signature = 'fleet:register
                            {email? : User email.}
                            {password? : User password.}
                            {role? : User role to be assign to.}';

    protected $description = 'Register a new user.';

    public function handle(Factory $validator): int
    {
        $this->drawFace();

        $validatedData = $this->validateData($validator);

        $user = RegisterUserAction::execute(
            RegisteringUserData::fromArray($validatedData)
        );

        if ($user->exists) {

            $user->assignRole($validatedData['role']);

            $user->notify(
                new NotifyUserAccountWasCreatedForNotification(
                    $validatedData['password']
                )
            );

            $this->info("User [{$user->getAttribute('email')}] has been registered.");
        }

        return Command::SUCCESS;
    }

    protected function data(): array
    {
        return [
            'email' => $this->argument('email')
                ?? $this->ask('what is the user\'s email?'),
            'password' => $this->secret('password')
                ?? $this->ask('what is the user\'s password?'),
            'role' => $this->choice(
                'what role should be assign to this user?',
                $this->getRoles(),
                0
            ),
        ];
    }

    protected function getRoles(): array
    {
        return (array) Role::query()->pluck('name')->toArray();
    }

    protected function validateData(Factory $validator): array
    {
        return $validator->make($this->data(), [
            'email' => ['required', 'email', 'unique:users'],
            'password' => Password::required(),
            'role' => ['required', 'exists:roles,name'],
        ])->validate();
    }
}
