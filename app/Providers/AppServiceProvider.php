<?php

namespace App\Providers;

use App\Filament\Resources\Account\UserResource;
use Faker\Generator;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** Register any application services. */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->app->extend(
                Generator::class,
                fn(Generator $generator) => tap($generator)
                    ->seed('5000')
            );
        }
    }

    /** Bootstrap any application services. */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerTheme(mix('css/app.css'));

            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()
                    ->label(label: __('Your Profile'))
                    ->url(UserResource::getUrl('edit', ['record' => auth()->user()])),
                UserMenuItem::make()
                    ->label(label: __('Manage Users'))
                    ->url(UserResource::getUrl())
                    ->icon(icon: 'icon-users')
            ]);
        });

        Model::unguard();
    }
}
