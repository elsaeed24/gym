<?php

namespace Database\Factories;

use App\Models\Gym;
use App\Models\TrainingSession;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
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

            'attendance_time' => $startDate->toDateTimeString(),
            'attendance_date' => $this->faker->date,
             'gym_id' => Gym::inRandomOrder()->first()->id,
             'user_id' =>User::inRandomOrder()->first()->id,
             'session_id' =>TrainingSession::inRandomOrder()->first()->id,
        ];
    }
}
