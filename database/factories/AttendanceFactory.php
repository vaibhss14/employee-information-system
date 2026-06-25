<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'employee_id' => Employee::inRandomOrder()->value('id'),

            'date' => fake()->date(),

            'status' => fake()->randomElement([
                'Present',
                'Absent',
                'Late',
            ]),
        ];
    }
}