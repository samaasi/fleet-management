<?php

namespace App\Contracts;

interface SmsServiceContract
{
    public function client();

    /** Send sms request */
    public function send(array $attributes);

    /** Get user balance */
    public function balance();
}
