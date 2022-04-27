<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientRecord>
 */
class ClientRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'phone' => ''.$this->faker->phoneNumber(),
            'street_address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip' => rand(10000,99999),
            'desc' => $this->faker->text(),
            'code' => rand(100000,999999),
            'isActive' => rand(0,1)
        ];
    }
}
