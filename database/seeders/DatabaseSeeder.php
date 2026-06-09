<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '01717171717',
            'address' => '1234567890',
            'city' => 'Dhaka',
            'state' => 'Dhaka',
            'zip' => '1234567890',
            'country' => 'Bangladesh',
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);
    }
}