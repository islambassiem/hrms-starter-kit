<?php

namespace App\Enums;

use App\Services\TranslationService;

enum LanguageEnum: string
{
    case ARABIC = 'ar';
    case ENGLISH = 'en';

    /**
     * @return array<string>
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
            self::ARABIC => ['id' => 1, 'name' => $locale === 'en' ? 'Arabic' : 'عربي'],
            self::ENGLISH => ['id' => 2, 'name' => $locale === 'en' ? 'English' : 'انجليزي'],
        };
    }
}
