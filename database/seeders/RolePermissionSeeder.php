<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $buyerRole = Role::create([
            'name' => 'buyer'
        ]);

        $user = User::create([
            'name' => 'Fany',
            'email' => 'fany@owner.com',
            'password' => bcrypt('123456')
        ]);

        $buyer = User::create([
            'name' => 'larjo',
            'email' => 'larjo@buyer.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole($ownerRole);
        $buyer->assignRole($buyerRole);
    }
}
