<?php

namespace App\Filament\Resources\Account\DriverResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class DriverAddressesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'addresses';

    protected static ?string $recordTitleAttribute = 'driver_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ]);
    }
}
