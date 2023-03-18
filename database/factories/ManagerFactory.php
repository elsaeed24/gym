<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "email" => $this->faker->email,
            "birth_date" => $this->faker->date,
            "address" => $this->faker->address,
            "phone" => $this->faker->phoneNumber,
            "password" => $this->faker->password,
            "national_id" => $this->faker->randomNumber(9,true),
            "city" => $this->faker->city,

        ];
    }
}
