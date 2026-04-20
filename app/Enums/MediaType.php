<?php

namespace App\Enums;

enum MediaType: string
{
    case Image = 'image';

    case Pdf = 'pdf';

    case Document = 'document';

    case Spreadsheet = 'spreadsheet';

    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::Image => 'Image',
            self::Pdf => 'PDF',
            self::Document => 'Document',
            self::Spreadsheet => 'Spreadsheet',
            self::Other => 'Other',
        };
    }
}
