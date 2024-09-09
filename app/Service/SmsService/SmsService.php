<?php

namespace App\Service\SmsService;


use App\Service\SmsService\NetGsm\NetGsmProvider;

class SmsService
{
    protected static ?SmsProviderInterface $provider = null;

    protected static function getProvider(): SmsProviderInterface
    {
        if (self::$provider === null) {
            self::$provider = (new NetGsmProvider(config("sms.providers.netgsm")));
        }
        return self::$provider;
    }

    public static function sendSms(array|string $to, string $message)
    {
        return self::getProvider()->sendSms($to, $message);
    }
}
