<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveFactory extends Factory
{
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 month', '+1 month');
        $endDate = (clone $startDate)->modify('+'.rand(1, 5).' days');

        return [
            'employee_id' => Employee::inRandomOrder()->value('id'),

            'leave_type' => fake()->randomElement([
                'Sick Leave',
                'Casual Leave',
                'Annual Leave',
            ]),

            'start_date' => $startDate->format('Y-m-d'),

            'end_date' => $endDate->format('Y-m-d'),

            'reason' => fake()->sentence(),

            'status' => fake()->randomElement([
                'pending',
                'approved',
                'rejected',
            ]),
        ];
    }
}
