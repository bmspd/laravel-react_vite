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
        User::query()->create([
            'name' => 'user',
            'email' => 'user@user.email.com',
            'role_id' => 1,
            'password' => 'user'
        ]);
        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@admin.email.com',
            'role_id' => 2,
            'password' => 'admin'
        ]);
        User::factory(20)->create();
    }
}
