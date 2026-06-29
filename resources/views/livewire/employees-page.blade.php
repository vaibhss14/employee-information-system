
<div class="min-h-screen bg-gradient-to-br from-slate-100 via-indigo-50 to-purple-100">


<div class="max-w-screen-2xl mx-auto px-8 py-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-4xl font-bold text-slate-800">
                Employees
            </h1>

        </div>

       @if(auth()->user()->role === 'admin')
        <a href="/admin/employees/create"
        class="bg-orange-500 text-white px-6 py-3 rounded-xl">
            + Add Employee
        </a>
        @endif

    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-xl p-6">
            <p class="text-gray-500">Total Employees</p>
            <h2 class="text-4xl font-bold text-indigo-600 mt-2">
                {{ $employees->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-6">
            <p class="text-gray-500">Departments</p>
            <h2 class="text-4xl font-bold text-purple-600 mt-2">
                {{ $employees->pluck('department_id')->unique()->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-6">
            <p class="text-gray-500">Active Records</p>
            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $employees->count() }}
            </h2>
        </div>

    </div>

    

    <!-- Employee Table -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-6">
            <h2 class="text-2xl font-bold">
                Employee Directory
            </h2>
        </div>


        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">
                    <tr>
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Department</th>
                        <th class="p-4 text-left">Salary</th>
                       @if(auth()->user()->role === 'admin')
    <th class="p-4 text-center w-40">Actions</th>
@endif
                    </tr>
                </thead>

                <tbody>
                    @foreach($employees as $employee)

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="p-4">
                            {{ $employee->name }}
                        </td>

                        <td class="p-4">
                            {{ $employee->email }}
                        </td>

                        <td class="p-4">
                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">
                                {{ $employee->department->name ?? 'N/A' }}
                            </span>
                        </td>

                        <td class="p-4">
                            ₹{{ number_format($employee->salary) }}
                        </td>

@if(auth()->user()->role === 'admin')
                        <td class="p-4">
                
    <div class="flex gap-2 justify-center">

        <a href="/admin/employees/{{ $employee->id }}/edit"
           class="bg-green-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded-md">
            Edit
        </a>

        <button
            wire:click="delete({{ $employee->id }})"
            class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded-md">
            Delete
        </button>

    </div>
</td>

@endif
                    </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>
```

</div>
