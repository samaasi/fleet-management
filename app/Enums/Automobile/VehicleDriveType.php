<?php

namespace App\Enums\Automobile;

use App\Enums\Traits\ExtendEnums;

enum VehicleDriveType: string
{
    use ExtendEnums;

    case F4WD = "4WD";
    case AWD = "AWD";
    case FWD = "FWD";
    case RWD = "RWD";
}
//Maintenance scheduling: Timely upkeep of machinery and equipment
// My Bookings (You don't have any bookings yet, but when you do, you'll find them here.)
// Messages (You don't have any messages, but when you do, you'll find them here)
