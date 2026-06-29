<nav class="sticky top-0 z-50 bg-slate-900/90 text-white shadow-lg">

    <div class="max-w-screen-2xl mx-auto px-8 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

            <div>
                <h1 class="text-2xl font-bold">
                    Employee Information System
                </h1>

            </div>

        </a>

        @auth

        <div class="flex items-center gap-3">

            <!-- Navigation -->

            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 rounded-xl hover:bg-indigo-600 transition duration-300">
                Dashboard
            </a>

            <a href="/employees"
               class="px-4 py-2 rounded-xl hover:bg-indigo-600 transition duration-300">
                Employees
            </a>

            <a href="{{ route('attendance') }}"
               class="px-4 py-2 rounded-xl hover:bg-indigo-600 transition duration-300">
                Attendance
            </a>

            <a href="{{ route('leaves') }}"
               class="px-4 py-2 rounded-xl hover:bg-indigo-600 transition duration-300">
                Leaves
            </a>

            <a href="{{ route('departments') }}"
               class="px-4 py-2 rounded-xl hover:bg-indigo-600 transition duration-300">
                Departments
            </a>

            @if(auth()->user()->role === 'admin')

                <a href="/admin"
                   class="bg-yellow-500 hover:bg-yellow-400 text-black px-4 py-2 rounded-xl font-semibold transition duration-300">
                    Admin Panel
                </a>

            @endif

            <!-- User -->

            <div class="flex items-center gap-3 border-l border-slate-700 pl-5 ml-2">

                <div class="w-11 h-11 rounded-full bg-indigo-600 flex items-center justify-center font-bold text-lg">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>

                    <p class="font-semibold leading-none">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        {{ ucfirst(auth()->user()->role) }}
                    </p>

                </div>

            </div>

            <!-- Logout -->

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 px-5 py-2 rounded-xl transition duration-300 font-medium">

                    Logout

                </button>

            </form>

        </div>

        @endauth

    </div>

</nav>