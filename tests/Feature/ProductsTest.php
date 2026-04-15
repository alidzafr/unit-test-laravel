<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Symfony\Component\Mime\Part\Multipart\MixedPart;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    // setUp() & Private methods
    // 
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        // custom script create user
        $this->user = $this->createUser();
    }


    public function test_contains_empty_table(): void
    {
        // $user = $this->createUser();
        $response = $this->actingAs($this->user)->get('/products');

        $response->assertSee(_('No product found'));
    }

    public function test_homepage_contains_non_empty_table(): void
    {
        // $user = $this->createUser();
        $product = Product::create([
            'name' => 'abs brake',
            'price' => 123
        ]);

        $response = $this->actingAs($this->user)->get('/products');

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
        // $user = $this->createUser();
        // create 11 product
        $products = Product::factory(11)->create();

        $response = $this->actingAs($this->user)->get('/products');

        $response->assertStatus(200);

        // check if html showing only 10 product (pagination)
        // not contain 11th product
        $lastProduct = $products->last();
        $response->assertViewHas('products', function ($collection) use ($lastProduct) {
            return !$collection->contains($lastProduct);
        });
    }

    public function test_owner_can_see_create_button()
    {
        $ownerRole = Role::create(['name' => 'owner']);

        $admin = $this->createUser();
        $admin->assignRole($ownerRole);
        $response = $this->actingAs($admin)->get('/products');

        $response->assertStatus(200);
        $response->assertSee('Add new product');
    }

    public function test_non_owner_cannot_see_create_button()
    {
        $response = $this->actingAs($this->user)->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee('Add new product');
    }

    public function test_owner_can_access_create()
    {
        $ownerRole = Role::create(['name' => 'owner']);

        $admin = $this->createUser();
        $admin->assignRole($ownerRole);
        $response = $this->actingAs($admin)->get('/products/create');

        $response->assertStatus(200);
    }

    public function test_non_owner_cannot_access_create()
    {
        $response = $this->actingAs($this->user)->get('/products/create');

        $response->assertStatus(403);
    }

    public function test_create_product_successful()
    {
        $ownerRole = Role::create(['name' => 'owner']);
        $admin = $this->createUser();
        $admin->assignRole($ownerRole);

        // Insert new product
        $product = [
            'name' => 'Product 123',
            'price' => '100'
        ];

        $response = $this->actingAs($admin)->post('/products', $product);

        $response->assertStatus(302);
        $response->assertRedirect('products');

        $this->assertDatabaseHas('products', $product);

        // Check if latest added product on db is same as $product we input
        $lastProduct = Product::latest()->first();
        $this->assertEquals($product['name'], $lastProduct['name']);
        $this->assertEquals($product['price'], $lastProduct['price']);
    }

    // Extract Method
    private function createUser(): mixed
    {
        return User::factory()->create();
    }
}
