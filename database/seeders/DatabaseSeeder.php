<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Employee_Profile;

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

        // $designation = Designation::factory(10)->create();
        $employee = Employee::factory(20)->create();
    }
}
