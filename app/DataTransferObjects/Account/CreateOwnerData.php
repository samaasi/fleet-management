<?php

namespace App\DataTransferObjects\Account;

class CreateOwnerData
{
    public function __construct(
        //
    ){}

    public static function fromRequest($request): static
    {
        return new static();
    }

    public static function fromArray(array $attributes): static
    {
        return new static();
    }
}
