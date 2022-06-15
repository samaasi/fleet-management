<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?int $navigationSort = 0;

    protected static ?string $navigationIcon = 'icon-dashboard';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            /** Add statical widget classes here */
        ];

    }
}
