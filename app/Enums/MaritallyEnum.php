<?php

namespace App\Enums;

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
        return match ($this) {
            self::SINGLE => ['id' => 1, 'name' => app()->getLocale() === 'en' ? 'Single' : 'اعزب'],
            self::MARRIED => ['id' => 2, 'name' => app()->getLocale() === 'en' ? 'Married' : 'متزوج'],
            self::MARRIED => ['id' => 3, 'name' => app()->getLocale() === 'en' ? 'Other' : 'اخرى'],
            self::MARRIED => ['id' => 3, 'name' => app()->getLocale() === 'en' ? 'Undefined' : 'غير محدد'],
        };
    }
}
