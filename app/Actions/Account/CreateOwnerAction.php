<?php

namespace App\Actions\Account;

use App\Models\Account\Owner;
use App\DataTransferObjects\Account\CreateOwnerData;

class CreateOwnerAction
{
    public static function execute(
        CreateOwnerData $request
    ): Owner {
       return Owner::query()->create([

        ]);
    }
}
