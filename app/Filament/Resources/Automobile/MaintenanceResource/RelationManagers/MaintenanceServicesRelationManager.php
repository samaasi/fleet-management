<?php

namespace App\Filament\Resources\Automobile\MaintenanceResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use App\Enums\Automobile\VehicleMaintenanceServiceTypeEnum;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class MaintenanceServicesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'services';

    protected static ?string $recordTitleAttribute = 'vehicle_maintenance_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)->schema([
                    Select::make('type')
                        ->label(__('Type'))
                        ->options(VehicleMaintenanceServiceTypeEnum::options())
                        ->default(__('material'))
                        ->placeholder(__('Select Type'))
                        ->required()
                        ->columnSpan(1),
                    Placeholder::make('')->columnSpan(5),
                    TextInput::make('name')
                        ->label(__('Work performed'))
                        ->placeholder(__('Work performed'))
                        ->required()
                        ->columnSpan(5),
                    TextInput::make('cost')
                        ->label(__('Cost'))
                        ->helperText(__('How much does it cost?'))
                        ->default(0)
                        ->columnSpan(1),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->label(__('Type')),
                TextColumn::make('name')->label(__('Name')),
                TextColumn::make('cost')->label(__('Cost')),
            ])
            ->filters([
                //
            ]);
    }
}
