<div class="min-h-screen bg-gradient-to-br from-slate-100 via-indigo-50 to-purple-100">

    <div class="max-w-screen-2xl mx-auto px-8 py-10 space-y-8">

        <!-- Hero Banner -->

        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-600 shadow-2xl">

            <div class="absolute top-0 right-0 opacity-10 text-[220px] leading-none">
                👩🏻‍💼
            </div>

            <div class="relative p-10 lg:p-14">

                <div class="flex flex-col lg:flex-row justify-between lg:items-center">

                    <div>

                        <div class="inline-flex items-center gap-2 bg-white/20 px-4 py-2 rounded-full text-sm backdrop-blur-sm">

                            🚀 Employee Management Dashboard

                        </div>

                        <h1 class="text-5xl lg:text-6xl font-bold text-white mt-6">

                            Welcome Back,

                            {{ auth()->user()->name }}

                        </h1>

                        <p class="text-white/80 text-lg mt-4 max-w-2xl">

                            Monitor employees, attendance, departments and leave requests from one place.

                        </p>

                        <div class="mt-8 flex gap-8">

                            <div>

                                <p class="text-white/60 text-sm">

                                    Today's Date

                                </p>

                                <h3 class="text-white text-xl font-semibold">

                                    {{ now()->format('d M Y') }}

                                </h3>

                            </div>

                            <div>

                                <p class="text-white/60 text-sm">

                                    Logged in as

                                </p>

                                <h3 class="text-white text-xl font-semibold">

                                    {{ ucfirst(auth()->user()->role) }}

                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="hidden lg:flex">

                        <div class="w-40 h-40 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-8xl">

                            👩🏻‍💼

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Statistics -->

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

            <!-- Employees -->

            <div class="bg-white rounded-3xl shadow-xl p-8 hover:-translate-y-2 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">

                            Employees

                        </p>

                        <h2 class="text-5xl font-bold text-indigo-600 mt-2">

                            {{ $employeeCount }}

                        </h2>

                    </div>

                    <div class="text-6xl">

                        👥

                    </div>

                </div>

            </div>

            <!-- Attendance -->

            <div class="bg-white rounded-3xl shadow-xl p-8 hover:-translate-y-2 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">

                            Present Today

                        </p>

                        <h2 class="text-5xl font-bold text-green-600 mt-2">

                            {{ $presentCount }}

                        </h2>

                    </div>

                    <div class="text-6xl">

                        ✅

                    </div>

                </div>

            </div>

            <!-- Leaves -->

            <div class="bg-white rounded-3xl shadow-xl p-8 hover:-translate-y-2 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">

                            On Leave

                        </p>

                        <h2 class="text-5xl font-bold text-orange-500 mt-2">

                            {{ $leaveCount }}

                        </h2>

                    </div>

                    <div class="text-6xl">

                        📃

                    </div>

                </div>

            </div>

            <!-- Departments -->

            <div class="bg-white rounded-3xl shadow-xl p-8 hover:-translate-y-2 hover:shadow-2xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500">

                            Departments

                        </p>

                        <h2 class="text-5xl font-bold text-purple-600 mt-2">

                            {{ $departmentCount }}

                        </h2>

                    </div>

                    <div class="text-6xl">

                        🏢

                    </div>

                </div>

            </div>

        </div>

        <!-- Quick Actions -->

        <div class="bg-white rounded-3xl shadow-xl p-8">

            <div class="flex justify-between items-center mb-8">

                <h2 class="text-3xl font-bold">

                    Quick Actions

                </h2>

                <span class="text-gray-400">

                    Frequently Used

                </span>

            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="/employees"
                   class="bg-indigo-600 rounded-3xl p-8 text-white hover:scale-105 hover:shadow-2xl transition">

                    <div class="text-5xl">

                        👥

                    </div>

                    <h3 class="font-bold text-xl mt-5">

                        Employees

                    </h3>

                    <p class="text-indigo-100 mt-2">

                        Manage employee records

                    </p>

                </a>

                <a href="/departments"
                   class="bg-purple-600 rounded-3xl p-8 text-white hover:scale-105 hover:shadow-2xl transition">

                    <div class="text-5xl">

                        🏢

                    </div>

                    <h3 class="font-bold text-xl mt-5">

                        Departments

                    </h3>

                    <p class="text-purple-100 mt-2">

                        View all departments

                    </p>

                </a>

                <a href="/attendance"
                   class="bg-green-600 rounded-3xl p-8 text-white hover:scale-105 hover:shadow-2xl transition">

                    <div class="text-5xl">

                        📅

                    </div>

                    <h3 class="font-bold text-xl mt-5">

                        Attendance

                    </h3>

                    <p class="text-green-100 mt-2">

                        Daily attendance

                    </p>

                </a>

                <a href="/leaves"
                   class="bg-orange-500 rounded-3xl p-8 text-white hover:scale-105 hover:shadow-2xl transition">

                    <div class="text-5xl">

                        📃

                    </div>

                    <h3 class="font-bold text-xl mt-5">

                        Leaves

                    </h3>

                    <p class="text-orange-100 mt-2">

                        Manage leave requests

                    </p>

                </a>

            </div>

        </div>

               <!-- Dashboard Content -->

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Today's Summary -->

            <div class="lg:col-span-1">

                <div class="bg-white rounded-3xl shadow-xl p-8 h-full">

                    <h2 class="text-2xl font-bold mb-6">
                        📊 Today's Summary
                    </h2>

                    <div class="space-y-5">

                        <div class="flex justify-between items-center">

                            <span class="text-gray-600">
                                👥 Employees
                            </span>

                            <span class="font-bold text-indigo-600 text-xl">
                                {{ $employeeCount }}
                            </span>

                        </div>

                        <div class="flex justify-between items-center">

                            <span class="text-gray-600">
                                ✅ Present
                            </span>

                            <span class="font-bold text-green-600 text-xl">
                                {{ $presentCount }}
                            </span>

                        </div>

                        <div class="flex justify-between items-center">

                            <span class="text-gray-600">
                                📃 On Leave
                            </span>

                            <span class="font-bold text-orange-500 text-xl">
                                {{ $leaveCount }}
                            </span>

                        </div>

                        <div class="flex justify-between items-center">

                            <span class="text-gray-600">
                                🏢 Departments
                            </span>

                            <span class="font-bold text-purple-600 text-xl">
                                {{ $departmentCount }}
                            </span>

                        </div>

                    </div>

                    <div class="mt-8 p-5 rounded-2xl bg-indigo-50 border border-indigo-100">

                        <h3 class="font-bold text-indigo-700 mb-2">
                            💡 Tip
                        </h3>

                        <p class="text-gray-600 text-sm">
                            Keep attendance updated daily to generate accurate reports.
                        </p>

                    </div>

                </div>

            </div>

            <!-- Feature Cards -->

            <div class="lg:col-span-2">

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-1 transition">

                        <div class="text-5xl mb-4">
                            👥
                        </div>

                        <h3 class="text-2xl font-bold">
                            Employee Management
                        </h3>

                        <ul class="mt-5 space-y-2 text-gray-600">

                            <li>✔ Add Employees</li>

                            <li>✔ Update Employee Details</li>

                            <li>✔ Manage Profiles</li>

                        </ul>

                    </div>

                    <div class="bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-1 transition">

                        <div class="text-5xl mb-4">
                            📅
                        </div>

                        <h3 class="text-2xl font-bold">
                            Attendance Tracking
                        </h3>

                        <ul class="mt-5 space-y-2 text-gray-600">

                            <li>✔ Daily Attendance</li>

                            <li>✔ Present / Late Status</li>

                            <li>✔ Attendance History</li>

                        </ul>

                    </div>

                    <div class="bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-1 transition">

                        <div class="text-5xl mb-4">
                            📃
                        </div>

                        <h3 class="text-2xl font-bold">
                            Leave Management
                        </h3>

                        <ul class="mt-5 space-y-2 text-gray-600">

                            <li>✔ Apply Leave</li>

                            <li>✔ Approve Requests</li>

                            <li>✔ Leave History</li>

                        </ul>

                    </div>

                    <div class="bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl hover:-translate-y-1 transition">

                        <div class="text-5xl mb-4">
                            🏢
                        </div>

                        <h3 class="text-2xl font-bold">
                            Departments
                        </h3>

                        <ul class="mt-5 space-y-2 text-gray-600">

                            <li>✔ Department Directory</li>

                            <li>✔ Employee Count</li>

                            <li>✔ Department Overview</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>


        <!-- Footer -->

        <div class="text-center py-8">

            <h3 class="text-lg font-semibold text-slate-700">
                Employee Management System
            </h3>

            <p class="text-gray-500 mt-2">
                Built with Laravel • Livewire • Filament • Tailwind CSS
            </p>

        </div>

    </div>

</div>