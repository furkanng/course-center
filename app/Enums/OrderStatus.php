<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = "pending";
    case PUBLISHED = "published";

    public function label(): string
    {
        return match ($this) {
            self::PENDING     => 'İnceleniyor',
            self::PUBLISHED   => 'Yayınlandı',
        };
    }
}
