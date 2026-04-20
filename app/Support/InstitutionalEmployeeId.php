<?php

namespace App\Support;

use App\Enums\Wing;
use App\Models\User;

final class InstitutionalEmployeeId
{
    public static function wingPrefix(Wing $wing): string
    {
        return match ($wing) {
            Wing::PreJunior => 'PRE',
            Wing::Middle => 'M',
            Wing::Senior => 'SE',
        };
    }

    public static function next(Wing $wing, bool $forSectionHead): string
    {
        $prefix = self::wingPrefix($wing).'-'.($forSectionHead ? 'SEC' : 'TE').'-';

        $maxSerial = User::query()
            ->where('employee_id', 'like', $prefix.'%')
            ->pluck('employee_id')
            ->map(function (string $id) use ($prefix): int {
                if (! str_starts_with($id, $prefix)) {
                    return 0;
                }

                $suffix = substr($id, strlen($prefix));

                return ctype_digit($suffix) ? (int) $suffix : 0;
            })
            ->max() ?? 0;

        $next = $maxSerial + 1;

        if ($next > 9999) {
            throw new \RuntimeException('Employee ID sequence exhausted for pattern '.$prefix);
        }

        return $prefix.str_pad((string) $next, 4, '0', STR_PAD_LEFT);
    }
}
