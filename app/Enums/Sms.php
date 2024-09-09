<?php

namespace App\Enums;

enum Sms: string
{
    case NET_GSM = "netgsm";

    public function label(): string
    {
        return match ($this) {
            self::NET_GSM        => 'Net Gsm',
        };
    }
}
