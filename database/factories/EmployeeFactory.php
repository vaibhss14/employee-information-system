<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),

            'name' => fake()->name(),

            'email' => fake()->unique()->safeEmail(),

            'phone' => fake()->numerify('98########'),

            'department_id' => Department::inRandomOrder()->value('id'),

            'salary' => fake()->numberBetween(25000, 90000),

            'joining_date' => fake()->date(),

        ];
    }
}
