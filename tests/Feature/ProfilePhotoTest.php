<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProfilePhotoTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_upload_profile_photo(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $file = UploadedFile::fake()->image('avatar.jpg', 400, 400);

        $response = $this->actingAs($user)->post(route('dashboard.profile.update'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'photo' => $file,
        ]);

        $response->assertRedirect(route('dashboard', ['tab' => 'profile']));
        $response->assertSessionHas('success');

        $user->refresh();

        $this->assertNotNull($user->profile_photo_path);
        Storage::disk('public')->assertExists($user->profile_photo_path);
        $this->assertStringContainsString($user->profile_photo_path, $user->profile_photo_url);
    }

    public function test_user_can_remove_profile_photo(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('old_avatar.jpg');
        $path = $file->store('profile-photos', 'public');

        $user = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'profile_photo_path' => $path,
        ]);

        Storage::disk('public')->assertExists($path);

        $response = $this->actingAs($user)->post(route('dashboard.profile.update'), [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'remove_photo' => '1',
        ]);

        $response->assertRedirect(route('dashboard', ['tab' => 'profile']));
        $user->refresh();

        $this->assertNull($user->profile_photo_path);
        $this->assertNull($user->profile_photo_url);
        Storage::disk('public')->assertMissing($path);
    }

    public function test_profile_photo_must_be_an_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $file = UploadedFile::fake()->create('document.pdf', 500, 'application/pdf');

        $response = $this->actingAs($user)->post(route('dashboard.profile.update'), [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'photo' => $file,
        ]);

        $response->assertSessionHasErrors('photo');
    }

    public function test_user_can_upload_cropped_profile_photo_base64(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'name' => 'Alice Cropper',
            'email' => 'alice@example.com',
        ]);

        $base64Image = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';

        $response = $this->actingAs($user)->post(route('dashboard.profile.update'), [
            'name' => 'Alice Cropper',
            'email' => 'alice@example.com',
            'cropped_photo' => $base64Image,
        ]);

        $response->assertRedirect(route('dashboard', ['tab' => 'profile']));
        $response->assertSessionHas('success');

        $user->refresh();

        $this->assertNotNull($user->profile_photo_path);
        Storage::disk('public')->assertExists($user->profile_photo_path);
        $this->assertStringContainsString('profile-photos/', $user->profile_photo_path);
    }
}
