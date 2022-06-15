<?php

namespace App\Filament\Resources\Account\DriverResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class DriverLicensesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'licenses';

    protected static ?string $recordTitleAttribute = 'driver_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->label(__('Type'))
                    ->placeholder(__('Type'))
                    ->options([])
                    ->required(),
                Select::make('generic')
                    ->label(__('License type'))
                    ->placeholder(__('License type'))
                    ->options([])
                    ->required(),
                TextInput::make('class')
                    ->label(__('License class'))
                    ->placeholder(__('License class')),
                TextInput::make('number')
                    ->label(__('License number'))
                    ->placeholder(__('License number'))
                    ->required(),
                DatePicker::make('first_issued_date')
                    ->label(__('1st issued date'))
                    ->placeholder(__('1st issued date')),
                DatePicker::make('issued_date')
                    ->label(__('Issued date'))
                    ->placeholder(__('Issued date'))
                    ->required(),
                DatePicker::make('expiration_date')
                    ->label(__('Expiry date'))
                    ->placeholder(__('Expiry date'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->label(__('Type')),
                TextColumn::make('generic')->label(__('License type')),
                TextColumn::make('class')->label(__('License class')),
                TextColumn::make('number')->label(__('License number')),
                TextColumn::make('first_issued_date')->label(__('1st issued date')),
                TextColumn::make('issued_date')->label(__('Issued date')),
                TextColumn::make('expiration_date')->label(__('Expiry date')),
            ])
            ->filters([
                //
            ]);
    }
}
