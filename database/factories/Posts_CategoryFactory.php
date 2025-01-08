<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts_category>
 */
class Posts_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_category_ar' => $this->faker->words(2, true), // اسم التصنيف بالعربية
            'name_category_en' => $this->faker->words(2, true), // اسم التصنيف بالإنجليزية
            'slug_category' => $this->faker->slug, // عنوان URL التصنيف
            'description_category_ar' => $this->faker->paragraph, // وصف التصنيف بالعربية
            'description_category_en' => $this->faker->paragraph, // وصف التصنيف بالإنجليزية
        ];
    }
}