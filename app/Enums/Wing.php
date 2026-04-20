<?php

namespace App\Enums;

enum Wing: string
{
    case Senior = 'senior';

    case Middle = 'middle';

    case PreJunior = 'pre_junior';

    public function label(): string
    {
        return match ($this) {
            self::Senior => 'Senior wing',
            self::Middle => 'Middle wing',
            self::PreJunior => 'Pre/junior wing',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
