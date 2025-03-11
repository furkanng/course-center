<?php

namespace App\Enums;

enum Company: string
{
    case MAX_USER_COMPANY_COUNT = '100';

    public function label(): string
    {
        return match ($this) {
            self::MAX_USER_COMPANY_COUNT => 'Kullanıcının Mmksimum firma sayısı',
        };
    }
}
