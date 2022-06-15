<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleGearBoxTypeEnum: string
{
    use ExtendEnums;

    case AUTO_CVT = "Auto CVT";
    case AUTOMATIC = "Automatic";
    case DIRECT_DRIVE = "Direct Drive";
    case DUALCLUTCH = "Dualclutch";
    case DUALCLUTCH_AUTOMATIC = "Dualclutch Automatic";
    case EDC = "EDC";
    case MANUAL = "Manual";
    case PDK = "PDK";
    case SEQUENTIAL = "Sequential";
    case SEQUENTIAL_AUTOMATIC = "Sequential Automatic";
}
