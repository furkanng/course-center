<?php

namespace App\Enums;

enum SeoPrefix: string
{
    case PAGE = "sayfalar";

    case COMPANY = "dersligler";

    case COURSE = "kurslar";

    public function label(): string
    {
        return match ($this) {
            self::PAGE        => 'Sayfalar',
            self::COMPANY      => 'Dersligler',
            self::COURSE       => 'Kurslar',
        };
    }
}
