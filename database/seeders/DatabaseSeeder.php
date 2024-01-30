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
        \App\Models\User::factory()->create([
            'name' => 'demo',
            'email' => 'demo@example.com',
            'password' => 'demopass'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Shayan Ali',
            'email' => 'janishayan10@gmail.com',
            'password' => 'shayan'
        ]);

        $this->call(NoteSeeder::class);
    }
}
