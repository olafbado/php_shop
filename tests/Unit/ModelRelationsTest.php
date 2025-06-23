<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class ModelRelationsTest extends TestCase
{
    public function test_product_has_many_categories(): void
    {
        $product = new Product();
        $this->assertInstanceOf(BelongsToMany::class, $product->categories());
    }

    public function test_category_has_many_products(): void
    {
        $category = new Category();
        $this->assertInstanceOf(BelongsToMany::class, $category->products());
    }

    public function test_user_has_many_addresses(): void
    {
        $user = new User();
        $this->assertInstanceOf(HasMany::class, $user->addresses());
    }

    public function test_address_belongs_to_user(): void
    {
        $address = new Address();
        $this->assertInstanceOf(BelongsTo::class, $address->user());
    }

    public function test_order_belongs_to_user(): void
    {
        $order = new Order();
        $this->assertInstanceOf(BelongsTo::class, $order->user());
    }

    public function test_product_has_many_reviews(): void
    {
        $product = new Product();
        $this->assertInstanceOf(HasMany::class, $product->reviews());
    }
}
