<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_category()
    {
        $this->seed();
        $response = $this->get(route('api.category.index'));
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    public function test_create_category()
    {
        $category = Category::factory()->make();
        $this->assertDatabaseCount('categories', 0);
        $response = $this->post(route('api.category.store', $category->getAttributes()));
        $response->assertCreated();
    }
}
