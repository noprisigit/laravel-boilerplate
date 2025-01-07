<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()->updateOrCreate(['name' => 'Super Admin']);

        $user = User::query()->updateOrCreate([
            'email' => 'superadmin@test.com',
        ], [
            'name' => 'Super Administrator',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('Super Admin');
    }
}
