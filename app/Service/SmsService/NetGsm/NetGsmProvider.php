<?php

namespace App\Service\SmsService\NetGsm;

use App\Service\Helper;
use App\Service\SmsService\SmsProviderInterface;
use Illuminate\Support\Facades\Http;

class NetGsmProvider implements SmsProviderInterface
{
    const MESSAGE_URL = 'sms/send/get';
    protected string $userCode;

    protected string $password;
    protected string $msgHeader;

    public function __construct(array $config)
    {
        $this->userCode = $config['userCode'];
        $this->password = $config['password'];
        $this->msgHeader = $config['msgHeader'];
    }


    public function sendSms(array|string $to, string $message): array
    {
        $url = Helper::parseUrl(config("sms.providers.netgsm.baseUrl"), self::MESSAGE_URL);

        $array = array(
            'usercode' => $this->userCode,
            'password' => $this->password,
            'gsmno' => !is_string($to) ? implode(',', $to) : $to,
            'message' => $message,
            'msgheader' => $this->msgHeader,
            'filter' => '0',
            'dil' => 'TR',
        );

        return $this->getResponse(self::post($url, $array));
    }

    private function post(string $url, array $fields): string
    {
        return Http::send('POST', $url, [
            'form_params' => $fields,
            'timeout' => 30,
        ])->onError(function ($response) {
            return $response->throw();
        })->body();
    }

    public function getResponse($response): array
    {
        $parts = explode(' ', $response);

        $code = $parts[0];
        $messageId = $parts[1];

        if ($code == "00") {
            return [
                "status" => "success",
                "code" => $code,
                "messageId" => $messageId,
            ];
        } else {
            return [
                "status" => "error",
                "code" => $code,
                "messageId" => $messageId,
            ];
        }
    }
}
