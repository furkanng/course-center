<?php

namespace App\Providers;

use App\Enums\Sms;
use App\Models\Setting;
use App\Service\SmsService\NetGsm\NetGsmProvider;
use App\Service\SmsService\SmsProviderInterface;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SmsProviderInterface::class, function ($app) {
            $provider = config('sms.default');

            return match ($provider) {
                Sms::NET_GSM->value => new NetGsmProvider(config('sms.providers.netgsm')),
                default => throw new \Exception("Unsupported SMS provider: {$provider}"),
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        config()->set('sms.providers.netgsm', [
            'baseUrl' => Setting::get("sms_base_url"),
            'userCode' => Setting::get("sms_username"),
            'password' => Setting::get("sms_password"),
            'msgHeader' => Setting::get("sms_msgHeader"),
        ]);
    }
}
