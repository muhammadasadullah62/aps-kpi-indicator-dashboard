<?php

namespace App\Enums;

enum ReportAssessmentFilter: string
{
    case All = 'all';

    case Standardized = 'standardized';

    case Midterms = 'midterms';

    case Finals = 'finals';

    public function label(): string
    {
        return match ($this) {
            self::All => 'All assessment types',
            self::Standardized => 'Standardized tests',
            self::Midterms => 'Midterms',
            self::Finals => 'Finals',
        };
    }
}
