<?php

namespace App\Filament\Resources\Account\OwnerResource\RelationManagers;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Tables\Columns\TextColumn;

class AddressesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'addresses';

    protected static ?string $recordTitleAttribute = 'owner_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('address')->label(__(''))->placeholder(__(''))->required(),
                TextInput::make('city')->label(__(''))->placeholder(__(''))->required(),
                TextInput::make('state')->label(__(''))->placeholder(__(''))->required(),
                TextInput::make('country')->label(__(''))->placeholder(__(''))->required(),
                Textarea::make('note')->label(__(''))->placeholder(__('')),
                Toggle::make('default')->label(__('')),
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
