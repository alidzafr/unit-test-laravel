<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_contains_empty_table(): void
    {
        $response = $this->get('/products');

        $response->assertSee(_('No product found'));
    }

    public function test_homepage_contains_non_empty_table(): void
    {
        $product = Product::create([
            'name' => 'abs brake',
            'price' => 123
        ]);

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee(_('No product found'));

        // Check if html contain item named 'abs brake'
        $response->assertSee('abs brake');
        // check if products table contain $product up there
        $response->assertViewHas(
            'products',
            function ($collection) use ($product) {
                return $collection->contains($product);
            }
        );
    }

    public function test_paginated_product_table_not_contain_11th_record()
    {
        // create 11 product
        $products = Product::factory(11)->create();

        $response = $this->get('/products');

        $response->assertStatus(200);

        // check if html showing only 10 product (pagination)
        // not contain 11th product
        $lastProduct = $products->last();
        $response->assertViewHas('products', function ($collection) use ($lastProduct) {
            return !$collection->contains($lastProduct);
        });
    }
}
