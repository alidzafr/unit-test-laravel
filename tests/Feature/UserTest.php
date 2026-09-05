<?php

use App\Models\User;

beforeEach(function () {
    $this->user = createUser();
    $this->admin = createAdmin();
});

test('user homepage contains non empty table', function () {

    $this->actingAs($this->admin)
        ->get('/users')
        ->assertStatus(200)
        ->assertSee('Super Admin');
});

test('create user successful', function () {
    $user = [
        'name' => 'Basim',
        'email' => 'basim@mail.co',
        'password' => '12345678',
        'password_confirmation' => '12345678',
        'role' => 'Warehouse Manager'
    ];

    $this->actingAs($this->admin)
        ->post('/users', $user)
        ->assertStatus(302)
        ->assertRedirect(route('users.index'));

    unset($user['password'], $user['password_confirmation'], $user['role']); //remove pass&role from $user array
    $this->assertDatabaseHas('users', $user);

    // Check latest users
    $lastUser = User::where('name', 'Basim')->first();
    expect($lastUser->name)->toBe($user['name']);
    expect($lastUser->getRoleNames()->first())->toBe('Warehouse Manager');
});

test('user can updated with valid data', function () {
    $user = User::factory()->create ([
        'name' => 'Muljadi',
        'email' => 'muljadi@mail.co',
        'password' => '12345678',
    ]);
    $user->assignRole('Warehouse Manager');

    $this->actingAs($this->admin)
        ->put(route('users.update', $user), [
            'name' => 'Bagus',
            'email' => 'bagus@mail.co',
            'role' => 'Warehouse Staff'
            ])
            ->assertStatus(302)
            ->assertRedirect(route('users.index'));
            
    $this->assertDatabaseHas('users', [
        'name' => 'Bagus',
        'email' => 'bagus@mail.co',
    ]);
});

test('delete user', function () {
    $user = User::factory()->create();
    $user->assignRole('Warehouse Staff');

    $this->actingAs($this->admin)
        ->delete(route('users.destroy', $user))
        ->assertStatus(302)
        ->assertRedirect(route('users.index'));

    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});