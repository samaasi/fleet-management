<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum DriverLicenseTypeEnum: string
{
    use ExtendEnums;

    case DRIVER_LICENSES = "driver license";
}
