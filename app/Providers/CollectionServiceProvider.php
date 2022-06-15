<?php

namespace App\Providers;

use Squire\Repository;
use Illuminate\Support\ServiceProvider;
use App\Support\Collections\VehicleMake;
use App\Support\Collections\VehicleColor;
use App\Support\Collections\VehicleModel;

class CollectionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(
            VehicleMake::class,
            'en',
            __DIR__ . '/../Support/Collections/Resources/vehicle-make-data.csv'
        );
        Repository::registerSource(
            VehicleModel::class,
            'en',
            __DIR__ . '/../Support/Collections/Resources/vehicle-model-data.csv'
        );
        Repository::registerSource(
            VehicleColor::class,
            'en',
            __DIR__ . '/../Support/Collections/Resources/vehicle-color-data.csv'
        );
    }
}
