<?php

use App\Models\Product;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->user = createUser();

    $this->admin = createAdmin();
});

test('homepage contains empty table', function () {
    $this->actingAs($this->user)
        ->get('/products')
        ->assertStatus(200)
        ->assertSee(_('No product found'));
});

test('homepage contains non empty table', function () {

    $product = Product::create([
        'name' => 'abs brake',
        'price' => 123
    ]);

    $this->actingAs($this->user)
        ->get('/products')
        ->assertStatus(200)
        ->assertDontSee(_('No product found'))

        // Check if html contain item named 'abs brake'
        ->assertSee('abs brake')
        // check if products table contain $product up there
        ->assertViewHas(
            'products',
            function ($collection) use ($product) {
                return $collection->contains($product);
            }
        );
});

test('create product successful', function () {

    $product = [
        'name' => 'Product 123',
        'price' => '100'
    ];

    $this->actingAs($this->admin)
        ->post('/products', $product)
        ->assertStatus(302)
        ->assertRedirect('products');

    $this->assertDatabaseHas('products', $product);

    // Check if latest added product on db is same as $product we input
    $lastProduct = Product::latest()->first();
    expect($lastProduct->name)->toBe($product['name']);
    expect($lastProduct->price)->toBeInt($product['price']);
});
