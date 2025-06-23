<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    private function admin()
    {
        return User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_view_categories(): void
    {
        $this->actingAs($this->admin());
        $response = $this->get('/admin/categories');
        $response->assertStatus(200);
    }

    public function test_admin_can_create_category(): void
    {
        $this->actingAs($this->admin());
        $response = $this->post('/admin/categories', ['name' => 'New']);
        $response->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['name' => 'New']);
    }

    public function test_admin_can_update_category(): void
    {
        $category = Category::factory()->create();
        $this->actingAs($this->admin());
        $response = $this->put("/admin/categories/{$category->id}", ['name' => 'Updated']);
        $response->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Updated']);
    }

    public function test_admin_can_delete_category(): void
    {
        $category = Category::factory()->create();
        $this->actingAs($this->admin());
        $response = $this->delete("/admin/categories/{$category->id}");
        $response->assertRedirect('/admin/categories');
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
