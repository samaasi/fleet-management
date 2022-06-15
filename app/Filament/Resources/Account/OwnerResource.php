<?php

namespace App\Filament\Resources\Account;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use App\Models\Account\Owner;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\Account\OwnerResource\Pages;
use App\Filament\Resources\Account\OwnerResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class OwnerResource extends Resource
{
    protected static ?int $navigationSort = 1;

    protected static ?string $label = 'Car Owner';

    protected static ?string $model = Owner::class;

    protected static ?string $navigationLabel = 'Owners';

    protected static ?string $navigationGroup = 'Account';

    protected static ?string $navigationIcon = 'icon-owner-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)
                    ->schema([
                            SpatieMediaLibraryFileUpload::make('passport')
                                ->avatar()
                                ->collection(Owner::OWNER_PASSPORT_MEDIA_COLLECTION)
                                ->columnSpan(6),
                            TextInput::make('first_name')
                                ->label(__('First name'))
                                ->placeholder(__('First name'))
                                ->required()
                                ->columnSpan(2),
                            TextInput::make('last_name')
                                ->label(__('Last name'))
                                ->placeholder(__('Last name'))
                                ->required()
                                ->columnSpan(2),
                            TextInput::make('other_name')
                                ->label(__('Other name'))
                                ->placeholder(__('Other name'))
                                ->required()
                                ->columnSpan(2),
                            TextInput::make('email')
                                ->label(__('Email address'))
                                ->placeholder(__('Email address'))
                                ->required()
                                ->columnSpan(3),
                            TextInput::make('phone')
                                ->label(__('Phone number'))
                                ->placeholder(__('Phone number'))
                                ->required()
                                ->columnSpan(3),
                            TextInput::make('community')
                                ->label(__('Community'))
                                ->placeholder(__('Community'))
                                ->columnSpan(6),
                            TextInput::make('city')
                                ->label(__('City'))
                                ->placeholder(__('City'))
                                ->required()->columnSpan(4),
                            TextInput::make('state')
                                ->label(__('State of origin'))
                                ->placeholder(__('State of origin'))
                                ->required()->columnSpan(1),
                            TextInput::make('country')
                                ->label(__('Nationality'))
                                ->placeholder(__('Nationality'))
                                ->required()->columnSpan(1)
                    ]
                )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('other_name'),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('community'),
                TextColumn::make('city'),
                TextColumn::make('state'),
                TextColumn::make('country')
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AddressesRelationManager::class,
            RelationManagers\VehiclesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOwners::route('/'),
            'create' => Pages\CreateOwner::route('/create'),
            'edit' => Pages\EditOwner::route('/{record}/edit'),
        ];
    }
}
