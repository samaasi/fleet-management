<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum DriverLicenseType: string
{
    use ExtendEnums;

    case DRIVER_LICENSES = "driver license";
}
