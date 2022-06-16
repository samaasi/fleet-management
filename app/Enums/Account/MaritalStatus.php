<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum MaritalStatus: string
{
    use ExtendEnums;

    case SINGLE = "single";
    case MARRIED = "married";
    case DIVORCE = "divorce";
}
