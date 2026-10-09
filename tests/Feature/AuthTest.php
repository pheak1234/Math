<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_set_password_in_profile_and_login_with_it(): void
    {
        $user = User::factory()->create([
            'name' => 'Sopheak Test',
            'email' => 'sopheak@example.com',
            'password' => 'oldpassword123',
        ]);

        // 1. User updates password in dashboard profile
        $response = $this->actingAs($user)->post(route('dashboard.profile.update'), [
            'name' => 'Sopheak Test',
            'email' => 'sopheak@example.com',
            'password' => 'newpassword12345',
            'password_confirmation' => 'newpassword12345',
        ]);

        $response->assertRedirect(route('dashboard', ['tab' => 'profile']));
        $response->assertSessionHas('success');

        // Logout user
        Auth::logout();
        $this->assertGuest();

        // 2. User logs in with the new password
        $loginResponse = $this->post('/login', [
            'email' => 'sopheak@example.com',
            'password' => 'newpassword12345',
        ]);

        $loginResponse->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password(): void
    {
        $user = User::factory()->create([
            'email' => 'wrong@example.com',
            'password' => 'correctpassword',
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'invalidpassword',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_user_can_register_new_account_and_is_logged_in(): void
    {
        $response = $this->post('/register', [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'secret12345',
            'terms' => 'on',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', [
            'email' => 'newuser@example.com',
            'name' => 'New User',
        ]);
        $this->assertAuthenticated();
    }
}
