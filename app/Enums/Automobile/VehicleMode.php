<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleMode: string
{
    use ExtendEnums;

    case ACTIVE = "active";
    case PARKED = "parked";
    case MAINTENANCE = "maintenance";

    public function color(): string
    {
        return match ($this) {
            self::MAINTENANCE => "bg-orange-500",
            self::ACTIVE => "bg-green-500",
            self::PARKED => "bg-gray-500"
        };
    }
}
