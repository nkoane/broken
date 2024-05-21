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
            'first_name' => 'Tommy', 'last_name' => 'Gun',
            'email' => 'ltdn@arch.localhost',
        ]);

        $this->call([
            EmployerSeeder::class,
            JobSeeder::class,
            TagSeeder::class,
        ]);
    }
}
