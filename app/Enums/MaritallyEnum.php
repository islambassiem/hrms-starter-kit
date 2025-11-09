<?php

namespace App\Enums;

use App\Services\TranslationService;

enum MaritallyEnum: int
{
    case SINGLE = 1;
    case MARRIED = 2;
    case OTHER = 3;
    case UNDEFINED = 9;

    /**
     * @return array<int>
     */
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[] = $case->value;
        }

        return $array;
    }

    /**
     * @return array<string, string|int>
     */
    public function label(): array
    {
        $locale = TranslationService::getLocale();

        return match ($this) {
            self::SINGLE => ['id' => 1, 'name' => $locale === 'en' ? 'Single' : 'اعزب'],
            self::MARRIED => ['id' => 2, 'name' => $locale === 'en' ? 'Married' : 'متزوج'],
            self::OTHER => ['id' => 3, 'name' => $locale === 'en' ? 'Other' : 'اخرى'],
            self::UNDEFINED => ['id' => 3, 'name' => $locale === 'en' ? 'Undefined' : 'غير محدد'],
        };
    }
}
