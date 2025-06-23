<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientAddressControllerTest extends TestCase
{
    use RefreshDatabase;

    private function client()
    {
        return User::factory()->create(['role' => 'client']);
    }

    public function test_client_can_create_address(): void
    {
        $user = $this->client();
        $this->actingAs($user);
        $response = $this->post('/addresses', [
            'line1' => 'Street 1',
            'city' => 'Town',
            'postcode' => '12345',
        ]);
        $response->assertRedirect('/addresses');
        $this->assertDatabaseHas('addresses', ['user_id' => $user->id, 'city' => 'Town']);
    }

    public function test_client_can_update_address(): void
    {
        $user = $this->client();
        $address = Address::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);
        $response = $this->put("/addresses/{$address->id}", [
            'line1' => 'New Street',
            'city' => 'City',
            'postcode' => '99999',
        ]);
        $response->assertRedirect('/addresses');
        $this->assertDatabaseHas('addresses', ['id' => $address->id, 'line1' => 'New Street']);
    }

    public function test_client_can_delete_address(): void
    {
        $user = $this->client();
        $address = Address::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);
        $response = $this->delete("/addresses/{$address->id}");
        $response->assertRedirect('/addresses');
        $this->assertDatabaseMissing('addresses', ['id' => $address->id]);
    }
}
