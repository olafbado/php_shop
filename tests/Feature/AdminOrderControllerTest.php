<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOrderControllerTest extends TestCase
{
    use RefreshDatabase;

    private function admin()
    {
        return User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_view_orders(): void
    {
        $this->actingAs($this->admin());
        $response = $this->get('/admin/orders');
        $response->assertStatus(200);
    }

    public function test_admin_can_update_order(): void
    {
        $order = Order::factory()->create();
        $this->actingAs($this->admin());
        $response = $this->put("/admin/orders/{$order->id}", ['status' => 'paid']);
        $response->assertRedirect("/admin/orders/{$order->id}");
        $this->assertDatabaseHas('orders', ['id' => $order->id, 'status' => 'paid']);
    }

    public function test_admin_can_delete_order(): void
    {
        $order = Order::factory()->create();
        $this->actingAs($this->admin());
        $response = $this->delete("/admin/orders/{$order->id}");
        $response->assertRedirect('/admin/orders');
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }
}
