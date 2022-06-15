<?php

namespace App\Enums\Misc;

use App\Enums\Traits\ExtendEnums;

enum ReligionEnum: string
{
    use ExtendEnums;

    case MUSLIM = "muslim";
    case CHRISTIANITY = "christianity";
}
