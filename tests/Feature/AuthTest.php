<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_creates_user(): void
    {
        $response = $this->post('/register', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'jane@example.com']);
    }

    public function test_login_with_valid_credentials(): void
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('secret'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'secret',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }
}
