<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_client_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'client']);

        $this->actingAs($user);
        $response = $this->get('/admin');

        $response->assertStatus(403);
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->actingAs($user);
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }
}
