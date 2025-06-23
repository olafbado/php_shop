<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUserControllerTest extends TestCase
{
    use RefreshDatabase;

    private function admin()
    {
        return User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_view_users(): void
    {
        $this->actingAs($this->admin());
        $response = $this->get('/admin/users');
        $response->assertStatus(200);
    }

    public function test_admin_can_update_user(): void
    {
        $user = User::factory()->create();
        $this->actingAs($this->admin());
        $response = $this->put("/admin/users/{$user->id}", [
            'name' => 'New',
            'email' => 'new@example.com',
            'role' => 'client',
        ]);
        $response->assertRedirect('/admin/users');
        $this->assertDatabaseHas('users', ['id' => $user->id, 'email' => 'new@example.com']);
    }

    public function test_admin_can_delete_user(): void
    {
        $user = User::factory()->create();
        $this->actingAs($this->admin());
        $response = $this->delete("/admin/users/{$user->id}");
        $response->assertRedirect('/admin/users');
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
