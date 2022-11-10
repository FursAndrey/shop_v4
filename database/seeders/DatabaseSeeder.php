<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategorySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(SkuSeeder::class);
    }
}
