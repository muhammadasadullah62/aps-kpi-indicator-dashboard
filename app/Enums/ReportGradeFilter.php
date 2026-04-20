<?php

namespace App\Enums;

enum ReportGradeFilter: string
{
    case All = 'all';

    case Grade9 = '9';

    case Grade10 = '10';

    case Grade11 = '11';

    case Grade12 = '12';

    public function label(): string
    {
        return match ($this) {
            self::All => 'All grades',
            self::Grade9 => 'Grade 9',
            self::Grade10 => 'Grade 10',
            self::Grade11 => 'Grade 11',
            self::Grade12 => 'Grade 12',
        };
    }
}
