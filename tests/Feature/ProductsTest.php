<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_contains_empty_table(): void
    {
        $response = $this->get('/products');

        $response->assertSee(_('No product found'));
    }

    public function test_homepage_contains_non_empty_table(): void
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 123
        ]);
        $response = $this->get('/products');

        $response->assertDontSee(_('No product found'));
    }
}
