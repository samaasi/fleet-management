<?php

namespace App\DataTransferObjects\Auth;

use Illuminate\Support\Facades\Hash;
use App\Enums\Account\UserAccountType;

class RegisteringUserData
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public UserAccountType $type,
        public string $password
    ){}

    public static function fromRequest($request): static
    {
        return new static(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email'),
            $request->get('type'),
            $request->get('password'),
        );
    }

    public static function fromArray(array $attributes): static
    {
        return new static(
            $attributes['first_name'],
            $attributes['last_name'],
            $attributes['email'],
            $attributes['type'],
            $attributes['password'],
        );
    }

    public function hashPassword(): string
    {
        return Hash::make($this->password);
    }
}
