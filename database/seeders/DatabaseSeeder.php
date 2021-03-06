<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678')
        ]);

        $this->call([
            CountrySeeder::class,
            ClubSeeder::class,
            CompetitionSeeder::class,
            GroupSeeder::class
        ]);
    }
}
