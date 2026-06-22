<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="min-h-screen flex">

    <!-- Left Section -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 items-center justify-center">

        <div class="text-center text-white px-10">

            <h1 class="text-6xl font-bold mb-6 ">
                Employee Information System
            </h1>

            <p class="text-xl opacity-90">
                Manage Employees, Attendance,
                Leaves and Departments
                from a single platform.
            </p>

        </div>

    </div>

    <!-- Right Section -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-slate-100">

        <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-3xl p-10 w-full max-w-md">

            <h2 class="text-4xl font-bold text-center text-slate-800 mb-2">
                Welcome Back
            </h2>

            <p class="text-center text-slate-500 mb-8">
                Sign in to continue
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-5">
                    <label class="block mb-2 text-gray-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-gray-700">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500">
                </div>

                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600
text-white py-3 rounded-xl font-semibold
hover:scale-105 transition duration-300">

                    Sign In

                </button>

            </form>

        </div>

    </div>
</div>
<footer class="text-center text-black-400 text-sm mt-6">
    Employee Information System © 2026
</footer>
</body>
</html>