<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleColorEnum: string
{
    use ExtendEnums;

    case White  = 'White';
    case Black  = 'Black';
    case Gray   = 'Gray';
    case Silver	= 'Silver';
    case Red    = 'Red';
    case Blue   = 'Blue';
    case Brown  = 'Brown';
    case Green  = 'Green';
    case Beige  = 'Beige';
    case Orange = 'Orange';
    case Gold   = 'Gold';
    case Yellow = 'Yellow';
    case Purple = 'Purple';

    public function colorCode(): string
    {
        return match ($this) {
            self::White     => "bg-white",
            self::Black     => "bg-black",
            self::Gray      => "bg-gray-900",
            self::Silver    => "bg-silver-900",
            self::Red       => "bg-red-900",
            self::Blue      => "bg-blue-900",
            self::Brown     => "bg-brown-900",
            self::Green     => "bg-green-900",
            self::Beige     => "bg-beige-900",
            self::Orange    => "bg-orange-900",
            self::Gold      => "bg-gold-900",
            self::Yellow    => "bg-yellow-900",
            self::Purple    => "bg-purple-900",
        };
    }
}
