<?php

namespace App\Service\SmsService;

interface SmsProviderInterface
{
    public function sendSms(array|string $to, string $message);

}
