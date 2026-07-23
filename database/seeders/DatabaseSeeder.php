<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
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

        Product::factory(10)->create();
        // Category::factory(10)->create();
    }
}
