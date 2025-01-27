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
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => '12345678'
        ]);

        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CategorygradeSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(OrganisationSeeder::class);
        $this->call(IconSeeder::class);
        $this->call(OrganisationaccordSeeder::class);
    }
}
