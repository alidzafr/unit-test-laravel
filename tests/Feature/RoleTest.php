<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('creates a role with permissions selected by id', function () {
    $admin = User::factory()->create();
    Role::findOrCreate('Super Admin');
    $admin->assignRole('Super Admin');

    $permission = Permission::create(['name' => 'view products']);

    $response = $this->actingAs($admin)->post('/roles', [
        'name' => 'Editor',
        'permissions' => [$permission->id],
    ]);

    $response->assertRedirect('/roles');
    $this->assertDatabaseHas('roles', ['name' => 'Editor']);

    $role = Role::findByName('Editor');
    expect($role->hasPermissionTo('view products'))->toBeTrue();
});
