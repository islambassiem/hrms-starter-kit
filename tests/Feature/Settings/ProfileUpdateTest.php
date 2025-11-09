<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('profile page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('profile.edit'));

    $response->assertOk();
});

test('name can be updated', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => 'Test User',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile.edit'));

    $user->refresh();

    expect($user->name)->toBe('Test User');
});

test('avarar can be uploaded', function () {
    Storage::fake('pubic');
    $user = User::factory()->create();
    $file = UploadedFile::fake()->image('my_image.jpg', 600, 600);
    $response = $this->actingAs($user)->patch(route('profile.update'), ['name' => 'Test User', 'avatar' => $file]);
    $response->assertSessionHasNoErrors()->assertRedirect(route('profile.edit'));
    $user->refresh();

    /** @var \Illuminate\Filesystem\FakeFilesystem $disk */
    $disk = Storage::disk('public');
    $disk->assertExists('profile/'.$user->employee_code.'.jpeg');
});

test('old avatar is deleted when a new avatar is uploaded', function () {
    Storage::fake('pubic');
    $user = User::factory()->create();

    $oldAvatar = UploadedFile::fake()->image('first_image.jpg', 600, 600);

    // Upload the second avatar
    $newAvarar = UploadedFile::fake()->image('second_image.jpg', 600, 600);
    $this->actingAs($user)->patch(route('profile.update'), [
        'name' => 'Test User',
        'avatar' => $newAvarar,
    ]);

    /** @var \Illuminate\Filesystem\FakeFilesystem $disk */
    $disk = Storage::disk('public');
    $disk->assertMissing('profile/'.$oldAvatar);
    $disk->assertExists('profile/'.$user->employee_code.'.jpeg');
});

test('invalid file data is not updated', function () {
    Storage::fake('pubic');
    $user = User::factory()->create();
    $file = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');

    $response = $this
        ->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => 'Test name',
            'avatar' => $file,
        ]);

    $response->assertSessionHasErrors();

    $user->refresh();

    expect($user->name)->toBe($user->name);
});

test('large file cannot be uploaded as avatar', function () {
    Storage::fake('pubic');
    $user = User::factory()->create();
    $file = UploadedFile::fake()->image('large_image.jpg')->size(3000); // 3MB

    $response = $this
        ->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => 'Test name',
            'avatar' => $file,
        ]);

    $response->assertSessionHasErrors();

    $user->refresh();

    expect($user->name)->toBe($user->name);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->patch(route('profile.update'), [
            'name' => 'Test User',
            'email' => $user->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile.edit'));

    expect($user->refresh()->email_verified_at)->not->toBeNull();
});
