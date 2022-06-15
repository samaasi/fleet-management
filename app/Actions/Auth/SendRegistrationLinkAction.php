<?php

namespace App\Actions\Auth;

use App\DataTransferObjects\Auth\SendRegistrationLinkData;
use Illuminate\Support\Facades\Mail;

class SendRegistrationLinkAction
{
    public static function execute(SendRegistrationLinkData $request)
    {

    }

    protected function findRegistrationFormRoute(string $form): string
    {
        return match ($form) {
            ($form === '') => '',
            default => '',
        };
    }
}
