<?php

namespace Database\Seeders;

// use App\Models\Department;
// use App\Models\Designation;
// use App\Models\Employee;
// use App\Models\Holiday;
use App\Models\{
    Employee,
    Department,
    Designation,
    Holiday,
    Shift,
};

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::truncate();
        Designation::truncate();
        Employee::truncate();
        Holiday::truncate();
        Shift::truncate();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Department::create([
            'name' => 'HR'
        ]);

        Department::create([
            'name' => 'Finance'
        ]);

        Department::create([
            'name' => 'IT'
        ]);

        Department::create([
            'name' => 'Purchasing'
        ]);

        Shift::create([
            'name' => 'Off Day',
            'short_code' => 'O',
            'start_time' => '00:00:00',
            'end_time' => '00:00:00',
            'hasOT' => FALSE
        ]);
        Shift::create([
            'name' => 'General Shift',
            'short_code' => 'G',
            'start_time' => '08:00:00',
            'end_time' => '14:00:00',
            'hasOT' => TRUE
        ]);
        Shift::create([
            'name' => 'Ramadan Shift',
            'short_code' => 'R',
            'start_time' => '09:00:00',
            'end_time' => '13:00:00',
            'hasOT' => FALSE
        ]);
        Shift::create([
            'name' => 'Evening Shift',
            'short_code' => 'E',
            'start_time' => '14:00:00',
            'end_time' => '18:00:00',
            'hasOT' => FALSE
        ]);

        // $designation = Designation::factory(10)->create();
        $employee = Employee::factory(20)->create();
        $holiday = Holiday::factory(5)->create();
    }
}
