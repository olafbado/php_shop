<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private function admin()
    {
        return User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_view_products(): void
    {
        $admin = $this->admin();
        $this->actingAs($admin);

        $response = $this->get('/admin/products');
        $response->assertStatus(200);
    }

    public function test_admin_can_create_product(): void
    {
        $admin = $this->admin();
        $this->actingAs($admin);

        $response = $this->post('/admin/products', [
            'name' => 'Test',
            'description' => 'Desc',
            'price' => 9.99,
            'stock' => 1,
        ]);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', ['name' => 'Test']);
    }

    public function test_admin_can_update_product(): void
    {
        $admin = $this->admin();
        $product = Product::factory()->create();
        $this->actingAs($admin);

        $response = $this->put("/admin/products/{$product->id}", [
            'name' => 'Updated',
            'description' => 'Desc',
            'price' => 19.99,
            'stock' => 5,
        ]);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Updated']);
    }

    public function test_admin_can_delete_product(): void
    {
        $admin = $this->admin();
        $product = Product::factory()->create();
        $this->actingAs($admin);

        $response = $this->delete("/admin/products/{$product->id}");

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
