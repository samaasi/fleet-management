<?php

namespace App\Notifications\Auth;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyUserAccountWasCreatedForNotification extends Notification
{
    public function __construct(
        public string $password
    ){}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting("Hi {$notifiable->email},")
            ->subject('Account created for you.')
            ->line('An administrative account has been created for you.')
            ->line("Login using your email and the given password: {$this->password}")
            ->action('Login Url', route('login'))
            ->line('Thank you for using our application!');
    }
}
