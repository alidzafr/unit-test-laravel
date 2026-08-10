<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_be_created_with_valid_data(): void
    {
        $this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $response = $this->post('/customers', [
            'name' => 'John Doe',
            'phone' => '08123456789',
            'email' => 'john@example.com',
            'address' => 'Jakarta',
        ]);

        $response->assertRedirect('/customers');
        $this->assertDatabaseHas('customers', [
            'email' => 'john@example.com',
        ]);
    }
}
