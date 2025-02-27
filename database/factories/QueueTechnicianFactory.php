<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Queue;
use App\Models\QueueTechnician;
use App\Models\User;

class QueueTechnicianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QueueTechnician::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'order' => fake()->numberBetween(-10000, 10000),
            'technician_id' => User::factory(),
            'queue_id' => Queue::factory(),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}
