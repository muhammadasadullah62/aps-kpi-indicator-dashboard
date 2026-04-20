<?php

namespace App\Enums;

enum Department: string
{
    case Mathematics = 'mathematics';

    case Physics = 'physics';

    case Chemistry = 'chemistry';

    case Biology = 'biology';

    case ComputerScience = 'computer_science';

    case English = 'english';

    case Urdu = 'urdu';

    case Islamiyat = 'islamiyat';

    case History = 'history';

    case Geography = 'geography';

    case PhysicalEducation = 'physical_education';

    case Arts = 'arts';

    case ClassTeacher = 'class_teacher';

    case GeneralScience = 'general_science';

    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::Mathematics => 'Mathematics',
            self::Physics => 'Physics',
            self::Chemistry => 'Chemistry',
            self::Biology => 'Biology',
            self::ComputerScience => 'Computer Science',
            self::English => 'English',
            self::Urdu => 'Urdu',
            self::Islamiyat => 'Islamiyat',
            self::History => 'History',
            self::Geography => 'Geography',
            self::PhysicalEducation => 'Physical Education',
            self::Arts => 'Arts',
            self::ClassTeacher => 'Class Teacher',
            self::GeneralScience => 'General Science',
            self::Other => 'Other',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
