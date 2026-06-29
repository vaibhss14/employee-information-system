<?php

use App\Models\Department;
use App\Models\Employee;

$departments = Department::withCount('employees')->get();

$totalDepartments = $departments->count();
$totalEmployees = Employee::count();
$largestDepartment = $departments->sortByDesc('employees_count')->first();

?>

<div class="max-w-screen-2xl mx-auto px-8 py-10">

    <!-- Header -->

    <div class="flex flex-col lg:flex-row justify-between lg:items-center mb-8">

        <div>

            <h1 class="text-5xl font-bold text-slate-800">
                Departments
            </h1>

        </div>

        @if(auth()->user()->role === 'admin')

            <a href="/admin/departments/create"
               class="mt-5 lg:mt-0 bg-gradient-to-r from-purple-600 to-pink-500
                      text-white px-6 py-3 rounded-xl shadow-lg
                      hover:scale-105 transition">

                + Add Department

            </a>

        @endif

    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-xl p-6">

            <p class="text-gray-500">
                Total Departments
            </p>

            <h2 class="text-4xl font-bold text-purple-600 mt-2">
                {{ $totalDepartments }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow-xl p-6">

            <p class="text-gray-500">
                Total Employees
            </p>

            <h2 class="text-4xl font-bold text-indigo-600 mt-2">
                {{ $totalEmployees }}
            </h2>

        </div>


    </div>

    <!-- Department Table -->

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-purple-600 to-pink-500 text-white p-6">

            <h2 class="text-2xl font-bold">
                Department Directory
            </h2>

            <p class="text-purple-100 mt-2">
                View all departments and employee distribution.
            </p>

        </div>

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="p-5 text-left">
                        Department
                    </th>

                    <th class="p-5 text-left">
                        Description
                    </th>

                    <th class="p-5 text-center">
                        Employees
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($departments as $department)

                    <tr class="border-b hover:bg-purple-50 transition">

                        <td class="p-5">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-purple-100
                                            flex items-center justify-center">

                                    🏢

                                </div>

                                <span class="font-semibold">

                                    {{ $department->name }}

                                </span>

                            </div>

                        </td>

                        <td class="p-5 text-gray-600">

                            {{ $department->description ?: 'No description available.' }}

                        </td>

                        <td class="p-5 text-center">

                            <span class="bg-purple-100 text-purple-700
                                         px-4 py-2 rounded-full font-semibold">

                                {{ $department->employees_count }} Employees

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="text-center py-16">

                            <div class="text-6xl mb-4">

                                🏢

                            </div>

                            <h3 class="text-2xl font-bold text-gray-700">

                                No Departments Found

                            </h3>

                            <p class="text-gray-500 mt-2">

                                Create your first department to get started.

                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>