<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum DriverLicenseGenericEnum: string
{
    use ExtendEnums;

    case PRIVATE = "private";
    case COMMERCIAL = "commercial";
}
