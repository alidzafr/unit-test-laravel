<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ownerRole = Role::create(['name' => 'owner']);

        $owner = User::create([
            'name' => 'fany',
            'email' => 'fany@owner.com',
            'password' => bcrypt('123456')
        ]);

        $owner->assignRole($ownerRole);

        Customer::factory(5)->create();
        // Product::factory(20)->create();
        // Warehouse::factory(3)->create();
        Inventory::factory(5)->create();
    }
}
