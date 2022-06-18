<?php

namespace App\Filament\Resources\Automobile\VehicleResource\Pages;

use App\Support\Generators\VehicleID;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Automobile\VehicleResource;

class CreateVehicle extends CreateRecord
{
    protected static string $resource = VehicleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return array_merge($data, [
            'identifier' => VehicleID::getID([
                'make' => $data['make'],
                'model' => $data['model'],
                'body' => $data['body_type'],
                'color' => $data['color'],
            ])
        ]);
    }
}
