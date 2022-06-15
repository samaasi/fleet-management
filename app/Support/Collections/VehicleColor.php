<?php

namespace App\Support\Collections;

use Squire\Model;

class VehicleColor extends Model
{
    public static array $schema = [
        'id' => 'string',
        'name' => 'string',
    ];
}
