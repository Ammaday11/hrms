<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Designation;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Designation>
 */
class DesignationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => $this->faker->numberBetween(1, 4),
            'designation' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomNumber(4, true),


        ];
    }
}
