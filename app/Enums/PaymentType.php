<?php

namespace App\Enums;

enum PaymentType: string
{
    case MOST_SEARCHED = "most_searched";
    case GUEST_REGISTER = "guest_register";

    public function label(): string
    {
        return match ($this) {
            self::MOST_SEARCHED    => 'En Çok Arananlar',
            self::GUEST_REGISTER   => 'Misafir Kayıt',
        };
    }
}
