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
        /** @var ?\App\Models\User $user */
        $user = request()->user();

        return $user->prefered_language ?? app()->getLocale();
    }

    /**
     * @return array<string>
     */
    public function getLanguages(): array
    {
        return LanguageEnum::toArray();
    }

    /**
     * @param  array<int, string>  $groups
     * @return array<string, mixed>
     */
    public static function getTranslations(array $groups = []): array
    {
        if (empty($groups)) {
            return [];
        }

        $locale = self::getLocale();
        $basePath = base_path("lang/$locale");

        if (! File::exists($basePath)) {
            return [];
        }

        $files = collect(File::allFiles($basePath))
            ->filter(fn ($file) => in_array(pathinfo($file->getFilename(), PATHINFO_FILENAME), $groups));

        $lastModified = collect($files)->max(fn ($file) => $file->getMTime());

        $cacheKey = "translations.$locale.".implode('.', $groups);
        $lastModifiedKey = "translations_modified.$locale";

        if (Cache::get($lastModifiedKey) !== $lastModified) {
            Cache::forget($cacheKey);
        }

        /** @var array<string, mixed> */
        return Cache::rememberForever($cacheKey, function () use ($lastModifiedKey, $lastModified, $files) {
            Cache::forever($lastModifiedKey, $lastModified);

            return $files->flatMap(function ($file) {
                $array = File::getRequire($file->getRealPath());
                $prefix = pathinfo($file->getFilename(), PATHINFO_FILENAME).'.';

                return is_array($array) ? Arr::dot($array, $prefix) : [];
            })->toArray();
        });
    }
}
