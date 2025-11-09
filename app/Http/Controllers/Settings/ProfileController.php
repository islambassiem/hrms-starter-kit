<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Show the user's profile settings page.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('settings/profile', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => $request->session()->get('status'),
        ]);
    }

    /**
     * Update the user's profile settings.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = request()->user();
        if (! $user) {
            return to_route('profile.edit');
        }

        /** @var \Illuminate\Http\UploadedFile | null $avatar */
        $avatar = $request->validated('avatar');

        if ($avatar) {
            $path = public_path('storage/profile/'.$user->employee_code.'.jpeg');
            if (file_exists($path)) {
                unlink($path);
            }
            $avatar->storeAs('profile', $user->employee_code.'.jpeg', 'public');
        }

        $user->fill([
            'name' => $request->validated()['name'],
        ]);

        $user->save();

        return redirect()->route('profile.edit');
    }
}
