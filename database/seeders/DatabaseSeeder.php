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
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            VariationSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Usop',
            'email' => 'usop@gmail.com',
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
