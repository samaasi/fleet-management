<?php

namespace App\Filament\Resources\Automobile\MaintenanceResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class MaintenanceServicesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'services';

    protected static ?string $recordTitleAttribute = 'vehicle_maintenance_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Work performed'))
                    ->placeholder(__('Work performed'))
                    ->required()
                    ->columnSpan(10),
                TextInput::make('cost')
                    ->label(__('Cost'))
                    ->helperText(__('How much does it cost?'))
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label(__('Name')),
                TextColumn::make('cost')->label(__('Cost')),
            ])
            ->filters([
                //
            ]);
    }
}
