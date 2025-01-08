<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category_Product>
 */
class Category_ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_ar' => $this->faker->words(2, true), // اسم بالعربية
            'name_en' => $this->faker->words(2, true), // اسم بالإنجليزية
            'slug' => $this->faker->slug, // عنوان URL
        ];
    }
}
