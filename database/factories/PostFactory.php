<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'posts_category_id' => $this->faker->numberBetween(1, 10), // رقم تصنيف المقال
            'title_ar' => $this->faker->sentence(3), // عنوان المقال بالعربية
            'title_en' => $this->faker->sentence(3), // عنوان المقال بالإنجليزية
            'slug' => $this->faker->slug, // رابط المقال
            'content_ar' => $this->faker->paragraphs(3, true), // محتوى المقال بالعربية
            'content_en' => $this->faker->paragraphs(3, true), // محتوى المقال بالإنجليزية
        ];
    }
}