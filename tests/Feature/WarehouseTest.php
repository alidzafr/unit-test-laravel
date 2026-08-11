<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WarehouseTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_be_created_with_valid_data(): void
    {
        $this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $response = $this->post('/warehouses', [
            'name' => 'Lopez Warehouse',
            'phone' => '08123456789',
            'address' => 'Jakarta',
        ]);

        $response->assertRedirect('/warehouses');
        $this->assertDatabaseHas('warehouses', [
            'name' => 'Lopez Warehouse'
        ]);
    }
}
