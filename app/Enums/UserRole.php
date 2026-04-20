<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';

    case Principal = 'principal';

    case SectionHead = 'section_head';

    case Faculty = 'faculty';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Principal => 'Principal',
            self::SectionHead => 'Section head',
            self::Faculty => 'Faculty',
        };
    }
}
