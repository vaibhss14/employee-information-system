<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'IT',
                'Human Resources',
                'Finance',
                'Marketing',
                'Sales',
            ]),

            'description' => fake()->sentence(),
        ];
    }
}
