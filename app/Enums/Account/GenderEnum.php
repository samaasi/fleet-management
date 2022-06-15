<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum GenderEnum: string
{
    use ExtendEnums;

    case MALE = "m";
    case FEMALE = "f";
}
