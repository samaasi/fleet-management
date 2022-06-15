<?php

namespace App\Providers;

use Exception;
use App\Contracts\SmsServiceContract;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SmsServiceContract::class, static function ($app) {
            $driver = config('services.sms.default_driver');// use db config from setting or .env

            if ($driver === 'kudisms') {
                //return new KudiSms();
            }

            // Add more drivers

            throw new Exception('The sms driver is invalid');
        });
    }
}
