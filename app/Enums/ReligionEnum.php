<?php

declare(strict_types=1);

namespace App\Enums;

use App\Services\TranslationService;

enum ReligionEnum: int
{
    case MUSLIM = 1;
    case CHRISTIAN = 2;
    case JEWISH = 3;
    case SIKH = 4;
    case HINDU = 5;
    case BUDDHIST = 6;
    case OTHER = 7;
    case UNDEFINED = 8;

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
     * @return array<string, string>
     */
    public function label(): array
    {
        $locale = TranslationService::getLocale();

        return match ($this) {
            self::MUSLIM => ['id' => '1', 'name' => $locale === 'en' ? 'Muslim' : 'مسلم'],
            self::CHRISTIAN => ['id' => '2', 'name' => $locale === 'en' ? 'Christian' : 'مسيحي'],
            self::JEWISH => ['id' => '3', 'name' => $locale === 'en' ? 'Jewish' : 'يهودي'],
            self::SIKH => ['id' => '4', 'name' => $locale === 'en' ? 'Sikh' : 'سيخي'],
            self::HINDU => ['id' => '5', 'name' => $locale === 'en' ? 'Hindu' : 'هندي'],
            self::BUDDHIST => ['id' => '6', 'name' => $locale === 'en' ? 'Buddhist' : 'بودي'],
            self::OTHER => ['id' => '7', 'name' => $locale === 'en' ? 'Other' : 'أخرى'],
            self::UNDEFINED => ['id' => '8', 'name' => $locale === 'en' ? 'Undefined' : 'غير محدد'],
        };
    }
}
