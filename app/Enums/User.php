<?php

namespace App\Enums;

enum User: string
{
    case STUDENT = "student";
    case TEACHER = "teacher";
    case GRADUATED = "graduated";
    case PARENT = "parent";

    public function label(): string
    {
        return match ($this) {
            self::STUDENT        => 'Öğrenci',
            self::TEACHER        => 'Öğretmen',
            self::GRADUATED      => 'Mezun',
            self::PARENT         => 'Veli',
        };
    }
}
