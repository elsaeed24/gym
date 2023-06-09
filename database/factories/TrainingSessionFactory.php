<?php

namespace Database\Factories;

use App\Models\Gym;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TrainingSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('-1 week', '+1 week')->getTimestamp());

        return [
            'name' => $this->faker->unique()->name(),
            'starts_at' => $startDate->toDateTimeString(),
            'finishes_at' => $startDate->addHours( $this->faker->numberBetween( 1, 4 ) ),
             'gym_id' => Gym::inRandomOrder()->first()->id,
        ];
    }
}
