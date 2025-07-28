<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Bank;
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
        Bank::factory()->count(2)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@clickless.com',
        ]);

        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@clickless.com',
        ]);

        User::factory(10)->create();
    }
}
