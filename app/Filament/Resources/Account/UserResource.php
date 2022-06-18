<?php

namespace App\Filament\Resources\Account;

use App\Models\Account\User;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\Account\UserResource\Pages;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?int $navigationSort = 2;

    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $navigationGroup = 'Account';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'icon-users';

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
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('type'),




            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            //'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'send-registration-link' => Pages\RegistrationLink::route('/send-registration-link'),
        ];
    }
}
