<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = "admin";
    case COMPANY = "company";
    case GUEST = "guest";

    public function label(): string
    {
        return match ($this) {
            self::ADMIN        => 'Admin',
            self::COMPANY      => 'Kurum Yetkili',
            self::GUEST        => 'Misafir',
        };
    }
}
