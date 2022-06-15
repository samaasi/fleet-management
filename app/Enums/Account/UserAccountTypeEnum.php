<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum UserAccountTypeEnum: string
{
    use ExtendEnums;

    case OWNER = 'owner';
    case DRIVER = 'driver';
    case CUSTOMER = 'customer';
}
