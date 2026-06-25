<?php

use App\Models\Department;

$departments = Department::withCount('employees')->get();

?>

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-5xl font-bold text-slate-800 mb-8">
                Departments
            </h1>
        </div>
        @if(auth()->user()->role === 'admin')
<a href="/admin/departments/create"
   class="bg-purple-600 text-white px-6 py-3 rounded-xl">
    + Add Department
</a>
@endif
    </div>
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-purple-600 to-pink-500 text-white p-6">
            <h2 class="text-2xl font-bold">
                Department Directory
            </h2>
            
        </div>

        
        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="p-4 text-left">Department</th>
                    <th class="p-4 text-left">Description</th>
                    <th class="p-4 text-left">Employees</th>
                </tr>

            </thead>

            <tbody>

                @foreach($departments as $department)

                <tr class="border-b">

                    <td class="p-4 font-medium">
                        {{ $department->name }}
                    </td>

                    <td class="p-4">
                        {{ $department->description }}
                    </td>

                    <td class="p-4">
                        {{ $department->employees_count }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>