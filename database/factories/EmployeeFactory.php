<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        $user = User::factory()->state([
            'role' => 'employee',
        ])->create();

        return [
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => fake()->numerify('98########'),
            'department_id' => Department::inRandomOrder()->value('id'),
            'salary' => fake()->numberBetween(25000, 90000),
            'joining_date' => fake()->date(),
        ];
    }
}
