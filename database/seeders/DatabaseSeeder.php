<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create(); bu 10 tane rastgele oluşturuyor

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '12345',
            'type' => '1'
        ]);
    }
}
