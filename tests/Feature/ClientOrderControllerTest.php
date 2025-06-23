<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientOrderControllerTest extends TestCase
{
    use RefreshDatabase;

    private function client()
    {
        return User::factory()->create(['role' => 'client']);
    }

    public function test_client_can_view_orders(): void
    {
        $user = $this->client();
        $this->actingAs($user);
        $response = $this->get('/orders');
        $response->assertStatus(200);
    }

    public function test_client_can_create_order(): void
    {
        $user = $this->client();
        $this->actingAs($user);
        $response = $this->post('/orders');
        $order = Order::first();
        $response->assertRedirect("/orders/{$order->id}");
        $this->assertDatabaseHas('orders', ['user_id' => $user->id]);
    }

    public function test_client_can_view_order_detail(): void
    {
        $user = $this->client();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);
        $response = $this->get("/orders/{$order->id}");
        $response->assertStatus(200);
    }
}
