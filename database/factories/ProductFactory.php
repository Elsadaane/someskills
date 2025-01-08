<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_product_id' => $this->faker->numberBetween(1, 10),
            'product_name_ar' => $this->faker->words(3, true),
            'product_name_en' => $this->faker->words(3, true),
            'slug' => $this->faker->slug,
            'Price_after_discount' => $this->faker->randomFloat(2, 10, 100),
            'Price_before_discount' => $this->faker->randomFloat(2, 100, 200),
            'Product_Description_ar' => $this->faker->text(250),
            'Product_Description_en' => $this->faker->text(250),
            'status' => $this->faker->randomElement([0, 1]),

        ];
    }
}
