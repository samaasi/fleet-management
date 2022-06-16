<?php

namespace App\Enums\Account;

use App\Enums\Traits\ExtendEnums;

enum UserAccountType: string
{
    use ExtendEnums;

    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case OWNER = 'owner';
    case DRIVER = 'driver';
    case CUSTOMER = 'customer';
}
