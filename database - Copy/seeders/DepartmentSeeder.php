<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'IT',
            'Human Resources',
            'Finance',
            'Marketing',
            'Sales',
        ];

        foreach ($departments as $department) {
            Department::firstOrCreate([
                'name' => $department,
            ]);
        }
    }
}
