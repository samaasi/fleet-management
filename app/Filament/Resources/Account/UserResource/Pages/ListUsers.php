<?php

namespace App\Filament\Resources\Account\UserResource\Pages;

use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Account\UserResource;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;


    protected function getActions(): array
    {
        return [
            Action::make('send-registration-link')
                ->label('SEND REGISTRATION LINK')
                ->url(fn () => UserResource::getUrl('send-registration-link')),
        ];
    }
}
