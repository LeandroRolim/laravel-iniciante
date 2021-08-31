<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_products()
    {
        $response = $this->get(route('api.product.index'));

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $this->assertDatabaseCount('products', 0);
        $product = Product::factory()->make();
        $response = $this->post(route('api.product.store'), $product->getAttributes());
        $response->assertCreated();
        $this->assertDatabaseHas('products', $product->getAttributes());
    }

    public function test_delete_product()
    {
        $this->assertDatabaseCount('products', 0);
        $product = Product::factory()->create();
        $response = $this->delete(route('api.product.destroy', $product->id));
        $response->assertStatus(200)->assertSeeText('deleted');
    }
}
