<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->has(\App\Models\Post::factory()->count(10), 'posts')
            ->create([
                'name' => 'Test User',
                'email' => 'test@test.com',
                'password' => Hash::make('password')
            ]);
        User::factory(10)
            ->has(\App\Models\Post::factory()->count(10), 'posts')
            ->create();
    }
}
