<?php

namespace App\Support;

final class DepartmentLabelNormalizer
{
    public static function normalize(?string $label): string
    {
        if ($label === null || $label === '') {
            return '';
        }

        $trimmed = trim(preg_replace('/\s+/u', ' ', $label) ?? '');

        return mb_strtolower($trimmed, 'UTF-8');
    }

    public static function areConflicting(?string $a, ?string $b): bool
    {
        $na = self::normalize($a);
        $nb = self::normalize($b);

        if ($na === '' || $nb === '') {
            return false;
        }

        if ($na === $nb) {
            return true;
        }

        if (mb_strlen($na) < 3 || mb_strlen($nb) < 3) {
            return false;
        }

        similar_text($na, $nb, $pct);

        return $pct >= 88.0;
    }
}
