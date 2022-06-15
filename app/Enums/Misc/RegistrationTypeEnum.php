<?php

namespace App\Enums\Misc;

use App\Enums\Traits\ExtendEnums;

enum RegistrationTypeEnum: string
{
    use ExtendEnums;

    case USER = "user";
    case DRIVER = "driver";
}
