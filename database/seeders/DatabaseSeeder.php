<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RentSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\TenantSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Maxwell Arabil',
            'email' => 'maxwellarabil74@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::factory()->create([
            'name' => 'Silvia Rahmadina',
            'email' => 'silvia@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::factory()->create([
            'name' => 'FAW Kostel',
            'email' => 'fawkostel@gmail.com',
            'password'=> bcrypt('password')
        ]);

        $this->call([
            CategorySeeder::class,
            RoomSeeder::class,
            // TenantSeeder::class,
        ]);
    }
}
