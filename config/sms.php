<?php

return [

    'default' => env('SMS_PROVIDER', 'netgsm'),

    'providers' => [

        'netgsm' => [
            'baseUrl' => env('NETGSM_BASE_URL'),
            'userCode' => env('NETGSM_USERCODE'),
            'password' => env('NETGSM_PASSWORD'),
            'msgHeader' => env('NETGSM_MESSAGE_HEADER'),
        ],

    ],

];
