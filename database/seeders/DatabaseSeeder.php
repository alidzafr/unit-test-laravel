<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\ProductWarehouse;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        $permissions = [
            'categories.show',
            'categories.create',
            'categories.edit',
            'categories.delete',

            'products.show',
            'products.create',
            'products.edit',
            'products.delete',

            'users.show',
            'users.create',
            'users.edit',
            'users.delete',

            'warehouse.show',
            'warehouse.create',
            'warehouse.edit',
            'warehouse.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $roles = [
            'Super Admin',
            'Warehouse Manager',
            'Warehouse Staff',
            'Purchasing',
            'Sales',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web',
            ]);
        }

        // Super Admin
        $adminRole = Role::where('name', 'Super Admin')->first();

        $adminRole->givePermissionTo(
            Permission::pluck('name')->toArray()
        );
        
        // Manager
        $managerRole = Role::where('name', 'Warehouse Manager')->first();
        
        $managerRole->givePermissionTo([
            'categories.show',
            'categories.create',
            'categories.edit',
        
            'products.show',
            'products.create',
            'products.edit',
        
            'warehouse.show',
            'warehouse.create',
            'warehouse.edit',
        ]);

        // Warehouse Staff
        $staffRole = Role::where('name', 'Warehouse Staff')->first();

        $staffRole->givePermissionTo([
            'categories.show',
            'products.show',
            'warehouse.show',
        ]);

        // Users
        $admin = User::create([
            'name' => 'Fany',
            'email' => 'fany@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $manager = User::create([
            'name' => 'Eka',
            'email' => 'eka@manager.com',
            'password' => bcrypt('123456'),
        ]);

        $staff = User::create([
            'name' => 'Kimi',
            'email' => 'kimi@staff.com',
            'password' => bcrypt('123456'),
        ]);

        $admin->assignRole('Super Admin');
        $manager->assignRole('Warehouse Manager');
        $staff->assignRole('Warehouse Staff');

        Customer::factory(5)->create();
        ProductWarehouse::factory(5)->create();
    }
}
