<?php

namespace App\Filament\Resources\Automobile\VehicleResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class VehicleMaintenancesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'maintenances';

    protected static ?string $recordTitleAttribute = 'vehicle_id';

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
