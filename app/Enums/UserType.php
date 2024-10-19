<?php

namespace App\Enums;

enum UserType: string
{
    case ADMIN = "admin";
    case STUDENT = "student";
    case TEACHER = "teacher";
    case GRADUATED = "graduated";
    case PARENT = "parent";
    case INSTITUTION_MANAGER = "institution_manager";
    case INSTITUTION_WORKER = "institution_worker";

    public function label(): string
    {
        return match ($this) {
            self::ADMIN                  => 'Admin',
            self::STUDENT                => 'Öğrenci',
            self::TEACHER                => 'Öğretmen',
            self::GRADUATED              => 'Mezun',
            self::PARENT                 => 'Veli',
            self::INSTITUTION_MANAGER    => 'Kurum Yöneticisi',
            self::INSTITUTION_WORKER     => 'Kurum Çalışanı',
        };
    }

    public function isCompany(): bool
    {
        return match ($this) {
            self::INSTITUTION_MANAGER,
            self::INSTITUTION_WORKER     => true,
            default                      => false,
        };
    }

    public function isGuest(): bool
    {
        return match ($this) {
            self::STUDENT,
            self::TEACHER,
            self::GRADUATED,
            self::PARENT                 => true,
            default                      => false,
        };
    }
}
