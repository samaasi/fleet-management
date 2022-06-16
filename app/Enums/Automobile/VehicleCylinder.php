<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleCylinder: int
{
    use ExtendEnums;

    case TWIN_CYLINDERS = 2;
    case THREE_CYLINDERS = 3;
    case FOUR_CYLINDERS = 4;
    case FIVE_CYLINDERS = 5;
    case SIX_CYLINDERS = 6;
    case EIGHT_CYLINDERS = 8;
    case TWELVE_CYLINDERS = 12;
}
