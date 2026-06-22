<div class="min-h-screen bg-gradient-to-br from-slate-100 via-indigo-50 to-purple-100">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 rounded-3xl p-10 shadow-2xl text-white mb-8">

            <div class="flex items-center justify-between">

    <div>
        <h1 class="text-5xl font-bold text-white">
            Welcome Back, {{ auth()->user()->name }}
        </h1>

        <p class="text-white/80 mt-3 text-lg">
            Manage employees, attendance,
            departments and leaves efficiently.
        </p>

        <div class="mt-5 text-white/90">
            {{ now()->format('d M Y') }}
        </div>
    </div>

    <div class="w-28 h-28 rounded-full bg-white/20
            flex items-center justify-center
            text-5xl backdrop-blur-sm">
    👨‍💼
</div>

</div>

        </div>

        <!-- Statistics -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-3xl shadow-xl p-6
            hover:shadow-2xl
            hover:-translate-y-2
            transition-all duration-300">

                <p class="text-gray-500">
                    Employees
                </p>

                <h2 class="text-4xl font-bold text-indigo-600 mt-2">
                   {{ $employeeCount }}
                </h2>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6
            hover:shadow-2xl
            hover:-translate-y-2
            transition-all duration-300">

                <p class="text-gray-500">
                    Present Today
                </p>

                <h2 class="text-4xl font-bold text-green-600 mt-2">
                    {{ $presentCount }}
                </h2>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6
            hover:shadow-2xl
            hover:-translate-y-2
            transition-all duration-300">

                <p class="text-gray-500">
                    On Leave
                </p>

                <h2 class="text-4xl font-bold text-orange-500 mt-2">
                   {{ $leaveCount }}
                </h2>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6
            hover:shadow-2xl
            hover:-translate-y-2
            transition-all duration-300">

                <p class="text-gray-500">
                    Departments
                </p>

                <h2 class="text-4xl font-bold text-purple-600 mt-2">
                    {{ $departmentCount }}
                </h2>

            </div>

        </div>

        <!-- Quick Actions -->

        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">

            <h2 class="text-2xl font-bold mb-6">
                Quick Actions
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

    <a href="/employees"
       class="bg-indigo-600 text-white p-5 rounded-2xl text-center
              hover:scale-105 hover:-translate-y-1
              hover:shadow-2xl transition-all duration-300">
        👥 Employees
    </a>

    <a href="/departments"
       class="bg-purple-600 text-white p-5 rounded-2xl text-center
              hover:scale-105 hover:-translate-y-1
              hover:shadow-2xl transition-all duration-300">
        🏢 Departments
    </a>

    <a href="/attendance"
       class="bg-green-600 text-white p-5 rounded-2xl text-center
              hover:scale-105 hover:-translate-y-1
              hover:shadow-2xl transition-all duration-300">
        📅 Attendance
    </a>

    <a href="/leaves"
       class="bg-orange-500 text-white p-5 rounded-2xl text-center
              hover:scale-105 hover:-translate-y-1
              hover:shadow-2xl transition-all duration-300">
        🌴 Leaves
    </a>

</div>

        </div>

        <!-- Feature Cards -->

        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <h2 class="text-2xl font-bold mb-4">
                    Employee Management
                </h2>

                <p class="text-gray-600">
                    Manage employee records, departments,
                    salaries and employee information.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <h2 class="text-2xl font-bold mb-4">
                    Attendance Tracking
                </h2>

                <p class="text-gray-600">
                    Track daily attendance, presence,
                    absences and attendance reports.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <h2 class="text-2xl font-bold mb-4">
                    Leave Management
                </h2>

                <p class="text-gray-600">
                    Handle leave requests, approvals
                    and leave history.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <h2 class="text-2xl font-bold mb-4">
                    Department Management
                </h2>

                <p class="text-gray-600">
                    Organize employees by departments
                    and teams.
                </p>

            </div>

        </div>

    </div>

</div>

