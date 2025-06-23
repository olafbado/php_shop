<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        $clients = User::factory(5)->create();

        $categories = Category::factory(3)->create();
        $products = Product::factory(10)->create();
        foreach ($products as $product) {
            $product->categories()->attach($categories->random(2));
        }

        foreach ($clients as $client) {
            Address::factory()->create(['user_id' => $client->id]);

            $order = Order::factory()->create(['user_id' => $client->id]);
            $order->products()->attach($products->random(2), [
                'quantity' => 1,
                'price' => 9.99,
            ]);

            Review::factory()->create([
                'user_id' => $client->id,
                'product_id' => $products->first()->id,
            ]);
        }
    }
}
