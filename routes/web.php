<?php

use App\Services\TranslationService;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('auth/login', [
        'canResetPassword' => Features::enabled(Features::resetPasswords()),
    ]);
})->name('home');

Route::get('/translations/{groups?}', function ($groups = []) {
    if (empty($groups)) {
        return response()->json([
            'translations' => TranslationService::getTranslations(),
        ]);
    }
    $groupsArray = explode(',', $groups);

    return response()->json([
        'translations' => TranslationService::getTranslations($groupsArray),
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
