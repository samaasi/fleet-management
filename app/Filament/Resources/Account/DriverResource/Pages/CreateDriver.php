<?php

namespace App\Filament\Resources\Account\DriverResource\Pages;

use App\Filament\Resources\Account\DriverResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDriver extends CreateRecord
{
    protected static string $resource = DriverResource::class;

    protected static ?string $navigationLabel = "Add New Driver";
}
