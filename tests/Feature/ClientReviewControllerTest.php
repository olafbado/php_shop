<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    private function client()
    {
        return User::factory()->create(['role' => 'client']);
    }

    public function test_client_can_create_review(): void
    {
        $user = $this->client();
        $product = Product::factory()->create();
        $this->actingAs($user);
        $response = $this->post("/products/{$product->id}/reviews", [
            'rating' => 5,
            'comment' => 'Great!',
        ]);
        $response->assertRedirect("/products/{$product->id}");
        $this->assertDatabaseHas('reviews', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'rating' => 5,
        ]);
    }
}
