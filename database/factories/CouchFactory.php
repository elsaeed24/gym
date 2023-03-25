<?php

namespace Database\Factories;

use App\Models\Gym;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Couch>
 */
class CouchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"       => $this->faker->name,
            "gym_id"     => Gym::inRandomOrder()->first()->id,
        ];
    }
}
