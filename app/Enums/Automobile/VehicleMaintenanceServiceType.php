<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleMaintenanceServiceType: string
{
    use ExtendEnums;

    case MATERIAL = "material";
    case LABOUR = "labour";
}
