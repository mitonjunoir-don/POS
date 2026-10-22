<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Seeds exactly one admin and one cashier for local/demo use.
 * Passwords are deliberately weak placeholders — change immediately
 * outside local development.
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@shop.test'],
            [
                'name' => 'Shop Admin',
                'password' => Hash::make('password'),
                'role' => Role::Admin,
                'is_active' => true,
            ]
        );

        User::firstOrCreate(
            ['email' => 'cashier@shop.test'],
            [
                'name' => 'Shop Cashier',
                'password' => Hash::make('password'),
                'role' => Role::Cashier,
                'is_active' => true,
            ]
        );
    }
}
