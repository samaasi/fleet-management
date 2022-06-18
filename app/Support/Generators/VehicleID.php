<?php

namespace App\Support\Generators;

use App\Models\Automobile\Vehicle;

class VehicleID
{
    public static function getID(array $attributes): string
    {
        $make = substr(strtoupper($attributes['make']), 0, 2);
        $model = substr(strtoupper($attributes['model']), 0, 2);
        $body = substr(strtoupper($attributes['body']), 0, 1);
        $color = substr(strtoupper($attributes['color']), 0, 1);

        $id = Vehicle::query()->latest()->value('id');

        if (is_null($id)) {
            $id = 0;
        }

        $id = ++$id;

        return "{$make}{$model}{$body}{$color}-{$id}";
    }
}
