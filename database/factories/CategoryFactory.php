<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'code' => fake()->regexify('[A-Za-z0-9]{10}'),
            'is_public' => fake()->boolean(),
            'is_promediable' => fake()->boolean(),
            'is_schedulable' => fake()->boolean(),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}
