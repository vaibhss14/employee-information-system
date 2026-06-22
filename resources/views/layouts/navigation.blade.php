<nav class="bg-slate-900 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold">
            Employee Information System
        </h1>

        @auth
            <div class="flex items-center gap-6">

                <a href="{{ route('dashboard') }}" class="px-2 py-2 rounded-lg
          hover:bg-indigo-600 hover:text-white
          hover:-translate-y-1
          transition-all duration-300">
                    Dashboard
                </a>

                <a href="/employees"
   class="px-2 py-2 rounded-lg
          hover:bg-indigo-600 hover:text-white
          hover:-translate-y-1
          transition-all duration-300">
    Employees
</a>


                <a href="{{ route('attendance') }}" class="px-2 py-2 rounded-lg
          hover:bg-indigo-600 hover:text-white
          hover:-translate-y-1
          transition-all duration-300">
                    Attendance
                </a>

                <a href="{{ route('leaves') }}" class="px-2 py-2 rounded-lg
          hover:bg-indigo-600 hover:text-white
          hover:-translate-y-1
          transition-all duration-300">
                    Leaves
                </a>

                <a href="{{ route('departments') }}" class="px-2 py-2 rounded-lg
          hover:bg-indigo-600 hover:text-white
          hover:-translate-y-1
          transition-all duration-300">
                    Departments
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="/admin"
                       class="bg-yellow-500 text-black px-3 py-2 rounded-lg font-semibold">
                        Admin Panel
                    </a>
                @endif

                <!-- User Info -->
                <div class="flex items-center gap-3 border-l border-gray-600 pl-4">

                    <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <p class="font-semibold">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-xs text-gray-300">
                            {{ ucfirst(auth()->user()->role) }}
                        </p>
                    </div>

                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">
                        Logout
                    </button>
                </form>

            </div>
        @endauth

    </div>
</nav>