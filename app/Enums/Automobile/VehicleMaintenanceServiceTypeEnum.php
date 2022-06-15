<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleMaintenanceServiceTypeEnum: string
{
    use ExtendEnums;

    case MATERIAL = "material";
    case LABOUR = "labour";
}
