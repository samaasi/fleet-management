<?php

namespace App\Services\Sms;

use App\Contracts\SmsServiceContract;

class Termii //implements SmsService
{
    public string $name = 'termii';

    protected string $type;
    protected string $from;
    protected string $channel;
    protected string $api_key;
    protected string $base_url;

    protected int $status;
    protected mixed $response;

    public function __construct()
    {
        $this->from = config('sms.from');
        $this->type = config('sms.drivers.termii.type');
        $this->channel = config('sms.drivers.termii.channel');
        $this->api_key = config('sms.drivers.termii.api_key');
        $this->base_url = config('sms.drivers.termii.base_url');
    }

    /** @throws RequestException */
    public function send(array $attributes)
    {
        $time = now()->format('Y-m-d H:i:s');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($this->base_url. '/api/sms/send', [
            'to' => $attributes['to'],
            'from' => empty($attributes['from']) ? $this->from : $attributes['from'],
            'sms' => $attributes['message'],
            'type' => $this->type,
            'channel' => $this->channel,
            'api_key' => $this->api_key,
        ])->throw()->json();
    }

    public function balance()
    {
        // TODO: Implement balance() method.
    }
}
