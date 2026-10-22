<?php

use App\Enums\Role;
use App\Models\User;

test('user can login with correct credentials', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
        'role' => Role::Admin,
        'is_active' => true,
    ]);

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticatedAs($user);
});

test('login fails with wrong password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
        'role' => Role::Admin,
        'is_active' => true,
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});

test('repeated failed logins trigger rate limiting', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
        'role' => Role::Admin,
        'is_active' => true,
    ]);

    for ($i = 0; $i < 5; $i++) {
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
    }

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors('email');
    expect(session('errors')->first('email'))->toContain('seconds');
});

test('admin is redirected to admin dashboard after login', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
        'role' => Role::Admin,
        'is_active' => true,
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('admin.dashboard'));
});

test('cashier is redirected to pos dashboard after login', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
        'role' => Role::Cashier,
        'is_active' => true,
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('pos.dashboard'));
});

test('cashier cannot access admin dashboard', function () {
    $cashier = User::factory()->create([
        'role' => Role::Cashier,
        'is_active' => true,
    ]);

    $response = $this->actingAs($cashier)->get('/admin/dashboard');

    $response->assertForbidden();
});

test('admin cannot access pos dashboard', function () {
    $admin = User::factory()->create([
        'role' => Role::Admin,
        'is_active' => true,
    ]);

    $response = $this->actingAs($admin)->get('/pos/dashboard');

    $response->assertForbidden();
});

test('deactivated user is logged out immediately', function () {
    $user = User::factory()->create([
        'role' => Role::Admin,
        'is_active' => true,
    ]);

    $this->actingAs($user);

    $user->update(['is_active' => false]);

    $response = $this->get('/admin/dashboard');

    $response->assertRedirect(route('login'));
    $this->assertGuest();
});
