<?php

namespace App\Enums;

enum SeoPrefix: string
{
    case PAGE = "sayfalar";

    case COMPANY = "dershaneler";

    case COURSE = "kurslar";

    public function label(): string
    {
        return match ($this) {
            self::PAGE        => 'Sayfalar',
            self::COMPANY      => 'Dershaneler',
            self::COURSE       => 'Kurslar',
        };
    }
}
