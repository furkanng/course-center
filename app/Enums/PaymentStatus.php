<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PAID = "paid";
    case UNPAID = "unpaid";

    public function label(): string
    {
        return match ($this) {
            self::PAID        => 'Ödendi',
            self::UNPAID      => 'Ödeme Bekleniyor',
        };
    }
}
