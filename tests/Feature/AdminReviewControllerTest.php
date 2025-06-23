<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    private function admin()
    {
        return User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_view_reviews(): void
    {
        $this->actingAs($this->admin());
        $response = $this->get('/admin/reviews');
        $response->assertStatus(200);
    }

    public function test_admin_can_delete_review(): void
    {
        $review = Review::factory()->create();
        $this->actingAs($this->admin());
        $response = $this->delete("/admin/reviews/{$review->id}");
        $response->assertRedirect('/admin/reviews');
        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
    }
}
