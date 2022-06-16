<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum Gender: string
{
    use ExtendEnums;

    case MALE = "m";
    case FEMALE = "f";
}
