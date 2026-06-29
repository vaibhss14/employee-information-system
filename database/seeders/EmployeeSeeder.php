<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run(): void
{
    $employees = [
        [
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'department_id' => 1,
            'salary' => 45000,
            'phone' => '1234567896',
        ],
        [
            'name' => 'Mary',
            'email' => 'mary@gmail.com',
            'department_id' => 2,
            'salary' => 50000,
            'phone' => '9876543210',
        ],
    ];

    foreach ($employees as $employeeData) {

        $user = User::firstOrCreate(
            ['email' => $employeeData['email']],
            [
                'name' => $employeeData['name'],
                'password' => Hash::make('password'),
                'role' => 'employee',
            ]
        );

        Employee::firstOrCreate(
            ['user_id' => $user->id],
            [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $employeeData['phone'],
                'department_id' => $employeeData['department_id'],
                'salary' => $employeeData['salary'],
                'joining_date' => now()->toDateString(),
            ]
        );
    }

    Employee::factory(20)->create();
}
}
