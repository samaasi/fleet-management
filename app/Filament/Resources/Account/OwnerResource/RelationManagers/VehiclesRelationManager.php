<?php

namespace App\Filament\Resources\Account\OwnerResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class VehiclesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'vehicles';

    protected static ?string $recordTitleAttribute = 'owner_id';

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
