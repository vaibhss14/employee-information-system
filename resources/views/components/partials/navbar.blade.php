<nav class="bg-slate-900 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <h1 class="text-2xl font-bold">
            Employee Information System
        </h1>

        <!-- Menu Links -->
        <div class="flex items-center gap-8">

           <a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('employees') }}">Employees</a>
<a href="{{ route('attendance') }}">Attendance</a>
<a href="{{ route('leaves') }}">Leaves</a>
<a href="{{ route('departments') }}">Departments</a>

@if(auth()->user()->role === 'admin')
    <a href="/admin">
        Admin Panel
    </a>
@endif

        </div>
       

    </div>
</nav>