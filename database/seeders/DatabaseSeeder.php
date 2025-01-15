<?php

namespace Database\Seeders;

use App\Models\Category_Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\Contact_UsSeeder;
use Database\Seeders\AboutSeeder;
use App\Models\Post;
use App\Models\Posts_category;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Catogry::factory()
        // ->has(Product::factory()->count(10))
        // ->count(5)
        // ->create();
        // User::factory(10)->create();


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category_Product::factory()->count(10)->create();
        Product::factory()->count(10)->create();
        Posts_category::factory()->count(10)->create();
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            Contact_UsSeeder::class,
            AboutSeeder::class,
            CatogrySeeder::class,
            HeroSeeder::class,
            writer::class

        ]);
        Post::factory()->count(10)->create();
    }
}