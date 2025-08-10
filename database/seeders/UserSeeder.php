<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super-admin@clickless.com',
        ]);

        $superAdmin->assignRole('super-admin');

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@clickless.com',
        ]);

        $admin->assignRole('admin');

        $agent = User::factory()
            ->create([
                'name' => 'Agent',
                'email' => 'agent@clickless.com',
            ]);

        $agent->assignRole('agent');

        User::factory()
            ->count(10)
            ->create()
            ->each(function ($user) {
                $user->assignRole('agent');
            });
    }
}
