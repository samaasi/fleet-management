<?php

namespace App\DataTransferObjects\Auth;

use Illuminate\Support\Facades\Hash;

class RegisteringUserData
{
    public function __construct(
        public string $email,
        public string $password
    ){}

    public static function fromRequest($request): static
    {
        return new static(
            $request->get('email'),
            $request->get('password'),
        );
    }

    public static function fromArray(array $attributes): static
    {
        return new static(
            $attributes['email'],
            $attributes['password'],
        );
    }

    public function hashPassword(): string
    {
        return Hash::make($this->password);
    }
}
