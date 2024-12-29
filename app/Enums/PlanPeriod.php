<?php

namespace App\Enums;

enum PlanPeriod: string
{
    case PERMANENT = "permanent";
    case DAY_1 = "day_1";
    case WEEK_1 = "week_1";
    case WEEK_2 = "week_2";
    case MONTH_1 = "month_1";
    case MONTH_2 = "month_2";
    case MONTH_6 = "month_6";
    case YEAR_1 = "year_1";
    case YEAR_2 = "year_2";

    public function label(): string
    {
        return match ($this) {
            self::PERMANENT => 'Sınırsız',
            self::DAY_1 => '1 Gün',
            self::WEEK_1 => '1 Hafta',
            self::WEEK_2 => '2 Hafta',
            self::MONTH_1 => '1 Ay',
            self::MONTH_2 => '2 Ay',
            self::MONTH_6 => '6 Ay',
            self::YEAR_1 => '1 Yıl',
            self::YEAR_2 => '2 Yıl',
        };
    }

    public function days(): ?int
    {
        return match ($this) {
            self::PERMANENT => null,
            self::DAY_1 => 1,
            self::WEEK_1 => 7,
            self::WEEK_2 => 14,
            self::MONTH_1 => 30,
            self::MONTH_2 => 60,
            self::MONTH_6 => 180,
            self::YEAR_1 => 365,
            self::YEAR_2 => 730,
        };
    }
}

