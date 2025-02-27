<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Configuration;
use App\Models\ConfigurationHistory;

class ConfigurationHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConfigurationHistory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'event' => fake()->text(),
            'last_config' => fake()->text(),
            'new_config' => fake()->text(),
            'configuration_id' => Configuration::factory(),
        ];
    }
}
