<?php

namespace App\Notifications\Account;

use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;

class ExpiringDriverLicensesNotification extends Notification
{
    public function __construct(
        public Collection $licenses
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('')
            ->markdown('notifications.markdown.report-expiring-driver-licenses', [
                'licenses' => $this->licenses
            ]);
    }
}
