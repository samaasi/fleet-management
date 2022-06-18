<?php

namespace App\Filament\Resources\Automobile\MaintenanceResource\Pages;

use App\Filament\Resources\Automobile\MaintenanceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMaintenance extends CreateRecord
{
    protected static string $resource = MaintenanceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        dd($data);
    }
}
