<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private function client()
    {
        return User::factory()->create(['role' => 'client']);
    }

    public function test_client_can_view_products(): void
    {
        Product::factory()->create();
        $this->actingAs($this->client());
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_client_can_view_product_detail(): void
    {
        $product = Product::factory()->create();
        $this->actingAs($this->client());
        $response = $this->get("/products/{$product->id}");
        $response->assertStatus(200);
    }
}
