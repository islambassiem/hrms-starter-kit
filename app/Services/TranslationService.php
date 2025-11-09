<?php

namespace App\Services;

use App\Enums\LanguageEnum;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class TranslationService
{
    public static function getLocale(): string
    {
        if (request()->user()) {
            return request()->user()->prefered_language;
        }

        return app()->getLocale();
    }

    /**
     * @return array<string>
     */
    public function getLanguages(): array
    {
        return LanguageEnum::toArray();
    }

    public static function getTranslations(): void
    {
        $locale = self::getLocale();
        $files = File::allFiles(base_path("lang/$locale"));

        $lastModified = collect($files)->max(fn ($file) => $file->getMTime());

        $cacheKey = "translations.$locale";
        $lastModifiedKey = "translations_modified.$locale";

        if (Cache::get($lastModifiedKey) !== $lastModified) {
            Cache::forget($cacheKey);
        }

        Cache::remember($cacheKey, now()->addYears(), function () use ($lastModifiedKey, $lastModified, $files) {
            Cache::forever($lastModifiedKey, $lastModified);

            return collect($files)->flatMap(function ($file) {
                $fileContents = File::getRequire($file->getRealPath());
                $prefix = pathinfo($file->getFilename(), PATHINFO_FILENAME).'.';

                return is_array($fileContents) ? Arr::dot($fileContents, $prefix) : [];
            })->toArray();
        });
    }
}
