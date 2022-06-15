<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum MaritalStatusEnum: string
{
    use ExtendEnums;

    case SINGLE = "single";
    case MARRIED = "married";
    case DIVORCE = "divorce";
}
