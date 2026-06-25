<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),

            'email' => fake()->unique()->safeEmail(),

            'phone' => fake()->numerify('98########'),

            'department_id' => Department::inRandomOrder()->value('id'),

            'salary' => fake()->numberBetween(25000, 90000),

            'joining_date' => fake()->date(),

           
        ];
    }
}