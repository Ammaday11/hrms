<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\Employee_Profile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee_Profile>
 */
class Employee_ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NID' => $this->faker->unique()->numerify('A######'),
            'parmanant_address' => $this->faker->secondaryAddress(),
            'nationality' => $this->faker->country(),
            'religion' => 'Muslim',
            'marital_status' =>$this->faker->randomElement(['Single', 'Married', 'Divorced']),
            'no_kids' => $this->faker->numberBetween(1, 7),
            'emg_name1' => $this->faker->firstName(),
            'emg_relation1' => $this->faker->randomElement(['Brother', 'Father', 'Mother']),
            'emg_phone1' =>$this->faker->e164PhoneNumber(),
            'emg_name2' => $this->faker->firstName(),
            'emg_relation2' => $this->faker->randomElement(['Brother', 'Father', 'Mother']),
            'emg_phone2' =>$this->faker->e164PhoneNumber(),
            'bank_name' =>'BML',
            'bank_acc' =>$this->faker->numberBetween(10000000, 99999999),
            'image' =>$this->faker->numerify('https://i.pravatar.cc/600?u=####'),
        ];
    }
}
