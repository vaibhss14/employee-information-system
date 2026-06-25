
<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-5xl font-bold text-slate-800">
                Attendance
            </h1>
            <p class="text-slate-500 mt-2">
                Track employee attendance records.
            </p>
        </div>

        @if(auth()->user()->role === 'admin')
            <a href="/admin/attendances/create"
                 class="bg-emerald-900 text-white px-6 py-3 rounded-xl">
                + Mark Attendance
            </a>
        @endif

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-6 rounded-3xl shadow-xl">
            <p class="text-gray-500">Present Today</p>
            <h2 class="text-4xl font-bold text-green-600">
                {{ $attendances->where('status','present')->count() }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl">
            <p class="text-gray-500">Absent</p>
            <h2 class="text-4xl font-bold text-red-500">
                {{ $attendances->where('status','absent')->count() }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl">
            <p class="text-gray-500">Total Records</p>
            <h2 class="text-4xl font-bold text-indigo-600">
                {{ $attendances->count() }}
            </h2>
        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-6">
            <h2 class="text-2xl font-bold">Attendance Records</h2>
        </div>

        <table class="w-full">

            <thead class="bg-slate-100">
                <tr>
                    <th class="p-4 text-left">Employee</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach($attendances as $attendance)

                <tr class="border-b">

                    <td class="p-4">
                       {{ $attendance->employee->name ?? 'N/A' }}
                    </td>

                    <td class="p-4">
                        {{ $attendance->date }}
                    </td>

                    <td class="p-4">
                        {{ $attendance->status }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>