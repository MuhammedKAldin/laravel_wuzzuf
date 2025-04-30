<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CategoryType extends Enum
{
    const DESIGN_AND_CREATIVE = 1;
    const MARKETING = 2;
    const TELEMARKETING = 3;
    const SOFTWARE_AND_WEB = 4;
    const ADMINISTRATION = 5;
    const TEACHING_AND_EDUCATION = 6;
    const ENGINEERING = 7;
    const GARMENTS_AND_TEXTILE = 8;

    public static function getDescription($value): string
    {
        return match ($value) {
            self::DESIGN_AND_CREATIVE => 'Design & Creative',
            self::MARKETING => 'Marketing',
            self::TELEMARKETING => 'Telemarketing',
            self::SOFTWARE_AND_WEB => 'Software & Web',
            self::ADMINISTRATION => 'Administration',
            self::TEACHING_AND_EDUCATION => 'Teaching & Education',
            self::ENGINEERING => 'Engineering',
            self::GARMENTS_AND_TEXTILE => 'Garments / Textile',
            default => parent::getDescription($value),
        };
    }
} 