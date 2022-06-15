<?php

namespace App\Notifications\Automobile;

use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;

class ExpiringVehicleLicensesNotification extends Notification
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
            ->markdown('notifications.markdown.report-expiring-vehicle-licenses', [
                'licenses' => $this->licenses
            ]);
    }
}
