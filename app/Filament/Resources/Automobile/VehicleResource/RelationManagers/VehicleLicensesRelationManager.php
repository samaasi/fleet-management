<?php

namespace App\Filament\Resources\Automobile\VehicleResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class VehicleLicensesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'licenses';

    protected static ?string $recordTitleAttribute = 'vehicle_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('type')
                    ->label(__('Type'))
                    ->placeholder(__('Type'))
                    ->required(),
                TextInput::make('number')
                    ->label(__('Number'))
                    ->placeholder(__('Number'))
                    ->required(),
                TextInput::make('first_issued_date')
                    ->label(__('1st issued date'))
                    ->placeholder(__('1st issued date'))
                    ->required(),
                TextInput::make('issued_date')
                    ->label(__('Issued date'))
                    ->placeholder(__('Issued date'))
                    ->required(),
                Textarea::make('expiration_date')
                    ->label(__('Expiry date'))
                    ->placeholder(__('Expiry date'))
                    ->required(),
                Toggle::make('verified')
                    ->label(__('Verified')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address'),
                TextColumn::make('city'),
                TextColumn::make('state'),
                TextColumn::make('country'),
                TextColumn::make('default')
            ])
            ->filters([
                //
            ]);
    }
}
