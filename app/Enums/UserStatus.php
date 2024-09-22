<?php

namespace App\Enums;

enum UserStatus: string
{
    case PENDING = "pending";
    case ACCEPTED = "accepted";
    case REJECTED = "rejected";

    public function label(): string
    {
        return match ($this) {
            self::PENDING        => 'Bekliyor',
            self::ACCEPTED       => 'Onaylandı',
            self::REJECTED       => 'Reddedildi',
        };
    }
}
