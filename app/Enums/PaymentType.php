<?php

namespace App\Enums;

enum PaymentType: string
{
    case MOST_SEARCHED = "most_searched";
    case MOST_PREFERENCE = "most_preference";
    case GUEST_REGISTER = "guest_register";

    public function label(): string
    {
        return match ($this) {
            self::MOST_SEARCHED    => 'En Çok Arananlar',
            self::MOST_PREFERENCE  => 'En Çok Tercih Edilen',
            self::GUEST_REGISTER   => 'Misafir Kayıt',
        };
    }
}
