<?php

namespace App\DataTransferObjects\Auth;

class SendRegistrationLinkData
{
    public function __construct(
        public string $email,
        public string $form,
    ){}

    public static function fromRequest($request): static
    {
        return new static(
            $request->get('email'),
            $request->get('form'),
        );
    }

    public static function fromArray(array $attributes): static
    {
        return new static(
            $attributes['email'],
            $attributes['form'],
        );
    }
}
