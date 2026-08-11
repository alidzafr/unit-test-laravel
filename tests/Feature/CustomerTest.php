<?php

namespace Tests\Feature;

use App\Models\Customer;
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

    public function test_customer_can_be_updated_with_valid_data(): void
    {
        $this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $customer = Customer::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '08123456789',
            'address' => 'Jakarta',
        ]);
        $customer->slug;

        $response = $this->put("/customers/{$customer->id}/update", [
            'name' => 'John Smith',
            'phone' => '08987654321',
            'email' => 'johnsmith@example.com',
            'address' => 'Bandung',
        ]);

        $response->assertRedirect(route('customers.show', ['customer' => $customer]));

        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'name' => 'John Smith',
            'email' => 'johnsmith@example.com',
            'phone' => '08987654321',
            'address' => 'Bandung',
        ]);
    }

    public function test_customer_can_be_deleted(): void
    {
        $this->withoutMiddleware();
        $this->actingAs(User::factory()->create());

        $customer = Customer::factory()->create();

        $response = $this->delete("/customers/{$customer->id}");

        $response->assertRedirect('/customers');

        $this->assertDatabaseMissing('customers', [
            'id' => $customer->id,
        ]);
    }
}
