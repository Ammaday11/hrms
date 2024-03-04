<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\Designation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employeeID' => $this->faker->unique()->numerify('ST#####'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'email' =>$this->faker->unique()->safeEmail(),
            'phone' =>$this->faker->unique()->e164PhoneNumber(),
            'department_id' => $this->faker->numberBetween(1, 3),
            'designation_id' => Designation::factory(),
            'joined_date' => $this->faker->dateTime(),
        ];
    }
}
