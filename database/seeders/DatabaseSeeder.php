<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\ProductWarehouse;
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
        $suAdminRole = Role::create(['name' => 'Super Admin']);
        $auditorRole = Role::create(['name' => 'Auditor']);
        $staffRole = Role::create(['name' => 'Staff']);

        $admin = User::create([
            'name' => 'Fany',
            'email' => 'fany@admin.com',
            'password' => bcrypt('123456')
        ]);

        $auditor = User::create([
            'name' => 'Eka',
            'email' => 'eka@auditor.com',
            'password' => bcrypt('123456')
        ]);

        $staff = User::create([
            'name' => 'Kimi',
            'email' => 'kimi@staff.com',
            'password' => bcrypt('123456')
        ]);

        $admin->assignRole($suAdminRole);
        $auditor->assignRole($auditorRole);
        $staff->assignRole($staffRole);

        Customer::factory(5)->create();
        ProductWarehouse::factory(5)->create();
    }
}
