<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\writer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

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
            'posts_category_id' => $this->faker->numberBetween(1, 10),
            'title_ar' => $this->faker->sentence(3),
            'title_en' => $this->faker->sentence(3),
            'slug' => $this->faker->slug,
            'content_ar' => $this->faker->paragraphs(3, true),
            'content_en' => $this->faker->paragraphs(3, true),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'writer_id' => writer::inRandomOrder()->first()->id ?? writer::factory()->create()->id,
            'user_type' =>'writer'

        ];
    }
}